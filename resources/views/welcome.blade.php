<x-user-layout>
    <!-- Country Banner -->
    <div id="country-banner" style="display:none;">
        <span class="banner-flag" id="bannerFlag">🌍</span>
        <span>Vous naviguez sur la version <strong id="bannerCountry">—</strong> — livraison &amp; prix adaptés</span>
        <svg style="width:14px;height:14px;color:#14b8a6;flex-shrink:0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
    </div>

    <!-- HERO -->
    <section class="hero-bg mesh-bg min-h-[90vh] flex items-center relative overflow-hidden">
        <!-- Decorative shapes -->
        <div class="absolute top-20 right-10 w-64 h-64 rounded-full bg-teal-100/40 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 left-10 w-48 h-48 rounded-full bg-sage-100/40 blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 right-1/4 w-32 h-32 rounded-full bg-slate-200/30 blur-2xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Text -->
            <div>
            <div class="fade-in stagger-1 inline-flex items-center gap-2 px-3 py-1.5 rounded-full tag-badge text-xs font-medium mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-teal-500 animate-pulse"></span>
                Livraison mondiale disponible
            </div>
            <h1 class="fade-in stagger-2 font-serif text-5xl lg:text-6xl xl:text-7xl font-bold text-slate-800 leading-tight mb-6">
                L'art de la<br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-sage-600">surprise</span><br/>
                parfaite.
            </h1>
            <p class="fade-in stagger-3 text-slate-500 text-lg leading-relaxed mb-8 max-w-md">
                Offrez une expérience unique pour chaque occasion. Nos box mystères sont soigneusement composées pour créer des moments inoubliables — quelle que soit la célébration.
            </p>
            <div class="fade-in stagger-4 flex flex-col sm:flex-row gap-4">
                <a href="#occasions" class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full bg-teal-600 text-white text-sm font-semibold hover:bg-teal-700 transition-all shadow-lg shadow-teal-200 hover:shadow-teal-300">
                Explorer les occasions
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="contact.html" class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full border border-slate-200 text-slate-600 text-sm font-medium hover:bg-white hover:shadow-md transition-all">
                Comment ça marche ?
                </a>
            </div>

            <!-- Stats -->
            <div class="fade-in stagger-5 flex gap-8 mt-12 pt-10 border-t border-slate-200">
                <div>
                <div class="font-serif text-2xl font-bold text-slate-800">2 000+</div>
                <div class="text-xs text-slate-400 mt-1">Box livrées</div>
                </div>
                <div class="w-px bg-slate-200"></div>
                <div>
                <div class="font-serif text-2xl font-bold text-slate-800">12+</div>
                <div class="text-xs text-slate-400 mt-1">Occasions couvertes</div>
                </div>
                <div class="w-px bg-slate-200"></div>
                <div>
                <div class="font-serif text-2xl font-bold text-slate-800">4.9 ★</div>
                <div class="text-xs text-slate-400 mt-1">Note moyenne</div>
                </div>
            </div>
            </div>

            <!-- Visual -->
            <div class="fade-in stagger-6 hidden lg:flex justify-center items-center">
            <div class="relative">
                <!-- Main box -->
                <div class="hero-float w-72 h-72 rounded-3xl bg-gradient-to-br from-teal-500 to-teal-700 shadow-2xl shadow-teal-200 flex items-center justify-center">
                <div class="text-center">
                    <div class="text-7xl mb-4">🎁</div>
                    <div class="text-white font-serif text-xl font-semibold">Mystery Box</div>
                    <div class="text-teal-200 text-sm mt-1">Surprise garantie</div>
                </div>
                </div>
                <!-- Floating cards -->
                <div class="absolute -top-6 -left-12 bg-white rounded-2xl shadow-lg p-3 flex items-center gap-3 w-44" style="animation: heroFloat 5s ease-in-out 1s infinite;">
                <div class="text-2xl">🎄</div>
                <div><div class="text-xs font-semibold text-slate-700">Noël</div><div class="text-xs text-slate-400">3 catégories</div></div>
                </div>
                <div class="absolute -bottom-6 -right-10 bg-white rounded-2xl shadow-lg p-3 flex items-center gap-3 w-44" style="animation: heroFloat 5.5s ease-in-out 0.5s infinite;">
                <div class="text-2xl">🎂</div>
                <div><div class="text-xs font-semibold text-slate-700">Anniversaire</div><div class="text-xs text-slate-400">3 catégories</div></div>
                </div>
                <div class="absolute top-1/2 -right-16 bg-white rounded-2xl shadow-lg p-3 flex items-center gap-3 w-40" style="animation: heroFloat 6s ease-in-out 2s infinite;">
                <div class="text-2xl">🌙</div>
                <div><div class="text-xs font-semibold text-slate-700">Ramadan</div><div class="text-xs text-slate-400">3 catégories</div></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 scroll-reveal">
            <p class="text-teal-600 text-sm font-semibold uppercase tracking-widest mb-3">Simple & rapide</p>
            <h2 class="font-serif text-4xl font-bold text-slate-800">Comment ça fonctionne ?</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="scroll-reveal text-center">
            <div class="w-14 h-14 rounded-2xl bg-teal-50 flex items-center justify-center mx-auto mb-5 text-teal-600">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/></svg>
            </div>
            <div class="font-serif text-5xl font-bold text-slate-100 mb-3">01</div>
            <h3 class="font-semibold text-slate-800 text-lg mb-2">Choisissez l'occasion</h3>
            <p class="text-slate-500 text-sm leading-relaxed">Sélectionnez l'événement à célébrer parmi notre sélection d'occasions.</p>
            </div>
            <div class="scroll-reveal text-center" style="transition-delay:0.15s">
            <div class="w-14 h-14 rounded-2xl bg-teal-50 flex items-center justify-center mx-auto mb-5 text-teal-600">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div class="font-serif text-5xl font-bold text-slate-100 mb-3">02</div>
            <h3 class="font-semibold text-slate-800 text-lg mb-2">Sélectionnez la catégorie</h3>
            <p class="text-slate-500 text-sm leading-relaxed">3 catégories disponibles par occasion. Choisissez selon votre budget et vos envies.</p>
            </div>
            <div class="scroll-reveal text-center" style="transition-delay:0.3s">
            <div class="w-14 h-14 rounded-2xl bg-teal-50 flex items-center justify-center mx-auto mb-5 text-teal-600">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/></svg>
            </div>
            <div class="font-serif text-5xl font-bold text-slate-100 mb-3">03</div>
            <h3 class="font-semibold text-slate-800 text-lg mb-2">Personnalisez & commandez</h3>
            <p class="text-slate-500 text-sm leading-relaxed">Ajoutez un message, choisissez l'envoi anonyme et procédez au paiement.</p>
            </div>
        </div>
        </div>
    </section>

    <!-- OCCASIONS GRID -->
    <section id="occasions" class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 scroll-reveal">
            <p class="text-teal-600 text-sm font-semibold uppercase tracking-widest mb-3">Toutes les occasions</p>
            <h2 class="font-serif text-4xl font-bold text-slate-800 mb-4">Quelle est l'occasion ?</h2>
            <p class="text-slate-500 max-w-lg mx-auto">Chaque occasion mérite une surprise unique. Choisissez ci-dessous pour découvrir les box disponibles.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

            <!-- ✅ DISPONIBLE — Noël -->
            <a href="{{route('category_by_occasion','noel')}}" class="occasion-card card-hover bg-white rounded-2xl border border-slate-100 overflow-hidden cursor-pointer group scroll-reveal block" style="transition-delay:0.00s">
            <div class="relative h-44 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1512909006721-3d6018887383?w=400&h=200&fit=crop&auto=format" alt="Box Noël" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <span class="absolute top-3 left-3 text-2xl">🎄</span>
            </div>
            <div class="p-5">
                <h3 class="font-serif font-semibold text-slate-800 text-lg mb-1">Noël</h3>
                <p class="text-slate-400 text-sm mb-4 leading-relaxed">Créez la magie des fêtes avec une box soigneusement composée.</p>
                <div class="flex items-center justify-between">
                <span class="tag-badge text-xs px-2.5 py-1 rounded-full font-medium">3 catégories</span>
                <svg class="w-5 h-5 text-slate-300 group-hover:text-teal-500 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </div>
            </a>

            <!-- ✅ DISPONIBLE — Ramadan -->
            <a href="{{route('category_by_occasion','noel')}}" class="occasion-card card-hover bg-white rounded-2xl border border-slate-100 overflow-hidden cursor-pointer group scroll-reveal block" style="transition-delay:0.05s">
                <div class="relative h-44 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1591289009723-aef0a1a8a211?w=400&h=200&fit=crop&auto=format" alt="Box Ramadan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    <span class="absolute top-3 left-3 text-2xl">🌙</span>
                </div>
                <div class="p-5">
                    <h3 class="font-serif font-semibold text-slate-800 text-lg mb-1">Ramadan</h3>
                    <p class="text-slate-400 text-sm mb-4 leading-relaxed">Une sélection pensée pour ce mois béni, riche en partage.</p>
                    <div class="flex items-center justify-between">
                    <span class="tag-badge text-xs px-2.5 py-1 rounded-full font-medium">3 catégories</span>
                    <svg class="w-5 h-5 text-slate-300 group-hover:text-teal-500 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>
            </a>

            <!-- 🚫 INDISPONIBLE — Anniversaire -->
            <div onclick="openUnavailModal(this)"
            data-emoji="🎂" data-name="Anniversaire" data-avail-in="FR" data-is-soon="0"
            class="occasion-card card-hover card-unavailable bg-white rounded-2xl border border-slate-100 overflow-hidden cursor-pointer group scroll-reveal block" style="transition-delay:0.10s">
            <div class="relative h-44 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1513201099705-a9746e1e201f?w=400&h=200&fit=crop&auto=format" alt="Box Anniversaire" class="w-full h-full object-cover"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <span class="absolute top-3 left-3 text-2xl">🎂</span>
            </div>
            <div class="p-5">
                <h3 class="font-serif font-semibold text-slate-800 text-lg mb-1">Anniversaire</h3>
                <p class="text-slate-400 text-sm mb-4 leading-relaxed">Offrez une journée inoubliable avec la box surprise idéale.</p>
                <div class="flex items-center justify-between">
                <span class="badge-unavailable">🚫 Indisponible</span>
                <svg class="w-5 h-5 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                </div>
            </div>
            </div>

            <!-- ⏳ BIENTÔT — Fête des Pères -->
            <div onclick="openUnavailModal(this)"
            data-emoji="👨‍👧" data-name="Fête des Pères" data-avail-in="" data-is-soon="1"
            class="occasion-card card-hover card-unavailable bg-white rounded-2xl border border-slate-100 overflow-hidden cursor-pointer group scroll-reveal block" style="transition-delay:0.15s">
            <div class="relative h-44 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1549465220-1a8b9238cd48?w=400&h=200&fit=crop&auto=format" alt="Box Fête des Pères" class="w-full h-full object-cover"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <span class="absolute top-3 left-3 text-2xl">👨‍👧</span>
            </div>
            <div class="p-5">
                <h3 class="font-serif font-semibold text-slate-800 text-lg mb-1">Fête des Pères</h3>
                <p class="text-slate-400 text-sm mb-4 leading-relaxed">Montrez-lui toute votre reconnaissance avec une surprise de choix.</p>
                <div class="flex items-center justify-between">
                <span class="badge-soon">⏳ Bientôt</span>
                <svg class="w-5 h-5 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                </div>
            </div>
            </div>

            <!-- ⏳ BIENTÔT — Fête des Mères -->
            <div onclick="openUnavailModal(this)"
            data-emoji="💐" data-name="Fête des Mères" data-avail-in="" data-is-soon="1"
            class="occasion-card card-hover card-unavailable bg-white rounded-2xl border border-slate-100 overflow-hidden cursor-pointer group scroll-reveal block" style="transition-delay:0.20s">
            <div class="relative h-44 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=400&h=200&fit=crop&auto=format" alt="Box Fête des Mères" class="w-full h-full object-cover"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <span class="absolute top-3 left-3 text-2xl">💐</span>
            </div>
            <div class="p-5">
                <h3 class="font-serif font-semibold text-slate-800 text-lg mb-1">Fête des Mères</h3>
                <p class="text-slate-400 text-sm mb-4 leading-relaxed">Gâtez la plus importante personne de votre vie.</p>
                <div class="flex items-center justify-between">
                <span class="badge-soon">⏳ Bientôt</span>
                <svg class="w-5 h-5 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                </div>
            </div>
            </div>

            <!-- ✅ DISPONIBLE — Mariage -->
            <a href="{{route('category_by_occasion','noel')}}" class="occasion-card card-hover bg-white rounded-2xl border border-slate-100 overflow-hidden cursor-pointer group scroll-reveal block" style="transition-delay:0.25s">
            <div class="relative h-44 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=400&h=200&fit=crop&auto=format" alt="Box Mariage" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <span class="absolute top-3 left-3 text-2xl">💍</span>
            </div>
            <div class="p-5">
                <h3 class="font-serif font-semibold text-slate-800 text-lg mb-1">Mariage</h3>
                <p class="text-slate-400 text-sm mb-4 leading-relaxed">Un cadeau à la hauteur de ce grand jour mémorable.</p>
                <div class="flex items-center justify-between">
                <span class="tag-badge text-xs px-2.5 py-1 rounded-full font-medium">3 catégories</span>
                <svg class="w-5 h-5 text-slate-300 group-hover:text-teal-500 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </div>
            </a>

            <!-- 🚫 INDISPONIBLE — Remise de diplôme -->
            <div onclick="openUnavailModal(this)"
            data-emoji="🎓" data-name="Remise de diplôme" data-avail-in="" data-is-soon="0"
            class="occasion-card card-hover card-unavailable bg-white rounded-2xl border border-slate-100 overflow-hidden cursor-pointer group scroll-reveal block" style="transition-delay:0.30s">
            <div class="relative h-44 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1627556704302-624286467c65?w=400&h=200&fit=crop&auto=format" alt="Box Diplôme" class="w-full h-full object-cover"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <span class="absolute top-3 left-3 text-2xl">🎓</span>
            </div>
            <div class="p-5">
                <h3 class="font-serif font-semibold text-slate-800 text-lg mb-1">Remise de diplôme</h3>
                <p class="text-slate-400 text-sm mb-4 leading-relaxed">Félicitez le lauréat avec une box digne de ses efforts.</p>
                <div class="flex items-center justify-between">
                <span class="badge-unavailable">🚫 Indisponible</span>
                <svg class="w-5 h-5 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                </div>
            </div>
            </div>

            <!-- ✅ DISPONIBLE — Naissance -->
            <a href="{{route('category_by_occasion','noel')}}" class="occasion-card card-hover bg-white rounded-2xl border border-slate-100 overflow-hidden cursor-pointer group scroll-reveal block" style="transition-delay:0.35s">
            <div class="relative h-44 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=400&h=200&fit=crop&auto=format" alt="Box Naissance" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                <span class="absolute top-3 left-3 text-2xl">👶</span>
            </div>
            <div class="p-5">
                <h3 class="font-serif font-semibold text-slate-800 text-lg mb-1">Naissance</h3>
                <p class="text-slate-400 text-sm mb-4 leading-relaxed">Célébrez cette nouvelle vie avec une box pleine de tendresse.</p>
                <div class="flex items-center justify-between">
                <span class="tag-badge text-xs px-2.5 py-1 rounded-full font-medium">3 catégories</span>
                <svg class="w-5 h-5 text-slate-300 group-hover:text-teal-500 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </div>
            </a>

        </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 scroll-reveal">
            <p class="text-teal-600 text-sm font-semibold uppercase tracking-widest mb-3">Ils nous font confiance</p>
            <h2 class="font-serif text-4xl font-bold text-slate-800">Ce qu'ils en disent</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="scroll-reveal bg-slate-50 rounded-2xl p-6 border border-slate-100">
            <div class="flex gap-1 mb-4">
                <span class="text-amber-400">★★★★★</span>
            </div>
            <p class="text-slate-600 text-sm leading-relaxed mb-5">"La box Ramadan était parfaite ! Tout était soigné, bien emballé, avec une vraie attention aux détails. Ma famille a adoré."</p>
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-teal-100 flex items-center justify-center text-teal-700 font-semibold text-sm">S</div>
                <div><div class="text-sm font-medium text-slate-800">Sana M.</div><div class="text-xs text-slate-400">Paris, France</div></div>
            </div>
            </div>
            <div class="scroll-reveal bg-slate-50 rounded-2xl p-6 border border-slate-100" style="transition-delay:0.1s">
            <div class="flex gap-1 mb-4">
                <span class="text-amber-400">★★★★★</span>
            </div>
            <p class="text-slate-600 text-sm leading-relaxed mb-5">"J'ai commandé pour l'anniversaire de mon frère en dernière minute. Livraison rapide, box magnifique. Je recommande !"</p>
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-sage-100 flex items-center justify-center text-sage-700 font-semibold text-sm">K</div>
                <div><div class="text-sm font-medium text-slate-800">Karim B.</div><div class="text-xs text-slate-400">Lyon, France</div></div>
            </div>
            </div>
            <div class="scroll-reveal bg-slate-50 rounded-2xl p-6 border border-slate-100" style="transition-delay:0.2s">
            <div class="flex gap-1 mb-4">
                <span class="text-amber-400">★★★★☆</span>
            </div>
            <p class="text-slate-600 text-sm leading-relaxed mb-5">"L'option d'envoi anonyme est fantastique. Le destinataire n'a pas su qui avait commandé — le suspense en plus !"</p>
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-semibold text-sm">A</div>
                <div><div class="text-sm font-medium text-slate-800">Amira T.</div><div class="text-xs text-slate-400">Montréal, Canada</div></div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="py-20 bg-gradient-to-br from-teal-600 to-teal-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, white 0%, transparent 50%), radial-gradient(circle at 70% 50%, white 0%, transparent 50%);"></div>
        <div class="relative max-w-3xl mx-auto px-4 text-center scroll-reveal">
        <h2 class="font-serif text-4xl lg:text-5xl font-bold text-white mb-5">Prêt à créer la surprise ?</h2>
        <p class="text-teal-100 text-lg mb-8">Choisissez votre occasion et laissez-nous composer le cadeau parfait.</p>
        <a href="#occasions" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-white text-teal-700 font-semibold text-sm hover:bg-teal-50 transition-all shadow-xl">
            Choisir une occasion
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
        </div>

    </section>
    <!-- Logout Button -->
@auth
<div class="fixed bottom-6 right-6 z-50">
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit"
                style="padding: 0.75rem 1.5rem; background: #ef4444; color: white; border: none; border-radius: 0.75rem; font-weight: 600; cursor: pointer; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3); transition: all 0.3s ease; display: flex; align-items: center; gap: 0.5rem;"
                onmouseover="this.style.backgroundColor='#dc2626'; this.style.transform='translateY(-2px)'"
                onmouseout="this.style.backgroundColor='#ef4444'; this.style.transform='translateY(0)'">
            <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Se déconnecter
        </button>
    </form>
</div>
@endauth
</x-user-layout>
