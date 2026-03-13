<x-admin-layout>
    <x-slot name="title">
        Pays et Disponibilité
    </x-slot>

    <x-slot name="country"> active </x-slot>

    <div class="pgh fu">
        <div><div class="pgh-t">Pays et Disponibilité</div><div class="pgh-s">Configurez les pays desservis et leurs paramètres</div></div>
        <button class="btn btn-p">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Ajouter un pays
        </button>
    </div>

    <!--div class="sgrid">
        <div class="sm fu">
            <div class="sml">Pays actifs</div>
            <div class="smv">3</div>
            <div class="sms">France, Bénin, Côte d'Ivoire</div>
        </div>
        <div class="sm fu" style="animation-delay:.05s">
            <div class="sml">Transporteurs</div>
            <div class="smv">5</div>
            <div class="sms">Colissimo, DHL, FedEx…</div>
        </div>
        <div class="sm fu" style="animation-delay:.1s">
            <div class="sml">Délai moyen</div>
            <div class="smv">3.8j</div>
            <div class="sms">Tous pays confondus</div>
        </div>
        <div class="sm fu" style="animation-delay:.15s">
            <div class="sml">Couverture</div>
            <div class="smv">3 pays</div>
            <div class="sms">Expansion prévue Q2</div>
        </div>
    </div-->

    <div class="pg-grid fu" style="animation-delay:.2s">
       @foreach($countries as $country)
            <form action="{{ route('admin_country_update', $country->id) }}" method="POST" class="country-card">
                @csrf
                @method('PUT')
                <div class="cc-header">
                    <div style="display:flex;align-items:center">
                        <span class="cc-flag">{{$country->code}}</span>
                        <div>
                            <div class="cc-name">{{$country->name}}</div>
                            <div style="font-size:12px;color:var(--muted)">{{$country->localisation}}</div>
                        </div>
                    </div>
                    @if($country->is_active)
                        <span class="bdg b-act">Actif</span>
                    @else
                        <span class="bdg b-inact">Inactif</span>
                    @endif
                </div>
                <div class="cc-body">
                    <div>
                        <label class="fl">Devise</label>
                        <input class="fi" type="text" name="devise" value="{{$country->devise}}" />
                    </div>
                    <div>
                        <label class="fl">Délai livraison</label>
                        <input class="fi" type="text" name="delivery_delai" value="{{$country->delivery_delai}}" />
                    </div>
                    <div>
                        <label class="fl">Transporteurs</label>
                        <input class="fi" type="text" name="transporteur" value="{{$country->transporteur}}" />
                    </div>
                    <div>
                        <label class="fl">Frais de port</label>
                        <input class="fi" type="number" name="delivery_price" value="{{$country->delivery_price}}" />
                    </div>
                    <div style="grid-column:1/-1">
                        <label class="fl">Occasions actives</label>
                        <!-- <div class="occ-tags">
                            <span class="bdg b-act">🎄 Noël</span>
                            <span class="bdg b-act">🌙 Ramadan</span>
                            <span class="bdg b-act">🎂 Anniversaire</span>
                            <span class="bdg b-act">💍 Mariage</span>
                        </div> -->
                    </div>
                </div>
                <div class="cc-foot">
                    <button type="submit" class="btn btn-p" style="flex:1" {{ $country->is_active ? '' : 'disabled' }}>
                        Enregistrer modification
                    </button>

                    <a href="{{ route('admin_country_toggle_status',$country->id) }}" class="btn {{$country->is_active ? 'b-canc' : 'btn-o'}} ">
                        {{$country->is_active ? 'Désactiver' : 'Activer'}}
                    </a>
                </div>
            </form>
        @endforeach
    </div>

</x-admin-layout>
