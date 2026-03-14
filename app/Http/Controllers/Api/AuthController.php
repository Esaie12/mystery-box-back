<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\VerifyEmailMail;
use Illuminate\Support\Facades\URL;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Inscription - Adaptation au formulaire avec prenom/nom séparés
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'tel' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'prenom.required' => 'Le prénom est obligatoire.',
            'nom.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        try {
            // Créer l'utilisateur
            $user = User::create([
                'name' => $validated['prenom'] . ' ' . $validated['nom'],
                'email' => $validated['email'],
                'phone' => $validated['tel'] ?? null,
                'password' => Hash::make($validated['password']),
                'email_verified_at' => null,
            ]);

            // Envoyer l'email de vérification
            Mail::to($user->email)->send(new VerifyEmailMail($user));

            return response()->json([
                'message' => 'Inscription réussie. Veuillez vérifier votre email.',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'redirect' => route('verify_email')
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur lors de l\'inscription: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Vérifier l'email avec le lien signé
     */
    public function verifyEmail($id, $hash)
    {
        try {
            $user = User::findOrFail($id);

            // Vérifier que le hash correspond
            if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
                return response()->json([
                    'message' => 'Lien de vérification invalide ou expiré'
                ], 400);
            }

            // Si email déjà vérifié
            if ($user->email_verified_at) {
                return response()->json([
                    'message' => 'Email déjà vérifié',
                    'redirect' => route('welcome')
                ], 200);
            }

            // Marquer comme vérifié
            $user->markEmailAsVerified();

            return response()->json([
                'message' => 'Email vérifié avec succès!',
                'redirect' => route('welcome')
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Connexion
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Identifiants incorrects'
            ], 401);
        }

        // Vérifier que l'email est confirmé
        if (!$user->email_verified_at) {
            return response()->json([
                'message' => 'Veuillez d\'abord vérifier votre email',
                'redirect' => route('verify_email') . '?email=' . urlencode($user->email)
            ], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Connexion réussie',
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
            'redirect' => route('welcome')
        ], 200);
    }

    /**
     * Récupérer l'utilisateur connecté
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Déconnecté avec succès'
        ]);
    }

    /**
     * Renvoyer le lien de vérification d'email
     */
    public function resendVerificationEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        try {
            $user = User::where('email', $request->email)->first();

            if ($user->email_verified_at) {
                return response()->json([
                    'message' => 'Votre email est déjà vérifié'
                ], 400);
            }

            // Envoyer l'email de vérification
            Mail::to($user->email)->send(new VerifyEmailMail($user));

            return response()->json([
                'message' => 'Un lien de vérification a été envoyé à votre email'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }
    // Afficher le formulaire de réinitialisation du mot de passe///
      // Formulaire "mot de passe oublié"
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Envoyer l’email avec le lien
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
     // Formulaire de réinitialisation via token
    public function resetPasswordForm($token)
    {
        return view('auth.reset_password', ['token' => $token]);
    }

    // Mettre à jour le mot de passe
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
