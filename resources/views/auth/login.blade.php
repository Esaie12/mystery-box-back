<x-single-layout>
    @push('styles')
    <style>
        body { font-family:'DM Sans',sans-serif; }
        .font-serif { font-family:'Playfair Display',serif; }
        .form-input {
        width:100%; padding:.65rem .9rem; border:1.5px solid; border-radius:.75rem;
        font-size:.875rem; outline:none; transition:border-color .2s, box-shadow .2s, background .3s;
        }
        .light-input { border-color:#e2e8f0; background:white; color:#1e293b; }
        .light-input::placeholder { color:#94a3b8; }
        .light-input:focus { border-color:#14b8a6; box-shadow:0 0 0 3px rgba(20,184,166,.12); }
        .dark-input { border-color:#334155; background:#1e293b; color:#e2e8f0; }
        .dark-input::placeholder { color:#475569; }
        .dark-input:focus { border-color:#14b8a6; box-shadow:0 0 0 3px rgba(20,184,166,.15); }
        .fade-in { animation:fadeIn .6s ease forwards; opacity:0; }
        @keyframes fadeIn { to { opacity:1; } }
        .stagger-1{animation-delay:.08s}.stagger-2{animation-delay:.16s}.stagger-3{animation-delay:.24s}.stagger-4{animation-delay:.32s}
        .nav-link { position:relative; }
        .nav-link::after { content:''; position:absolute; bottom:-2px; left:0; width:0; height:2px; background:#14b8a6; transition:width .3s; }
        .nav-link:hover::after { width:100%; }
        .eye-btn { position:absolute; right:.75rem; top:50%; transform:translateY(-50%); cursor:pointer; }
        .divider-text { position:relative; text-align:center; }
        .divider-text::before,.divider-text::after { content:''; position:absolute; top:50%; width:42%; height:1px; }
        .divider-text::before { left:0; }
        .divider-text::after { right:0; }
        .social-btn { transition:all .25s; }
        .social-btn:hover { transform:translateY(-1px); }
        /* Animated background blobs */
        .blob1 { position:fixed; width:400px; height:400px; border-radius:50%; filter:blur(80px); pointer-events:none; top:-100px; right:-100px; opacity:.35; transition:background .3s; }
        .blob2 { position:fixed; width:300px; height:300px; border-radius:50%; filter:blur(60px); pointer-events:none; bottom:-80px; left:-80px; opacity:.3; transition:background .3s; }
    </style>
    @endpush

    <div class="w-full max-w-md">

        <!-- Logo + Title -->
        <div class="text-center mb-8 fade-in stagger-1">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-500 to-teal-700 shadow-lg shadow-teal-200 dark:shadow-teal-900/50 mb-5">
            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/></svg>
            </div>
            <h1 class="font-serif text-3xl font-bold text-slate-800 dark:text-white mb-2">Bon retour !</h1>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Connectez-vous à votre compte Mystery Box</p>
        </div>

        <!-- Card -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-xl shadow-slate-200/50 dark:shadow-slate-950/50 p-8 fade-in stagger-2">

            <!-- Social logins -->
            <div class="grid grid-cols-2 gap-3 mb-6">
            <button class="social-btn flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-medium hover:border-slate-300 dark:hover:border-slate-600 transition-all">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                Google
            </button>
            <button class="social-btn flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-medium hover:border-slate-300 dark:hover:border-slate-600 transition-all">
                <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                Facebook
            </button>
            </div>

            <div class="divider-text text-xs text-slate-400 dark:text-slate-600 mb-6">
                <span class="relative z-10 bg-white dark:bg-slate-900 px-3">ou continuer avec email</span>
                <style>.divider-text::before { background:#e2e8f0; } .dark .divider-text::before { background:#334155; } .divider-text::after { background:#e2e8f0; } .dark .divider-text::after { background:#334155; }</style>
            </div>

            <form id="loginForm" method="post" action="{{route('login')}}" novalidate class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Adresse email</label>
                    <input id="email" type="email" name="email" value="{{old('email')}}" class="form-input light-input dark:dark-input" placeholder="vous@email.com" required autocomplete="email">
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">Mot de passe</label>
                    <a href="#" class="text-xs text-teal-600 dark:text-teal-400 hover:text-teal-700 font-medium">Oublié ?</a>
                    </div>
                    <div class="relative">
                    <input id="password" name="password" type="password" class="form-input light-input dark:dark-input pr-10" placeholder="••••••••" required autocomplete="current-password">
                    <button type="button" class="eye-btn text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors" onclick="togglePwd('password', this)">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </button>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <input id="remember" type="checkbox" class="w-4 h-4 rounded border-slate-300 dark:border-slate-600 accent-teal-600">
                    <label for="remember" class="text-sm text-slate-600 dark:text-slate-400 cursor-pointer">Se souvenir de moi</label>
                </div>


                <div id="loginError" class="{{ $errors->any() ? '' : 'hidden' }} bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-3 text-sm text-red-600 dark:text-red-400 flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01"/></svg>
                    Email ou mot de passe incorrect.
                </div>

                <button type="submit" class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl bg-teal-600 text-white font-semibold text-sm hover:bg-teal-700 active:scale-[.98] transition-all shadow-lg shadow-teal-200 dark:shadow-teal-900/40">
                    Se connecter
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </button>
            </form>
        </div>

        <!-- Signup link -->
        <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-6 fade-in stagger-3">
            Pas encore de compte ?
            <a href="{{route('register')}}" class="text-teal-600 dark:text-teal-400 font-semibold hover:text-teal-700 dark:hover:text-teal-300 transition-colors">Créer un compte</a>
        </p>
        <p class="text-center text-xs text-slate-400 dark:text-slate-600 mt-2 fade-in stagger-4">
            <a href="track.html" class="hover:text-teal-500 transition-colors">Suivre une commande sans compte →</a>
        </p>
    </div>

    @push('scripts')
    <script>
        // Password toggle
        function togglePwd(id, btn) {
        const inp = document.getElementById(id);
        inp.type = inp.type === 'password' ? 'text' : 'password';
        }


        // Form
        document.getElementById('loginForm').addEventListener('submit', function(e) {
           
            const email = document.getElementById('email').value;
            const pwd = document.getElementById('password').value;
            if (!email || !pwd) {
                e.preventDefault();
                document.getElementById('loginError').classList.remove('hidden');
                return;
            }
            document.getElementById('loginError').classList.add('hidden');
        });
    </script>
    @endpush
</x-single-layout>