<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mystery Box Global — La surprise parfaite</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            slate: { 50: '#f8fafc', 100: '#f1f5f9', 200: '#e2e8f0', 300: '#cbd5e1', 400: '#94a3b8', 500: '#64748b', 600: '#475569', 700: '#334155', 800: '#1e293b', 900: '#0f172a' },
            teal: { 50: '#f0fdfa', 100: '#ccfbf1', 200: '#99f6e4', 300: '#5eead4', 400: '#2dd4bf', 500: '#14b8a6', 600: '#0d9488', 700: '#0f766e' },
            sage: { 50: '#f6f7f6', 100: '#e8ebe8', 200: '#ccd3cc', 300: '#a5b3a5', 400: '#7a907a', 500: '#5c735c', 600: '#485c48' },
          },
          fontFamily: {
            serif: ['"Playfair Display"', 'Georgia', 'serif'],
            sans: ['"DM Sans"', 'system-ui', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <style>
    body { font-family: 'DM Sans', sans-serif; background-color: #f8fafc; }
    .font-serif { font-family: 'Playfair Display', serif; }
    .hero-bg {
      background: linear-gradient(135deg, #f0fdfa 0%, #e8f4f0 30%, #f1f5f9 60%, #fafaf8 100%);
    }
    .card-hover { transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1); }
    .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
    .occasion-card { position: relative; overflow: hidden; }
    .occasion-card::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, transparent 60%, rgba(20,184,166,0.08) 100%);
      opacity: 0;
      transition: opacity 0.35s ease;
    }
    .occasion-card:hover::before { opacity: 1; }
    .tag-badge {
      background: rgba(14,165,133,0.12);
      color: #0d9488;
      border: 1px solid rgba(14,165,133,0.2);
    }
    .hero-float { animation: heroFloat 6s ease-in-out infinite; }
    @keyframes heroFloat { 0%,100% { transform: translateY(0px); } 50% { transform: translateY(-12px); } }
    .fade-in { animation: fadeIn 0.7s ease forwards; opacity: 0; }
    @keyframes fadeIn { to { opacity: 1; } }
    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }
    .stagger-5 { animation-delay: 0.5s; }
    .stagger-6 { animation-delay: 0.6s; }
    .nav-link { position: relative; }
    .nav-link::after { content: ''; position: absolute; bottom: -2px; left: 0; width: 0; height: 2px; background: #14b8a6; transition: width 0.3s ease; }
    .nav-link:hover::after { width: 100%; }
    .mesh-bg {
      background-image: radial-gradient(circle at 20% 20%, rgba(20,184,166,0.06) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(94,115,94,0.06) 0%, transparent 50%),
                        radial-gradient(circle at 50% 50%, rgba(148,163,184,0.04) 0%, transparent 70%);
    }
    .scroll-reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
    .scroll-reveal.visible { opacity: 1; transform: translateY(0); }

    /* ── Card states ── */
    .card-unavailable {
      opacity: 0.55;
      cursor: not-allowed !important;
      filter: grayscale(0.4);
    }
    .card-unavailable:hover { transform: none !important; box-shadow: none !important; }
    .card-unavailable::before { display: none !important; }

    .badge-soon {
      background: linear-gradient(135deg, #fef3c7, #fde68a);
      color: #92400e;
      border: 1px solid rgba(245,158,11,0.3);
      font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em;
      padding: 3px 8px; border-radius: 999px;
      display: inline-flex; align-items: center; gap: 4px;
    }
    .badge-unavailable {
      background: rgba(100,116,139,0.1);
      color: #64748b;
      border: 1px solid rgba(100,116,139,0.2);
      font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em;
      padding: 3px 8px; border-radius: 999px;
      display: inline-flex; align-items: center; gap: 4px;
    }

    /* ── Unavailable Modal ── */
    #unavailModal {
      position: fixed; inset: 0; z-index: 9999;
      display: flex; align-items: center; justify-content: center;
      padding: 20px;
      background: rgba(15,23,42,0.55);
      backdrop-filter: blur(6px);
      opacity: 0; visibility: hidden;
      transition: opacity 0.25s ease, visibility 0.25s ease;
    }
    #unavailModal.open { opacity: 1; visibility: visible; }
    #unavailModal .modal-box {
      background: white; border-radius: 24px;
      padding: 36px 32px; max-width: 420px; width: 100%;
      box-shadow: 0 32px 80px rgba(0,0,0,0.2);
      transform: translateY(16px) scale(0.97);
      transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
      text-align: center;
    }
    #unavailModal.open .modal-box { transform: translateY(0) scale(1); }
    .modal-icon {
      width: 72px; height: 72px; border-radius: 20px;
      background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
      display: flex; align-items: center; justify-content: center;
      font-size: 32px; margin: 0 auto 20px;
    }
    .modal-country-chips { display: flex; gap: 8px; flex-wrap: wrap; justify-content: center; margin-top: 16px; }
    .modal-chip {
      display: inline-flex; align-items: center; gap: 6px;
      padding: 6px 14px; border-radius: 999px;
      background: #f0fdfa; border: 1px solid rgba(20,184,166,0.2);
      font-size: 13px; font-weight: 500; color: #0d9488;
    }

    /* Country Selector */
    .country-selector { position: relative; }
    .country-btn {
      display: flex; align-items: center; gap: 6px;
      padding: 6px 12px; border-radius: 999px;
      border: 1px solid rgba(20,184,166,0.25);
      background: rgba(20,184,166,0.06);
      cursor: pointer; transition: all 0.2s ease;
      font-size: 13px; font-weight: 500; color: #0f766e;
      user-select: none;
    }
    .country-btn:hover { background: rgba(20,184,166,0.12); border-color: rgba(20,184,166,0.4); }
    .country-btn .flag { font-size: 16px; line-height: 1; }
    .country-btn .chevron { width: 14px; height: 14px; transition: transform 0.2s ease; flex-shrink:0; }
    .country-btn.open .chevron { transform: rotate(180deg); }

    .country-dropdown {
      position: absolute; top: calc(100% + 8px); right: 0;
      background: white; border-radius: 16px;
      border: 1px solid rgba(0,0,0,0.07);
      box-shadow: 0 16px 40px rgba(0,0,0,0.12), 0 4px 12px rgba(0,0,0,0.06);
      min-width: 200px; overflow: hidden;
      opacity: 0; visibility: hidden; transform: translateY(-8px) scale(0.97);
      transition: all 0.2s cubic-bezier(0.4,0,0.2,1);
      z-index: 100;
    }
    .country-dropdown.open { opacity: 1; visibility: visible; transform: translateY(0) scale(1); }

    .country-dropdown-header {
      padding: 12px 16px 8px;
      font-size: 10px; font-weight: 700; text-transform: uppercase;
      letter-spacing: 0.1em; color: #94a3b8;
    }
    .country-option {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 16px; cursor: pointer;
      transition: background 0.15s ease; font-size: 13px; font-weight: 500;
      color: #334155;
    }
    .country-option:hover { background: #f0fdfa; }
    .country-option.active { background: #f0fdfa; color: #0d9488; }
    .country-option .flag { font-size: 18px; }
    .country-option .country-label { flex: 1; }
    .country-option .currency { font-size: 11px; color: #94a3b8; background: #f1f5f9; padding: 2px 6px; border-radius: 999px; }
    .country-option .check { width: 14px; height: 14px; color: #14b8a6; }

    /* Banner under header */
    #country-banner {
      background: linear-gradient(90deg, #f0fdfa, #e8f7f4, #f0fdfa);
      border-bottom: 1px solid rgba(20,184,166,0.15);
      padding: 7px 16px;
      display: flex; align-items: center; justify-content: center; gap: 8px;
      font-size: 12.5px; color: #0f766e; font-weight: 500;
      animation: fadeIn 0.5s ease;
    }
    #country-banner .banner-flag { font-size: 16px; }
    #country-banner strong { font-weight: 700; }

    /* ── Country Welcome Modal ── */
    #countryWelcomeModal {
      position: fixed; inset: 0; z-index: 99999;
      background: rgba(15,23,42,0.55);
      backdrop-filter: blur(6px);
      display: flex; align-items: center; justify-content: center;
      opacity: 0; visibility: hidden;
      transition: opacity 0.35s ease, visibility 0.35s ease;
      padding: 20px;
    }
    #countryWelcomeModal.open { opacity: 1; visibility: visible; }
    #countryWelcomeModal .wm-box {
      background: #ffffff;
      border-radius: 24px;
      width: 100%; max-width: 480px;
      box-shadow: 0 32px 80px rgba(0,0,0,0.18), 0 0 0 1px rgba(0,0,0,0.04);
      transform: translateY(20px) scale(0.97);
      transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1);
      overflow: hidden;
    }
    #countryWelcomeModal.open .wm-box { transform: translateY(0) scale(1); }
    .wm-header {
      background: linear-gradient(135deg, #f0fdfa 0%, #e8f4f0 100%);
      padding: 32px 28px 24px;
      text-align: center;
      border-bottom: 1px solid #e2e8f0;
      position: relative;
    }
    .wm-globe {
      width: 64px; height: 64px; border-radius: 50%;
      background: linear-gradient(135deg, #14b8a6, #0d9488);
      display: flex; align-items: center; justify-content: center;
      font-size: 32px; margin: 0 auto 16px;
      box-shadow: 0 8px 24px rgba(13,148,136,0.3);
    }
    .wm-title {
      font-family: 'Playfair Display', serif;
      font-size: 22px; font-weight: 700;
      color: #0f172a; margin-bottom: 8px; line-height: 1.3;
    }
    .wm-sub {
      font-size: 13.5px; color: #64748b; line-height: 1.6;
    }
    .wm-body { padding: 24px 28px 28px; }
    .wm-label {
      font-size: 11px; font-weight: 700; text-transform: uppercase;
      letter-spacing: 0.08em; color: #94a3b8; margin-bottom: 12px;
      display: block;
    }
    .wm-country-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 20px; }
    .wm-country-opt {
      display: flex; align-items: center; gap: 14px;
      padding: 14px 18px; border-radius: 14px;
      border: 2px solid #e2e8f0; cursor: pointer;
      transition: all 0.2s ease; background: #f8fafc;
      text-align: left; width: 100%; font-family: 'DM Sans', sans-serif;
    }
    .wm-country-opt:hover {
      border-color: #14b8a6; background: #f0fdfa;
      transform: translateX(4px);
      box-shadow: 0 4px 16px rgba(13,148,136,0.12);
    }
    .wm-country-opt.selected {
      border-color: #0d9488; background: #f0fdfa;
    }
    .wm-country-opt.selected .wm-check { opacity: 1; }
    .wm-flag { font-size: 28px; line-height: 1; flex-shrink: 0; }
    .wm-cname { font-size: 15px; font-weight: 600; color: #0f172a; }
    .wm-ccurr { font-size: 12px; color: #94a3b8; margin-top: 1px; }
    .wm-check {
      margin-left: auto; width: 22px; height: 22px; border-radius: 50%;
      background: #0d9488; display: flex; align-items: center; justify-content: center;
      opacity: 0; transition: opacity 0.2s ease; flex-shrink: 0;
    }
    .wm-check svg { width: 12px; height: 12px; color: white; stroke: white; }
    .wm-confirm {
      width: 100%; padding: 14px 20px; border-radius: 14px; border: none;
      background: linear-gradient(135deg, #14b8a6, #0d9488);
      color: white; font-family: 'DM Sans', sans-serif;
      font-size: 15px; font-weight: 700; cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 4px 16px rgba(13,148,136,0.35);
    }
    .wm-confirm:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(13,148,136,0.4); }
    .wm-confirm:disabled { opacity: 0.4; cursor: not-allowed; transform: none; box-shadow: none; }
    .wm-skip {
      display: block; text-align: center; margin-top: 12px;
      font-size: 12.5px; color: #94a3b8; cursor: pointer;
      transition: color 0.15s;
    }
    .wm-skip:hover { color: #64748b; }

    /* Mobile country select */
    .mobile-country-row {
      display: flex; align-items: center; gap-3; padding: 8px 0;
      border-top: 1px solid #f1f5f9; margin-top: 4px;
    }
  </style>
  <link rel="stylesheet" href="{{asset('contact.css')}}">
  @stack('styles')
</head>

<body class="text-slate-800">

    <!-- ══════════════════════════════════════════════════════
        COUNTRY WELCOME MODAL
    ══════════════════════════════════════════════════════ -->
    <div id="countryWelcomeModal" role="dialog" aria-modal="true" aria-labelledby="wmTitle">
        <div class="wm-box">

        <div class="wm-header">
            <div class="wm-globe">🌍</div>
            <div class="wm-title" id="wmTitle">Bienvenue chez Mystery Box Global !</div>
            <p class="wm-sub">Pour vous offrir la meilleure expérience, dites-nous depuis quel pays vous nous rendez visite.</p>
        </div>

        <div class="wm-body">
            <span class="wm-label">Sélectionnez votre pays</span>

            <div class="wm-country-list">

            <button class="wm-country-opt" data-code="FR" data-flag="🇫🇷" data-name="France" data-currency="EUR" data-curr-name="Euro" onclick="wmSelect(this)">
                <span class="wm-flag">🇫🇷</span>
                <div>
                <div class="wm-cname">France</div>
                <div class="wm-ccurr">EUR — Euro · Livraison 2–3 jours</div>
                </div>
                <span class="wm-check"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
            </button>

            <button class="wm-country-opt" data-code="BJ" data-flag="🇧🇯" data-name="Bénin" data-currency="XOF" data-curr-name="Franc CFA" onclick="wmSelect(this)">
                <span class="wm-flag">🇧🇯</span>
                <div>
                <div class="wm-cname">Bénin</div>
                <div class="wm-ccurr">XOF — Franc CFA · Livraison 5–7 jours</div>
                </div>
                <span class="wm-check"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
            </button>

            <button class="wm-country-opt" data-code="CI" data-flag="🇨🇮" data-name="Côte d'Ivoire" data-currency="XOF" data-curr-name="Franc CFA" onclick="wmSelect(this)">
                <span class="wm-flag">🇨🇮</span>
                <div>
                <div class="wm-cname">Côte d'Ivoire</div>
                <div class="wm-ccurr">XOF — Franc CFA · Livraison 5–7 jours</div>
                </div>
                <span class="wm-check"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
            </button>

            </div>

            <button class="wm-confirm" id="wmConfirmBtn" disabled onclick="wmConfirm()">
            Confirmer mon pays
            </button>
            <span class="wm-skip" onclick="wmSkip()">Continuer sans sélectionner →</span>
        </div>

        </div>
    </div>


    <!-- HEADER -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="{{route('welcome')}}" class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-teal-500 to-sage-600 flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/></svg>
                </div>
                <span class="font-serif font-semibold text-slate-800 text-lg leading-tight">Mystery Box<br><span class="text-xs font-sans font-normal text-slate-400 tracking-widest uppercase" style="font-size:9px;letter-spacing:.12em;">Global</span></span>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{route('welcome')}}" class="nav-link text-sm font-medium text-slate-700 hover:text-teal-600 transition-colors">Accueil</a>
                    <a href="{{route('welcome')}}#occasions" class="nav-link text-sm font-medium text-slate-700 hover:text-teal-600 transition-colors">Occasions</a>
                    <a href="{{route('contact')}}" class="nav-link text-sm font-medium text-slate-700 hover:text-teal-600 transition-colors">Contact</a>
                </nav>

                <!-- CTA + Mobile -->
                <div class="flex items-center gap-3">
                    @if(Auth::check()) 
                    <a href="{{route('my_account')}}" class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:border-slate-300 transition-all">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Mon compte
                    </a>
                    @else
                    <a href="{{route('login')}}" class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:border-slate-300 transition-all">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Connexion
                    </a>
                    @endif

                    <!-- Country Selector Desktop -->
                    <div class="country-selector hidden md:block" id="countrySelectorDesktop">
                        <button class="country-btn" id="countryBtn" onclick="toggleDropdown()">
                        <span class="flag" id="currentFlag">🌍</span>
                        <span id="currentCountryName">Pays</span>
                        <svg class="chevron" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="country-dropdown" id="countryDropdown">
                        <div class="country-dropdown-header">Choisir un pays</div>
                        <div class="country-option" data-code="BJ" data-flag="🇧🇯" data-name="Bénin" data-currency="XOF" onclick="selectCountry('BJ','🇧🇯','Bénin','XOF','Franc CFA')">
                            <span class="flag">🇧🇯</span>
                            <span class="country-label">Bénin</span>
                            <span class="currency">XOF</span>
                            <svg class="check hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="country-option" data-code="CI" data-flag="🇨🇮" data-name="Côte d'Ivoire" data-currency="XOF" onclick="selectCountry('CI','🇨🇮','Côte d\'Ivoire','XOF','Franc CFA')">
                            <span class="flag">🇨🇮</span>
                            <span class="country-label">Côte d'Ivoire</span>
                            <span class="currency">XOF</span>
                            <svg class="check hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="country-option" data-code="FR" data-flag="🇫🇷" data-name="France" data-currency="EUR" onclick="selectCountry('FR','🇫🇷','France','EUR','Euro')">
                            <span class="flag">🇫🇷</span>
                            <span class="country-label">France</span>
                            <span class="currency">EUR</span>
                            <svg class="check hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        </div>
                    </div>
                    <!-- Burger -->
                    <button id="menuBtn" class="md:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors" aria-label="Menu">
                        <svg class="w-5 h-5 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-slate-100 px-4 py-4 space-y-3">
            <a href="{{route('welcome')}}" class="block text-sm font-medium text-slate-700 py-2 hover:text-teal-600">Accueil</a>
            <a href="{{route('welcome')}}#occasions" class="block text-sm font-medium text-slate-700 py-2 hover:text-teal-600">Occasions</a>
            <a href="{{route('contact')}}" class="block text-sm font-medium text-slate-700 py-2 hover:text-teal-600">Contact</a>
            @if(Auth::check())
             <a href="{{route('my_account')}}" class="block text-sm font-medium text-slate-700 py-2 hover:text-teal-600>
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Mon compte
            </a>
            @else
            <a href="{{route('login')}}" class="block text-sm font-medium text-slate-700 py-2 hover:text-teal-600">Connexion</a>
            @endif
            <!-- Mobile country selector -->
            <div class="border-t border-slate-100 pt-3 mt-1">
                <p class="text-xs text-slate-400 uppercase tracking-widest font-semibold mb-2">Choisir un pays</p>
                <div class="flex gap-2">
                <button onclick="selectCountry('BJ','🇧🇯','Bénin','XOF','Franc CFA')" data-mobile-code="BJ"
                    class="flex-1 flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl border text-xs font-medium transition-all mobile-country-btn border-slate-200 text-slate-600 hover:border-teal-300 hover:bg-teal-50">
                    🇧🇯 Bénin
                </button>
                <button onclick="selectCountry('CI','🇨🇮','Côte d\'Ivoire','XOF','Franc CFA')" data-mobile-code="CI"
                    class="flex-1 flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl border text-xs font-medium transition-all mobile-country-btn border-slate-200 text-slate-600 hover:border-teal-300 hover:bg-teal-50">
                    🇨🇮 CI
                </button>
                <button onclick="selectCountry('FR','🇫🇷','France','EUR','Euro')" data-mobile-code="FR"
                    class="flex-1 flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl border text-xs font-medium transition-all mobile-country-btn border-slate-200 text-slate-600 hover:border-teal-300 hover:bg-teal-50">
                    🇫🇷 France
                </button>
                </div>
            </div>
        </div>
    </header>

    {{$slot}}

    <!-- Unavailability Modal -->
    <div id="unavailModal" onclick="closeModal(event)">
        <div class="modal-box">
        <div class="modal-icon" id="modalIcon">🎁</div>
        <h3 class="font-serif text-2xl font-bold text-slate-800 mb-3" id="modalTitle">Non disponible</h3>
        <p class="text-slate-500 text-sm leading-relaxed mb-2" id="modalDesc">Cette occasion n'est pas encore disponible dans votre pays.</p>
        <p id="modalAvailLabel" class="text-slate-400 text-sm mb-4">Elle est disponible dans :</p>
        <div class="modal-country-chips" id="modalChips"></div>
        <p id="modalHint" class="text-xs text-slate-400 mt-5 mb-6">Changez de pays dans la barre de navigation pour accéder à cette box.</p>
        <button onclick="document.getElementById('unavailModal').classList.remove('open')"
            class="w-full py-3 rounded-full bg-slate-900 text-white text-sm font-semibold hover:bg-slate-700 transition-all">
            Compris 👍
        </button>
        </div>
    </div>

    @if(request()->routeIs('welcome'))
    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8 mb-10">
            <div>
            <div class="flex items-center gap-2.5 mb-4">
                <div class="w-8 h-8 rounded-lg bg-teal-600 flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/></svg>
                </div>
                <span class="font-serif font-semibold text-white text-lg">Mystery Box Global</span>
            </div>
            <p class="text-sm leading-relaxed">La plateforme premium de box cadeaux mystères pour toutes vos occasions.</p>
            </div>
            <div>
            <div class="font-semibold text-white text-sm mb-4">Navigation</div>
            <ul class="space-y-2 text-sm">
                <li><a href="{{route('welcome')}}" class="hover:text-teal-400 transition-colors">Accueil</a></li>
                <li><a href="#occasions" class="hover:text-teal-400 transition-colors">Occasions</a></li>
                <li><a href="contact.html" class="hover:text-teal-400 transition-colors">Contact</a></li>
            </ul>
            </div>
            <div>
            <div class="font-semibold text-white text-sm mb-4">Support</div>
            <ul class="space-y-2 text-sm">
                <li><a href="contact.html" class="hover:text-teal-400 transition-colors">Nous contacter</a></li>
                <li><a href="#" class="hover:text-teal-400 transition-colors">FAQ</a></li>
                <li><a href="#" class="hover:text-teal-400 transition-colors">Politique de confidentialité</a></li>
            </ul>
            </div>
        </div>
        <div class="border-t border-slate-800 pt-6 text-center text-xs">
            © 2025 Mystery Box Global. Tous droits réservés.
        </div>
        </div>
    </footer>
    @else
    <footer class="bg-slate-900 text-slate-400 py-10">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm">
        © 2025 Mystery Box Global. Tous droits réservés.
        <span class="mx-2">·</span>
        <a href="{{route('contact')}}" class="hover:text-teal-400 transition-colors">Contact</a>
        </div>
    </footer>
    @endif

    <script>
        // ── Mobile menu ───────────────────────────────────────
        document.getElementById('menuBtn').addEventListener('click', () =>
        document.getElementById('mobileMenu').classList.toggle('hidden')
        );

        // ── Scroll reveal ─────────────────────────────────────
        const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.12 });
        document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));

        // ── Country data ──────────────────────────────────────
        const COUNTRIES = {
        BJ: { flag: '\ud83c\udde7\ud83c\uddef', name: 'B\u00e9nin',        currency: 'XOF' },
        CI: { flag: '\ud83c\udde8\ud83c\uddee', name: "C\u00f4te d\'Ivoire", currency: 'XOF' },
        FR: { flag: '\ud83c\uddeb\ud83c\uddf7', name: 'France',        currency: 'EUR' },
        };

        // ── Country dropdown ──────────────────────────────────
        function toggleDropdown() {
        document.getElementById('countryBtn').classList.toggle('open');
        document.getElementById('countryDropdown').classList.toggle('open');
        }
        document.addEventListener('click', (e) => {
        const sel = document.getElementById('countrySelectorDesktop');
        if (sel && !sel.contains(e.target)) {
            document.getElementById('countryBtn').classList.remove('open');
            document.getElementById('countryDropdown').classList.remove('open');
        }
        });

        function selectCountry(code, flag, name, currency) {
        localStorage.setItem('mbg_country', JSON.stringify({ code, flag, name, currency }));
        document.getElementById('currentFlag').textContent = flag;
        document.getElementById('currentCountryName').textContent = name;
        document.getElementById('countryBtn').classList.remove('open');
        document.getElementById('countryDropdown').classList.remove('open');
        document.querySelectorAll('.country-option').forEach(opt => {
            const check = opt.querySelector('.check');
            if (opt.dataset.code === code) { opt.classList.add('active'); check?.classList.remove('hidden'); }
            else { opt.classList.remove('active'); check?.classList.add('hidden'); }
        });
        document.querySelectorAll('.mobile-country-btn').forEach(btn => {
            btn.style.cssText = btn.dataset.mobileCode === code
            ? 'border-color:#14b8a6;background:#f0fdfa;color:#0d9488;' : '';
        });
        document.getElementById('bannerFlag').textContent = flag;
        document.getElementById('bannerCountry').textContent = name;
        document.getElementById('country-banner').style.display = 'flex';
        }

        // ── Auto-detect country on load ───────────────────────
        (function init() {
        const saved = localStorage.getItem('mbg_country');
        if (saved) {
            try { const { code, flag, name, currency } = JSON.parse(saved); selectCountry(code, flag, name, currency); return; } catch(e) {}
        }
        fetch('https://ipapi.co/json/').then(r => r.json()).then(data => {
            const c = COUNTRIES[data.country_code];
            if (c) selectCountry(data.country_code, c.flag, c.name, c.currency);
        }).catch(() => {});
        })();

        // ── Modal indisponible ────────────────────────────────
        function openUnavailModal(el) {
        const isSoon  = el.dataset.isSoon === '1';
        const availIn = el.dataset.availIn ? el.dataset.availIn.split(',').filter(Boolean) : [];

        document.getElementById('modalIcon').textContent  = el.dataset.emoji;
        document.getElementById('modalTitle').textContent = isSoon
            ? el.dataset.name + ' \u2014 Bient\u00f4t disponible !'
            : el.dataset.name + ' \u2014 Non disponible ici';
        document.getElementById('modalDesc').textContent  = isSoon
            ? 'Cette occasion arrive tr\u00e8s prochainement. Revenez nous rendre visite !'
            : "Cette occasion n\'est pas disponible dans votre pays actuel.";

        const chips  = document.getElementById('modalChips');
        const pAvail = document.getElementById('modalAvailLabel');
        const pHint  = document.getElementById('modalHint');

        if (!isSoon && availIn.length > 0) {
            chips.innerHTML = availIn.map(code => {
            const c = COUNTRIES[code];
            return c ? '<span class="modal-chip">' + c.flag + ' ' + c.name + '</span>' : '';
            }).join('');
            if (pAvail) pAvail.style.display = '';
            if (pHint)  pHint.style.display  = '';
        } else {
            chips.innerHTML = '';
            if (pAvail) pAvail.style.display = 'none';
            if (pHint)  pHint.style.display  = 'none';
        }

        document.getElementById('unavailModal').classList.add('open');
        }

        function closeModal(e) {
        if (e.target === document.getElementById('unavailModal'))
            document.getElementById('unavailModal').classList.remove('open');
        }
        document.addEventListener('keydown', e => {
        if (e.key === 'Escape') document.getElementById('unavailModal').classList.remove('open');
        });

        // ══════════════════════════════════════════════════════
        // COUNTRY WELCOME MODAL
        // ══════════════════════════════════════════════════════
        let wmSelectedData = null;

        function wmSelect(btn) {
        document.querySelectorAll('.wm-country-opt').forEach(b => b.classList.remove('selected'));
        btn.classList.add('selected');
        wmSelectedData = {
            code:     btn.dataset.code,
            flag:     btn.dataset.flag,
            name:     btn.dataset.name,
            currency: btn.dataset.currency
        };
        document.getElementById('wmConfirmBtn').disabled = false;
        }

        function wmConfirm() {
        if (!wmSelectedData) return;
        const { code, flag, name, currency } = wmSelectedData;
        selectCountry(code, flag, name, currency);
        wmClose();
        }

        function wmSkip() {
        sessionStorage.setItem('mbg_country_modal_seen', '1');
        wmClose();
        }

        function wmClose() {
        document.getElementById('countryWelcomeModal').classList.remove('open');
        document.body.style.overflow = '';
        }

        // Show modal if country not yet saved in localStorage
        (function initWelcomeModal() {
        const saved   = null;// localStorage.getItem('mbg_country');
        const skipped = sessionStorage.getItem('mbg_country_modal_seen');
        if (!saved && !skipped) {
            setTimeout(() => {
            document.getElementById('countryWelcomeModal').classList.add('open');
            document.body.style.overflow = 'hidden';
            // Try to pre-select via IP geolocation
            fetch('https://ipapi.co/json/')
                .then(r => r.json())
                .then(data => {
                const btn = document.querySelector('.wm-country-opt[data-code="' + data.country_code + '"]');
                if (btn) wmSelect(btn);
                })
                .catch(() => {});
            }, 600);
        }
        })();

    </script>

    @stack('scripts')
</body>
</html>
