<x-user-layout>
    @push('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #f0f9ff;
        }

        .container-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Profile Header Section */
        .profile-header-section {
            background: linear-gradient(135deg, #a7f3d0 0%, #99f6e4 100%);
            border-radius: 1.5rem;
            padding: 1.75rem 2.5rem;
            margin-bottom: 2rem;
        }

        .profile-header-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .profile-header-content {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex: 1;
        }

        .profile-avatar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background-color: #14b8a6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            border: 3px solid white;
            flex-shrink: 0;
        }

        .profile-user-info h1 {
            font-size: 1.35rem;
            font-weight: 600;
            color: #0f766e;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .badge-gold {
            background-color: #fbbf24;
            color: #78350f;
            padding: 0.2rem 0.6rem;
            border-radius: 0.3rem;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .profile-user-info p {
            color: #475569;
            font-size: 0.85rem;
            margin: 0;
            line-height: 1.3;
        }

        .profile-stats {
            display: flex;
            gap: 2.5rem;
            flex-shrink: 0;
        }

        .stat-item {
            text-align: center;
            min-width: 75px;
        }

        .stat-number {
            font-size: 1.35rem;
            font-weight: 700;
            color: #14b8a6;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.7rem;
            color: #475569;
            font-weight: 500;
            margin-top: 0.3rem;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        /* Tabs Navigation */
        .tabs-navigation {
            display: flex;
            gap: 2rem;
            border-bottom: 2px solid #e0f2fe;
            margin-bottom: 2rem;
            overflow-x: auto;
            padding-bottom: 1rem;
        }

        .tab-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #64748b;
            font-weight: 500;
            white-space: nowrap;
            position: relative;
            bottom: -1rem;
        }

        .tab-icon {
            width: 1.25rem;
            height: 1.25rem;
            stroke: currentColor;
        }

        .tab-item.active {
            color: #14b8a6;
            border-bottom-color: #14b8a6;
        }

        .tab-item:hover {
            color: #14b8a6;
        }

        .badge-notification {
            background-color: #14b8a6;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
        }

        .badge-affiliation {
            background-color: #f97316;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
        }

        /* Tab Content */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Personal Info Section */
        .form-section {
            background-color: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-section h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #0f766e;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
            color: #475569;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group select {
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            background-color: #f8fafc;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #14b8a6;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
        }

        /* Communication Preferences */
        .preferences-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .preference-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 1.25rem;
            background-color: #f8fafc;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .preference-item:hover {
            border-color: #14b8a6;
        }

        .preference-content h4 {
            font-size: 1rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }

        .preference-content p {
            font-size: 0.9rem;
            color: #64748b;
        }

        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            width: 50px;
            height: 28px;
            background-color: #e2e8f0;
            border-radius: 9999px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            flex-shrink: 0;
        }

        .toggle-switch.active {
            background-color: #14b8a6;
        }

        .toggle-switch::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 24px;
            height: 24px;
            background-color: white;
            border-radius: 50%;
            transition: left 0.3s ease;
        }

        .toggle-switch.active::after {
            left: 24px;
        }

        /* Buttons */
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.75rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background-color: #14b8a6;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0d9488;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(20, 184, 166, 0.3);
        }

        .btn-secondary {
            background-color: #e2e8f0;
            color: #475569;
        }

        .btn-secondary:hover {
            background-color: #cbd5e1;
        }

        .btn-logout {
            background-color: #ef4444;
            color: white;
        }

        .btn-logout:hover {
            background-color: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Icon styles */
        .icon {
            width: 1.25rem;
            height: 1.25rem;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .profile-header-content {
                flex-direction: column;
                text-align: center;
            }

            .profile-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .tabs-navigation {
                gap: 0.5rem;
            }

            .tab-item {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
    @endpush

    <div class="container-main">
        <!-- Profile Header -->
        <div class="profile-header-section">
            <div class="profile-header-wrapper">
                <div class="profile-header-content">
                    <div class="profile-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                    <div class="profile-user-info">
                        <h1>
                            {{ Auth::user()->name }}
                            <span class="badge-gold">👑 Membre Gold</span>
                        </h1>
                        <p>{{ Auth::user()->email }} • 🇫🇷 France • Membre depuis janvier 2026</p>
                    </div>
                </div>

                <!-- Stats -->
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Commandes</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">177€</div>
                        <div class="stat-label">Dépensé</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Filleuls</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">42€</div>
                        <div class="stat-label">Gains Affil.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <div class="tabs-navigation">
            <div class="tab-item active" onclick="switchTab(event, 'profile')">
                <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                Mon profil
            </div>
            <div class="tab-item" onclick="switchTab(event, 'orders')">
                <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 2L6.46 6H2v2h2.54L6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2l1.46-11H22V6h-4.54L18 2H9z"></path><circle cx="7" cy="17" r="2"></circle><circle cx="17" cy="17" r="2"></circle></svg>
                Mes commandes
                <span class="badge-notification">3</span>
            </div>
            <div class="tab-item" onclick="switchTab(event, 'addresses')">
                <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Adresses
            </div>
            <div class="tab-item" onclick="switchTab(event, 'affiliation')">
                <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Affiliation
                <span class="badge-affiliation">42€</span>
            </div>
            <div class="tab-item" onclick="switchTab(event, 'security')">
                <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                Sécurité
            </div>
        </div>

        <!-- TAB 1: Profile -->
        <div id="profile" class="tab-content active">
            <!-- Personal Info -->
            <div class="form-section">
                <h3>
                    <svg style="width: 1.5rem; height: 1.5rem; display: inline; margin-right: 0.5rem; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    Informations personnelles
                </h3>
                {{-- <form method="POST" action="{{ route('update_profile') }}">
                    @csrf --}}
                <form method="POST" action="#">
                    {{-- @csrf --}}
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" name="firstname" value="{{ Auth::user()->first_name ?? '' }}" placeholder="Sana">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input type="text" id="lastname" name="lastname" value="{{ Auth::user()->last_name ?? '' }}" placeholder="M.">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="sana.m@mail.com">
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}" placeholder="+33 6 12 34 56 78">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Date de naissance</label>
                            <input type="date" id="birthdate" name="birthdate" value="{{ Auth::user()->birthdate ?? '' }}" placeholder="12/04/1995">
                        </div>
                        <div class="form-group">
                            <label for="country">Pays</label>
                            <select id="country" name="country">
                                <option value="FR" selected>🇫🇷 France</option>
                                <option value="BE">🇧🇪 Belgique</option>
                                <option value="CH">🇨🇭 Suisse</option>
                                <option value="CA">🇨🇦 Canada</option>
                                <option value="OTHER">Autre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Genre (optionnel)</label>
                            <select id="gender" name="gender">
                                <option value="">Sélectionner</option>
                                <option value="female" {{ Auth::user()->gender === 'female' ? 'selected' : '' }}>Femme</option>
                                <option value="male" {{ Auth::user()->gender === 'male' ? 'selected' : '' }}>Homme</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">
                            <svg style="width: 1.25rem; height: 1.25rem; display: inline; margin-right: 0.5rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            Sauvegarder les modifications
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <svg style="width: 1.25rem; height: 1.25rem; display: inline; margin-right: 0.5rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2"></path></svg>
                            Annuler
                        </button>
                    </div>
                </form>
            </div>

            <!-- Communication Preferences -->
            <div class="form-section">
                <h3>
                    <svg style="width: 1.5rem; height: 1.5rem; display: inline; margin-right: 0.5rem; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    Préférences de communication
                </h3>
                <div class="preferences-list">
                    <div class="preference-item">
                        <div class="preference-content">
                            <h4>Emails promotionnels</h4>
                            <p>Offres exclusives, nouvelles occasions, réductions</p>
                        </div>
                        <button class="toggle-switch active" onclick="toggleSwitch(this)"></button>
                    </div>
                    <div class="preference-item">
                        <div class="preference-content">
                            <h4>Notifications de livraison</h4>
                            <p>Suivi et mises à jour de vos colis</p>
                        </div>
                        <button class="toggle-switch active" onclick="toggleSwitch(this)"></button>
                    </div>
                    <div class="preference-item">
                        <div class="preference-content">
                            <h4>Newsletter mensuelle</h4>
                            <p>Actualités Mystery Box Global</p>
                        </div>
                        <button class="toggle-switch" onclick="toggleSwitch(this)"></button>
                    </div>
                    <div class="preference-item">
                        <div class="preference-content">
                            <h4>Rappels d'occasions</h4>
                            <p>Fêtes, anniversaires, Ramadan...</p>
                        </div>
                        <button class="toggle-switch active" onclick="toggleSwitch(this)"></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 2: Orders -->
        <div id="orders" class="tab-content">
            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h3 style="margin: 0;">📦 Historique des commandes</h3>
                    <select style="padding: 0.5rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; font-size: 0.95rem; color: #64748b; background-color: white; cursor: pointer;">
                        <option>Toutes les commandes</option>
                        <option>En cours</option>
                        <option>Livrées</option>
                        <option>Annulées</option>
                    </select>
                </div>

                <!-- Order 1 -->
                <div style="border: 1px solid #e2e8f0; border-radius: 0.75rem; padding: 1.5rem; margin-bottom: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
                        <div>
                            <h4 style="font-size: 1.1rem; font-weight: 600; color: #0f766e; margin: 0 0 0.25rem 0;">#MBG-2418</h4>
                            <p style="font-size: 0.9rem; color: #64748b; margin: 0;">11 mars 2026 • Colissimo</p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #14b8a6;"></span>
                            <span style="font-size: 0.85rem; font-weight: 600; color: #14b8a6;">Expédiée</span>
                        </div>
                        <p style="font-size: 1.25rem; font-weight: 700; color: #14b8a6; margin: 0;">59€</p>
                    </div>

                    <div style="background-color: #f8fafc; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <div style="width: 50px; height: 50px; border-radius: 0.5rem; background-color: #dbeafe; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">🎄</div>
                            <div style="flex: 1;">
                                <h5 style="font-weight: 600; color: #1e293b; margin: 0 0 0.25rem 0;">Box Noël Premium</h5>
                                <p style="font-size: 0.85rem; color: #64748b; margin: 0;">Réf. NOEL-PREM-001 • 🇫🇷 Livraison domicile</p>
                                <p style="font-size: 0.85rem; color: #14b8a6; margin: 0.5rem 0 0 0; display: flex; align-items: center; gap: 0.25rem;">🚚 En cours de livraison • Estimé le 13/03/2026</p>
                            </div>
                            <div style="display: flex; gap: 0.75rem;">
                                <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem;">Suivre</button>
                                <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem;">Facture</button>
                            </div>
                        </div>
                    </div>

                    <!-- Progress bar -->
                    <div style="margin-top: 1.5rem;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                            <div style="text-align: center; flex: 1;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #14b8a6; color: white; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-weight: bold;">✓</div>
                                <p style="font-size: 0.8rem; font-weight: 600; color: #14b8a6;">Confirmée</p>
                            </div>
                            <div style="text-align: center; flex: 1;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #14b8a6; color: white; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-weight: bold;">✓</div>
                                <p style="font-size: 0.8rem; font-weight: 600; color: #14b8a6;">Préparée</p>
                            </div>
                            <div style="text-align: center; flex: 1;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; border: 2px solid #14b8a6; color: #14b8a6; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-weight: bold; position: relative;"><div style="width: 8px; height: 8px; border-radius: 50%; background-color: #14b8a6;"></div></div>
                                <p style="font-size: 0.8rem; font-weight: 600; color: #14b8a6;">En transit</p>
                            </div>
                            <div style="text-align: center; flex: 1;">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #cbd5e1; color: white; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-weight: bold;">✓</div>
                                <p style="font-size: 0.8rem; font-weight: 600; color: #64748b;">Livrée</p>
                            </div>
                        </div>
                        <div style="height: 3px; background: linear-gradient(to right, #14b8a6 0%, #14b8a6 66%, #cbd5e1 66%, #cbd5e1 100%); border-radius: 9999px;"></div>
                    </div>
                </div>

                <!-- Order 2 -->
                <div style="border: 1px solid #e2e8f0; border-radius: 0.75rem; padding: 1.5rem; margin-bottom: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
                        <div>
                            <h4 style="font-size: 1.1rem; font-weight: 600; color: #0f766e; margin: 0 0 0.25rem 0;">#MBG-2380</h4>
                            <p style="font-size: 0.9rem; color: #64748b; margin: 0;">18 février 2026 • Colissimo</p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #14b8a6;"></span>
                            <span style="font-size: 0.85rem; font-weight: 600; color: #14b8a6;">Livrée</span>
                        </div>
                        <p style="font-size: 1.25rem; font-weight: 700; color: #14b8a6; margin: 0;">55€</p>
                    </div>

                    <div style="background-color: #f8fafc; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <div style="width: 50px; height: 50px; border-radius: 0.5rem; background-color: #fef3c7; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">🌙</div>
                            <div style="flex: 1;">
                                <h5 style="font-weight: 600; color: #1e293b; margin: 0 0 0.25rem 0;">Box Ramadan Nour</h5>
                                <p style="font-size: 0.85rem; color: #64748b; margin: 0;">Réf. RAM-NOUR-002 • 🇫🇷 Livraison domicile</p>
                                <p style="font-size: 0.85rem; color: #14b8a6; margin: 0.5rem 0 0 0; display: flex; align-items: center; gap: 0.25rem;">✓ Livrée le 22 février 2026</p>
                            </div>
                            <div style="display: flex; gap: 0.75rem;">
                                <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem;">Voir</button>
                                <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem;">Facture</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order 3 -->
                <div style="border: 1px solid #e2e8f0; border-radius: 0.75rem; padding: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
                        <div>
                            <h4 style="font-size: 1.1rem; font-weight: 600; color: #0f766e; margin: 0 0 0.25rem 0;">#MBG-2312</h4>
                            <p style="font-size: 0.9rem; color: #64748b; margin: 0;">14 janvier 2026 • Colissimo</p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #14b8a6;"></span>
                            <span style="font-size: 0.85rem; font-weight: 600; color: #14b8a6;">Livrée</span>
                        </div>
                        <p style="font-size: 1.25rem; font-weight: 700; color: #14b8a6; margin: 0;">65€</p>
                    </div>

                    <div style="background-color: #f8fafc; padding: 1rem; border-radius: 0.5rem;">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <div style="width: 50px; height: 50px; border-radius: 0.5rem; background-color: #fce7f3; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">🎂</div>
                            <div style="flex: 1;">
                                <h5 style="font-weight: 600; color: #1e293b; margin: 0 0 0.25rem 0;">Box Anniversaire Grande Fête</h5>
                                <p style="font-size: 0.85rem; color: #64748b; margin: 0;">Réf. ANN-GRF-001 • 🇫🇷 Livraison domicile</p>
                                <p style="font-size: 0.85rem; color: #14b8a6; margin: 0.5rem 0 0 0; display: flex; align-items: center; gap: 0.25rem;">✓ Livrée le 17 janvier 2026</p>
                            </div>
                            <div style="display: flex; gap: 0.75rem;">
                                <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem;">Voir</button>
                                <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem;">Facture</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 3: Addresses -->
        <div id="addresses" class="tab-content">
            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h3 style="margin: 0;">📍 Mes adresses de livraison</h3>
                    <button class="btn btn-primary" style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1.25rem; height: 1.25rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Ajouter
                    </button>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                    <!-- Address 1 - Principal -->
                    <div style="border: 2px solid #14b8a6; border-radius: 1rem; padding: 1.5rem; position: relative;">
                        <div style="position: absolute; top: -12px; left: 20px; background-color: #14b8a6; color: white; padding: 0.25rem 0.75rem; border-radius: 0.4rem; font-size: 0.75rem; font-weight: 600;">Principale</div>

                        <h4 style="font-size: 1rem; font-weight: 600; color: #1e293b; margin: 0 0 1rem 0; display: flex; align-items: center; gap: 0.5rem;">
                            <span style="font-size: 1.25rem;">🏠</span>
                            Domicile
                        </h4>

                        <div style="line-height: 1.8; color: #64748b; font-size: 0.95rem; margin-bottom: 1.5rem;">
                            <p style="margin: 0; font-weight: 500; color: #1e293b;">Sana M.</p>
                            <p style="margin: 0;">24 rue de la Paix</p>
                            <p style="margin: 0;">75001 Paris</p>
                            <p style="margin: 0;">🇫🇷 France</p>
                        </div>

                        <div style="display: flex; gap: 0.75rem;">
                            <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem; flex: 1;">Modifier</button>
                        </div>
                    </div>

                    <!-- Address 2 -->
                    <div style="border: 2px solid #e2e8f0; border-radius: 1rem; padding: 1.5rem;">
                        <h4 style="font-size: 1rem; font-weight: 600; color: #1e293b; margin: 0 0 1rem 0; display: flex; align-items: center; gap: 0.5rem;">
                            <span style="font-size: 1.25rem;">🏢</span>
                            Bureau
                        </h4>

                        <div style="line-height: 1.8; color: #64748b; font-size: 0.95rem; margin-bottom: 1.5rem;">
                            <p style="margin: 0; font-weight: 500; color: #1e293b;">Sana M.</p>
                            <p style="margin: 0;">12 av. des Champs-Élysées</p>
                            <p style="margin: 0;">75008 Paris</p>
                            <p style="margin: 0;">🇫🇷 France</p>
                        </div>

                        <div style="display: flex; gap: 0.75rem;">
                            <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem; flex: 1;">Définir principale</button>
                            <button class="btn" style="background-color: white; color: #ef4444; border: 1px solid #fecaca; padding: 0.5rem 1.25rem; font-size: 0.9rem; flex: 1;">Supprimer</button>
                        </div>
                    </div>
                </div>

                <!-- Add Address Card -->
                <div style="border: 2px dashed #cbd5e1; border-radius: 1rem; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.3s ease;"
                     onmouseover="this.style.borderColor='#14b8a6'; this.style.backgroundColor='#f0fdf4';"
                     onmouseout="this.style.borderColor='#cbd5e1'; this.style.backgroundColor='transparent';">
                    <svg style="width: 2rem; height: 2rem; color: #64748b; margin: 0 auto 0.5rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    <p style="color: #64748b; font-size: 0.95rem; margin: 0; font-weight: 500;">Ajouter une adresse</p>
                </div>
            </div>
        </div>

        <!-- TAB 4: Affiliation -->
        <div id="affiliation" class="tab-content">
            <!-- Main Affiliation Card -->
            <div style="background: linear-gradient(135deg, #1e293b 0%, #0f766e 100%); border-radius: 1.5rem; padding: 2.5rem; margin-bottom: 2rem; color: white;">
                <div style="margin-bottom: 1.5rem;">
                    <p style="color: #14b8a6; font-size: 0.85rem; font-weight: 600; margin: 0; text-transform: uppercase; letter-spacing: 1px;">✨ Programme d'affiliation</p>
                </div>

                <h2 style="font-size: 2.25rem; font-weight: 700; margin: 0 0 0.5rem 0; font-family: serif;">Partagez la magie,</h2>
                <h3 style="font-size: 1.75rem; font-weight: 600; color: #14b8a6; margin: 0 0 1rem 0; font-style: italic; font-family: serif;">gagnez à chaque cadeau</h3>

                <p style="color: #cbd5e1; margin: 0 0 1.5rem 0; line-height: 1.6;">
                    Invitez vos proches à découvrir Mystery Box Global et gagnez <strong style="color: #14b8a6;">10% de commission</strong> sur chacune de leurs commandes — pour toujours.
                </p>

                <!-- Benefits -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                    <div style="background-color: rgba(20, 184, 166, 0.1); border: 1px solid rgba(20, 184, 166, 0.3); border-radius: 0.75rem; padding: 1rem;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">💰</div>
                        <p style="font-size: 0.85rem; font-weight: 600; color: #14b8a6; margin: 0;">10%</p>
                        <p style="font-size: 0.75rem; color: #cbd5e1; margin: 0;">Commission vie</p>
                    </div>
                    <div style="background-color: rgba(20, 184, 166, 0.1); border: 1px solid rgba(20, 184, 166, 0.3); border-radius: 0.75rem; padding: 1rem;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">🎁</div>
                        <p style="font-size: 0.85rem; font-weight: 600; color: #14b8a6; margin: 0;">~10€</p>
                        <p style="font-size: 0.75rem; color: #cbd5e1; margin: 0;">Offert à votre filleul</p>
                    </div>
                    <div style="background-color: rgba(20, 184, 166, 0.1); border: 1px solid rgba(20, 184, 166, 0.3); border-radius: 0.75rem; padding: 1rem;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">⚡</div>
                        <p style="font-size: 0.85rem; font-weight: 600; color: #14b8a6; margin: 0;">48h</p>
                        <p style="font-size: 0.75rem; color: #cbd5e1; margin: 0;">Délai de virement</p>
                    </div>
                </div>

                <!-- Referral Link -->
                <div style="display: flex; gap: 1rem; align-items: center;">
                    <div style="flex: 1; background-color: rgba(255, 255, 255, 0.1); border: 1px solid rgba(20, 184, 166, 0.3); border-radius: 0.75rem; padding: 1rem; display: flex; align-items: center;">
                        <span style="color: #cbd5e1; font-size: 0.9rem;">mysteryboxglobal.com?ref=</span>
                        <span style="color: white; font-weight: 600; font-size: 0.95rem; letter-spacing: 1px;">SANA2026</span>
                    </div>
                    <button class="btn" style="background-color: #14b8a6; color: white; padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1.25rem; height: 1.25rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="9" y="2" width="6" height="4"></rect></svg>
                        Copier
                    </button>
                    <button class="btn" style="background-color: #14b8a6; color: white; padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1.25rem; height: 1.25rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"></circle><path d="M23 21H9a4 4 0 0 1-4-4V8a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4"></path><path d="M1 12a8 8 0 0 0 15.62 2m0-8A8 8 0 0 0 1 12"></path></svg>
                        Partager
                    </button>
                </div>
            </div>

            <!-- Stats -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div style="background-color: white; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.5rem; text-align: center;">
                    <div style="font-size: 1.75rem; margin-bottom: 0.5rem;">👥</div>
                    <p style="font-size: 1.5rem; font-weight: 700; color: #0f766e; margin: 0;">5</p>
                    <p style="font-size: 0.85rem; color: #64748b; text-transform: uppercase; font-weight: 500; margin: 0.5rem 0 0 0;">Filleuls actifs</p>
                </div>
                <div style="background-color: white; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.5rem; text-align: center;">
                    <div style="font-size: 1.75rem; margin-bottom: 0.5rem;">📦</div>
                    <p style="font-size: 1.5rem; font-weight: 700; color: #0f766e; margin: 0;">8</p>
                    <p style="font-size: 0.85rem; color: #64748b; text-transform: uppercase; font-weight: 500; margin: 0.5rem 0 0 0;">Commandes générées</p>
                </div>
                <div style="background-color: white; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.5rem; text-align: center;">
                    <div style="font-size: 1.75rem; margin-bottom: 0.5rem;">💵</div>
                    <p style="font-size: 1.5rem; font-weight: 700; color: #14b8a6; margin: 0;">42€</p>
                    <p style="font-size: 0.85rem; color: #64748b; text-transform: uppercase; font-weight: 500; margin: 0.5rem 0 0 0;">Gains totaux</p>
                </div>
                <div style="background-color: white; border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.5rem; text-align: center;">
                    <div style="font-size: 1.75rem; margin-bottom: 0.5rem;">🏆</div>
                    <p style="font-size: 1.5rem; font-weight: 700; color: #f97316; margin: 0;">12€</p>
                    <p style="font-size: 0.85rem; color: #64748b; text-transform: uppercase; font-weight: 500; margin: 0.5rem 0 0 0;">En attente</p>
                </div>
            </div>

            <!-- Tiers -->
            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 style="margin: 0;">🎯 Paliers & récompenses</h3>
                    <span style="color: #f97316; font-size: 0.9rem; font-weight: 600;">Vous êtes en palier <strong>Gold</strong> ⭐</span>
                </div>

                <!-- Tier 1 - Starter -->
                <div style="border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.5rem; margin-bottom: 1rem; background-color: #f0fdf4;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="font-size: 2rem;">🥉</div>
                            <div>
                                <h4 style="font-size: 1.1rem; font-weight: 600; color: #1e293b; margin: 0;">Starter</h4>
                                <p style="font-size: 0.85rem; color: #64748b; margin: 0;">Dès le 1er filleul</p>
                            </div>
                        </div>
                        <div>
                            <p style="font-size: 1rem; font-weight: 600; color: #14b8a6; margin: 0;">10% commission</p>
                            <p style="font-size: 0.8rem; color: #64748b; text-align: right; margin: 0.25rem 0 0 0;">
                                <span style="background-color: #14b8a6; color: white; padding: 0.2rem 0.6rem; border-radius: 0.3rem; font-size: 0.75rem;">Atteint</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tier 2 - Silver -->
                <div style="border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.5rem; margin-bottom: 1rem; background-color: #f0fdf4;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="font-size: 2rem;">🥈</div>
                            <div>
                                <h4 style="font-size: 1.1rem; font-weight: 600; color: #1e293b; margin: 0;">Silver</h4>
                                <p style="font-size: 0.85rem; color: #64748b; margin: 0;">3 filleuls actifs</p>
                            </div>
                        </div>
                        <div>
                            <p style="font-size: 1rem; font-weight: 600; color: #14b8a6; margin: 0;">12% + 5€ bonus/mois</p>
                            <p style="font-size: 0.8rem; color: #64748b; text-align: right; margin: 0.25rem 0 0 0;">
                                <span style="background-color: #14b8a6; color: white; padding: 0.2rem 0.6rem; border-radius: 0.3rem; font-size: 0.75rem;">Atteint</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tier 3 - Gold (Current) -->
                <div style="border: 2px solid #fbbf24; border-radius: 1rem; padding: 1.5rem; margin-bottom: 1rem; background-color: #fffbeb;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="display: flex; align-items: center; gap: 1rem; flex: 1;">
                            <div style="font-size: 2rem;">⭐</div>
                            <div style="flex: 1;">
                                <h4 style="font-size: 1.1rem; font-weight: 600; color: #1e293b; margin: 0;">Gold</h4>
                                <p style="font-size: 0.85rem; color: #64748b; margin: 0;">5 filleuls actifs</p>
                                <p style="font-size: 0.8rem; color: #64748b; margin: 0.5rem 0 0 0;">5 / 10 filleuls vers Platinum</p>
                                <div style="width: 100%; height: 6px; background-color: #e2e8f0; border-radius: 9999px; margin-top: 0.75rem;">
                                    <div style="width: 50%; height: 100%; background-color: #14b8a6; border-radius: 9999px;"></div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <p style="font-size: 1rem; font-weight: 600; color: #0f766e; margin: 0;">15% + 10€ bonus/mois</p>
                            <p style="font-size: 0.8rem; color: white; text-align: right; margin: 0.25rem 0 0 0;">
                                <span style="background-color: #f97316; color: white; padding: 0.2rem 0.6rem; border-radius: 0.3rem; font-size: 0.75rem;">Actuel</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tier 4 - Platinum -->
                <div style="border: 1px solid #e2e8f0; border-radius: 1rem; padding: 1.5rem; margin-bottom: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="font-size: 2rem;">💎</div>
                            <div>
                                <h4 style="font-size: 1.1rem; font-weight: 600; color: #1e293b; margin: 0;">Platinum</h4>
                                <p style="font-size: 0.85rem; color: #64748b; margin: 0;">10 filleuls actifs</p>
                            </div>
                        </div>
                        <div>
                            <p style="font-size: 1rem; font-weight: 600; color: #14b8a6; margin: 0;">18% + 20€ bonus/mois</p>
                            <p style="font-size: 0.8rem; color: #64748b; text-align: right; margin: 0.25rem 0 0 0;">
                                <span style="background-color: #cbd5e1; color: #64748b; padding: 0.2rem 0.6rem; border-radius: 0.3rem; font-size: 0.75rem;">Verrouillé</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Referrals History -->
            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 style="margin: 0;">📋 Historique des filleuls</h3>
                    <button class="btn" style="background-color: white; color: #64748b; border: 1px solid #e2e8f0; padding: 0.5rem 1.25rem; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1.25rem; height: 1.25rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Exporter
                    </button>
                </div>

                <!-- Referrals Table -->
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                                <th style="text-align: left; padding: 1rem; font-size: 0.8rem; font-weight: 600; color: #64748b; text-transform: uppercase;">Filleul</th>
                                <th style="text-align: left; padding: 1rem; font-size: 0.8rem; font-weight: 600; color: #64748b; text-transform: uppercase;">Inscrit le</th>
                                <th style="text-align: center; padding: 1rem; font-size: 0.8rem; font-weight: 600; color: #64748b; text-transform: uppercase;">Commandes</th>
                                <th style="text-align: right; padding: 1rem; font-size: 0.8rem; font-weight: 600; color: #64748b; text-transform: uppercase;">Ça généré</th>
                                <th style="text-align: right; padding: 1rem; font-size: 0.8rem; font-weight: 600; color: #64748b; text-transform: uppercase;">Ma commission</th>
                                <th style="text-align: right; padding: 1rem; font-size: 0.8rem; font-weight: 600; color: #64748b; text-transform: uppercase;">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #e2e8f0;">
                                <td style="padding: 1rem;">
                                    <p style="margin: 0; font-weight: 600; color: #1e293b;">Kofi A.</p>
                                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: #64748b;">kofi.a@mail.com</p>
                                </td>
                                <td style="padding: 1rem; color: #64748b;">15/01/2026</td>
                                <td style="padding: 1rem; text-align: center; color: #64748b; font-weight: 500;">2</td>
                                <td style="padding: 1rem; text-align: right; color: #64748b; font-weight: 500;">110€</td>
                                <td style="padding: 1rem; text-align: right; color: #14b8a6; font-weight: 600;">+11€</td>
                                <td style="padding: 1rem; text-align: right;">
                                    <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #14b8a6; margin-right: 0.5rem;"></span>
                                    <span style="font-size: 0.85rem; font-weight: 600; color: #14b8a6;">Payée</span>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #e2e8f0;">
                                <td style="padding: 1rem;">
                                    <p style="margin: 0; font-weight: 600; color: #1e293b;">Léa B.</p>
                                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: #64748b;">lea.b@mail.com</p>
                                </td>
                                <td style="padding: 1rem; color: #64748b;">14/02/2026</td>
                                <td style="padding: 1rem; text-align: center; color: #64748b; font-weight: 500;">3</td>
                                <td style="padding: 1rem; text-align: right; color: #64748b; font-weight: 500;">203€</td>
                                <td style="padding: 1rem; text-align: right; color: #14b8a6; font-weight: 600;">+20.3€</td>
                                <td style="padding: 1rem; text-align: right;">
                                    <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #14b8a6; margin-right: 0.5rem;"></span>
                                    <span style="font-size: 0.85rem; font-weight: 600; color: #14b8a6;">Payée</span>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #e2e8f0;">
                                <td style="padding: 1rem;">
                                    <p style="margin: 0; font-weight: 600; color: #1e293b;">Omar S.</p>
                                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: #64748b;">omar.s@mail.com</p>
                                </td>
                                <td style="padding: 1rem; color: #64748b;">28/02/2026</td>
                                <td style="padding: 1rem; text-align: center; color: #64748b; font-weight: 500;">1</td>
                                <td style="padding: 1rem; text-align: right; color: #64748b; font-weight: 500;">79€</td>
                                <td style="padding: 1rem; text-align: right; color: #f97316; font-weight: 600;">+7.9€</td>
                                <td style="padding: 1rem; text-align: right;">
                                    <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #f97316; margin-right: 0.5rem;"></span>
                                    <span style="font-size: 0.85rem; font-weight: 600; color: #f97316;">En attente</span>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #e2e8f0;">
                                <td style="padding: 1rem;">
                                    <p style="margin: 0; font-weight: 600; color: #1e293b;">Emma V.</p>
                                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: #64748b;">emma.v@mail.com</p>
                                </td>
                                <td style="padding: 1rem; color: #64748b;">25/02/2026</td>
                                <td style="padding: 1rem; text-align: center; color: #64748b; font-weight: 500;">2</td>
                                <td style="padding: 1rem; text-align: right; color: #64748b; font-weight: 500;">94€</td>
                                <td style="padding: 1rem; text-align: right; color: #f97316; font-weight: 600;">+9.4€</td>
                                <td style="padding: 1rem; text-align: right;">
                                    <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #f97316; margin-right: 0.5rem;"></span>
                                    <span style="font-size: 0.85rem; font-weight: 600; color: #f97316;">En attente</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 1rem;">
                                    <p style="margin: 0; font-weight: 600; color: #1e293b;">Chloé R.</p>
                                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: #64748b;">chloe.r@mail.com</p>
                                </td>
                                <td style="padding: 1rem; color: #64748b;">01/03/2026</td>
                                <td style="padding: 1rem; text-align: center; color: #64748b; font-weight: 500;">1</td>
                                <td style="padding: 1rem; text-align: right; color: #64748b; font-weight: 500;">25€</td>
                                <td style="padding: 1rem; text-align: right; color: #f97316; font-weight: 600;">+2.5€</td>
                                <td style="padding: 1rem; text-align: right;">
                                    <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #14b8a6; margin-right: 0.5rem;"></span>
                                    <span style="font-size: 0.85rem; font-weight: 600; color: #14b8a6;">En cours</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Stats -->
                <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1.5rem; border-top: 1px solid #e2e8f0; margin-top: 1.5rem;">
                    <p style="color: #64748b; font-size: 0.95rem; margin: 0;">
                        <strong>5 filleuls</strong> • Total généré : <strong style="color: #14b8a6;">511€</strong>
                    </p>
                    <button class="btn btn-primary" style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg style="width: 1.25rem; height: 1.25rem;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        Retirer mes gains (30€)
                    </button>
                </div>
            </div>
        </div>
        <div id="security" class="tab-content">
            <!-- Password Section -->
            <div class="form-section">
                <h3>🔐 Mot de passe</h3>
                <div class="form-grid" style="grid-template-columns: 1fr;">
                    <div class="form-group">
                        <label for="current-password">MOT DE PASSE ACTUEL</label>
                        <input type="password" id="current-password" placeholder="••••••••">
                    </div>
                </div>
                <div class="form-grid" style="margin-top: 1.5rem;">
                    <div class="form-group">
                        <label for="new-password">NOUVEAU MOT DE PASSE</label>
                        <input type="password" id="new-password" placeholder="••••••••">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">CONFIRMER LE NOUVEAU</label>
                        <input type="password" id="confirm-password" placeholder="••••••••">
                    </div>
                </div>
                <div style="margin-top: 1rem; margin-bottom: 1.5rem;">
                    <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 0.75rem;">Force du mot de passe</p>
                    <div style="display: flex; gap: 0.5rem;">
                        <div style="flex: 1; height: 6px; background-color: #cbd5e1; border-radius: 9999px;"></div>
                        <div style="flex: 1; height: 6px; background-color: #cbd5e1; border-radius: 9999px;"></div>
                        <div style="flex: 1; height: 6px; background-color: #cbd5e1; border-radius: 9999px;"></div>
                        <div style="flex: 1; height: 6px; background-color: #cbd5e1; border-radius: 9999px;"></div>
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-primary">Changer le mot de passe</button>
                </div>
            </div>

            <!-- 2FA Section -->
            <div class="form-section">
                <h3>🛡️ Authentification à deux facteurs</h3>
                <div class="preferences-list">
                    <div class="preference-item">
                        <div class="preference-content">
                            <h4>Activer la 2FA</h4>
                            <p>Protégez votre compte avec une double vérification</p>
                        </div>
                        <button class="toggle-switch" onclick="toggleSwitch(this)"></button>
                    </div>
                    <div class="preference-item">
                        <div class="preference-content">
                            <h4>Alertes de connexion par email</h4>
                            <p>Recevez un email à chaque nouvelle connexion</p>
                        </div>
                        <button class="toggle-switch active" onclick="toggleSwitch(this)"></button>
                    </div>
                </div>
            </div>

            <!-- Sensitive Zone -->
            <div class="form-section" style="background-color: #fee2e2; border-left: 4px solid #ef4444;">
                <h3 style="color: #ef4444;">⚠️ Zone sensible</h3>
                <p style="color: #64748b; margin-bottom: 1.5rem;">La suppression de votre compte est irréversible. Toutes vos données, commandes et gains d'affiliation seront définitivement effacés.</p>
                <button class="btn" style="background-color: #fee2e2; color: #ef4444; border: 1.5px solid #ef4444;">🗑️ Supprimer mon compte</button>
            </div>
        </div>

      
    </div>

    <script>
        function switchTab(event, tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Remove active class from all tabs
            document.querySelectorAll('.tab-item').forEach(item => {
                item.classList.remove('active');
            });

            // Show selected tab
            document.getElementById(tabName).classList.add('active');
            event.currentTarget.classList.add('active');
        }

        function toggleSwitch(button) {
            button.classList.toggle('active');
        }
    </script>
</x-user-layout>
