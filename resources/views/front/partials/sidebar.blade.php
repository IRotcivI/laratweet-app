<nav class="sidebar glass-card">
    <div class="sidebar-content">
        <div class="logo" style="margin-bottom: 20px;">
            <span class="logo-icon"></span>
            <span class="logo-text">L<span>T</span></span>
        </div>

        <div class="nav-links">
            <p class="nav-section-title">Menu Principal</p>
            <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="fas fa-home" style="margin-right: 10px;"></i> Vue d'ensemble
            </a>
            
            <hr class="divider" style="opacity: 0.1; margin: 15px 0;">

            <p class="nav-section-title">Explorer par Thèmes</p>
            
            {{-- On peut imaginer un petit compteur si ton CSS le permettait, 
                 sinon on reste sur le nom simple --}}
            @foreach ($categories as $category)
                <a href="{{ route('home.category', $category->id) }}"
                    class="nav-item {{ request()->fullUrlIs(route('home.category', $category->id)) ? 'active' : '' }}">
                    <i class="fas fa-folder" style="font-size: 0.8rem; margin-right: 10px; opacity: 0.5;"></i>
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <div class="sidebar-footer" style="padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05);">
            @auth
                <p class="nav-section-title" style="margin-bottom: 10px;">Compte</p>
                <a href="#" class="nav-item">Mon Profil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="card-btn" style="width: 100%; border: none; cursor: pointer;">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="card-btn" style="display: block; text-align: center;">Accès Membre</a>
            @endauth
        </div>
    </div>
</nav>
