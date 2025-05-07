@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Ajouter un Médicament</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('medicaments.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nom du médicament</label>
                    <input type="text" name="nom_medicament" class="form-control" value="{{ old('nom_medicament') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prix</label>
                    <input type="number" step="0.01" name="prix" class="form-control" value="{{ old('prix') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantité</label>
                    <input type="number" name="quantite" class="form-control" value="{{ old('quantite') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lien de l'image</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image') }}">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2">Ajouter</button>
                    <a href="{{ route('medicaments.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
