<!DOCTYPE html>
<html lang="fr" class="">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mystery Box Global — Connexion</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            teal: { 50:'#f0fdfa',100:'#ccfbf1',200:'#99f6e4',400:'#2dd4bf',500:'#14b8a6',600:'#0d9488',700:'#0f766e' },
            sage: { 500:'#5c735c',600:'#485c48' },
          },
          fontFamily: {
            serif: ['"Playfair Display"','serif'],
            sans: ['"DM Sans"','sans-serif'],
          }
        }
      }
    }
    // Apply theme before render to prevent flash
    (function() {
      const t = localStorage.getItem('mbg-theme');
      if (t === 'dark' || (!t && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
      }
    })();
  </script>
  @stack('styles')
</head>
<body class="min-h-screen transition-colors duration-300 bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100">

  <!-- Background blobs -->
  <div class="blob1 bg-teal-200 dark:bg-teal-900"></div>
  <div class="blob2 bg-sage-100 dark:bg-slate-800" style="background:#e8ebe8" id="blob2"></div>

  <!-- HEADER -->
    <header class="sticky top-0 z-50 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-100 dark:border-slate-800 shadow-sm transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="{{route('welcome')}}" class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/></svg>
            </div>
            <span class="font-serif font-semibold text-slate-800 dark:text-white text-lg leading-tight">Mystery Box<br><span class="text-xs font-sans font-normal text-slate-400 tracking-widest uppercase" style="font-size:9px;letter-spacing:.12em;">Global</span></span>
            </a>
            <nav class="hidden md:flex items-center gap-8">
            <a href="{{route('welcome')}}" class="nav-link text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-teal-600 dark:hover:text-teal-400 transition-colors">Accueil</a>
            <a href="{{route('welcome')}}#occasions" class="nav-link text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-teal-600 dark:hover:text-teal-400 transition-colors">Occasions</a>
            <a href="{{route('login')}}" class="nav-link text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-teal-600 dark:hover:text-teal-400 transition-colors">Contact</a>
            </nav>
            <div class="flex items-center gap-3">
            <!-- Dark mode toggle -->
            <button id="themeToggle" class="p-2 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 transition-all" aria-label="Basculer le thème">
                <svg id="iconSun" class="w-4 h-4 text-amber-500 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
                <svg id="iconMoon" class="w-4 h-4 text-slate-500 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
            </button>
            <button id="menuBtn" class="md:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                <svg class="w-5 h-5 text-slate-700 dark:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            </div>
        </div>
        </div>
        <div id="mobileMenu" class="hidden md:hidden bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 px-4 py-4 space-y-3">
        <a href="{{route('welcome')}}" class="block text-sm text-slate-700 dark:text-slate-300 py-2">Accueil</a>
        <a href="{{route('welcome')}}#occasions" class="block text-sm text-slate-700 dark:text-slate-300 py-2">Occasions</a>
        <a href="{{route('login')}}" class="block text-sm text-slate-700 dark:text-slate-300 py-2">Contact</a>
        </div>
    </header>

    <!-- MAIN -->
    <main class="min-h-[calc(100vh-64px)] flex items-center justify-center px-4 py-16">
        {{$slot}}
    </main>

  <script>
    // Theme toggle
    const toggle = document.getElementById('themeToggle');
    toggle.addEventListener('click', () => {
      const isDark = document.documentElement.classList.toggle('dark');
      localStorage.setItem('mbg-theme', isDark ? 'dark' : 'light');
      updateInputs();
    });

    function updateInputs() {
      const isDark = document.documentElement.classList.contains('dark');
      document.querySelectorAll('.form-input').forEach(el => {
        if (isDark) { el.classList.add('dark-input'); el.classList.remove('light-input'); }
        else { el.classList.add('light-input'); el.classList.remove('dark-input'); }
      });
    }
    updateInputs();

    // Burger
    document.getElementById('menuBtn').addEventListener('click', () => document.getElementById('mobileMenu').classList.toggle('hidden'));

    // Password toggle
    function togglePwd(id, btn) {
      const inp = document.getElementById(id);
      inp.type = inp.type === 'password' ? 'text' : 'password';
    }

    
  </script>

  @stack('scripts')
</body>
</html>
