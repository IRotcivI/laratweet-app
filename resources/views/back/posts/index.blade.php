@extends('back.app')

@section('title', 'Posts')

@section('header')
    <nav class="navbar">
                <div class="page-header">
                    <h1 class="page-title">Posts</h1>
                    <div class="page-breadcrumb">
                        <a href="index.html">Dashboard</a>
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
<div class="glass-card table-card">
    <div class="card-header">
        <div class="card-info">
            <h3 class="card-title">Liste des Posts</h3>
            <p class="card-subtitle">Gérez les publications récentes</p>
        </div>
        <div class="card-actions">
            <a href="{{ route('posts.create') }}" class="btn btn-primary" style="padding: 8px 16px; font-size: 13px;">
                + Nouveau Post
            </a>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Contenu</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <div class="profile-avatar-sidebar">
                            <img src="{{ $post->image ? asset('back_auth/assets/posts/' . $post->image) : asset('images/default-post.jpg') }}" alt="Post image">
                        </div>
                    </td>
                    <td>
                        <div class="table-user-info">
                            <span class="table-user-email">{{ Str::limit($post->content, 50) }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="table-user-info">
                            <span class="table-user-email">{{ $post->user->name }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="table-amount">{{ $post->created_at->format('d/m/Y') }}</div>
                    </td>
                    <td>
                        @if($post->status == 1)
                            <span class="status-badge completed">Publié</span>
                        @else
                            <span class="status-badge pending">Brouillon</span>
                        @endif
                    </td>
                    <td>
                        <div class="card-actions">
                            <a href="{{ route('posts.edit', $post) }}" class="nav-btn" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Supprimer ce post ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="nav-btn" style="color: var(--danger); border-color: rgba(220, 38, 38, 0.2);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection