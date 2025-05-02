@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Nos Produits</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @php
            $produits = [
                [
                    'nom' => 'DEEP DOUBLE CLEANSE DUO',
                    'description' => 'melt makeup + deep-clean',
                    'prix' => 2900,
                    'ancien_prix' => 3200,
                    'image' => 'https://via.placeholder.com/300x300?text=Produit+1',
                    'etat' => 'nouveau',
                    'note' => 0,
                    'reviews' => 0,
                ],
                [
                    'nom' => 'GENTLE DOUBLE CLEANSE DUO',
                    'description' => 'melt makeup + gently cleanse',
                    'prix' => 2900,
                    'ancien_prix' => 3200,
                    'image' => 'https://via.placeholder.com/300x300?text=Produit+2',
                    'etat' => 'nouveau',
                    'note' => 0,
                    'reviews' => 0,
                ],
                [
                    'nom' => 'GREEN CLEAN CLEANSING BALM',
                    'description' => 'makeup + SPF melting cleansing balm',
                    'prix' => 1800,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Produit+3',
                    'etat' => 'nouveau',
                    'note' => 4.9,
                    'reviews' => 589,
                ],
                [
                    'nom' => 'GREEN CLEAN FRAGRANCE-FREE CLEANSING BALM',
                    'description' => 'fragrance-free makeup + SPF melting cleansing balm',
                    'prix' => 1800,
                    'ancien_prix' => null,
                    'image' => 'https://via.placeholder.com/300x300?text=Produit+4',
                    'etat' => 'nouveau',
                    'note' => 4.9,
                    'reviews' => 72,
                ],
            ];
        @endphp

        @foreach ($produits as $produit)
        <div class="col">
            <div class="card border-0 shadow-sm h-100">
                <div class="position-relative">
                    <img src="{{ $produit['image'] }}" class="card-img-top" alt="{{ $produit['nom'] }}">
                    @if($produit['etat'] === 'nouveau')
                        <span class="badge bg-dark position-absolute top-0 start-0 m-2">NEW</span>
                    @endif
                </div>
                <div class="card-body text-center">
                    <h6 class="fw-bold">{{ $produit['nom'] }}</h6>
                    <p class="text-muted small mb-1">{{ $produit['description'] }}</p>
                    <p class="mb-2">
                        <span class="text-success fw-bold">${{ $produit['prix'] / 100 }}</span>
                        @if($produit['ancien_prix'])
                            <span class="text-muted text-decoration-line-through ms-1">${{ $produit['ancien_prix'] / 100 }}</span>
                        @endif
                    </p>

                    {{-- Étoiles --}}
                    @if($produit['note'] > 0)
                        <div class="text-warning small mb-1">
                            @for ($i = 0; $i < 5; $i++)
                                @if($i < floor($produit['note']))
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                            <span class="text-dark">{{ number_format($produit['note'], 1) }}</span>
                        </div>
                        <p class="small text-muted">{{ $produit['reviews'] }} Reviews</p>
                    @else
                        <div class="text-muted small">
                            ☆☆☆☆☆ <span class="ms-1">Write a review</span><br>
                            0 Reviews
                        </div>
                    @endif

                    <button class="btn btn-dark w-100 mt-2">+ Quick Add</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
