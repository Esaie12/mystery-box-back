<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\User\VerifyEmailMail;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Inscription
     */
   public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'nullable|string|max:20',
        'country' => 'nullable|string|max:10',
    ], [
        'name.required' => 'Le nom est obligatoire.',
        'email.required' => 'L\'email est obligatoire.',
        'email.unique' => 'Cet email est déjà utilisé.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        'password.confirmed' => 'Les mots de passe ne correspondent pas.',
    ]);

    try {
        // Créer l'utilisateur
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'country' => $validated['country'] ?? null, // <-- sauvegarde le pays
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
            // ✅ EN DEV : Marquer comme vérifié immédiatement
            'email_verified_at' => app()->isLocal() ? now() : null,
        ]);

        // Envoyer l'email de vérification (seulement en production)
        if (!app()->isLocal()) {
            Mail::to($user->email)->send(new VerifyEmailMail($user));
        }

        // Si c'est une requête JSON (fetch)
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Inscription réussie !',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                // ✅ EN DEV : Rediriger directement vers login, EN PROD : vers vérification
                'redirect' => app()->isLocal() ? route('login') : route('verify_email') . '?email=' . urlencode($user->email)
            ], 201);
        }

        // Redirection web classique
        $redirectRoute = app()->isLocal() ? route('login') : route('verify_email');
        $message = app()->isLocal()
            ? 'Inscription réussie ! Vous pouvez maintenant vous connecter.'
            : 'Inscription réussie. Veuillez vérifier votre email.';

        return redirect($redirectRoute)->with('success', $message);

    } catch (\Exception $e) {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Erreur lors de l\'inscription',
                'errors' => ['general' => $e->getMessage()]
            ], 500);
        }

        return back()->withErrors(['general' => 'Erreur lors de l\'inscription: ' . $e->getMessage()]);
    }
}

    /**
     * Connexion
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'L\'email est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Identifiants incorrects',
                    'errors' => ['email' => 'Les identifiants sont incorrects.']
                ], 401);
            }

            return back()->withErrors([
                'email' => 'Les identifiants sont incorrects.',
            ])->onlyInput('email');
        }

        // Vérifier que l'email est confirmé
        if (!$user->email_verified_at) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Veuillez d\'abord vérifier votre email',
                    'redirect' => route('verify_email') . '?email=' . urlencode($user->email)
                ], 403);
            }

            return back()->withErrors([
                'email' => 'Veuillez d\'abord vérifier votre email.',
            ])->onlyInput('email');
        }

        // Authentifier l'utilisateur
        Auth::login($user);
        $request->session()->regenerate();

        if ($request->expectsJson()) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Connexion réussie',
                'user' => $user,
                'token' => $token,
                'redirect' => route('my_account')
            ], 200);
        }

        return redirect()->route('my_account')->with('success', 'Connecté avec succès !');
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Déconnecté avec succès',
                'redirect' => route('welcome')
            ]);
        }

        return redirect()->route('welcome')->with('success', 'Déconnecté avec succès !');
    }

    /**
     * Récupérer l'utilisateur connecté
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
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
                'redirect' => route('login')
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }

    // ============================================
    // GESTION DU MOT DE PASSE OUBLIÉ
    // ============================================

    /**
     * Afficher le formulaire "Mot de passe oublié"
     */
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Envoyer le lien de réinitialisation
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'L\'email est obligatoire.',
            'email.exists' => 'Aucun compte associé à cet email.',
        ]);

        try {
            $status = Password::sendResetLink($request->only('email'));

            if ($status === Password::RESET_LINK_SENT) {
                return redirect()->back()->with('status', 'Un lien de réinitialisation a été envoyé à votre email.');
            }

            return back()->withErrors(['email' => 'Erreur lors de l\'envoi du lien.']);

        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Erreur: ' . $e->getMessage()]);
        }
    }

    /**
     * Afficher le formulaire de réinitialisation
     */
    public function resetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Traiter la réinitialisation du mot de passe
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            );

            if ($status === Password::PASSWORD_RESET) {
                return redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé avec succès !');
            }

            return back()->withErrors([
                'email' => 'Erreur lors de la réinitialisation du mot de passe.',
            ]);

        } catch (\Exception $e) {
            return back()->withErrors([
                'email' => 'Erreur: ' . $e->getMessage(),
            ]);
        }
    }
}
