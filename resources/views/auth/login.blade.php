<x-single-layout>
@push('styles')
<style>
body { font-family:'DM Sans',sans-serif; }
.font-serif { font-family:'Playfair Display',serif; }
.form-input{
width:100%; padding:.65rem .9rem; border:1.5px solid; border-radius:.75rem;
font-size:.875rem; outline:none; transition:border-color .2s, box-shadow .2s, background .3s;
}
.light-input{ border-color:#e2e8f0; background:white; color:#1e293b; }
.light-input::placeholder{ color:#94a3b8; }
.light-input:focus{ border-color:#14b8a6; box-shadow:0 0 0 3px rgba(20,184,166,.12); }
.dark-input{ border-color:#334155; background:#1e293b; color:#e2e8f0; }
.dark-input::placeholder{ color:#475569; }
.dark-input:focus{ border-color:#14b8a6; box-shadow:0 0 0 3px rgba(20,184,166,.15); }
.fade-in{ animation:fadeIn .6s ease forwards; opacity:0; }
@keyframes fadeIn { to { opacity:1; } }
.stagger-1{animation-delay:.08s}
.stagger-2{animation-delay:.16s}
.stagger-3{animation-delay:.24s}
.stagger-4{animation-delay:.32s}

.eye-btn{ position:absolute; right:.75rem; top:50%; transform:translateY(-50%); cursor:pointer; background:none; border:none; }
</style>
@endpush


<div class="w-full max-w-md">

<!-- Logo -->
<div class="text-center mb-8 fade-in stagger-1">
<div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-500 to-teal-700 shadow-lg mb-5">
<svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/>
</svg>
</div>

<h1 class="font-serif text-3xl font-bold text-slate-800 dark:text-white mb-2">
Bon retour !
</h1>

<p class="text-slate-500 dark:text-slate-400 text-sm">
Connectez-vous à votre compte Mystery Box
</p>
</div>


<!-- Card -->
<div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-xl p-8 fade-in stagger-2">

<form method="POST" action="/login" class="space-y-5">
    @csrf

    <!-- Email -->
    <div>
        <label for="email" class="block text-xs font-semibold text-slate-500 mb-1.5 uppercase tracking-wide">
            Adresse email
        </label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="form-input light-input"
            placeholder="vous@email.com"
            required
            autocomplete="email">
        @error('email')
            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div>
        <div class="flex items-center justify-between mb-1.5">
            <label for="password" class="text-xs font-semibold text-slate-500 uppercase tracking-wide">
                Mot de passe
            </label>
            <a href="{{ route('password.request') }}"
                class="text-xs text-teal-600 hover:text-teal-700 font-medium">
                Mot de passe oublié ?
            </a>
        </div>

        <div class="relative">
            <input
                id="password"
                name="password"
                type="password"
                class="form-input light-input pr-10"
                placeholder="••••••••"
                required
                autocomplete="current-password">

            <button type="button"
                class="eye-btn text-slate-400 hover:text-slate-600"
                onclick="togglePwd('password')">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </button>
        </div>
        @error('password')
            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
        @enderror
    </div>

    <!-- Remember -->
    <div class="flex items-center gap-2">
        <input id="remember" name="remember" type="checkbox" class="w-4 h-4 rounded border-slate-300 accent-teal-600">
        <label for="remember" class="text-sm text-slate-600 cursor-pointer">
            Se souvenir de moi
        </label>
    </div>

    <!-- Errors -->
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-3 text-sm text-red-600">
            Email ou mot de passe incorrect.
        </div>
    @endif

    <!-- Submit -->
    <button type="submit"
        class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl bg-teal-600 text-white font-semibold text-sm hover:bg-teal-700 transition-all">

        Se connecter

        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
    </button>

</form>

</div>

<!-- Register -->
<p class="text-center text-sm text-slate-500 mt-6 fade-in stagger-3">
    Pas encore de compte ?

    <a href="{{ route('register') }}"
        class="text-teal-600 font-semibold hover:text-teal-700">
        Créer un compte
    </a>
</p>

</div>


@push('scripts')
<script>
function togglePwd(id){
    const inp = document.getElementById(id);
    inp.type = inp.type === 'password' ? 'text' : 'password';
}
</script>
@endpush

</x-single-layout>
