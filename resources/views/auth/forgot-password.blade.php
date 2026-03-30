@extends('auth.auth-layout')

@section('title', 'Page de réinitialisation du mot de passe')

@section('card_title', 'Réinitialiser le mot de passe')

@section('auth_form')

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Adresse Email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Entrer votre adresse email liée à votre compte" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Réinitialiser le mot de passe
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </button>
                </form>

                <p class="login-footer" style="margin-top: 1rem;">
                    Connectez-vous <a href="{{ route('login') }}">ici</a>
                </p>

                <p class="login-footer" style="margin-top: 1rem;">
                    Inscription <a href="{{ route('register') }}">ici</a>
                </p>
                
@endsection