@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-user-circle me-2"></i>Mes informations</span>
                    <a href="/home" class="btn btn-outline-light btn-sm"><i class="fas fa-arrow-left"></i> Retour</a>
                </div>
                <div class="card-body text-center">
                    @if($user->photo)
                        <img src="{{ $user->photo }}" alt="Photo de profil" class="rounded-circle shadow mb-3" style="width: 110px; height: 110px; object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 110px; height: 110px; font-size: 2.5rem;">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif
                    <h4 class="mb-3">{{ $user->prenom ?? '' }} {{ $user->name }}</h4>
                    <ul class="list-group list-group-flush mb-3 text-start">
                        <li class="list-group-item"><strong>Email :</strong> {{ $user->email }}</li>
                        @if($user->date_naissance)
                            <li class="list-group-item"><strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($user->date_naissance)->format('d/m/Y') }}</li>
                        @endif
                        @if($user->adresse)
                            <li class="list-group-item"><strong>Adresse :</strong> {{ $user->adresse }}</li>
                        @endif
                        @if($user->telephone)
                            <li class="list-group-item"><strong>Téléphone :</strong> {{ $user->telephone }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 