@extends('back.app')

@section('title', isset($post) ? 'Modifier le Post' : 'Créer un Post')

@section('header')
    <nav class="navbar">
        <div class="page-header">
            <h1 class="page-title">
                @if (isset($post))
                    Modifier le post
                @else
                    Créer un post
                @endif
            </h1>
            <div class="page-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <span>/</span>
                <span>Posts</span>
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
                    <circle cx="12" cy="12" r="4" />
                    <path d="M12 2v2" />
                    <path d="M12 20v2" />
                    <path d="M4.93 4.93l1.41 1.41" />
                    <path d="M17.66 17.66l1.41 1.41" />
                    <path d="M2 12h2" />
                    <path d="M20 12h2" />
                    <path d="M6.34 17.66l-1.41 1.41" />
                    <path d="M19.07 4.93l-1.41 1.41" />
                </svg>
                <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    style="display: none;">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                </svg>
            </button>
        </div>
    </nav>
@endsection

@section('content')
    <div class="glass-card">
        <div class="settings-tab-content active" id="tab-profile">
            <div class="settings-section">
                <h3 class="settings-section-title">
                    @if (isset($post))
                        Détails du post
                    @else
                        Nouveau post
                    @endif
                </h3>

                <form method="POST" action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}"
                    class="settings-form" enctype="multipart/form-data">
                    @csrf
                    @if (isset($post))
                        @method('PUT')
                    @endif

                    <div class="form-grid">
                        <div class="form-group-settings" style="grid-column: 1 / -1;">
                            <label for="content">Contenu du post</label>
                            <textarea name="content" id="content" rows="6" class="glass-input"
                                placeholder="Que voulez-vous partager aujourd'hui ?" style="width: 100%; min-height: 150px; resize: vertical;">{{ isset($post) ? $post->content : old('content') }}</textarea>

                            @error('content')
                                <span class="error-message"
                                    style="color: var(--danger); font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group-settings">
                            <label for="image">Illustration du post</label>
                            <div class="file-input-wrapper">
                                <input type="file" name="image" id="image" class="file-input-hidden"
                                    onchange="updateFileName(this)" />
                                <label for="image" class="btn-file-glass">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span id="file-name-text">
                                        @if (isset($post))
                                            Changer l'image
                                        @else
                                            Choisir une image
                                        @endif
                                    </span>
                                </label>
                            </div>
                            @error('image')
                                <span class="error-message"
                                    style="color: var(--danger); font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group-settings">
                            <label for="category_id">Catégorie</label>
                            <select name="category_id" id="category_id" class="glass-input"
                                style="width: 100%; background: var(--bg-dark); color: white; border: 1px solid var(--glass-border); padding: 10px; border-radius: 8px;">
                                <option value="">-- Choisir une catégorie --</option>
                                @foreach ($category as $categories)
                                    <option @if (isset($post)) @selected($post->category_id == $categories->id) @endif
                                        value="{{ $categories->id }}"> {{ $categories->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group-settings" style="grid-column: 1 / -1;">
                            <label for="tag-typer">Tags du post</label>

                            <input type="text" id="tag-typer" name="tags" class="glass-input"
                                placeholder="Tapez un tag et appuyez sur Entrée ou virgule..." autocomplete="off">

                            <div id="tags-wrapper" class="tags-display-container"></div>

                            <input type="hidden" name="tags" id="hidden-tags"
                                value="{{ isset($post) ? implode(',', $post->tagNames()) : old('tags') }}">
                        </div>

                        <div class="form-group-settings">
                            <label>Visibilité du post</label>
                            <div class="status-toggle-container">
                                <input type="radio" name="status" id="status-draft" value="0"
                                    {{ (isset($post) && $post->status == 0) || old('status') == 0 ? 'checked' : '' }}
                                    {{ !isset($post) && !old('status') ? 'checked' : '' }}>
                                <label for="status-draft" class="status-option draft">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    Brouillon
                                </label>

                                <input type="radio" name="status" id="status-public" value="1"
                                    {{ (isset($post) && $post->status == 1) || old('status') == 1 ? 'checked' : '' }}>
                                <label for="status-public" class="status-option public">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>
                                    Public
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group" style="margin-top: 30px;">
                        <button type="submit" class="btn btn-primary" style="width: auto; min-width: 150px;">
                            @if (isset($post))
                                Mettre à jour
                            @else
                                Publier
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
