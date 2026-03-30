@extends('auth.auth-layout')

@section('title', 'Page d\'inscription')

@section('card_title', 'Créer un compte')

@section('auth_form')

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="fullname">Nom complet</label>
                        <input type="text" name="name" id="fullname" class="form-input" value="{{ old('name') }}" placeholder="Enter votre nom complet" required>
                        @error('name')
                            <p class="error-message" style="color: var(--red);">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Adresse Email</label>
                        <input type="email" name="email" id="email" class="form-input" value="{{ old('email') }}" placeholder="Enter votre adresse mail" required>
                        @error('email')
                            <p class="error-message" style="color: var(--red);">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-input" value="{{ old('password') }}" placeholder="Mot de passe" required>
                        @error('password')
                            <p class="error-message" style="color: var(--red);">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="confirm-password">Confirmez le mot de passe</label>
                        <input type="password" name="password_confirmation" id="confirm-password" class="form-input" value="{{ old('password_confirmation') }}" placeholder="Confirmez votre mot de passe" required>
                        @error('password_confirmation')
                            <p class="error-message" style="color: var(--red);">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-row" style="margin-bottom: 24px;">
                        <label class="checkbox-label">
                            <input type="checkbox" required>
                            Je suis d'accord avec les <a href="#" style="color: var(--emerald-light);">Conditions d'utilisation</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Créer un compte
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </button>
                </form>

@endsection