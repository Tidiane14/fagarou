{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="logo-container">
            <img src="{{ asset('images/bb.jpg') }}" alt="Fagarou Logo" class="logo">
            <span class="tagline">Ma Santé Fagarou</span>
        </div>
        
        <div class="welcome-text">
            <h2>Bienvenue chez Fagarou</h2>
            <p>Votre santé, entre de bonnes mains.<br>Connectez-vous pour continuer.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" style="padding: 0 20px 20px;">
            @csrf

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Se souvenir de moi</label>
            </div>

            <div class="login-buttons">
                <button type="submit" class="btn btn-primary btn-connect">SE CONNECTER</button>
                <a href="{{ route('register') }}" class="btn btn-outline btn-register">S'INSCRIRE</a>
            </div>

            <div class="text-center" style="margin-top: 15px;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--primary-color); text-decoration: none;">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
