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
<div class="glass-card table-card">
    <div class="card-header">
        <div class="card-info">
            <h3 class="card-title">Liste des Catégories</h3>
            <p class="card-subtitle">Gérez les catégories récentes</p>
        </div>
        <div class="card-actions">
            <a href="{{ route('category.create') }}" class="btn btn-primary" style="padding: 8px 16px; font-size: 13px;">
                + Nouvelle Catégorie
            </a>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $categories)
                <tr>
                    <td>{{ $categories->id }}</td>
                    <td>
                        <div class="table-user-info">
                            <span class="table-user-email">{{ $categories->name }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="table-amount">{{ $categories->created_at->format('d/m/Y') }}</div>
                    </td>
                    <td>
                        <div class="card-actions">
                            <a href="{{ route('category.edit', $categories) }}" class="nav-btn" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>
                            <form action="{{ route('category.destroy', $categories) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')">
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