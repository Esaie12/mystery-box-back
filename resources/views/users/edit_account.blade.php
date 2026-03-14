<x-user-layout>
    @push('styles')
    <style>
        body { font-family: 'DM Sans', sans-serif; }
        .profile-card {
            background-color: #fff;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            max-width: 800px;
            margin: auto;
        }
        .profile-header { display: flex; align-items: center; gap: 1.5rem; }
        .profile-header img { width: 80px; height: 80px; border-radius: 9999px; object-fit: cover; }
        .profile-header h2 { font-family: 'Playfair Display', serif; font-size: 1.75rem; margin: 0; }
        .profile-info { margin-top: 2rem; }
        .profile-info div { margin-bottom: 1rem; }
        .profile-info label { font-weight: 600; color: #475569; display: block; margin-bottom: 0.25rem; }
        .profile-info input {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            outline: none;
        }
        .btn-save {
            background-color: #14b8a6;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: background 0.3s;
        }
        .btn-save:hover { background-color: #0f766e; }
    </style>
    @endpush

    <div class="mt-12 profile-card">
        <!-- Header -->
        <div class="profile-header">
            <img src="{{ Auth::user()->profile_photo_url ?? 'https://via.placeholder.com/80' }}" alt="Photo de profil">
            <div>
                <h2>{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <!-- Formulaire éditable -->
        <form action="{{-- route('update_profile') --}}" method="POST" class="profile-info mt-6">
            @csrf
            <!-- Nom complet -->
            <div>
                <label for="name">Nom complet :</label>
                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <!-- Email -->
            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
            </div>

            <!-- Téléphone -->
            <div>
                <label for="phone">Téléphone :</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}">
            </div>

            <!-- Mot de passe (optionnel) -->
            <div>
                <label for="password">Nouveau mot de passe (laisser vide si inchangé) :</label>
                <input type="password" id="password" name="password" placeholder="••••••••">
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn-save">Enregistrer les modifications</button>
            </div>
        </form>
        <p class="text-sm text-gray-400 mt-2">
            <em>La route de mise à jour du profil n’est pas encore définie. Réactivez-la dès que le contrôleur sera prêt.</em>
        </p>
    </div>
</x-user-layout>
