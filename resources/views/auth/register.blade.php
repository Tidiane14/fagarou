{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="logo-container">
            <img src="{{ asset('images/fagarou-logo.png') }}" alt="Fagarou Logo" class="logo">
            <span class="tagline">Ma Santé Fagarou</span>
            <a href="{{ route('login') }}" class="close-btn">×</a>
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
                
                <div class="text-center" style="margin-top: 15px;">
                    <p>Vous avez déjà un compte? <a href="{{ route('login') }}" style="color: var(--primary-color); text-decoration: none;">Se connecter</a></p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

{{-- Ajoutez ce code CSS au fichier app.blade.php à l'intérieur du style --}}
/* Styles pour les formulaires */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #666;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
}

.text-center {
    text-align: center;
}

/* Pour les messages flash */
.alert {
    padding: 10px 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 14px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}