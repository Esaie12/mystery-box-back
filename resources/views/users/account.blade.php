<x-user-layout>
    @push('styles')
    <style>
        body { font-family:'DM Sans',sans-serif; background-color:#f8fafc; }

        .profile-card {
            max-width: 720px;
            margin: 3rem auto;
            background-color: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            padding: 2.5rem;
            transition: transform .2s;
        }
        .profile-card:hover { transform: translateY(-5px); }

        .profile-header {
            display:flex;
            align-items:center;
            gap:1.5rem;
            border-bottom:1px solid #e2e8f0;
            padding-bottom:1.5rem;
        }
        .profile-header img {
            width:100px; height:100px;
            border-radius:9999px;
            object-fit:cover;
            border:3px solid #14b8a6;
        }
        .profile-header h2 {
            font-family:'Playfair Display',serif;
            font-size:2rem;
            margin:0;
            color:#0f766e;
        }
        .profile-header p { color:#475569; margin-top:0.25rem; }

        .profile-info {
            margin-top:2rem;
        }
        .profile-info div {
            display:flex;
            justify-content: space-between;
            padding:0.75rem 0;
            border-bottom:1px solid #e2e8f0;
        }
        .profile-info div:last-child { border-bottom:none; }
        .profile-info label { font-weight:600; color:#475569; }
        .profile-info span { font-weight:500; color:#1e293b; }

        .btn-edit, .btn-logout {
            padding:0.75rem 1.5rem;
            border-radius:0.75rem;
            font-weight:600;
            transition:background .3s, transform .2s;
        }
        .btn-edit {
            background-color:#14b8a6; color:white;
        }
        .btn-edit:hover {
            background-color:#0f766e; transform:scale(1.05);
        }
        .btn-logout {
            background-color:#ef4444; color:white;
            margin-left:1rem;
        }
        .btn-logout:hover {
            background-color:#b91c1c; transform:scale(1.05);
        }

        @media (max-width:640px){
            .profile-header { flex-direction:column; text-align:center; }
        }
    </style>
    @endpush

    <div class="profile-card fade-in stagger-1">
        <!-- Header -->
        <div class="profile-header">
            <img src="{{ Auth::user()->profile_photo_url ?? 'https://via.placeholder.com/100' }}" alt="Photo de profil">
            <div>
                <h2>{{ Auth::user()->name }}</h2>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>

        <!-- Infos utilisateur -->
        <div class="profile-info">
            <div>
                <label>Nom complet :</label>
                <span>{{ Auth::user()->name }}</span>
            </div>
            <div>
                <label>Email :</label>
                <span>{{ Auth::user()->email }}</span>
            </div>
            <div>
                <label>Téléphone :</label>
                <span>{{ Auth::user()->phone ?? '-' }}</span>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-6 flex justify-end">
            <a href="{{ route('edit_account') }}" class="btn-edit">Modifier mon profil</a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">Se déconnecter</button>
            </form>
        </div>
    </div>
</x-user-layout>
