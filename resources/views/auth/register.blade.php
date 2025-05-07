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

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" style="padding: 0 20px 20px;">
            @csrf

            <div class="form-group">
                <label for="name">Nom</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" autocomplete="prenom">
                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_naissance">Date de naissance</label>
                <input id="date_naissance" type="date" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" value="{{ old('date_naissance') }}">
                @error('date_naissance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}">
                @error('adresse')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}">
                @error('telephone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Photo de profil</label>
                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                @error('photo')
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


