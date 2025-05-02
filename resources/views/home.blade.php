@extends('layouts.app')

@section('content')
<div class="home-container">
    <div class="header">
        <button class="menu-btn">☰</button>
        <img src="{{ asset('images/bb.jpg') }}" alt="Fagarou Logo" class="header-logo">
        <button class="search-btn">🔍</button>
    </div>

    <div class="banner">
        <h1>Bonjour, {{ $user->prenom ?? '' }} {{ $user->name }}!</h1>
        <p>Vous êtes maintenant connecté à votre compte Fagarou.</p>
    </div>

    <!-- Afficher les informations de l'utilisateur -->
    <div class="user-profile" style="padding: 20px;">
        <div class="card">
            <h3>Votre profil</h3>
            
            @if($user->photo)
                <div style="text-align: center; margin-bottom: 15px;">
                    <img src="{{ asset('storage/'.$user->photo) }}" alt="Photo de profil" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                </div>
            @endif
            
            <div class="form-group">
                <label>Nom:</label>
                <p>{{ $user->name }}</p>
            </div>
            
            @if($user->prenom)
            <div class="form-group">
                <label>Prénom:</label>
                <p>{{ $user->prenom }}</p>
            </div>
            @endif
            
            @if($user->date_naissance)
            <div class="form-group">
                <label>Date de naissance:</label>
                <p>{{ \Carbon\Carbon::parse($user->date_naissance)->format('d/m/Y') }}</p>
            </div>
            @endif
            
            @if($user->adresse)
            <div class="form-group">
                <label>Adresse:</label>
                <p>{{ $user->adresse }}</p>
            </div>
            @endif
            
            @if($user->telephone)
            <div class="form-group">
                <label>Téléphone:</label>
                <p>{{ $user->telephone }}</p>
            </div>
            @endif
            
            <div class="form-group">
                <label>Email:</label>
                <p>{{ $user->email }}</p>
            </div>
        </div>
    </div>

    <!-- Bouton de déconnexion -->
    <form action="{{ route('logout') }}" method="POST" style="padding: 20px;">
        @csrf
        <button type="submit" class="btn btn-outline">Se déconnecter</button>
    </form> 
</div>
@endsection