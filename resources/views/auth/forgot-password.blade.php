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
margin-bottom:1rem;
text-align:center;
}

.auth-text{
color:#64748b;
text-align:center;
margin-bottom:1.5rem;
font-size:.95rem;
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

<h2 class="auth-title">Mot de passe oublié</h2>

<p class="auth-text">
Entrez votre email et nous vous enverrons un lien pour réinitialiser votre mot de passe.
</p>

@if(session('status'))
<div style="color:green;margin-bottom:1rem;text-align:center;">
{{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
@csrf

<input
type="email"
name="email"
placeholder="Votre email"
required
class="auth-input"
/>

<button type="submit" class="auth-btn">
Envoyer le lien de réinitialisation
</button>

</form>

<a href="{{ route('login') }}" class="auth-link">
Retour à la connexion
</a>

</div>
</x-single-layout>
