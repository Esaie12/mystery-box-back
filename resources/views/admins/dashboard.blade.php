<x-admin-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-slot name="dashboard" > active </x-slot>
    
<!-- Tabs -->
      <div class="page-tabs hidden" style="display:none" >
        <button class="page-tab active">Vue d'ensemble</button>
        <button class="page-tab">Ce mois</button>
        <button class="page-tab">Cette semaine</button>
      </div>

      <!-- Stats -->
      <div class="stats-grid">

        <div class="stat-card">
          <div class="stat-header">
            <span class="stat-label">Commandes</span>
            <div class="stat-icon teal">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
          </div>
          <div class="stat-value">348</div>
          <div class="stat-trend up">
            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
            +18% <span>vs mois dernier</span>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-header">
            <span class="stat-label">Revenus</span>
            <div class="stat-icon green">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
          </div>
          <div class="stat-value">24 810€</div>
          <div class="stat-trend up">
            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
            +24% <span>vs mois dernier</span>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-header">
            <span class="stat-label">Clients</span>
            <div class="stat-icon amber">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
          </div>
          <div class="stat-value">1 204</div>
          <div class="stat-trend up">
            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
            +9% <span>vs mois dernier</span>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-header">
            <span class="stat-label">En attente</span>
            <div class="stat-icon red">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
          </div>
          <div class="stat-value">12</div>
          <div class="stat-trend down">
            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            −3 <span>depuis hier</span>
          </div>
        </div>

    </div>

    <!-- Bottom grid -->
      <div class="bottom-grid">

        <!-- Orders table -->
        <div class="panel">
          <div class="panel-header">
            <span class="panel-title">Dernières commandes</span>
            <a class="panel-action" href="#">Voir tout →</a>
          </div>
          <div style="overflow-x:auto;">
            <table class="orders-table">
              <thead>
                <tr>
                  <th>N° Commande</th>
                  <th>Occasion</th>
                  <th>Pays</th>
                  <th>Montant</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="order-id">#MBG-2418</span></td>
                  <td><span class="order-emoji">🎄</span>Noël — Premium</td>
                  <td>🇫🇷 France</td>
                  <td style="font-weight:700;">59€</td>
                  <td><span class="status-badge shipped">Expédiée</span></td>
                </tr>
                <tr>
                  <td><span class="order-id">#MBG-2417</span></td>
                  <td><span class="order-emoji">🌙</span>Ramadan — Nour</td>
                  <td>🇧🇯 Bénin</td>
                  <td style="font-weight:700;">55€</td>
                  <td><span class="status-badge pending">En attente</span></td>
                </tr>
                <tr>
                  <td><span class="order-id">#MBG-2416</span></td>
                  <td><span class="order-emoji">💍</span>Mariage — Éternité</td>
                  <td>🇨🇮 Côte d'Ivoire</td>
                  <td style="font-weight:700;">149€</td>
                  <td><span class="status-badge delivered">Livrée</span></td>
                </tr>
                <tr>
                  <td><span class="order-id">#MBG-2415</span></td>
                  <td><span class="order-emoji">👶</span>Naissance — Bienvenue</td>
                  <td>🇨🇮 Côte d'Ivoire</td>
                  <td style="font-weight:700;">70€</td>
                  <td><span class="status-badge delivered">Livrée</span></td>
                </tr>
                <tr>
                  <td><span class="order-id">#MBG-2414</span></td>
                  <td><span class="order-emoji">🎄</span>Noël — Luxe</td>
                  <td>🇫🇷 France</td>
                  <td style="font-weight:700;">99€</td>
                  <td><span class="status-badge pending">En attente</span></td>
                </tr>
                <tr>
                  <td><span class="order-id">#MBG-2413</span></td>
                  <td><span class="order-emoji">🌙</span>Ramadan — Rahma</td>
                  <td>🇧🇯 Bénin</td>
                  <td style="font-weight:700;">95€</td>
                  <td><span class="status-badge cancelled">Annulée</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Right column -->
        <div class="right-col">

          <!-- Countries -->
          <div class="panel" style="animation-delay:.35s">
            <div class="panel-header">
              <span class="panel-title">Répartition par pays</span>
            </div>
            <div class="country-list">
              <div class="country-row">
                <span class="country-flag">🇫🇷</span>
                <div class="country-info">
                  <div class="country-name">France</div>
                  <div class="country-bar-wrap"><div class="country-bar" style="width:58%"></div></div>
                </div>
                <span class="country-pct">58%</span>
              </div>
              <div class="country-row">
                <span class="country-flag">🇧🇯</span>
                <div class="country-info">
                  <div class="country-name">Bénin</div>
                  <div class="country-bar-wrap"><div class="country-bar" style="width:26%"></div></div>
                </div>
                <span class="country-pct">26%</span>
              </div>
              <div class="country-row">
                <span class="country-flag">🇨🇮</span>
                <div class="country-info">
                  <div class="country-name">Côte d'Ivoire</div>
                  <div class="country-bar-wrap"><div class="country-bar" style="width:16%"></div></div>
                </div>
                <span class="country-pct">16%</span>
              </div>
            </div>
          </div>

          <!-- Activity -->
          <div class="panel" style="animation-delay:.45s">
            <div class="panel-header">
              <span class="panel-title">Activité récente</span>
            </div>
            <div class="activity-list">
              <div class="activity-item">
                <div class="activity-dot teal"></div>
                <div style="flex:1">
                  <div class="activity-text"><strong>Nouvelle commande</strong> #MBG-2418 — Noël Premium</div>
                  <div class="activity-time">Il y a 4 min</div>
                </div>
              </div>
              <div class="activity-item">
                <div class="activity-dot green"></div>
                <div style="flex:1">
                  <div class="activity-text"><strong>Livraison confirmée</strong> #MBG-2416 — Côte d'Ivoire</div>
                  <div class="activity-time">Il y a 22 min</div>
                </div>
              </div>
              <div class="activity-item">
                <div class="activity-dot amber"></div>
                <div style="flex:1">
                  <div class="activity-text"><strong>Nouveau client</strong> Amira T. s'est inscrite</div>
                  <div class="activity-time">Il y a 1h</div>
                </div>
              </div>
              <div class="activity-item">
                <div class="activity-dot red"></div>
                <div style="flex:1">
                  <div class="activity-text"><strong>Annulation</strong> #MBG-2413 — remboursement lancé</div>
                  <div class="activity-time">Il y a 3h</div>
                </div>
              </div>
              <div class="activity-item">
                <div class="activity-dot teal"></div>
                <div style="flex:1">
                  <div class="activity-text"><strong>5 commandes</strong> expédiées vers la France</div>
                  <div class="activity-time">Hier 18h</div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

</x-admin-layout>