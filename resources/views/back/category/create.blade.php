@extends('back.app')

@section('title', 'Categories')

@section('header')
    <nav class="navbar">
                <div class="page-header">
                    <h1 class="page-title">Categories</h1>
                    <div class="page-breadcrumb">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                        <span>/</span>
                        <span>Categories</span>
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
        <div class="settings-section">
            <h3 class="settings-section-title">@if(isset($category)) Détails de la catégorie @else Nouvelle catégorie @endif</h3>
            
            <form method="POST" action="{{ isset($category) ? route('category.update', $category) : route('category.store') }}" class="settings-form" enctype="multipart/form-data">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                
                <div class="form-grid">
                    <div class="form-group-settings" style="grid-column: 1 / -1;">
                        <label for="content">Nom</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="glass-input" 
                            placeholder="Nom de la catégorie"
                            style="width: 100%;"
                            value="{{ isset($category) ? $category->name : old('name') }}">
                        
                        @error('content')
                            <span class="error-message" style="color: var(--danger); font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div> <div class="btn-group" style="margin-top: 30px;">
                    <button type="submit" class="btn btn-primary" style="width: auto; min-width: 150px;">
                        @if(isset($category)) Mettre à jour @else Ajouter @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection