<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Fagarou</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
        <div class="welcome-card">
            <h1 class="welcome-title">Bonjour, {{ $user->prenom ?? '' }} {{ $user->name }}!</h1>
            <p class="welcome-text">Vous êtes maintenant connecté à votre compte Fagarou.</p>
        </div>
        
        <div class="profile-card">
            <div class="profile-header">
                <i class="fas fa-user-circle"></i> Votre profil
            </div>
            
            @if($user->photo)
                <img src="{{ $user->photo }}" alt="Photo de profil" class="profile-photo">
            @else
                <div class="profile-no-photo">
                    <i class="fas fa-user"></i>
                </div>
            @endif
            
            <div class="profile-body">
                <div class="profile-info">
                    <div class="info-label">Nom:</div>
                    <div class="info-value">{{ $user->name }}</div>
                </div>
                
                @if($user->prenom)
                <div class="profile-info">
                    <div class="info-label">Prénom:</div>
                    <div class="info-value">{{ $user->prenom }}</div>
                </div>
                @endif
                
                @if($user->date_naissance)
                <div class="profile-info">
                    <div class="info-label">Date de naissance:</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($user->date_naissance)->format('d/m/Y') }}</div>
                </div>
                @endif
                
                @if($user->adresse)
                <div class="profile-info">
                    <div class="info-label">Adresse:</div>
                    <div class="info-value">{{ $user->adresse }}</div>
                </div>
                @endif
                
                @if($user->telephone)
                <div class="profile-info">
                    <div class="info-label">Téléphone:</div>
                    <div class="info-value">{{ $user->telephone }}</div>
                </div>
                @endif
                
                <div class="profile-info">
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $user->email }}</div>
                </div>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animations and interactions could be added here
            console.log('Page chargée avec succès');
        });
    </script>
</body>
</html>