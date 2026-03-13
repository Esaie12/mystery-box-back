<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MBG Admin - {{$title}}</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="{{asset('assets/admin.css')}}">
</head>
<body>
    <div id="ov" onclick="mob_c()"></div>
    
    <aside id="sb">

        <button id="tb" onclick="tgl()">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <div class="slo">
            <div class="sli">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V11"/>
                </svg>
            </div>

            <div>
                <div class="st">Mystery Box</div>
                <div class="ss">Global · Admin</div>
            </div>
        </div>

        @include('admins.admin_menu')

        <div class="sfo">
            <div class="sav">E</div>
            <div class="sft">
                <div class="sfn">Esaïe O.</div>
                <div class="sfr">Administrateur</div>
            </div>
        </div>

    </aside>

    <div id="main">
        <header class="topbar">
            <button class="burger" onclick="mob_o()"><svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
                <span class="t-title">{{$title}}</span>
                <div class="t-right">
                    <a href="admin-notifications.html" class="t-btn" style="position:relative" title="Notifications">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span style="position:absolute;top:4px;right:4px;min-width:16px;height:16px;border-radius:999px;background:var(--red);border:1.5px solid white;font-size:9px;font-weight:700;color:white;display:flex;align-items:center;justify-content:center;padding:0 3px;font-family:var(--sans)" id="notifBadge">7</span>
                    </a>
                    <button class="t-btn" title="Se déconnecter" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:var(--red)" onmouseenter="this.style.background='#fef2f2'" onmouseleave="this.style.background=''">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                    </form>

                    <div class="tav">E</div>
                </div>
        </header>
        <div class="pc">
            {{$slot}}        
        </div>
    </div>

  <script>
    function tgl(){document.getElementById('sb').classList.toggle('col')}
    function mob_o(){document.getElementById('sb').classList.add('mo');document.getElementById('ov').classList.add('show')}
    function mob_c(){document.getElementById('sb').classList.remove('mo');document.getElementById('ov').classList.remove('show')}
  </script>

    @stack('scripts')

</body>
</html>