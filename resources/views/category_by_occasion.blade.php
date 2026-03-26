<x-user-layout>
    @push('styles')
    <link rel="stylesheet" href="{{asset('category.css')}}">
    @endpush

<!-- BREADCRUMB -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5 pb-1">
    <nav class="flex items-center gap-2 text-sm text-slate-400">
      <a href="index.html" class="hover:text-teal-600 transition-colors">Accueil</a>
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      <a href="index.html#occasions" class="hover:text-teal-600 transition-colors">Occasions</a>
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      <span class="text-slate-600 font-medium">Noël</span>
    </nav>
  </div>

  <!-- ════════════════════════════════════
       HERO — Image de fond
       Changez le src pour votre propre photo
       ════════════════════════════════════ -->
  <div class="occasion-hero">
    <img src="https://images.unsplash.com/photo-1512909006721-3d6018887383?w=1400&h=420&fit=crop&auto=format" alt="Noël mystery box" />
    <div class="occasion-hero-overlay"></div>
    <div class="occasion-hero-content">
      <p class="text-teal-300 text-xs font-bold uppercase tracking-widest mb-3">Occasion sélectionnée</p>
      <div class="flex items-center gap-4 mb-3">
        <span class="text-5xl drop-shadow-lg">🎄</span>
        <h1 class="font-serif text-4xl lg:text-5xl font-bold text-white drop-shadow">Noël</h1>
      </div>
      <p class="text-slate-200 text-base max-w-xl leading-relaxed">
        Créez la magie des fêtes avec une box soigneusement composée pour vos proches.
      </p>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="bg-teal-50 border border-teal-100 rounded-2xl p-4 flex items-start gap-3 mb-12">
      <svg class="w-5 h-5 text-teal-600 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      <p class="text-teal-700 text-sm">Chaque box est soigneusement préparée et emballée. Les produits sont sélectionnés selon la catégorie choisie — la surprise fait partie de l'expérience !</p>
    </div>

    <h2 class="font-serif text-2xl font-semibold text-slate-800 mb-10">Choisissez votre catégorie</h2>

    <div class="grid md:grid-cols-3 gap-6 lg:gap-8 mb-20">

      <!-- ESSENTIELLE -->
      <div class="card-hover bg-white rounded-2xl border border-slate-100 p-7 flex flex-col">
        <div class="flex items-center justify-between mb-5">
          <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-500 flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/></svg>
          </div>
          <span class="font-serif text-2xl font-bold text-slate-800">29€</span>
        </div>
        <h3 class="font-serif font-bold text-slate-800 text-xl mb-2">Essentielle</h3>
        <p class="text-slate-500 text-sm mb-5 leading-relaxed">L'essentiel pour une belle surprise sous le sapin.</p>
        <div class="mb-6 flex-1">
          <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-3">Exemples de produits</p>
          <ul class="space-y-2">
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Bougies parfumées</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Chocolats artisanaux</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Carte de vœux personnalisée</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Sachet de thé premium</li>
          </ul>
          <p class="text-xs text-slate-400 mt-3 italic">* Les produits varient à chaque commande — c'est ça la surprise !</p>
        </div>
     <a href="{{ route('checkout') }}?occasion=noel&categorie=essentielle&nom=Essentielle&prix=29"
   class="inline-flex items-center justify-center gap-2 w-full py-3 rounded-xl text-sm font-semibold bg-slate-800 text-white hover:bg-slate-700 transition-all">
   Choisir cette catégorie
   <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 8l4 4m0 0l-4 4m4-4H3"/>
   </svg>
</a>
      </div>

      <!-- PREMIUM -->
      <div class="card-hover bg-white rounded-2xl border-2 border-teal-400 ring-2 ring-teal-100 p-7 flex flex-col category-recommended mt-4">
        <div class="flex items-center justify-between mb-5">
          <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/></svg>
          </div>
          <span class="font-serif text-2xl font-bold text-teal-600">59€</span>
        </div>
        <h3 class="font-serif font-bold text-slate-800 text-xl mb-2">Premium</h3>
        <p class="text-slate-500 text-sm mb-5 leading-relaxed">Une box généreuse et équilibrée pour combler vos proches.</p>
        <div class="mb-6 flex-1">
          <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-3">Exemples de produits</p>
          <ul class="space-y-2">
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Coffret cosmétique</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Livre best-seller</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Confiseries de luxe</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Décoration de Noël</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Carnet cuir</li>
          </ul>
          <p class="text-xs text-slate-400 mt-3 italic">* Les produits varient à chaque commande — c'est ça la surprise !</p>
        </div>
        <a href="{{ route('checkout') }}?occasion=noel&categorie=premium&nom=Premium&prix=59" class="inline-flex items-center justify-center gap-2 w-full py-3 rounded-xl text-sm font-semibold bg-teal-600 text-white hover:bg-teal-700 shadow-lg shadow-teal-200 transition-all">
          Choisir cette catégorie <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>

      <!-- LUXE -->
      <div class="card-hover bg-white rounded-2xl border border-slate-100 p-7 flex flex-col">
        <div class="flex items-center justify-between mb-5">
          <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-500 flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/></svg>
          </div>
          <span class="font-serif text-2xl font-bold text-slate-800">99€</span>
        </div>
        <h3 class="font-serif font-bold text-slate-800 text-xl mb-2">Luxe</h3>
        <p class="text-slate-500 text-sm mb-5 leading-relaxed">Le summum du cadeau mystère pour une fête inoubliable.</p>
        <div class="mb-6 flex-1">
          <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-3">Exemples de produits</p>
          <ul class="space-y-2">
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Accessoire mode premium</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Coffret gourmand gastronomique</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Bijou fantaisie</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Parfum de maison</li>
            <li class="flex items-start gap-2 text-sm text-slate-600"><svg class="w-4 h-4 text-teal-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Expérience surprise</li>
          </ul>
          <p class="text-xs text-slate-400 mt-3 italic">* Les produits varient à chaque commande — c'est ça la surprise !</p>
        </div>
        <a href="{{ route('checkout') }}?occasion=noel&categorie=luxe&nom=Luxe&prix=99" class="inline-flex items-center justify-center gap-2 w-full py-3 rounded-xl text-sm font-semibold bg-slate-800 text-white hover:bg-slate-700 transition-all">
          Choisir cette catégorie <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>

    </div>
  </div>

  <!-- AUTRES OCCASIONS -->
  <section class="py-16 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h3 class="font-serif text-2xl font-semibold text-slate-800 mb-8">Autres occasions</h3>
      <div class="flex flex-wrap gap-3">
        <a href="occasion-ramadan.html" class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-50 border border-slate-200 text-sm text-slate-600 hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">🌙 Ramadan</a>
        <a href="occasion-anniversaire.html" class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-50 border border-slate-200 text-sm text-slate-600 hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">🎂 Anniversaire</a>
        <a href="occasion-fete-peres.html" class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-50 border border-slate-200 text-sm text-slate-600 hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">👨‍👧 Fête des Pères</a>
        <a href="occasion-fete-meres.html" class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-50 border border-slate-200 text-sm text-slate-600 hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">💐 Fête des Mères</a>
        <a href="occasion-mariage.html" class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-50 border border-slate-200 text-sm text-slate-600 hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">💍 Mariage</a>
        <a href="occasion-diplome.html" class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-50 border border-slate-200 text-sm text-slate-600 hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">🎓 Diplôme</a>
        <a href="occasion-naissance.html" class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-50 border border-slate-200 text-sm text-slate-600 hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">👶 Naissance</a>
      </div>
    </div>
  </section>

</x-user-layout>
