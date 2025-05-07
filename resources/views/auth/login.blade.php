
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
            background: linear-gradient(135deg, #f0f4f8, #edf2f7);
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
            box-shadow: 0 10px 30px rgba(66, 153, 225, 0.15);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(66, 153, 225, 0.2);
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            padding: 20px;
            position: relative;
            border-bottom: 1px solid #f0f4f8;
        }
        
        .logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 2px 10px rgba(66, 153, 225, 0.2);
        }
        
        .tagline {
            margin-left: 12px;
            font-weight: bold;
            color: #38b2ac; /* Turquoise */
            font-size: 18px;
        }
        
        .close-btn {
            position: absolute;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #4a5568;
            transition: color 0.3s ease;
        }
        
        .close-btn:hover {
            color: #38b2ac; /* Turquoise */
        }
        
        .welcome-text {
            padding: 25px 20px;
            text-align: center;
            background: linear-gradient(to right, #f0f9ff, #e6f7ff);
        }
        
        .welcome-text h2 {
            color: #2d3748;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .welcome-text p {
            color: #4a5568;
            margin-top: 0;
            line-height: 1.6;
        }
        
        .login-form {
            padding: 20px 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #4a5568;
            font-weight: 500;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #38b2ac; /* Turquoise */
            box-shadow: 0 0 0 3px rgba(56, 178, 172, 0.2); /* Turquoise */
        }
        
        .login-buttons {
            padding: 0 30px 30px;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            margin-bottom: 16px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-transform: uppercase;
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }
        
        .btn-primary {
            background-color: #38b2ac; /* Turquoise */
            color: white;
            box-shadow: 0 4px 6px rgba(56, 178, 172, 0.2); /* Turquoise */
        }
        
        .btn-primary:hover {
            background-color: #2c7a7b; /* Darker turquoise */
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(56, 178, 172, 0.3); /* Turquoise */
        }
        
        .btn-outline {
            background-color: transparent;
            border: 2px solid #38b2ac; /* Turquoise */
            color: #38b2ac; /* Turquoise */
            box-shadow: 0 2px 4px rgba(56, 178, 172, 0.1); /* Turquoise */
        }
        
        .btn-outline:hover {
            background-color: rgba(56, 178, 172, 0.05); /* Turquoise */
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(56, 178, 172, 0.15); /* Turquoise */
        }
        
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: #a0aec0;
            font-size: 14px;
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
        
        .forgot-password {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 20px;
        }
        
        .forgot-password a {
            color: #38b2ac; /* Turquoise */
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        
        .forgot-password a:hover {
            color: #2c7a7b; /* Darker turquoise */
            text-decoration: underline;
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

            <div class="welcome-text">
                <h2>Bienvenue chez Fagarou</h2>
                <p>Votre santé, entre de bonnes mains.<br>Commencez en quelques clics.</p>
            </div>
            
            <form class="login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email ou numéro de téléphone</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Entrez votre email ou téléphone" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Mot de passe oublié?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-connect">SE CONNECTER</button>
            </form>

            <div class="login-buttons">
                <div class="separator">OU</div>
                <a href="/register" style="text-decoration: none;">
                    <button class="btn btn-outline btn-register">S'INSCRIRE</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
