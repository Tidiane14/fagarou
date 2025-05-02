
{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="home-container">
    <div class="header">
        <button class="menu-btn">☰</button>
        <img src="{{ asset('images/fagarou-logo.png') }}" alt="Fagarou Logo" class="header-logo">
        <button class="search-btn">🔍</button>
    </div>

    <div class="banner">
        <h1>Dalal ak Jamm</h1>
        <p>votre santé en toute simplicité.</p>
    </div>

    <div class="quick-access">
        <div class="card">
            <h3>Accédez à vos médicaments.</h3>
            <p>Que cherchez-vous?<br>Nous vous accompagnons à chaque étape.</p>
            
            <div class="action-buttons">
                {{-- <a href="{{ route('medicaments') }}" class="action-btn">
                    <span class="icon">💊</span>
                    Médicament
                </a>
                <a href="{{ route('pharmacies') }}" class="action-btn">
                    <span class="icon">🏥</span>
                    Pharmacie
                </a>
                <a href="{{ route('ordonnances') }}" class="action-btn scanner-btn">
                    <span class="icon">📄</span>
                    SCANNER VOTRE ORDONNANCE
                </a> --}}
            </div>
        </div>
    </div>

    <div class="advice-section">
        <h3>Nos Conseils</h3>
        <div class="advice-card">
            <div class="advice-content">
                <h4>Buvez beaucoup d'eau</h4>
                <p>L'hydratation est essentielle pour votre bien-être. Essayez de boire au moins 8 verres d'eau par jour.</p>
                <a href="#">En savoir plus ?</a>
            </div>
            <div class="advice-image">
                <img src="{{ asset('images/hydration.jpg') }}" alt="Hydratation">
            </div>
        </div>
        <div class="pagination-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>

    <div class="recent-searches">
        <div class="section-header">
            <h3>Vos dernières recherches</h3>
            <a href="#">Voir Plus</a>
        </div>
        
        <div class="product-grid">
            {{-- @foreach($recentProducts as $product) --}}
            <div class="product-card">
                {{-- <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"> --}}
                <div class="product-info">
                    <span class="category"></span>
                    <h4></h4>
                    <p class="price"> FCFA</p>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>

    <div class="bottom-nav">
        {{-- <a href="{{ route('home') }}" class="nav-item active">
            <span class="icon">🏠</span>
        </a>
        <a href="{{ route('orders') }}" class="nav-item">
            <span class="icon">📦</span>
        </a>
        <a href="{{ route('support') }}" class="nav-item">
            <span class="icon">🎧</span>
        </a>
        <a href="{{ route('profile') }}" class="nav-item">
            <span class="icon">👤</span>
        </a> --}}
    </div>
</div>
@endsection