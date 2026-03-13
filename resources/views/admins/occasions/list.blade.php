<x-admin-layout>
    <x-slot name="title">
        Occasions 
    </x-slot>
    <x-slot name="occasion" > active </x-slot>


    <div class="breadcrumb">
        <a href="admin.html">Dashboard</a>
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span style="color:var(--ink);font-weight:600">Occasions</span>
    </div>

    <div class="pgh fu">
        <div><div class="pgh-t">Occasions et Disponibilité</div><div class="pgh-s">8 occasions configurées · Activez/désactivez par pays</div></div>
        <button class="btn btn-p" onclick="openCreateModal()"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>Nouvelle occasion</button>
    </div>

    <div class="fu" style="animation-delay:.1s">

        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:14px">
            @foreach($occasions as $occasion)
                <div class="occ-card">
                    <div class="occ-header">
                        <div class="occ-emoji">{{ $occasion->emoji }}</div>
                        <div style="flex:1">
                            <div style="font-family:var(--serif);font-size:16px;font-weight:700">{{ $occasion->name }}</div>
                            <div style="font-size:12px;color:var(--muted)">
                                0 catégories · 0 ventes
                            </div>
                        </div>
                        @php
                            $statusClass = match($occasion->status) {
                                'active' => 'b-act',
                                'disactive' => 'b-dis',
                                'comming' => 'b-soon',
                                default => 'b-dis'
                            };
                            $statusLabel = match($occasion->status) {
                                'active' => 'Active',
                                'disactive' => 'Inactive',
                                'comming' => 'Bientôt',
                                default => 'Inactive'
                            };
                        @endphp
                        <span class="bdg {{ $statusClass }}">{{ $statusLabel }}</span>
                        <button class="btn btn-o btn-s" onclick='openEditModal({{$occasion}})'>Éditer</button>
                    </div>

                    <div class="occ-body">
                        @foreach($occasion->countries as $country)
                            @php
                                $isActive = $country->pivot->date_activate === null || $country->pivot->date_activate <= now()->toDateString();
                            @endphp
                            <div class="country-row">
                                <div class="country-info">
                                    <span style="font-size:20px">{{ $country->drapeau }}</span>
                                    <div>
                                        <div style="font-size:13px;font-weight:600">{{ $country->name }}</div>
                                        <div style="font-size:11.5px;color:var(--muted)">
                                            {{ $isActive ? 'Essentielle · Premium · Luxe' : 'Non disponible' }}
                                        </div>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:center;gap:12px">
                                    <div class="country-stats">
                                        {{ $isActive ? ($country->pivot->sales_count ?? '—') . ' ventes · ' . ($country->pivot->sales_percent ?? '—') . '%' : '—' }}
                                    </div>
                                    <label class="sw">
                                        <input type="checkbox" {{ $isActive ? 'checked' : '' }}>
                                        <span class="sld"></span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- MODAL ÉDITION / CRÉATION -->
    <div class="edit-modal" id="editModal" onclick="if(event.target===this)closeModal()">
        <div class="modal-box">
            <form id="occasionForm" method="POST" action="{{ route('admin_occasions_store') }}" enctype="multipart/form-data">
                @csrf
                <span id="methodField"></span>

                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px">
                    <div style="font-family:var(--serif);font-size:18px;font-weight:700" id="modalTitle">
                        Nouvelle occasion
                    </div>

                    <button type="button" onclick="closeModal()" style="background:none;border:none;cursor:pointer;color:var(--muted)">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="form-grid">

                    <div>
                        <label class="fl">Emoji</label>
                        <input class="fi" name="emoji" id="mEmoji">
                    </div>

                    <div>
                        <label class="fl">Nom</label>
                        <input class="fi" name="name" id="mNom">
                    </div>

                    <div class="form-full">
                        <label class="fl">Description</label>
                        <textarea class="fi" name="description" id="mDescription" rows="2" style="resize:vertical"></textarea>
                    </div>

                    <div>
                        <label class="fl">Statut</label>
                        <select class="fi fsel" name="status" id="mStatus">
                            <option value="active">Active</option>
                            <option value="comming">Bientôt</option>
                            <option value="disactive">Inactive</option>
                        </select>
                    </div>

                    <div>
                        <label class="fl">Date de lancement</label>
                        <input class="fi" type="date" name="date_start" id="mDate">
                    </div>

                    <div class="form-full">
                        <label class="fl">Image</label>
                        <input class="fi" type="file" name="picture">
                    </div>

                    <div class="form-full">
                        <label class="fl" style="margin-bottom:10px">Disponibilité par pays</label>

                        <div style="display:flex;flex-direction:column;gap:8px">

                            @foreach($countries as $country)

                            <div style="display:flex;justify-content:space-between;align-items:center">

                                <span style="font-size:13px;font-weight:500">
                                    {{ $country->drapeau }} {{ $country->name }}
                                </span>

                                <label class="sw">
                                    <input type="checkbox"
                                        name="countries_code[]"
                                        value="{{ $country->code }}"
                                        class="countryCheck">
                                    <span class="sld"></span>
                                </label>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

                <div style="display:flex;gap:10px;margin-top:20px">
                    <button type="button" class="btn btn-o" style="flex:1" onclick="closeModal()">Annuler</button>

                    <button type="submit" class="btn btn-p" style="flex:2">
                        Enregistrer
                    </button>
                </div>

            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        function openCreateModal(){

            let form = document.getElementById('occasionForm')

            document.getElementById('modalTitle').innerText = "Nouvelle occasion"

            form.action = "{{ route('admin_occasions_store') }}"

            document.getElementById('methodField').innerHTML = ""

            form.reset()

            document.querySelectorAll('.countryCheck').forEach(el => el.checked=false)

            document.getElementById('editModal').classList.add('open')
        }

        function openEditModal(occasion) {
            console.log(occasion);

            document.getElementById('modalTitle').textContent = 'Éditer — ' + occasion.name;
            const form = document.getElementById('occasionForm');

            form.action = '/occasions/' + occasion.id;
           // document.getElementById('formMethod').value = 'PUT';

            document.getElementById('mNom').value = occasion.name;
            /*document.getElementById('mEmoji').value = occasion.emoji || '';
            document.getElementById('mDescription').value = occasion.description || '';
            document.getElementById('mStatus').value = occasion.status || 'active';
            document.getElementById('mDateStart').value = occasion.date_start || '';

            // Pré-remplir les checkboxes pays
            const selectedCountries = occasion.countries?.map(c => c.code) || [];
            document.querySelectorAll('input[name="countries_code[]"]').forEach(checkbox => {
                checkbox.checked = selectedCountries.includes(checkbox.value);
            });

            // Optionnel : pré-remplir date_activate
            document.querySelectorAll('input[name="countries_date_activate[]"]').forEach((input, idx) => {
                const country = occasion.countries?.[idx];
                input.value = country?.pivot?.date_activate || '';
            });*/

            document.getElementById('editModal').classList.add('open');
        }

        function closeModal(){
            document.getElementById('editModal').classList.remove('open')
        }
    </script>
    @endpush
    
</x-admin-layout>