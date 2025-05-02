{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fagarou') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #00703C;
            --secondary-color: #f0f8f4;
            --text-color: #333;
            --light-gray: #f7f7f7;
            --border-radius: 10px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: var(--text-color);
        }
        
        /* Login Page Styles */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        
        .login-card {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            padding: 15px;
            position: relative;
        }
        
        .logo {
            width: 50px;
            height: 50px;
        }
        
        .tagline {
            margin-left: 10px;
            font-size: 14px;
            color: var(--primary-color);
        }
        
        .close-btn {
            position: absolute;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
        
        .pharmacy-background {
            width: 100%;
            height: 200px;
            background-image: url('../images/pharmacy-bg.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.8;
        }
        
        .welcome-text {
            padding: 20px;
            text-align: center;
        }
        
        .welcome-text h2 {
            font-size: 22px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .welcome-text p {
            font-size: 14px;
            line-height: 1.5;
            color: #666;
        }
        
        .login-buttons {
            padding: 0 20px 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .btn {
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            text-align: center;
            width: 100%;
            font-size: 14px;
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-google {
            background-color: white;
            border: 1px solid #ddd;
            color: #666;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        
        .btn-google img {
            width: 20px;
            height: 20px;
        }
        
        /* Home Page Styles */
        .home-container {
            max-width: 480px;
            margin: 0 auto;
            background: #fff;
            min-height: 100vh;
            position: relative;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #fff;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .menu-btn, .search-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: var(--primary-color);
        }
        
        .header-logo {
            width: 40px;
            height: 40px;
        }
        
        .banner {
            padding: 15px;
        }
        
        .banner h1 {
            color: var(--primary-color);
            font-size: 24px;
        }
        
        .banner p {
            font-size: 14px;
            color: #666;
        }
        
        .quick-access {
            padding: 0 15px;
        }
        
        .card {
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .card h3 {
            color: var(--primary-color);
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }
        
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .action-btn {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            background-color: white;
            border-radius: 5px;
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 500;
            font-size: 14px;
            border: 1px solid #e0e0e0;
        }
        
        .scanner-btn {
            background-color: var(--primary-color);
            color: white;
        }
        
        .action-btn .icon {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .advice-section {
            padding: 15px;
        }
        
        .advice-section h3 {
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .advice-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 15px;
            display: flex;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 10px;
        }
        
        .advice-content {
            flex: 1;
        }
        
        .advice-content h4 {
            font-size: 16px;
            margin-bottom: 5px;
            color: var(--primary-color);
        }
        
        .advice-content p {
            font-size: 13px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .advice-content a {
            font-size: 12px;
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .advice-image {
            width: 80px;
            height: 80px;
            margin-left: 10px;
        }
        
        .advice-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }
        
        .pagination-dots {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 10px;
        }
        
        .dot {
            width: 8px;
            height: 8px;
            background-color: #ddd;
            border-radius: 50%;
        }
        
        .dot.active {
            background-color: var(--primary-color);
        }
        
        .recent-searches {
            padding: 15px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .section-header h3 {
            font-size: 18px;
        }
        
        .section-header a {
            font-size: 12px;
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .product-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .product-card img {
            width: 100%;
            height: 120px;
            object-fit: contain;
            padding: 10px;
        }
        
        .product-info {
            padding: 10px;
        }
        
        .category {
            font-size: 11px;
            color: #666;
        }
        
        .product-info h4 {
            font-size: 14px;
            margin: 5px 0;
            color: var(--primary-color);
        }
        
        .price {
            font-size: 13px;
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .bottom-nav {
            display: flex;
            justify-content: space-around;
            background-color: white;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            max-width: 480px;
            margin: 0 auto;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .nav-item {
            text-decoration: none;
            color: #999;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 20px;
        }
        
        .nav-item.active {
            color: var(--primary-color);
        }
        {{-- Ajoutez ce code CSS au fichier app.blade.php à l'intérieur du style --}}
/* Styles pour les formulaires */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #666;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
}

.text-center {
    text-align: center;
}

/* Pour les messages flash */
.alert {
    padding: 10px 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 14px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>