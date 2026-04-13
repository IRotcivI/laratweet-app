@extends('front.app')

@section('title', 'Détails du post')

@section('sidebar')
    @include('front.partials.sidebar')
@endsection

@section('content')
    <div class="post-container " style="max-width: 850px; margin: 0 auto; padding: 20px;">

        <a href="{{ url('/') }}" class="back-link"
            style="display: inline-flex; align-items: center; gap: 10px; color: var(--gold-light); text-decoration: none; margin-bottom: 30px; font-weight: 500; transition: 0.3s;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Retour aux posts
        </a>

        <article class="glass-card"
            style="padding: 40px; border-radius: 24px; position: relative; overflow: hidden; transform: none !important; animation: fadeInUp 0.8s ease-out;">

            <header style="text-align: center; margin-bottom: 40px;">
                <span
                    style="color: var(--emerald-light); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 700; display: block; margin-bottom: 15px;">
                    {{ $post->category->name ?? 'Général' }}
                </span>

                <h1
                    style="font-size: clamp(2.2rem, 5vw, 3.2rem); color: #fff; line-height: 1.1; margin-bottom: 20px; font-weight: 800; letter-spacing: -1px;">
                    {{ $post->title ?? 'Sans titre' }}
                </h1>

                <div
                    style="display: flex; justify-content: center; align-items: center; gap: 15px; color: var(--text-secondary); font-size: 0.95rem;">
                    <span style="display: flex; align-items: center; gap: 8px;">
                        <div
                            style="width: 24px; height: 24px; border-radius: 50%; background: var(--emerald); display: flex; align-items: center; justify-content: center; font-size: 0.7rem; color: white;">
                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                        </div>
                        <strong>{{ $post->user->name }}</strong>
                    </span>
                    <span style="opacity: 0.4;">|</span>
                    <span>{{ $post->created_at->translatedFormat('d F Y') }}</span>
                </div>
            </header>

            @if ($post->image)
                <div
                    style="margin: 0 -40px 40px -40px; border-top: 1px solid var(--glass-border); border-bottom: 1px solid var(--glass-border); box-shadow: inset 0 0 50px rgba(0,0,0,0.2);">
                    <img src="{{ asset('back_auth/assets/posts/' . $post->image) }}" alt="{{ $post->title }}"
                        style="width: 100%; max-height: 500px; object-fit: cover; display: block;">
                </div>
            @endif

            <div class="post-content"
                style="font-size: 1.2rem; line-height: 1.8; color: rgba(255,255,255,0.9); font-family: 'Inter', sans-serif;">
                {!! $post->content !!}
            </div>

            @if ($post->tags && $post->tags->count() > 0)
                <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid var(--glass-border);">
                    <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                        @foreach ($post->tags as $tag)
                            <span
                                style="padding: 6px 16px; background: rgba(52, 211, 153, 0.1); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 30px; font-size: 0.8rem; color: var(--emerald-light); font-weight: 500;">
                                #{{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        </article>

        <div class="glass-card"
            style="margin-top: 30px; padding: 25px; border-radius: 20px; display: flex; align-items: center; gap: 20px; animation-delay: 0.2s;">
            <div
                style="width: 60px; height: 60px; border-radius: 50%; background: var(--bg-gradient-3); border: 1px solid var(--glass-border); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--gold-light); font-weight: 700;">
                {{ strtoupper(substr($post->user->name, 0, 1)) }}
            </div>
            <div>
                <h4 style="margin: 0; font-size: 1.1rem; color: #fff;">{{ $post->user->name }}</h4>
                <p style="margin: 3px 0 0; color: var(--text-secondary); font-size: 0.85rem;">Auteur de ce post.
                </p>
            </div>
        </div>
    </div>
@endsection
