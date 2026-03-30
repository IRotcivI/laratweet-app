@extends('auth.auth-layout')

@section('title', 'Page de connexion')

@section('card_title', 'Se connecter')

@section('auth_form')

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Adresse Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-input" placeholder="Enter votre adresse email" required>
                        @error('email')
                            <p class="error-message" style="color: var(--red);">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-input" placeholder="Enter votre mot de passe" required>
                        @error('password')
                            <p class="error-message" style="color: var(--red);">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-row">
                        <label class="checkbox-label">
                            <input type="checkbox" checked>
                            Se souvenir de moi
                        </label>
                        <a href="{{ route('password.request') }}" class="forgot-link">Mot de passe oublié?</a>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Se connecter
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </button>
                </form>

                <p class="login-footer" style="margin-top: 1rem;">
                    Pas de compte? <a href="{{ route('register') }}">Créer un compte</a>
                </p>

@endsection