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
        .step-dot { width:2rem; height:2rem; border-radius:999px; display:flex; align-items:center; justify-content:center; font-size:.7rem; font-weight:700; }
        .eye-btn { position:absolute; right:.75rem; top:50%; transform:translateY(-50%); cursor:pointer; background:none; border:none; }
        .strength-bar { height:4px; border-radius:4px; transition:width .4s ease, background .4s; }
        .loading { opacity: 0.6; pointer-events: none; }
    </style>
    @endpush

    <div class="w-full max-w-lg mx-auto">

        <!-- Title -->
        <div class="text-center mb-8 fade-in stagger-1">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-500 to-teal-700 shadow-lg shadow-teal-200 mb-5">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
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

        <!-- Form Card -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-xl p-8 fade-in stagger-2">
            <form id="registerForm" novalidate class="space-y-5">
                @csrf

                <!-- Step 1: Identity -->
                <div id="formStep1">
                    <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 uppercase tracking-widest mb-4">Étape 1 — Identité</p>
                    <div class="grid sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="prenom" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5">Prénom <span class="text-red-400">*</span></label>
                            <input id="prenom" type="text" class="form-input light-input" placeholder="Marie" required>
                            <span class="error-text text-xs text-red-500 mt-1 hidden"></span>
                        </div>
                        <div>
                            <label for="nom" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5">Nom <span class="text-red-400">*</span></label>
                            <input id="nom" type="text" class="form-input light-input" placeholder="Dupont" required>
                            <span class="error-text text-xs text-red-500 mt-1 hidden"></span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="regEmail" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5">Email <span class="text-red-400">*</span></label>
                        <input id="regEmail" type="email" class="form-input light-input" placeholder="vous@email.com" required>
                        <span class="error-text text-xs text-red-500 mt-1 hidden"></span>
                    </div>
                    <div class="mb-4">
                        <label for="tel" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5">Téléphone <span class="text-slate-400">(optionnel)</span></label>
                        <input id="tel" type="tel" class="form-input light-input" placeholder="+33 6 00 00 00 00">
                        <span class="error-text text-xs text-red-500 mt-1 hidden"></span>
                    </div>
                    <button type="button" onclick="nextStep(2)" class="w-full py-3.5 rounded-xl bg-teal-600 text-white font-semibold hover:bg-teal-700 transition-all">Continuer</button>
                </div>

                <!-- Step 2: Security -->
                <div id="formStep2" class="hidden">
                    <p class="text-xs font-semibold text-teal-600 dark:text-teal-400 uppercase tracking-widest mb-4">Étape 2 — Sécurité</p>
                    <div class="mb-4 relative">
                        <label for="regPwd" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5">Mot de passe <span class="text-red-400">*</span></label>
                        <input id="regPwd" type="password" class="form-input light-input pr-10" placeholder="Min. 8 caractères" oninput="checkStrength(this.value)" required>
                        <button type="button" class="eye-btn" onclick="togglePwd('regPwd')">
                            👁️
                        </button>
                        <span class="error-text text-xs text-red-500 mt-1 hidden"></span>
                        <div id="strengthIndicator" class="mt-2 hidden">
                            <div class="flex gap-1">
                                <div class="strength-bar flex-1 bg-slate-200" id="bar1"></div>
                                <div class="strength-bar flex-1 bg-slate-200" id="bar2"></div>
                                <div class="strength-bar flex-1 bg-slate-200" id="bar3"></div>
                            </div>
                            <p id="strengthText" class="text-xs mt-1 text-slate-500"></p>
                        </div>
                    </div>
                    <div class="mb-4 relative">
                        <label for="regPwd2" class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5">Confirmer le mot de passe <span class="text-red-400">*</span></label>
                        <input id="regPwd2" type="password" class="form-input light-input pr-10" placeholder="Répétez le mot de passe" required>
                        <button type="button" class="eye-btn" onclick="togglePwd('regPwd2')">👁️</button>
                        <span class="error-text text-xs text-red-500 mt-1 hidden"></span>
                    </div>
                    <div class="flex items-start gap-2 mb-5">
                        <input id="cgu" type="checkbox" class="w-4 h-4 mt-0.5 rounded border-slate-300 dark:border-slate-600 accent-teal-600" required>
                        <label for="cgu" class="text-sm text-slate-600 dark:text-slate-400">J'accepte les <a href="#" class="text-teal-600 hover:underline">CGU</a> et la <a href="#" class="text-teal-600 hover:underline">Politique de confidentialité</a>.</label>
                    </div>
                    <div id="regError" class="hidden bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-3 text-sm text-red-600 dark:text-red-400 mb-4"></div>
                    <div id="regSuccess" class="hidden bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-3 text-sm text-green-600 dark:text-green-400 mb-4"></div>
                    <div class="flex gap-3">
                        <button type="button" onclick="nextStep(1)" class="px-5 py-3.5 rounded-xl border border-slate-300 text-sm font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">Retour</button>
                        <button type="submit" id="submitBtn" class="flex-1 py-3.5 rounded-xl bg-teal-600 text-white font-semibold hover:bg-teal-700 transition-all">Créer mon compte</button>
                    </div>
                </div>
            </form>
        </div>

        <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-6">
            Déjà un compte ? <a href="{{ route('login') }}" class="text-teal-600 hover:underline font-semibold">Se connecter</a>
        </p>
    </div>

    @push('scripts')
    <script>
        function togglePwd(id) {
            const inp = document.getElementById(id);
            inp.type = inp.type === 'password' ? 'text' : 'password';
        }

        let currentStep = 1;
        function nextStep(step) {
            currentStep = step;
            document.getElementById('formStep1').classList.toggle('hidden', step !== 1);
            document.getElementById('formStep2').classList.toggle('hidden', step !== 2);

            // Mettre à jour les indicateurs d'étapes
            updateStepIndicators(step);
        }

        function updateStepIndicators(step) {
            const step1dot = document.getElementById('step1dot');
            const step2dot = document.getElementById('step2dot');
            const line1 = document.getElementById('line1');

            if (step === 1) {
                step1dot.className = 'step-dot bg-teal-600 text-white';
                step2dot.className = 'step-dot bg-slate-200 dark:bg-slate-700 text-slate-400';
                line1.className = 'flex-1 max-w-12 h-0.5 bg-slate-200 dark:bg-slate-700';
            } else if (step === 2) {
                step1dot.className = 'step-dot bg-teal-600 text-white';
                step2dot.className = 'step-dot bg-teal-600 text-white';
                line1.className = 'flex-1 max-w-12 h-0.5 bg-teal-600';
            }
        }

        function checkStrength(val) {
            const indicator = document.getElementById('strengthIndicator');
            const bar1 = document.getElementById('bar1');
            const bar2 = document.getElementById('bar2');
            const bar3 = document.getElementById('bar3');
            const strengthText = document.getElementById('strengthText');

            if (val.length === 0) {
                indicator.classList.add('hidden');
                return;
            }

            indicator.classList.remove('hidden');

            let strength = 0;
            if (val.length >= 8) strength++;
            if (/[A-Z]/.test(val)) strength++;
            if (/[0-9]/.test(val)) strength++;
            if (/[^A-Za-z0-9]/.test(val)) strength++;

            // Réinitialiser les barres
            bar1.classList.remove('bg-red-500', 'bg-yellow-500', 'bg-green-500');
            bar2.classList.remove('bg-red-500', 'bg-yellow-500', 'bg-green-500');
            bar3.classList.remove('bg-red-500', 'bg-yellow-500', 'bg-green-500');

            if (strength === 1) {
                bar1.classList.add('bg-red-500');
                strengthText.textContent = 'Très faible';
                strengthText.className = 'text-xs mt-1 text-red-500';
            } else if (strength === 2) {
                bar1.classList.add('bg-yellow-500');
                bar2.classList.add('bg-yellow-500');
                strengthText.textContent = 'Faible';
                strengthText.className = 'text-xs mt-1 text-yellow-500';
            } else if (strength === 3) {
                bar1.classList.add('bg-yellow-500');
                bar2.classList.add('bg-yellow-500');
                bar3.classList.add('bg-yellow-500');
                strengthText.textContent = 'Moyen';
                strengthText.className = 'text-xs mt-1 text-yellow-500';
            } else if (strength >= 4) {
                bar1.classList.add('bg-green-500');
                bar2.classList.add('bg-green-500');
                bar3.classList.add('bg-green-500');
                strengthText.textContent = 'Fort';
                strengthText.className = 'text-xs mt-1 text-green-500';
            }
        }

        function clearErrors() {
            document.querySelectorAll('.error-text').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });
            document.getElementById('regError').classList.add('hidden');
            document.getElementById('regSuccess').classList.add('hidden');
        }

        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            clearErrors();

            const firstName = document.getElementById('prenom').value.trim();
            const lastName = document.getElementById('nom').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const phone = document.getElementById('tel').value.trim();
            const password = document.getElementById('regPwd').value;
            const passwordConfirm = document.getElementById('regPwd2').value;
            const cguAccepted = document.getElementById('cgu').checked;

            const errEl = document.getElementById('regError');
            const successEl = document.getElementById('regSuccess');
            const submitBtn = document.getElementById('submitBtn');

            // Validation côté client
            if (!firstName || !lastName || !email || !password || !passwordConfirm) {
                errEl.textContent = 'Tous les champs obligatoires doivent être remplis';
                errEl.classList.remove('hidden');
                return;
            }

            if (password !== passwordConfirm) {
                errEl.textContent = 'Les mots de passe ne correspondent pas';
                errEl.classList.remove('hidden');
                return;
            }

            if (password.length < 8) {
                errEl.textContent = 'Le mot de passe doit contenir au moins 8 caractères';
                errEl.classList.remove('hidden');
                return;
            }

            if (!cguAccepted) {
                errEl.textContent = 'Vous devez accepter les CGU et la politique de confidentialité';
                errEl.classList.remove('hidden');
                return;
            }

            // Désactiver le bouton et afficher le chargement
            submitBtn.disabled = true;
            submitBtn.classList.add('loading');
            submitBtn.textContent = 'Création en cours...';

            try {
                const csrfToken = document.querySelector('input[name="_token"]').value;

                const response = await fetch('/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        name: firstName + ' ' + lastName,
                        email: email,
                        password: password,
                        password_confirmation: passwordConfirm,
                        phone: phone || null
                    })
                });

                const resData = await response.json();

                if (!response.ok) {
                    // Afficher les erreurs de validation
                    if (resData.errors) {
                        const errorMessages = [];
                        for (const [field, messages] of Object.entries(resData.errors)) {
                            errorMessages.push(Array.isArray(messages) ? messages[0] : messages);
                        }
                        errEl.textContent = errorMessages.join(', ');
                    } else {
                        errEl.textContent = resData.message || 'Erreur lors de l\'enregistrement';
                    }
                    errEl.classList.remove('hidden');
                    return;
                }

                // Succès
                successEl.textContent = 'Compte créé avec succès ! Redirection...';
                successEl.classList.remove('hidden');

                // Rediriger après 2 secondes
               setTimeout(() => {
    sessionStorage.setItem('registeredEmail', email);
 window.location.href = '{{ app()->isLocal() ? route("login") : route("verify_email") }}';
}, 2000);

            } catch(err) {
                errEl.textContent = 'Erreur réseau: ' + err.message;
                errEl.classList.remove('hidden');
            } finally {
                // Réactiver le bouton
                submitBtn.disabled = false;
                submitBtn.classList.remove('loading');
                submitBtn.textContent = 'Créer mon compte';
            }
        });
    </script>
    @endpush
</x-single-layout>
