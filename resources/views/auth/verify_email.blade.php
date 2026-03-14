<x-single-layout>
    @push('styles')
    <style>
        body { font-family:'DM Sans',sans-serif; }
        .font-serif { font-family:'Playfair Display',serif; }
        .fade-in { animation:fadeIn .6s ease forwards; opacity:0; }
        @keyframes fadeIn { to { opacity:1; } }
        .stagger-1{animation-delay:.08s}.stagger-2{animation-delay:.16s}.stagger-3{animation-delay:.24s}
        .spinner { display:inline-block; width:1rem; height:1rem; border:2px solid rgba(20,184,166,.3); border-top-color:#14b8a6; border-radius:50%; animation:spin .6s linear infinite; }
        @keyframes spin { to { transform:rotate(360deg); } }
    </style>
    @endpush

    <div class="w-full max-w-lg">

      <!-- Title -->
      <div class="text-center mb-8 fade-in stagger-1">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-teal-500 to-teal-700 shadow-lg shadow-teal-200 dark:shadow-teal-900/50 mb-5">
          <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <h1 class="font-serif text-3xl font-bold text-slate-800 dark:text-white mb-2">Vérifiez votre email</h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm">Un lien de vérification a été envoyé à votre adresse email</p>
      </div>

      <!-- Card -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-xl shadow-slate-200/50 dark:shadow-slate-950/50 p-8 fade-in stagger-2">

        <!-- Info Box -->
        <div class="bg-teal-50 dark:bg-teal-900/20 border border-teal-200 dark:border-teal-800 rounded-xl p-5 mb-6">
          <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-teal-600 dark:text-teal-400 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/></svg>
            <div>
              <p class="text-sm font-semibold text-slate-800 dark:text-white mb-1">Instructions</p>
              <p class="text-xs text-slate-600 dark:text-slate-400">Cliquez sur le lien dans l'email pour confirmer votre adresse et activer votre compte Mystery Box Global.</p>
            </div>
          </div>
        </div>

        <!-- Email Display -->
        <div class="text-center mb-8 py-6 border-y border-slate-200 dark:border-slate-700">
          <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2">Email enregistré</p>
          <p id="emailDisplay" class="text-lg font-semibold text-slate-800 dark:text-white">votre@email.com</p>
        </div>

        <!-- Messages -->
        <div id="verifySuccess" class="hidden bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-4 text-sm text-green-600 dark:text-green-400 flex items-center gap-2 mb-6">
          <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          <span>✓ Email vérifié avec succès! Redirection...</span>
        </div>

        <div id="verifyError" class="hidden bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4 text-sm text-red-600 dark:text-red-400 flex items-center gap-2 mb-6">
          <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/></svg>
          <span id="verifyErrorMsg">Erreur lors de la vérification</span>
        </div>

        <!-- Actions -->
        <div class="space-y-3">
          <button id="resendBtn" type="button" onclick="resendVerificationEmail()" class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl bg-teal-600 text-white font-semibold text-sm hover:bg-teal-700 transition-all shadow-lg shadow-teal-200 dark:shadow-teal-900/40">
            <svg id="resendIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            <span id="resendText">Renvoyer le lien</span>
          </button>
          <a href="{{ route('login') }}" class="w-full flex items-center justify-center py-3.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-semibold text-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
            Retour à la connexion
          </a>
        </div>

        <!-- Resend countdown -->
        <div id="resendCountdown" class="hidden text-center mt-4">
          <p class="text-xs text-slate-500 dark:text-slate-400">Renvoyer dans <span id="countdown">60</span>s</p>
        </div>

      </div>

      <!-- Help text -->
      <p class="text-center text-xs text-slate-500 dark:text-slate-400 mt-6 fade-in stagger-3">
        N'avez pas reçu le lien ? Vérifiez votre dossier spam ou <button type="button" onclick="resendVerificationEmail()" class="text-teal-600 dark:text-teal-400 font-semibold hover:underline">renvoyer le lien</button>
      </p>
    </div>


    @push('scripts')
    <script>

        let resendCountdownValue = 0;

        // Récupérer l'email depuis localStorage ou sessionStorage
        function getStoredEmail() {
            return sessionStorage.getItem('registeredEmail') || localStorage.getItem('registeredEmail') || 'votre@email.com';
        }

        // Au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const email = getStoredEmail();
            document.getElementById('emailDisplay').textContent = email;

            // Vérifier si on vient d'une redirection API (avec paramètres dans l'URL)
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('email')) {
                sessionStorage.setItem('registeredEmail', urlParams.get('email'));
                document.getElementById('emailDisplay').textContent = urlParams.get('email');
            }
        });

        // Renvoyer l'email de vérification
        async function resendVerificationEmail() {
            const email = getStoredEmail();
            if (email === 'votre@email.com') {
                alert('Veuillez entrer votre adresse email');
                return;
            }

            const resendBtn = document.getElementById('resendBtn');
            const resendText = document.getElementById('resendText');
            const resendIcon = document.getElementById('resendIcon');
            const errorEl = document.getElementById('verifyError');
            const errorMsg = document.getElementById('verifyErrorMsg');
            const countdownEl = document.getElementById('resendCountdown');

            resendBtn.disabled = true;
            resendIcon.innerHTML = '<span class="spinner"></span>';
            resendText.textContent = 'Envoi...';

            try {
                const response = await fetch('/api/auth/resend-verification-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ email: email })
                });

                const data = await response.json();

                if (!response.ok) {
                    errorEl.classList.remove('hidden');
                    errorMsg.textContent = data.message || 'Erreur lors de l\'envoi';
                    resendBtn.disabled = false;
                    resendIcon.innerHTML = '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>';
                    resendText.textContent = 'Renvoyer le lien';
                    return;
                }

                // Succès
                errorEl.classList.add('hidden');
                alert('Lien de vérification envoyé ! Vérifiez votre email.');

                // Countdown avant de pouvoir renvoyer à nouveau
                resendCountdownValue = 60;
                countdownEl.classList.remove('hidden');

                const countdownInterval = setInterval(() => {
                    resendCountdownValue--;
                    document.getElementById('countdown').textContent = resendCountdownValue;

                    if (resendCountdownValue <= 0) {
                        clearInterval(countdownInterval);
                        countdownEl.classList.add('hidden');
                        resendBtn.disabled = false;
                        resendIcon.innerHTML = '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>';
                        resendText.textContent = 'Renvoyer le lien';
                    }
                }, 1000);

            } catch (error) {
                errorEl.classList.remove('hidden');
                errorMsg.textContent = 'Erreur réseau: ' + error.message;
                resendBtn.disabled = false;
                resendIcon.innerHTML = '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>';
                resendText.textContent = 'Renvoyer le lien';
            }
        }

        // Vérifier l'email si on arrive avec un token
        if (window.location.pathname.includes('/verify-email/') || window.location.search.includes('token=')) {
            const urlParams = new URLSearchParams(window.location.search);
            const token = urlParams.get('token');

            if (token) {
                verifyEmailWithToken(token);
            }
        }

        async function verifyEmailWithToken(token) {
            try {
                const response = await fetch(`/api/auth/verify-email/${token}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                });

                const data = await response.json();

                if (response.ok) {
                    document.getElementById('verifySuccess').classList.remove('hidden');
                    document.getElementById('verifyError').classList.add('hidden');

                    setTimeout(() => {
                        window.location.href = data.redirect || '{{ route("login") }}';
                    }, 2000);
                } else {
                    document.getElementById('verifyError').classList.remove('hidden');
                    document.getElementById('verifySuccess').classList.add('hidden');
                    document.getElementById('verifyErrorMsg').textContent = data.message || 'Erreur de vérification';
                }
            } catch (error) {
                document.getElementById('verifyError').classList.remove('hidden');
                document.getElementById('verifySuccess').classList.add('hidden');
                document.getElementById('verifyErrorMsg').textContent = 'Erreur: ' + error.message;
            }
        }
    </script>
    @endpush

</x-single-layout>
