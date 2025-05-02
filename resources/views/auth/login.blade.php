<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Santé Fagarou - Connexion</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .login-card {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            position: relative;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            padding: 20px;
            position: relative;
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
        
        .close-btn {
            position: absolute;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #4a5568;
        }
        
        .pharmacy-background {
            height: 150px;
            background-image: url('https://placehold.co/600x150');
            background-size: cover;
            background-position: center;
        }
        
        .welcome-text {
            padding: 20px;
            text-align: center;
        }
        
        .welcome-text h2 {
            color: #2d3748;
            margin-bottom: 10px;
        }
        
        .welcome-text p {
            color: #4a5568;
            margin-top: 0;
            line-height: 1.5;
        }
        
        .login-form {
            padding: 0 30px 20px;
        }
        
        .form-group {
            margin-bottom: 16px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #4a5568;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
        }
        
        .login-buttons {
            padding: 0 30px 30px;
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
        
        .btn-google {
            background-color: white;
            border: 1px solid #e2e8f0;
            color: #4a5568;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .btn-google img {
            width: 20px;
            height: 20px;
            margin-right: 12px;
        }
        
        .btn-google:hover {
            background-color: #f7fafc;
        }
        
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: #a0aec0;
        }
        
        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .separator::before {
            margin-right: 10px;
        }
        
        .separator::after {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <img src="{{ asset('images/bb.jpg') }}" alt="Fagarou Logo" class="logo">
                <span class="tagline">Ma Santé Fagarou</span>
                <button class="close-btn">×</button>
            </div>
            
            {{-- <div class="pharmacy-background"></div> --}}

            <div class="welcome-text">
                <h2>Bienvenue chez Fagarou</h2>
                <p>Votre santé, entre de bonnes mains.<br>Commencez en quelques clics.</p>
            </div>
            
            <!-- Nouveaux champs de saisie pour la connexion -->
            <form class="login-form" action="{{ route('loginusers') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email ou numéro de téléphone</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Entrez votre email ou téléphone" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary btn-connect">SE CONNECTER</button>
            </form>

            <div class="login-buttons">
                <div class="separator">OU</div>
                <button class="btn btn-outline btn-register">S'INSCRIRE</button>
                {{-- <button class="btn btn-google">
                    <img src="https://placehold.co/20" alt="Google">
                    CONTINUER AVEC GOOGLE
                </button> --}}
            </div>
        </div>
    </div>
</body>
</html>