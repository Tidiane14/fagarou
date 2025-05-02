@extends('layouts.app')

@section('styles')
<style>
    .card-product {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card-product:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .btn-quick-add {
        opacity: 0.9;
        transition: opacity 0.3s;
    }
    .btn-quick-add:hover {
        opacity: 1;
    }
    .product-badge {
        padding: 0.35rem 0.65rem;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .star-rating {
        color: #FFD700;
    }
    .original-price {
        text-decoration: line-through;
        color: #6c757d;
        font-size: 0.9rem;
    }
    .sale-price {
        color: #198754;
        font-weight: 700;
    }
    .banner-top {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    .banner-accent {
        background-color: #212529;
        color: white;
    }
    .category-filter {
        border-radius: 30px;
        font-size: 0.9rem;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
        padding: 0.4rem 1rem;
        border: 1px solid #dee2e6;
        transition: all 0.3s;
    }
    .category-filter:hover, .category-filter.active {
        background-color: #212529;
        color: white;
        border-color: #212529;
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
        transition: all 0.3s;
        opacity: 0.8;
    }
    .wishlist-icon:hover {
        opacity: 1;
        transform: scale(1.1);
    }
</style>
@endsection

@section('content')
<!-- Top Promotional Banner -->
<div class="banner-top py-2 text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="mb-0"><i class="fas fa-truck me-2"></i> Livraison GRATUITE pour les commandes de plus de 50€</p>
            </div>
        </div>
    </div>
</div>

<!-- Secondary Banner -->
<div class="banner-accent py-3 text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">🎉 15% DE RÉDUCTION SUR VOTRE PREMIÈRE COMMANDE • CODE: BIENVENUE15</h5>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="fw-bold mb-2">Nos Produits</h1>
            <p class="text-muted">Découvrez notre gamme de produits de beauté naturels et efficaces.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rechercher un produit..." id="searchProduct">
                <button class="btn btn-dark" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>

    <!-- Category Filters -->
    <div class="mb-4 mt-2">
        <h6 class="fw-bold mb-2">Filtrer par catégorie:</h6>
        <div>
            <button class="btn category-filter active" data-category="all">Tous</button>
            <button class="btn category-filter" data-category="cleanse">Nettoyants</button>
            <button class="btn category-filter" data-category="hydrate">Hydratants</button>
            <button class="btn category-filter" data-category="treat">Traitements</button>
            <button class="btn category-filter" data-category="mask">Masques</button>
        </div>
    </div>

    <!-- Sorting Options -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="mb-0"><span id="productCount">8</span> produits</p>
        <div class="d-flex align-items-center">
            <label class="me-2 text-nowrap">Trier par:</label>
            <select class="form-select form-select-sm" style="width: auto;">
                <option>Recommandés</option>
                <option>Prix: Croissant</option>
                <option>Prix: Décroissant</option>
                <option>Nouveautés</option>
                <option>Meilleures ventes</option>
            </select>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @php
            $produits = [
                [
                    'nom' => 'DEEP DOUBLE CLEANSE DUO',
                    'description' => 'melt makeup + deep-clean',
                    'prix' => 2900,
                    'ancien_prix' => 3200,
                    'image' => 'https://via.placeholder.com/300x300?text=Deep+Cleanse',
                    'etat' => 'nouveau',
                    'note' => 0,
                    'reviews' => 0,
                    'categorie' => 'cleanse',
                    'tags' => ['bestseller'],
                ],
                [
                    'nom' => 'GENTLE DOUBLE CLEANSE DUO',
                    'description' => 'melt makeup + gently cleanse',
                    'prix' => 2900,
                    'ancien_prix' => 3200,
                    'image' => 'https://via.placeholder.com/300x300?text=Gentle+Cleanse',
                    'etat' => 'nouveau',
                    'note' => 0,
                    'reviews' => 0,
                    'categorie' => 'cleanse',
                    'tags' => [],
                ],
                [
                    'nom' => 'GREEN CLEAN CLEANSING BALM',
                    'description' => 'makeup + SPF melting cleansing balm',
                    'prix' => 1800,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Green+Clean',
                    'etat' => '',
                    'note' => 4.9,
                    'reviews' => 589,
                    'categorie' => 'cleanse',
                    'tags' => ['bestseller', 'eco'],
                ],
                [
                    'nom' => 'GREEN CLEAN FRAGRANCE-FREE CLEANSING BALM',
                    'description' => 'fragrance-free makeup + SPF melting cleansing balm',
                    'prix' => 1800,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Fragrance+Free',
                    'etat' => '',
                    'note' => 4.9,
                    'reviews' => 72,
                    'categorie' => 'cleanse',
                    'tags' => ['eco'],
                ],
                [
                    'nom' => 'AVOCADO CERAMIDE MOISTURE BARRIER CREAM',
                    'description' => 'rich moisturizer that strengthens skin barrier',
                    'prix' => 2200,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Avocado+Cream',
                    'etat' => 'nouveau',
                    'note' => 4.7,
                    'reviews' => 128,
                    'categorie' => 'hydrate',
                    'tags' => ['bestseller'],
                ],
                [
                    'nom' => 'PLUM PLUMP HYALURONIC ACID SERUM',
                    'description' => 'hydrating serum with 5 weights of hyaluronic acid',
                    'prix' => 2100,
                    'ancien_prix' => 2500,
                    'image' => 'https://via.placeholder.com/300x300?text=Plum+Serum',
                    'etat' => '',
                    'note' => 4.8,
                    'reviews' => 432,
                    'categorie' => 'hydrate',
                    'tags' => ['promo'],
                ],
                [
                    'nom' => 'VITAMIN C GLOW MASK',
                    'description' => 'brightening treatment mask with 10% vitamin C',
                    'prix' => 2400,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Vitamin+C+Mask',
                    'etat' => '',
                    'note' => 4.6,
                    'reviews' => 215,
                    'categorie' => 'mask',
                    'tags' => [],
                ],
                [
                    'nom' => 'NIACINAMIDE NIGHT TREATMENT',
                    'description' => 'overnight serum to minimize pores and even skin tone',
                    'prix' => 2600,
                    'ancien_prix' => 2900,
                    'image' => 'https://via.placeholder.com/300x300?text=Niacinamide',
                    'etat' => '',
                    'note' => 4.7,
                    'reviews' => 183,
                    'categorie' => 'treat',
                    'tags' => ['promo'],
                ],
            ];
        @endphp

        @foreach ($produits as $produit)
        <div class="col product-item" data-category="{{ $produit['categorie'] }}">
            <div class="card card-product border-0 shadow-sm h-100">
                <div class="position-relative">
                    <img src="{{ $produit['image'] }}" class="card-img-top" alt="{{ $produit['nom'] }}">
                    
                    <!-- Status Badges -->
                    <div class="position-absolute top-0 start-0 p-2 d-flex flex-column">
                        @if($produit['etat'] === 'nouveau')
                            <span class="badge bg-dark product-badge mb-1">NOUVEAU</span>
                        @endif
                        @if(in_array('bestseller', $produit['tags']))
                            <span class="badge bg-danger product-badge mb-1">BEST-SELLER</span>
                        @endif
                        @if(in_array('promo', $produit['tags']))
                            <span class="badge bg-success product-badge mb-1">PROMO</span>
                        @endif
                        @if(in_array('eco', $produit['tags']))
                            <span class="badge bg-success product-badge" style="background-color:#2e7d32 !important;">ECO</span>
                        @endif
                    </div>
                    
                    <!-- Wishlist Button -->
                    <div class="wishlist-icon shadow-sm">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="card-body text-center pt-4">
                    <h5 class="fw-bold mb-1">{{ $produit['nom'] }}</h5>
                    <p class="text-muted small mb-2">{{ $produit['description'] }}</p>
                    
                    <div class="mb-3">
                        @if($produit['ancien_prix'])
                            <span class="original-price me-2">${{ $produit['ancien_prix'] / 100 }}</span>
                            <span class="sale-price">${{ $produit['prix'] / 100 }}</span>
                        @else
                            <span class="fw-bold">${{ $produit['prix'] / 100 }}</span>
                        @endif
                    </div>

                    {{-- Étoiles --}}
                    @if($produit['note'] > 0)
                        <div class="star-rating small mb-1">
                            @for ($i = 1; $i <= 5; $i++)
                                @if($i <= floor($produit['note']))
                                    <i class="fas fa-star"></i>
                                @elseif($i - 0.5 <= $produit['note'])
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                            <span class="text-dark ms-1">{{ number_format($produit['note'], 1) }}</span>
                        </div>
                        <p class="small text-muted mb-3">{{ $produit['reviews'] }} avis</p>
                    @else
                        <div class="text-muted small mb-3">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <span class="ms-1">Écrire un avis</span><br>
                            0 avis
                        </div>
                    @endif
                </div>
                <div class="card-footer bg-white border-0 pt-0">
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark btn-quick-add">Ajouter au panier</button>
                        <button class="btn btn-outline-dark">Voir détails</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Newsletter Section -->
    <div class="row mt-5 pt-4 border-top">
        <div class="col-lg-6 mx-auto text-center">
            <h3 class="fw-bold mb-3">Restez informé</h3>
            <p class="text-muted mb-4">Inscrivez-vous à notre newsletter pour recevoir des offres exclusives et des conseils beauté.</p>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Votre adresse email">
                <button class="btn btn-dark px-4" type="button">S'inscrire</button>
            </div>
            <p class="small text-muted">En vous inscrivant, vous acceptez notre politique de confidentialité.</p>
        </div>
    </div>
</div>

<!-- Featured Products Carousel -->
<div class="bg-light py-5">
    <div class="container">
        <h3 class="fw-bold text-center mb-4">Vous pourriez aussi aimer</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach(array_slice($produits, 0, 4) as $produit)
            <div class="col">
                <div class="card card-product border-0 shadow-sm h-100">
                    <img src="{{ $produit['image'] }}" class="card-img-top" alt="{{ $produit['nom'] }}">
                    <div class="card-body text-center">
                        <h6 class="fw-bold">{{ $produit['nom'] }}</h6>
                        <p class="text-muted small">{{ $produit['description'] }}</p>
                        <p class="fw-bold">${{ $produit['prix'] / 100 }}</p>
                        <button class="btn btn-sm btn-outline-dark">Voir produit</button>
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
                heart.style.color = '#dc3545';
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