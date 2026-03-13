<x-single-layout>
    @push('styles')
    <style>
        body { font-family:'DM Sans',sans-serif; }
        .font-serif { font-family:'Playfair Display',serif; }
        .form-input {
        width:100%; padding:.65rem .9rem; border:1.5px solid; border-radius:.75rem;
        font-size:.875rem; outline:none; transition:border-color .2s, box-shadow .2s;
        }
        .light-input { border-color:#e2e8f0; background:white; color:#1e293b; }
        .light-input::placeholder { color:#94a3b8; }
        .light-input:focus { border-color:#14b8a6; box-shadow:0 0 0 3px rgba(20,184,166,.12); }
        .dark-input { border-color:#334155; background:#1e293b; color:#e2e8f0; }
        .dark-input::placeholder { color:#475569; }
        .dark-input:focus { border-color:#14b8a6; box-shadow:0 0 0 3px rgba(20,184,166,.15); }
        .fade-in { animation:fadeIn .6s ease forwards; opacity:0; }
        @keyframes fadeIn { to { opacity:1; } }
        .stagger-1{animation-delay:.08s}.stagger-2{animation-delay:.16s}.stagger-3{animation-delay:.24s}
        .nav-link { position:relative; }
        .nav-link::after { content:''; position:absolute; bottom:-2px; left:0; width:0; height:2px; background:#14b8a6; transition:width .3s; }
        .nav-link:hover::after { width:100%; }
        .eye-btn { position:absolute; right:.75rem; top:50%; transform:translateY(-50%); cursor:pointer; }
        .strength-bar { height:4px; border-radius:4px; transition:width .4s ease, background .4s; }
        /* password strength indicator */
        .blob1 { position:fixed; width:450px; height:450px; border-radius:50%; filter:blur(90px); pointer-events:none; top:-120px; left:-80px; opacity:.3; }
        .blob2 { position:fixed; width:350px; height:350px; border-radius:50%; filter:blur:70px; pointer-events:none; bottom:-80px; right:-60px; opacity:.25; }
        .step-dot { width:2rem; height:2rem; border-radius:999px; display:flex; align-items:center; justify-content:center; font-size:.7rem; font-weight:700; }
    </style>
    @endpush

    <div class="w-full max-w-lg">

      <!-- Title -->
      <div class="text-center mb-8 fade-in stagger-1">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-500 to-teal-700 shadow-lg shadow-teal-200 dark:shadow-teal-900/50 mb-5">
          <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </div>
        <h1 class="font-serif text-3xl font-bold text-slate-800 dark:text-white mb-2">Créer un compte</h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm">Rejoignez Mystery Box Global et découvrez l'art de la surprise</p>
      </div>

      <!-- Progress steps -->
      <div class="flex items-center justify-center gap-2 mb-8 fade-in stagger-1">
        <div class="step-dot bg-teal-600 text-white text-xs" id="step1dot">1</div>
        <div class="flex-1 max-w-12 h-0.5 bg-slate-200 dark:bg-slate-700" id="line1"></div>
        <div class="step-dot bg-slate-200 dark:bg-slate-700 text-slate-400 dark:text-slate-500 text-xs" id="step2dot">2</div>
        <div class="flex-1 max-w-12 h-0.5 bg-slate-200 dark:bg-slate-700" id="line2"></div>
        <div class="step-dot bg-slate-200 dark:bg-slate-700 text-slate-400 dark:text-slate-500 text-xs" id="step3dot">✓</div>
      </div>

      <!-- Card -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-xl shadow-slate-200/50 dark:shadow-slate-950/50 p-8 fade-in stagger-2">

        <form id="registerForm" novalidate class="space-y-5">

          <!-- Step 1: Identité -->
          <div id="formStep1">
            <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 uppercase tracking-widest mb-4">Étape 1 — Identité</p>
            <div class="grid sm:grid-cols-2 gap-4 mb-4">
              <div>
                <label for="prenom" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-1.5">Prénom <span class="text-red-400">*</span></label>
                <input id="prenom" type="text" class="form-input light-input" placeholder="Marie" required autocomplete="given-name">
              </div>
              <div>
                <label for="nom" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-1.5">Nom <span class="text-red-400">*</span></label>
                <input id="nom" type="text" class="form-input light-input" placeholder="Dupont" required autocomplete="family-name">
              </div>
            </div>
            <div class="mb-4">
              <label for="regEmail" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-1.5">Email <span class="text-red-400">*</span></label>
              <input id="regEmail" type="email" class="form-input light-input" placeholder="vous@email.com" required autocomplete="email">
            </div>
            <div class="mb-4">
              <label for="tel" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-1.5">Téléphone</label>
              <input id="tel" type="tel" class="form-input light-input" placeholder="+33 6 00 00 00 00" autocomplete="tel">
            </div>
            <button type="button" onclick="nextStep(2)" class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl bg-teal-600 text-white font-semibold text-sm hover:bg-teal-700 transition-all shadow-lg shadow-teal-200 dark:shadow-teal-900/40">
              Continuer
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </button>
          </div>

          <!-- Step 2: Sécurité -->
          <div id="formStep2" class="hidden">
            <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 uppercase tracking-widest mb-4">Étape 2 — Sécurité</p>
            <div class="mb-4">
              <label for="regPwd" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-1.5">Mot de passe <span class="text-red-400">*</span></label>
              <div class="relative">
                <input id="regPwd" type="password" class="form-input light-input pr-10" placeholder="Min. 8 caractères" required oninput="checkStrength(this.value)">
                <button type="button" class="eye-btn text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors" onclick="togglePwd('regPwd')">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
              </div>
              <!-- Strength -->
              <div class="mt-2">
                <div class="flex gap-1 mb-1">
                  <div class="strength-bar bg-slate-200 dark:bg-slate-700 flex-1" id="sb1"></div>
                  <div class="strength-bar bg-slate-200 dark:bg-slate-700 flex-1" id="sb2"></div>
                  <div class="strength-bar bg-slate-200 dark:bg-slate-700 flex-1" id="sb3"></div>
                  <div class="strength-bar bg-slate-200 dark:bg-slate-700 flex-1" id="sb4"></div>
                </div>
                <p id="strengthText" class="text-xs text-slate-400 dark:text-slate-600">Entrez un mot de passe</p>
              </div>
            </div>
            <div class="mb-5">
              <label for="regPwd2" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-1.5">Confirmer le mot de passe <span class="text-red-400">*</span></label>
              <div class="relative">
                <input id="regPwd2" type="password" class="form-input light-input pr-10" placeholder="Répétez le mot de passe" required>
                <button type="button" class="eye-btn text-slate-400 hover:text-slate-600 transition-colors" onclick="togglePwd('regPwd2')">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
              </div>
            </div>
            <div class="flex items-start gap-2 mb-5">
              <input id="cgu" type="checkbox" class="w-4 h-4 mt-0.5 rounded border-slate-300 dark:border-slate-600 accent-teal-600" required>
              <label for="cgu" class="text-sm text-slate-600 dark:text-slate-400 cursor-pointer leading-snug">
                J'accepte les <a href="#" class="text-teal-600 dark:text-teal-400 hover:underline">Conditions générales</a> et la <a href="#" class="text-teal-600 dark:text-teal-400 hover:underline">Politique de confidentialité</a>.
              </label>
            </div>
            <div id="regError" class="hidden bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-3 text-sm text-red-600 dark:text-red-400 flex items-center gap-2 mb-4">
              <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01"/></svg>
              <span id="regErrorMsg">Veuillez corriger les erreurs.</span>
            </div>
            <div class="flex gap-3">
              <button type="button" onclick="nextStep(1)" class="flex items-center justify-center gap-1 px-5 py-3.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                Retour
              </button>
              <button type="submit" class="flex-1 flex items-center justify-center gap-2 py-3.5 rounded-xl bg-teal-600 text-white font-semibold text-sm hover:bg-teal-700 transition-all shadow-lg shadow-teal-200 dark:shadow-teal-900/40">
                Créer mon compte
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              </button>
            </div>
          </div>

        </form>
      </div>

      <!-- Login link -->
      <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-6 fade-in stagger-3">
        Déjà un compte ?
        <a href="{{route('login')}}" class="text-teal-600 dark:text-teal-400 font-semibold hover:text-teal-700 dark:hover:text-teal-300 transition-colors">Se connecter</a>
      </p>
    </div>


    @push('scripts')
    <script>

        function togglePwd(id) {
            const inp = document.getElementById(id);
            inp.type = inp.type === 'password' ? 'text' : 'password';
        }

        // Multi-step
        let currentStep = 1;
        function nextStep(step) {
        if (step === 2) {
            const prenom = document.getElementById('prenom').value;
            const nom = document.getElementById('nom').value;
            const email = document.getElementById('regEmail').value;
            if (!prenom || !nom || !email) {
            [prenom ? null:'prenom', nom ? null:'nom', email ? null:'regEmail'].filter(Boolean).forEach(id => {
                if(id) document.getElementById(id).style.borderColor = '#ef4444';
            });
            return;
            }
        }
        currentStep = step;
        document.getElementById('formStep1').classList.toggle('hidden', step !== 1);
        document.getElementById('formStep2').classList.toggle('hidden', step !== 2);
        // Update step dots
        const colors = {
            1: { d1:'bg-teal-600 text-white', d2:'bg-slate-200 dark:bg-slate-700 text-slate-400 dark:text-slate-500' },
            2: { d1:'bg-teal-100 dark:bg-teal-900 text-teal-600 dark:text-teal-400', d2:'bg-teal-600 text-white' }
        };
        const c = colors[step] || colors[1];
        document.getElementById('step1dot').className = `step-dot text-xs ${c.d1}`;
        document.getElementById('step2dot').className = `step-dot text-xs ${c.d2}`;
        }

        // Password strength
        function checkStrength(val) {
        let score = 0;
        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;
        const colors = ['#ef4444','#f97316','#eab308','#22c55e'];
        const labels = ['Très faible','Faible','Moyen','Fort'];
        for (let i = 1; i <= 4; i++) {
            const bar = document.getElementById(`sb${i}`);
            bar.style.background = i <= score ? colors[score - 1] : '';
            bar.className = `strength-bar flex-1 ${i <= score ? '' : 'bg-slate-200 dark:bg-slate-700'}`;
        }
        const txt = document.getElementById('strengthText');
        txt.textContent = val.length ? labels[score - 1] || 'Très faible' : 'Entrez un mot de passe';
        txt.style.color = val.length && score > 0 ? colors[score - 1] : '';
        }

        // Form submit
        document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const pwd = document.getElementById('regPwd').value;
        const pwd2 = document.getElementById('regPwd2').value;
        const cgu = document.getElementById('cgu').checked;
        const errEl = document.getElementById('regError');
        const errMsg = document.getElementById('regErrorMsg');

        if (pwd.length < 8) { errMsg.textContent = 'Le mot de passe doit contenir au moins 8 caractères.'; errEl.classList.remove('hidden'); return; }
        if (pwd !== pwd2) { errMsg.textContent = 'Les mots de passe ne correspondent pas.'; errEl.classList.remove('hidden'); return; }
        if (!cgu) { errMsg.textContent = 'Veuillez accepter les conditions générales.'; errEl.classList.remove('hidden'); return; }
        errEl.classList.add('hidden');
        // Redirect to email verification page
        window.location.href = 'verify-email.html';
        });
    </script>
    @endpush

</x-single-layout>