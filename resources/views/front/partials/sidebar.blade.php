<nav class="public-nav glass-card" style="margin: 20px; border-radius: 15px;">
    <div class="sidebar-header"
        style="padding: 15px 30px; display: flex; justify-content: space-between; align-items: center;">
        <div class="logo">
            <span class="logo-icon"></span>
            <span class="logo-text">L<span>T</span></span>
        </div>
        <div class="nav-links">
            <a href="{{ route('home') }}" class="card-btn">Accueil</a>
            @foreach ($categories as $category)
                <a href="{{ route('home.category', $category->id) }}" class="card-btn">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</nav>
