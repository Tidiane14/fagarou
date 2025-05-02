{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="logo-container">
            <img src="{{ asset('images/bb.jpg') }}" alt="Fagarou Logo" class="logo">
            <span class="tagline">Ma Santé Fagarou</span>
            <a href="{{ route('login') }}" class="close-btn" title="Retour à la connexion">×</a>
        </div>
        
        <div class="welcome-text">
            <h2>Créez votre compte</h2>
            <p>Rejoignez Fagarou pour accéder à tous nos services.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" style="padding: 0 20px 20px;">
            @csrf

            <div class="form-group">
                <label for="name">Nom complet</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirmer le mot de passe</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="login-buttons">
                <button type="submit" class="btn btn-primary">
                    S'INSCRIRE
                </button>
            </div>
        </form>
        <div class="text-center" style="margin-top: 15px;">
            <p>Vous avez déjà un compte ? <a href="{{ route('login') }}" style="color: var(--primary-color); text-decoration: none;">Se connecter</a></p>
        </div>
    </div>
</div>
@endsection

