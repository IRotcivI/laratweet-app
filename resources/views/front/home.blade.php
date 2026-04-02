@extends('front.app')

@section('title', 'Page D\'accueil')

@section('header')
    <header class="hero-section">
        <h1 class="page-title" style="font-size: 3rem; margin-bottom: 10px;">Les Derniers Posts</h1>
        <p class="card-subtitle" style="font-size: 1.2rem;">Découvrez nos dernières publications</p>
    </header>
@endsection

@section('sidebar')
    @include('front.partials.sidebar')
@endsection

@section('content')
    <section class="posts-grid">
        @foreach ($posts as $post)
            <article class="glass-card glass-card-3d post-card">
                @if ($post->image)
                    <img src="{{ asset('back_auth/assets/posts/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
                @else
                    <div class="post-image"
                        style="background: var(--bg-gradient-3); display: flex; align-items: center; justify-content: center;">
                        <span style="color: var(--glass-border)">Pas d'image</span>
                    </div>
                @endif

                <div class="post-content">
                    <span class="post-category">{{ $post->category->name ?? 'Général' }}</span>
                    <h2 class="card-title" style="margin: 10px 0;">{{ Str::limit($post->title, 50) }}</h2>
                    <p class="card-subtitle">{{ Str::limit(strip_tags($post->content), 100) }}</p>

                    <div class="post-meta" style="margin-top: 15px; font-size: 0.8rem; color: var(--text-secondary);">
                        <span>Par <strong>{{ $post->user->name }}</strong></span> •
                        <span>{{ $post->created_at->translatedFormat('d M Y') }}</span>
                    </div>

                    <div class="post-tags">
                        @foreach ($post->tags as $tag)
                            <span class="tag-pill">#{{ $tag->name }}</span>
                        @endforeach
                    </div>

                    <a href="{{ route('show', $post->slug) }}" class="card-btn active"
                        style="margin-top: 20px; display: block; text-align: center;">Lire l'article</a>
                </div>
            </article>
        @endforeach
    </section>
@endsection
