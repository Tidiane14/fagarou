<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacie Fagarou - Suivi de Livraison</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #00a86b;
            --secondary-color: #4ade80;
            --accent-color: #059669;
            --success-color: #10b981;
            --warning-color: #ffab00;
            --danger-color: #ff5252;
            --text-color: #333;
            --light-text: #7a7a7a;
            --lighter-text: #a0a0a0;
            --bg-color: #f0fdf4;
            --card-bg: #ffffff;
            --shadow: 0 8px 30px rgba(0, 168, 107, 0.08);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--bg-color) 0%, #eef2f7 100%);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            padding: 0;
            margin: 0;
        }
        
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-icon {
            color: var(--primary-color);
            font-size: 24px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .logo h1 {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-left: 8px;
        }
        
        .card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 30px;
            transition: var(--transition);
            border-top: 4px solid transparent;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            padding: 20px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .card-header h2 {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-color);
            display: flex;
            align-items: center;
        }
        
        .card-header h2 i {
            margin-right: 10px;
            color: var(--primary-color);
            font-size: 20px;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .status-card {
            border-top: 4px solid var(--primary-color);
        }

        .delivery-card {
            border-top: 4px solid var(--secondary-color);
        }

        .medicament-card {
            border-top: 4px solid var(--accent-color);
        }
        
        .card:hover {
            border-top-color: var(--secondary-color);
        }
        
        .status-steps {
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
            position: relative;
        }
        
        .status-steps:before {
            content: '';
            position: absolute;
            top: 15px;
            left: 50px;
            right: 50px;
            height: 3px;
            background: #e4e8ee;
            z-index: 1;
        }
        
        .step {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 100px;
        }
        
        .step-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #e4e8ee;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            color: var(--lighter-text);
            transition: var(--transition);
        }
        
        .step.active .step-icon {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 5px 15px rgba(0, 168, 107, 0.3);
        }
        
        .step.completed .step-icon {
            background: var(--success-color);
            color: white;
        }
        
        .step-label {
            font-size: 12px;
            font-weight: 500;
            color: var(--light-text);
        }
        
        .step.active .step-label {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .step.completed .step-label {
            color: var(--success-color);
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .info-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .info-label {
            font-weight: 500;
            color: var(--light-text);
            flex: 1;
        }
        
        .info-value {
            font-weight: 600;
            color: var(--text-color);
            flex: 2;
            text-align: right;
        }
        
        .info-value.highlight {
            color: var(--primary-color);
        }
        
        .eta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(58, 123, 213, 0.05);
            padding: 15px;
            border-radius: var(--border-radius);
            margin-top: 20px;
        }
        
        .eta-label {
            font-weight: 500;
            color: var(--light-text);
        }
        
        .eta-time {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 18px;
        }
        
        .medication-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .medication-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .medication-icon {
            width: 40px;
            height: 40px;
            background: rgba(0, 168, 107, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .medication-icon i {
            color: var(--accent-color);
            font-size: 18px;
        }
        
        .medication-info {
            flex: 1;
        }
        
        .medication-name {
            font-weight: 600;
            margin-bottom: 3px;
        }
        
        .medication-id {
            font-size: 12px;
            color: var(--lighter-text);
        }
        
        .medication-price {
            font-weight: 700;
            font-size: 16px;
            color: var(--accent-color);
        }
        
        .footer {
            text-align: center;
            margin-top: 40px;
            color: var(--light-text);
            font-size: 14px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 168, 107, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 168, 107, 0.4);
        }
        
        .btn i {
            margin-right: 5px;
        }
        
        @media (max-width: 768px) {
            .status-steps {
                overflow-x: auto;
                padding-bottom: 15px;
                justify-content: flex-start;
            }
            
            .status-steps:before {
                left: 50px;
                right: 150px;
            }
            
            .step {
                min-width: 100px;
                margin-right: 20px;
            }
            
            .info-row {
                flex-direction: column;
            }
            
            .info-value {
                text-align: left;
                margin-top: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <i class="fas fa-leaf logo-icon"></i>
                <h1>Pharmacie Fagarou</h1>
            </div>
            <a href="#" class="btn">
                <i class="fas fa-headset"></i> Assistance
            </a>
        </header>
        
        <div class="card status-card">
            <div class="card-header">
                <h2><i class="fas fa-truck-fast"></i> Statut de la Commande</h2>
                <span class="info-value highlight">CMD-2023-0458</span>
            </div>
            <div class="card-body">
                <div class="status-steps">
                    <div class="step completed">
                        <div class="step-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="step-label">Confirmé</div>
                    </div>
                    <div class="step completed">
                        <div class="step-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="step-label">Préparé</div>
                    </div>
                    <div class="step active">
                        <div class="step-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="step-label">En livraison</div>
                    </div>
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="step-label">Livré</div>
                    </div>
                </div>
                
                <div class="eta">
                    <div class="eta-label">Temps estimé d'arrivée:</div>
                    <div class="eta-time">{{ $livraison->eta ?? '14:30' }}</div>
                </div>
            </div>
        </div>
        
        <div class="card delivery-card">
            <div class="card-header">
                <h2><i class="fas fa-map-marker-alt"></i> Détails de la Livraison</h2>
                <span class="badge">{{ $livraison->date ?? '02/05/2025' }}</span>
            </div>
            <div class="card-body">
                <div class="info-row">
                    <div class="info-label">Adresse:</div>
                    <div class="info-value">{{ $livraison->adresse ?? 'Rue 25, Avenue de la Pharmacie, Q. Fagarou' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Livreur:</div>
                    <div class="info-value">{{ $livreur->name ?? 'Amadou Diallo' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Contact Livreur:</div>
                    <div class="info-value">{{ $livreur->contact ?? '+221 70 12 34 56' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Destinataire:</div>
                    <div class="info-value">{{ $receveur->name ?? 'Marie Konaté' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Contact Destinataire:</div>
                    <div class="info-value">{{ $receveur->contact ?? '+221 76 78 90 12' }}</div>
                </div>
            </div>
        </div>
        
        <div class="card medicament-card">
            <div class="card-header">
                <h2><i class="fas fa-pills"></i> Détails des Médicaments</h2>
                <span class="badge">{{ $commande->items ?? '3 articles' }}</span>
            </div>
            <div class="card-body">
                <div class="medication-item">
                    <div class="medication-icon">
                        <i class="fas fa-capsules"></i>
                    </div>
                    <div class="medication-info">
                        <div class="medication-name">{{ $medicament->nom ?? 'Paracétamol 500mg' }}</div>
                        <div class="medication-id">ID: {{ $medicament->id ?? 'MED-2023-001' }}</div>
                    </div>
                    <div class="medication-price">{{ $medicament->prix ?? '3,500' }} FCFA</div>
                </div>
                
                <div class="medication-item">
                    <div class="medication-icon">
                        <i class="fas fa-tablets"></i>
                    </div>
                    <div class="medication-info">
                        <div class="medication-name">{{ $medicaments[1]->nom ?? 'Amoxicilline 250mg' }}</div>
                        <div class="medication-id">ID: {{ $medicaments[1]->id ?? 'MED-2023-042' }}</div>
                    </div>
                    <div class="medication-price">{{ $medicaments[1]->prix ?? '5,800' }} FCFA</div>
                </div>
                
                <div class="medication-item">
                    <div class="medication-icon">
                        <i class="fas fa-prescription-bottle"></i>
                    </div>
                    <div class="medication-info">
                        <div class="medication-name">{{ $medicaments[2]->nom ?? 'Sirop Antitussif' }}</div>
                        <div class="medication-id">ID: {{ $medicaments[2]->id ?? 'MED-2023-108' }}</div>
                    </div>
                    <div class="medication-price">{{ $medicaments[2]->prix ?? '4,200' }} FCFA</div>
                </div>
                
                <div class="info-row" style="margin-top: 20px; border-top: 1px solid rgba(0,0,0,0.05); padding-top: 15px;">
                    <div class="info-label">Total:</div>
                    <div class="info-value highlight">{{ $commande->total ?? '13,500' }} FCFA</div>
                </div>
            </div>
        </div>
        
        <div class="footer">
            © 2025 Pharmacie Fagarou | <i class="fas fa-leaf" style="color: var(--primary-color);"></i> Votre santé, notre priorité | Tous droits réservés.
        </div>
    </div>
</body>
</html>