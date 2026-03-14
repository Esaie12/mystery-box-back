<x-single-layout>
@push('styles')
<style>
body{font-family:'DM Sans',sans-serif;background:#f8fafc;}

.auth-card{
max-width:420px;
margin:4rem auto;
background:white;
padding:2.5rem;
border-radius:1.25rem;
box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

.auth-title{
font-family:'Playfair Display',serif;
font-size:1.8rem;
color:#0f766e;
margin-bottom:1.5rem;
text-align:center;
}

.auth-input{
width:100%;
padding:.65rem .75rem;
border:1.5px solid #e2e8f0;
border-radius:.5rem;
margin-bottom:1rem;
outline:none;
}

.auth-btn{
width:100%;
background:#14b8a6;
color:white;
padding:.7rem;
border-radius:.6rem;
font-weight:600;
transition:.3s;
}

.auth-btn:hover{
background:#0f766e;
}

.auth-link{
display:block;
margin-top:1rem;
text-align:center;
font-size:.9rem;
color:#14b8a6;
}
</style>
@endpush

<div class="auth-card">

<h2 class="auth-title">Réinitialiser le mot de passe</h2>

<form method="POST" action="{{ route('password.update') }}">
@csrf

<input type="hidden" name="token" value="{{ $token }}">

<input
type="email"
name="email"
placeholder="Votre email"
required
class="auth-input"
/>

<input
type="password"
name="password"
placeholder="Nouveau mot de passe"
required
class="auth-input"
/>

<input
type="password"
name="password_confirmation"
placeholder="Confirmer le mot de passe"
required
class="auth-input"
/>

<button type="submit" class="auth-btn">
Réinitialiser le mot de passe
</button>

</form>

<a href="{{ route('login') }}" class="auth-link">
Retour à la connexion
</a>

</div>
</x-single-layout>
