<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Fagarou</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2ecc71;
            --primary-dark: #27ae60;
            --secondary-color: #f5f5f5;
            --text-color: #333;
            --light-text: #777;
            --white: #fff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--text-color);
        }
        
        .navbar {
            background-color: var(--white);
            box-shadow: var(--shadow);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .menu-icon {
            font-size: 24px;
            color: var(--text-color);
            cursor: pointer;
        }
        
        .search-icon {
            font-size: 20px;
            color: var(--text-color);
            cursor: pointer;
        }
        
        .brand {
            font-size: 22px;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .welcome-card {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .welcome-title {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .welcome-text {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .profile-card {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 30px;
            animation: slideUp 0.5s ease-in-out;
        }
        
        .profile-header {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .profile-header i {
            margin-right: 10px;
        }
        
        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid var(--white);
            object-fit: cover;
            margin: -60px auto 20px;
            display: block;
            box-shadow: var(--shadow);
            background-color: #e0e0e0;
        }
        
        .profile-body {
            padding: 20px 30px;
        }
        
        .profile-info {
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--light-text);
            width: 150px;
            margin-right: 20px;
        }
        
        .info-value {
            flex: 1;
            color: var(--text-color);
            font-weight: 500;
        }
        
        .logout-btn {
            display: block;
            width: 100%;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        
        .logout-btn:hover {
            background-color: var(--primary-dark);
        }
        
        .profile-no-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: var(--white);
            margin: -60px auto 20px;
            box-shadow: var(--shadow);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @media (max-width: 768px) {
            .profile-info {
                flex-direction: column;
            }
            
            .info-label {
                width: 100%;
                margin-bottom: 5px;
            }
            
            .profile-body {
                padding: 20px;
            }
        }
        
        .profile-glass {
            background: rgba(255,255,255,0.85);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,0.18);
            position: relative;
            overflow: visible;
        }
        .profile-glass .profile-img {
            position: absolute;
            left: 50%;
            top: -65px;
            transform: translateX(-50%);
            width: 130px;
            height: 130px;
            border-radius: 50%;
            box-shadow: 0 4px 16px #0002;
            border: 6px solid #fff;
            background: #e9f7ef;
            object-fit: cover;
            z-index: 2;
        }
        .profile-glass .profile-icon {
            position: absolute;
            left: 50%;
            top: -65px;
            transform: translateX(-50%);
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: #27ae60;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            box-shadow: 0 4px 16px #0002;
            border: 6px solid #fff;
            z-index: 2;
        }
        .profile-glass .card-body {
            margin-top: 70px;
        }
        .profile-glass .card-title {
            font-size: 1.7rem;
            font-weight: 700;
            color: #27ae60;
            letter-spacing: 1px;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .profile-glass .list-group-item {
            background: transparent;
            border: none;
            font-size: 1.1rem;
            padding-left: 0;
            padding-right: 0;
            text-align: center;
        }
        .profile-glass .btn-logout {
            position: absolute;
            right: 2rem;
            top: 2rem;
            z-index: 3;
            border-radius: 2rem;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            box-shadow: 0 2px 8px #0001;
        }
        @media (max-width: 767px) {
            .profile-glass .btn-logout {
                position: static;
                width: 100%;
                margin-bottom: 1rem;
            }
            .profile-glass .card-body {
                margin-top: 90px;
            }
        }
        .profile-glass .btn-profile-edit {
            position: absolute;
            right: 7.5rem;
            top: 2rem;
            z-index: 3;
            border-radius: 2rem;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            box-shadow: 0 2px 8px #0001;
        }
        @media (max-width: 767px) {
            .profile-glass .btn-profile-edit {
                position: static;
                width: 100%;
                margin-bottom: 1rem;
                margin-top: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <div class="brand">Fagarou</div>
        <div class="search-icon">
            <i class="fas fa-search"></i>
        </div>
    </nav>
    
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="welcome-title">Bonjour, {{ $user->prenom ?? '' }} {{ $user->name }}!</h1>
                <p class="welcome-text">Vous êtes maintenant connecté à votre compte Fagarou.</p>
            </div>
            <a href="{{ route('profile') }}" class="btn btn-outline-primary btn-lg" title="Mes informations">
                <i class="fas fa-user-edit"></i> Mes informations
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Section Résumé rapide / Suivi de santé -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow border-0 h-100">
                    <div class="card-body">
                        <i class="fas fa-file-medical fa-2x text-success mb-2"></i>
                        <h5 class="card-title">Ordonnances</h5>
                        <p class="card-text">Consultez et gérez vos ordonnances en un clic.</p>
                        <a href="#" class="btn btn-success btn-sm">Voir mes ordonnances</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow border-0 h-100">
                    <div class="card-body">
                        <i class="fas fa-bell fa-2x text-warning mb-2"></i>
                        <h5 class="card-title">Notifications</h5>
                        <p class="card-text">Soyez informé des nouveautés et rappels importants.</p>
                        <a href="#" class="btn btn-warning btn-sm text-white">Voir mes notifications</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow border-0 h-100">
                    <div class="card-body">
                        <i class="fas fa-heartbeat fa-2x text-danger mb-2"></i>
                        <h5 class="card-title">Conseil santé</h5>
                        <p class="card-text">Découvrez chaque jour un conseil pour votre bien-être.</p>
                        <a href="#" class="btn btn-danger btn-sm">Voir le conseil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions rapides -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <form action="{{ route('ordonnance.importer') }}" method="POST" enctype="multipart/form-data" class="mb-3" id="import-form">
                    @csrf
                    <input type="file" name="ordonnance" id="import-file" class="d-none" accept=".pdf,.jpg,.jpeg,.png" required>
                    <button type="button" class="btn btn-success btn-lg w-100 d-flex flex-column align-items-center justify-content-center py-4 shadow-sm" onclick="document.getElementById('import-file').click();">
                        <i class="fas fa-file-upload fa-2x mb-2"></i>
                        Importer votre ordonnance
                    </button>
                </form>
            </div>
            <div class="col-md-4 mb-3">
                <a href="#" class="btn btn-outline-success btn-lg w-100 d-flex flex-column align-items-center justify-content-center py-4 shadow-sm">
                    <i class="fas fa-search-location fa-2x mb-2"></i>
                    Rechercher une pharmacie
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="#" class="btn btn-outline-primary btn-lg w-100 d-flex flex-column align-items-center justify-content-center py-4 shadow-sm">
                    <i class="fas fa-file-medical-alt fa-2x mb-2"></i>
                    Mes ordonnances
                </a>
            </div>
        </div>

        <!-- Conseil santé du jour -->
        <div class="alert alert-success mb-4" role="alert" style="font-size: 1.2rem;">
            <strong>Conseil du jour :</strong> Buvez beaucoup d'eau pour rester hydraté !
        </div>

        <!-- Pharmacies proches -->
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-map-marker-alt text-success"></i> Pharmacies proches de chez vous</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Pharmacie Touba <span class="badge bg-success">Ouverte</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Pharmacie Médina <span class="badge bg-danger">Fermée</span>
                </li>
            </ul>
        </div>

        <!-- Localiser une pharmacie -->
        <div class="card mb-4 shadow border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <span><i class="fas fa-map-marker-alt text-success"></i> Localiser une pharmacie</span>
                <a href="#" id="btn-pharmacies-proches" class="btn btn-outline-success btn-sm">Voir toutes les pharmacies</a>
            </div>
            <div class="card-body">
                <form class="mb-3 d-flex" style="max-width: 400px;" method="GET" action="{{ route('home') }}">
                    <input type="text" name="q" class="form-control me-2" placeholder="Rechercher une pharmacie ou une ville..." value="{{ request('q') }}">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search-location"></i></button>
                </form>
                <div id="map" style="height: 300px; width: 100%; border-radius: 10px; overflow: hidden;"></div>
            </div>
        </div>
        @if(isset($pharmacies) && $pharmacies->isEmpty())
            <div class="alert alert-warning mt-3">Aucune pharmacie trouvée pour votre recherche.</div>
        @endif
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([{{ $lat }}, {{ $lng }}], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            var markers = [];
            // Marqueur position utilisateur (ou par défaut)
            var userMarker = L.marker([{{ $lat }}, {{ $lng }}], {icon: L.icon({iconUrl: 'https://cdn-icons-png.flaticon.com/512/64/64113.png', iconSize: [32,32], iconAnchor: [16,32]})})
                .addTo(map)
                .bindPopup('Vous êtes ici');
            markers.push(userMarker);

            // Marqueurs pharmacies
            @foreach($pharmacies as $pharma)
                var marker = L.marker([{{ $pharma->latitude }}, {{ $pharma->longitude }}]).addTo(map)
                    .bindPopup("{{ addslashes($pharma->nom) }}<br>{{ addslashes($pharma->adresse) }}<br>{{ number_format($pharma->distance ?? 0, 2) }} km");
                markers.push(marker);
            @endforeach

            // Recadrer la carte sur tous les marqueurs (si au moins une pharmacie)
            if (markers.length > 1) {
                var group = new L.featureGroup(markers);
                map.fitBounds(group.getBounds().pad(0.2));
            } else {
                map.setView([{{ $lat }}, {{ $lng }}], 13);
            }
        });

        document.getElementById('import-file').addEventListener('change', function() {
            if(this.files.length > 0) {
                document.getElementById('import-form').submit();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Ajout des liens Leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</body>
</html>