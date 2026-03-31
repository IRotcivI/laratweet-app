@extends('back.app')

@section('title', 'Profile')

@section('header')
    <nav class="navbar">
        <div class="page-header">
            <h1 class="page-title">Profile</h1>
            <div class="page-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <span>/</span>
                <span>Profile</span>
            </div>

            @if (session('status'))
                <div class="alert alert-success" style="margin-top: 30px;">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="navbar-right">
            <button class="nav-btn" id="theme-toggle" title="Toggle Light/Dark Mode">
                <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/>
                    <path d="M4.93 4.93l1.41 1.41"/><path d="M17.66 17.66l1.41 1.41"/>
                    <path d="M2 12h2"/><path d="M20 12h2"/>
                    <path d="M6.34 17.66l-1.41 1.41"/><path d="M19.07 4.93l-1.41 1.41"/>
                </svg>
                <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                </svg>
            </button>
        </div>
    </nav>
@endsection

@section('content')
<div class="glass-card">
    <div class="settings-tab-content active" id="tab-profile">
        
        <div class="profile-header">
            <div class="profile-avatar-square">
                <a href="{{ Auth::user()->image ? asset('back_auth/assets/profile/' . Auth::user()->image) : '#' }}" target="_blank">
                    <img src="{{ Auth::user()->image ? asset('back_auth/assets/profile/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&size=150&background=random' }}" 
                         alt="Photo de profil">
                </a>
            </div>
            <div class="profile-info">
                <h2>{{ Auth::user()->name }}</h2>
                <p>{{ Auth::user()->email }} • Administrator</p>
            </div>
        </div>

        <div class="settings-section">
            <h3 class="settings-section-title">Paramètres du profil</h3>
            
            <form method="POST" action="{{ route('profile.update') }}" class="settings-form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="form-grid">
                    <div class="form-group-settings">
                        <label>Nom / Prénom</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="glass-input" />
                        @error('name') <span class="error-message" style="color: var(--danger); font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group-settings">
                        <label>Adresse email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="glass-input" />
                        @error('email') <span class="error-message" style="color: var(--danger); font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group-settings" style="grid-column: 1 / -1;">
                        <label for="image">Photo de profil</label>
                        <div class="file-input-wrapper">
                            <input type="file" name="image" id="image" class="file-input-hidden" onchange="updateFileName(this)" />
                            <label for="image" class="btn-file-glass">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span id="file-name-text">Changer l'image</span>
                            </label>
                        </div>
                        @error('image')
                            <span class="error-message" style="color: var(--danger); font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="btn-group" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" style="width: auto;">Sauvegarder les modifications</button>
                </div>
            </form>
        </div>

        <hr style="border: 0; border-top: 1px solid var(--glass-border); margin: 40px 0;">

        <div class="settings-section">
            <h3 class="settings-section-title">Changer le mot de passe</h3>
            
            <form method="POST" action="{{ route('password.update') }}" class="settings-form">
                @csrf
                @method('PUT')
                
                <div class="form-grid">
                    <div class="form-group-settings" style="grid-column: 1 / -1;">
                        <label>Mot de passe actuel</label>
                        <input type="password" name="current_password" placeholder="Entrez votre mot de passe actuel" class="glass-input" />
                        @error('current_password') <span style="color: var(--danger); font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group-settings">
                        <label>Nouveau mot de passe</label>
                        <input type="password" name="password" placeholder="Nouveau mot de passe" class="glass-input" />
                        @error('password') <span style="color: var(--danger); font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group-settings">
                        <label>Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" class="glass-input" />
                    </div>
                </div>

                <div class="btn-group" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" style="width: auto;">Mettre à jour le mot de passe</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection