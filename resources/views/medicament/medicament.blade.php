```php
@extends('layouts.app')

@section('styles')
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        color: #333;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .card-product {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        margin-bottom: 20px;
    }
    
    .card-product:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    
    .product-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    
    .card-body {
        padding: 20px;
        text-align: center;
    }
    
    .card-footer {
        padding: 0 20px 20px;
    }
    
    h1, h2, h3, h5, h6 {
        color: #2d3748;
    }
    
    .tagline {
        color: #4a5568;
        margin-bottom: 15px;
    }
    
    .btn {
        display: block;
        width: 100%;
        padding: 14px;
        margin-bottom: 12px;
        border-radius: 8px;
        border: none;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background-color: #4299e1;
        color: white;
    }
    
    .btn-primary:hover {
        background-color: #3182ce;
    }
    
    .btn-outline {
        background-color: transparent;
        border: 1px solid #4299e1;
        color: #4299e1;
    }
    
    .btn-outline:hover {
        background-color: rgba(66, 153, 225, 0.1);
    }
    
    .search-bar {
        display: flex;
        margin-bottom: 30px;
    }
    
    .search-input {
        flex: 1;
        padding: 12px 16px;
        border: 1px solid #e2e8f0;
        border-radius: 8px 0 0 8px;
        font-size: 16px;
    }
    
    .search-button {
        background-color: #4299e1;
        color: white;
        border: none;
        border-radius: 0 8px 8px 0;
        padding: 0 20px;
        cursor: pointer;
    }
    
    .category-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 30px;
    }
    
    .category-filter {
        background-color: white;
        border: 1px solid #e2e8f0;
        border-radius: 30px;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .category-filter.active {
        background-color: #4299e1;
        color: white;
        border-color: #4299e1;
    }
    
    .sort-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .sort-select {
        padding: 8px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background-color: white;
    }
    
    .product-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .badge-new {
        background-color: #2d3748;
        color: white;
    }
    
    .badge-bestseller {
        background-color: #e53e3e;
        color: white;
    }
    
    .badge-promo {
        background-color: #38a169;
        color: white;
    }
    
    .badge-eco {
        background-color: #2e7d32;
        color: white;
    }
    
    .price {
        font-weight: bold;
        font-size: 18px;
        margin: 10px 0;
    }
    
    .original-price {
        text-decoration: line-through;
        color: #6c757d;
        font-size: 14px;
        margin-right: 8px;
    }
    
    .sale-price {
        color: #38a169;
    }
    
    .star-rating {
        color: #FFD700;
        margin-bottom: 5px;
    }
    
    .review-count {
        color: #4a5568;
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .banner {
        background-color: #4299e1;
        color: white;
        text-align: center;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
    }
    
    .newsletter {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin: 40px 0;
        text-align: center;
    }
    
    .newsletter-form {
        display: flex;
        margin-top: 20px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .newsletter-input {
        flex: 1;
        padding: 12px 16px;
        border: 1px solid #e2e8f0;
        border-radius: 8px 0 0 8px;
        font-size: 16px;
    }
    
    .newsletter-button {
        background-color: #4299e1;
        color: white;
        border: none;
        border-radius: 0 8px 8px 0;
        padding: 0 20px;
        cursor: pointer;
        font-weight: bold;
    }
    
    .featured-section {
        margin-top: 40px;
        text-align: center;
    }
    
    .featured-heading {
        margin-bottom: 30px;
    }
    
    .wishlist-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: white;
        border-radius: 50%;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .logo-container {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .tagline {
        margin-left: 12px;
        font-weight: bold;
        color: #4a5568;
    }
</style>
@endsection

@section('content')
<!-- Banner -->
<div class="banner">
    <h3>🎉 15% DE RÉDUCTION SUR VOTRE PREMIÈRE COMMANDE • CODE: BIENVENUE15</h3>
</div>

<div class="container">
    <!-- Header with Logo -->
    <div class="logo-container">
        <img src="{{ asset('images/bb.jpg') }}" alt="Fagarou Logo" class="logo">
        <span class="tagline">Ma Santé Fagarou</span>
    </div>

    <!-- Header Section -->
    <h1>Nos Médicaments</h1>
    <p class="tagline">Découvrez notre gamme de produits pour votre santé et bien-être.</p>
    
    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" class="search-input" id="searchProduct" placeholder="Rechercher un médicament...">
        <button class="search-button">
            <i class="fas fa-search"></i>
        </button>
    </div>
    
    <!-- Category Filters -->
    <div class="category-filters">
        <button class="category-filter active" data-category="all">Tous</button>
        <button class="category-filter" data-category="cleanse">Antibiotiques</button>
        <button class="category-filter" data-category="hydrate">Anti-douleurs</button>
        <button class="category-filter" data-category="treat">Vitamines</button>
        <button class="category-filter" data-category="mask">Digestion</button>
    </div>
    
    <!-- Sorting Options -->
    <div class="sort-container">
        <p><span id="productCount">8</span> produits</p>
        <div>
            <label>Trier par:</label>
            <select class="sort-select">
                <option>Recommandés</option>
                <option>Prix: Croissant</option>
                <option>Prix: Décroissant</option>
                <option>Nouveautés</option>
                <option>Meilleures ventes</option>
            </select>
        </div>
    </div>
    
    <!-- Products Grid -->
    <div class="row">
        @php
            $produits = [
                [
                    'nom' => 'AMOXICILLINE 500mg',
                    'description' => 'Antibiotique à large spectre',
                    'prix' => 1200,
                    'ancien_prix' => 1500,
                    'image' => 'https://via.placeholder.com/300x300?text=Amoxicilline',
                    'etat' => '',
                    'note' => 4.8,
                    'reviews' => 324,
                    'categorie' => 'cleanse',
                    'tags' => ['bestseller'],
                ],
                [
                    'nom' => 'PARACÉTAMOL 1000mg',
                    'description' => 'Soulage la douleur et la fièvre',
                    'prix' => 800,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Paracétamol',
                    'etat' => '',
                    'note' => 4.9,
                    'reviews' => 512,
                    'categorie' => 'hydrate',
                    'tags' => ['bestseller'],
                ],
                [
                    'nom' => 'VITAMINE D3 1000 UI',
                    'description' => 'Maintien osseux et immunité',
                    'prix' => 1500,
                    'ancien_prix' => 1800,
                    'image' => 'https://via.placeholder.com/300x300?text=Vitamine+D3',
                    'etat' => 'nouveau',
                    'note' => 4.7,
                    'reviews' => 183,
                    'categorie' => 'treat',
                    'tags' => ['promo'],
                ],
                [
                    'nom' => 'OMÉPRAZOLE 20mg',
                    'description' => 'Réduction de l\'acidité gastrique',
                    'prix' => 1800,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Oméprazole',
                    'etat' => '',
                    'note' => 4.6,
                    'reviews' => 127,
                    'categorie' => 'mask',
                    'tags' => [],
                ],
                [
                    'nom' => 'MAGNÉSIUM B6',
                    'description' => 'Fatigue et stress',
                    'prix' => 1400,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Magnésium',
                    'etat' => '',
                    'note' => 4.5,
                    'reviews' => 256,
                    'categorie' => 'treat',
                    'tags' => ['eco'],
                ],
                [
                    'nom' => 'IBUPROFÈNE 400mg',
                    'description' => 'Anti-inflammatoire non stéroïdien',
                    'prix' => 900,
                    'ancien_prix' => 1100,
                    'image' => 'https://via.placeholder.com/300x300?text=Ibuprofène',
                    'etat' => '',
                    'note' => 4.4,
                    'reviews' => 198,
                    'categorie' => 'hydrate',
                    'tags' => ['promo'],
                ],
                [
                    'nom' => 'PROBIOTIQUES DIGESTIFS',
                    'description' => 'Équilibre de la flore intestinale',
                    'prix' => 2200,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Probiotiques',
                    'etat' => 'nouveau',
                    'note' => 4.8,
                    'reviews' => 97,
                    'categorie' => 'mask',
                    'tags' => ['nouveau', 'eco'],
                ],
                [
                    'nom' => 'AZITHROMYCINE 250mg',
                    'description' => 'Antibiotique à prise unique quotidienne',
                    'prix' => 1600,
                    'ancien_prix' => 1900,
                    'image' => 'https://via.placeholder.com/300x300?text=Azithromycine',
                    'etat' => '',
                    'note' => 4.7,
                    'reviews' => 143,
                    'categorie' => 'cleanse',
                    'tags' => ['promo'],
                ],
            ];
        @endphp

        @foreach ($produits as $produit)
        <div class="col-md-3 product-item" data-category="{{ $produit['categorie'] }}">
            <div class="card-product">
                <div class="position-relative">
                    <img src="{{ $produit['image'] }}" class="product-image" alt="{{ $produit['nom'] }}">
                    
                    <!-- Status Badges -->
                    <div class="position-absolute top-0 start-0 p-2">
                        @if($produit['etat'] === 'nouveau')
                            <span class="product-badge badge-new">NOUVEAU</span>
                        @endif
                        @if(in_array('bestseller', $produit['tags']))
                            <span class="product-badge badge-bestseller">BEST-SELLER</span>
                        @endif
                        @if(in_array('promo', $produit['tags']))
                            <span class="product-badge badge-promo">PROMO</span>
                        @endif
                        @if(in_array('eco', $produit['tags']))
                            <span class="product-badge badge-eco">ECO</span>
                        @endif
                    </div>
                    
                    <!-- Wishlist Button -->
                    <div class="wishlist-icon">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                
                <div class="card-body">
                    <h5 class="fw-bold">{{ $produit['nom'] }}</h5>
                    <p class="text-muted">{{ $produit['description'] }}</p>
                    
                    <div class="price">
                        @if($produit['ancien_prix'])
                            <span class="original-price">{{ $produit['ancien_prix'] / 100 }}€</span>
                            <span class="sale-price">{{ $produit['prix'] / 100 }}€</span>
                        @else
                            <span>{{ $produit['prix'] / 100 }}€</span>
                        @endif
                    </div>

                    {{-- Étoiles --}}
                    @if($produit['note'] > 0)
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if($i <= floor($produit['note']))
                                    <i class="fas fa-star"></i>
                                @elseif($i - 0.5 <= $produit['note'])
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="review-count">{{ $produit['reviews'] }} avis</p>
                    @else
                        <div class="star-rating text-muted">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p class="review-count">Aucun avis</p>
                    @endif
                </div>
                
                <div class="card-footer">
                    <button class="btn btn-primary">AJOUTER AU PANIER</button>
                    <button class="btn btn-outline">VOIR DÉTAILS</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Newsletter Section -->
    <div class="newsletter">
        <h3>Restez informé</h3>
        <p>Inscrivez-vous à notre newsletter pour recevoir des offres exclusives et des conseils santé.</p>
        <div class="newsletter-form">
            <input type="email" class="newsletter-input" placeholder="Votre adresse email">
            <button class="newsletter-button">S'INSCRIRE</button>
        </div>
        <p class="small text-muted mt-2">En vous inscrivant, vous acceptez notre politique de confidentialité.</p>
    </div>
</div>

<!-- Featured Products Section -->
<div class="featured-section">
    <div class="container">
        <h3 class="featured-heading">Vous pourriez aussi aimer</h3>
        <div class="row">
            @foreach(array_slice($produits, 0, 4) as $produit)
            <div class="col-md-3">
                <div class="card-product">
                    <img src="{{ $produit['image'] }}" class="product-image" alt="{{ $produit['nom'] }}">
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $produit['nom'] }}</h6>
                        <p class="text-muted small">{{ $produit['description'] }}</p>
                        <p class="price">{{ $produit['prix'] / 100 }}€</p>
                        <button class="btn btn-outline">VOIR PRODUIT</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category filtering
    const categoryButtons = document.querySelectorAll('.category-filter');
    const productItems = document.querySelectorAll('.product-item');
    const productCountElement = document.getElementById('productCount');
    
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active button
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter products
            let visibleCount = 0;
            
            productItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Update product count
            productCountElement.textContent = visibleCount;
        });
    });
    
    // Search functionality
    const searchInput = document.getElementById('searchProduct');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let visibleCount = 0;
        
        productItems.forEach(item => {
            const productName = item.querySelector('h5').textContent.toLowerCase();
            const productDesc = item.querySelector('p').textContent.toLowerCase();
            
            if (productName.includes(searchTerm) || productDesc.includes(searchTerm)) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Update product count
        productCountElement.textContent = visibleCount;
    });
    
    // Toggle wishlist
    const wishlistIcons = document.querySelectorAll('.wishlist-icon');
    
    wishlistIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const heart = this.querySelector('i');
            
            if (heart.classList.contains('far')) {
                heart.classList.remove('far');
                heart.classList.add('fas');
                heart.style.color = '#e53e3e';
            } else {
                heart.classList.remove('fas');
                heart.classList.add('far');
                heart.style.color = '';
            }
        });
    });
});
</script>
@endsection
```