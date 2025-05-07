@extends('layouts.app')

@section('title', 'Gestion des stocks de médicaments')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="h2 mb-0">Stock de médicaments</h1>
            <p class="text-muted">Gestion et suivi des médicaments disponibles</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('medicaments.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-1"></i> Ajouter un médicament
            </a>
        </div>
    </div>

    <!-- Barre de recherche et filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('medicaments') }}" method="GET" class="row g-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Rechercher un médicament..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="categorie" class="form-select">
                        <option value="">Toutes les catégories</option>
                        <!-- Boucle pour les catégories de médicaments -->
                        @foreach($categories ?? [] as $categorie)
                            <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="stock" class="form-select">
                        <option value="">Tous les niveaux de stock</option>
                        <option value="low" {{ request('stock') == 'low' ? 'selected' : '' }}>Stock faible</option>
                        <option value="out" {{ request('stock') == 'out' ? 'selected' : '' }}>Rupture de stock</option>
                        <option value="available" {{ request('stock') == 'available' ? 'selected' : '' }}>Disponible</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des médicaments -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom du médicament</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Seuil d'alerte</th>
                            <th scope="col">Date d'expiration</th>
                            <th scope="col">Statut</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medicaments ?? [] as $medicament)
                            <tr class="{{ $medicament->quantite <= $medicament->seuil_alerte ? ($medicament->quantite <= 0 ? 'table-danger' : 'table-warning') : '' }}">
                                <td>{{ $medicament->id }}</td>
                                <td>
                                    <strong>{{ $medicament->nom }}</strong>
                                    @if($medicament->description)
                                        <small class="d-block text-muted">{{ Str::limit($medicament->description, 50) }}</small>
                                    @endif
                                </td>
                                <td>{{ $medicament->categorie->nom ?? 'Non catégorisé' }}</td>
                                <td>
                                    <span class="fw-bold {{ $medicament->quantite <= $medicament->seuil_alerte ? ($medicament->quantite <= 0 ? 'text-danger' : 'text-warning') : 'text-success' }}">
                                        {{ $medicament->quantite }} {{ $medicament->unite ?? 'unités' }}
                                    </span>
                                </td>
                                <td>{{ $medicament->seuil_alerte }} {{ $medicament->unite ?? 'unités' }}</td>
                                <td>
                                    @if($medicament->date_expiration)
                                        <span class="{{ now()->gt($medicament->date_expiration) ? 'text-danger' : (now()->addMonths(3)->gt($medicament->date_expiration) ? 'text-warning' : '') }}">
                                            {{ $medicament->date_expiration->format('d/m/Y') }}
                                        </span>
                                    @else
                                        <span class="text-muted">Non définie</span>
                                    @endif
                                </td>
                                <td>
                                    @if($medicament->quantite <= 0)
                                        <span class="badge bg-danger">Rupture</span>
                                    @elseif($medicament->quantite <= $medicament->seuil_alerte)
                                        <span class="badge bg-warning text-dark">Stock faible</span>
                                    @else
                                        <span class="badge bg-success">Disponible</span>
                                    @endif

                                    @if($medicament->date_expiration && now()->gt($medicament->date_expiration))
                                        <span class="badge bg-danger">Expiré</span>
                                    @elseif($medicament->date_expiration && now()->addMonths(3)->gt($medicament->date_expiration))
                                        <span class="badge bg-warning text-dark">Expiration proche</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('medicaments', $medicament->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('medicaments.edit', $medicament->id) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#addStockModal" data-medicament-id="{{ $medicament->id }}" data-medicament-nom="{{ $medicament->nom }}">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#removeStockModal" data-medicament-id="{{ $medicament->id }}" data-medicament-nom="{{ $medicament->nom }}">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                        <h5>Aucun médicament trouvé</h5>
                                        <p class="text-muted">Ajoutez des médicaments pour commencer à gérer votre stock</p>
                                        <a href="{{ route('medicaments.create') }}" class="btn btn-primary mt-2">
                                            <i class="fas fa-plus-circle me-1"></i> Ajouter un médicament
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if(isset($medicaments) && $medicaments->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $medicaments->appends(request()->query())->links() }}
        </div>
    @endif

    <!-- Résumé du stock -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total des médicaments</h5>
                    <h2 class="mb-0">{{ $stats['total'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Stock faible</h5>
                    <h2 class="mb-0">{{ $stats['low'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Rupture de stock</h5>
                    <h2 class="mb-0">{{ $stats['out'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour ajouter du stock -->
<div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('medicaments') }}" method="POST">
                @csrf
                <input type="hidden" name="medicament_id" id="add_medicament_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStockModalLabel">Ajouter du stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Vous êtes sur le point d'ajouter du stock pour: <strong id="add_medicament_nom"></strong></p>
                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantité à ajouter</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_expiration" class="form-label">Date d'expiration (optionnelle)</label>
                        <input type="date" class="form-control" id="date_expiration" name="date_expiration">
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes (optionnel)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Confirmer l'ajout</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal pour retirer du stock -->
<div class="modal fade" id="removeStockModal" tabindex="-1" aria-labelledby="removeStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('medicaments') }}" method="POST">
                @csrf
                <input type="hidden" name="medicament_id" id="remove_medicament_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeStockModalLabel">Retirer du stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Vous êtes sur le point de retirer du stock pour: <strong id="remove_medicament_nom"></strong></p>
                    <div class="mb-3">
                        <label for="quantite_remove" class="form-label">Quantité à retirer</label>
                        <input type="number" class="form-control" id="quantite_remove" name="quantite" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="motif" class="form-label">Motif du retrait</label>
                        <select class="form-select" id="motif" name="motif" required>
                            <option value="utilisation">Utilisation</option>
                            <option value="perte">Perte/Casse</option>
                            <option value="expiration">Expiration</option>
                            <option value="ajustement">Ajustement d'inventaire</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notes_remove" class="form-label">Notes (optionnel)</label>
                        <textarea class="form-control" id="notes_remove" name="notes" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-warning">Confirmer le retrait</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Script pour les modals d'ajout et retrait de stock
    document.addEventListener('DOMContentLoaded', function() {
        const addStockModal = document.getElementById('addStockModal');
        if (addStockModal) {
            addStockModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const medicamentId = button.getAttribute('data-medicament-id');
                const medicamentNom = button.getAttribute('data-medicament-nom');
                
                document.getElementById('add_medicament_id').value = medicamentId;
                document.getElementById('add_medicament_nom').textContent = medicamentNom;
            });
        }
        
        const removeStockModal = document.getElementById('removeStockModal');
        if (removeStockModal) {
            removeStockModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const medicamentId = button.getAttribute('data-medicament-id');
                const medicamentNom = button.getAttribute('data-medicament-nom');
                
                document.getElementById('remove_medicament_id').value = medicamentId;
                document.getElementById('remove_medicament_nom').textContent = medicamentNom;
            });
        }
    });
</script>
@endsection