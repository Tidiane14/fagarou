@extends('layouts.app')

@section('content')
<style>
    /* Variables de couleurs */
    :root {
        --primary-green: #1ab394;
        --dark-green: #18a689;
        --light-green: #e7f9f6;
        --accent-green: #69e2c7;
        --hover-green: #149e82;
        --gradient-green: linear-gradient(135deg, #1ab394 0%, #149e82 100%);
    }

    /* Styles globaux */
    body {
        background-color: #f3f3f9;
        color: #3e5569;
    }

    /* Container principal */
    .ordonnance-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    /* Entête de page */
    .ordonnance-header {
        text-align: center;
        background: var(--gradient-green);
        padding: 40px 30px;
        border-radius: 16px;
        margin-bottom: 30px;
        box-shadow: 0 15px 30px rgba(26, 179, 148, 0.3);
        position: relative;
        overflow: hidden;
    }

    .ordonnance-header::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 60%);
        z-index: 0;
    }

    .ordonnance-title {
        color: white;
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
        text-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .ordonnance-subtitle {
        color: rgba(255,255,255,0.9);
        font-size: 1.3rem;
        font-weight: 400;
        position: relative;
        z-index: 1;
    }

    /* Sections */
    .section-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        overflow: hidden;
        margin-bottom: 30px;
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .section-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(26, 179, 148, 0.15);
    }

    .section-header {
        background-color: white;
        padding: 20px 30px;
        border-bottom: 3px solid var(--accent-green);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .section-title {
        color: var(--primary-green);
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .section-title i {
        margin-right: 12px;
        font-size: 1.6rem;
        background: var(--light-green);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-green);
    }

    .section-body {
        padding: 30px;
    }

    /* Formulaires */
    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-control, .form-select {
        height: 50px;
        padding: 10px 15px;
        border-radius: 10px;
        border: 2px solid #edf2f9;
        background-color: #f9fbfd;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 0 0.25rem rgba(26, 179, 148, 0.25);
        background-color: white;
    }

    .form-control::placeholder {
        color: #b1b7c1;
        opacity: 0.7;
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    /* Médicaments */
    .medication-container {
        margin-top: 20px;
    }

    .medication-item {
        background-color: var(--light-green);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        border-left: 5px solid var(--primary-green);
        position: relative;
        overflow: hidden;
    }

    .medication-item::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, rgba(105, 226, 199, 0.2) 0%, rgba(105, 226, 199, 0) 70%);
        top: -75px;
        right: -75px;
        border-radius: 50%;
        z-index: 0;
    }

    .medication-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .medication-title {
        font-weight: 700;
        color: #149e82;
        font-size: 1.2rem;
        margin: 0;
    }

    /* Boutons */
    .btn-primary-green {
        background: var(--gradient-green);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 15px rgba(26, 179, 148, 0.25);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary-green:hover {
        background: linear-gradient(135deg, #149e82 0%, #118a72 100%);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(26, 179, 148, 0.35);
        color: white;
    }

    .btn-outline-green {
        background-color: white;
        color: var(--primary-green);
        border: 2px solid var(--primary-green);
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-outline-green:hover {
        background-color: var(--light-green);
        border-color: var(--primary-green);
        color: var(--primary-green);
    }

    .btn-outline-danger {
        background-color: white;
        color: #dc3545;
        border: 2px solid #dc3545;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-danger:hover {
        background-color: #ffecee;
        color: #dc3545;
    }

    /* Icône "plus" */
    .add-icon {
        background-color: var(--primary-green);
        color: white;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 5px;
        font-size: 18px;
        line-height: 0;
    }

    /* Grille pour info patient */
    .patient-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 25px;
    }

    @media (min-width: 992px) {
        .patient-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Signature */
    .signature-area {
        margin-top: 25px;
        padding: 25px;
        border: 2px dashed var(--accent-green);
        border-radius: 12px;
        background-color: var(--light-green);
        text-align: center;
        position: relative;
    }

    .signature-title {
        font-weight: 700;
        color: var(--primary-green);
        margin-bottom: 5px;
    }

    .signature-subtitle {
        color: #6c757d;
        font-size: 0.9rem;
    }

    /* Bouton de validation */
    .submit-container {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 40px;
    }

    /* Animation de pulsation */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(26, 179, 148, 0.5);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(26, 179, 148, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(26, 179, 148, 0);
        }
    }

    .pulse {
        animation: pulse 2s infinite;
    }

    /* Animation pour les nouveaux médicaments */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fadeInUp {
        animation: fadeInUp 0.5s ease forwards;
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(20px);
        }
    }

    .fadeOut {
        animation: fadeOut 0.5s ease forwards;
    }
</style>

<div class="ordonnance-wrapper">
    <!-- Entête -->
    <div class="ordonnance-header">
        <h1 class="ordonnance-title">Création d'Ordonnance</h1>
        <p class="ordonnance-subtitle">Prescrivez des médicaments avec précision et simplicité</p>
    </div>
    
    <form action="{{ route('ordonance') }}" method="POST">
        @csrf
        
        <!-- Informations du patient -->
        <div class="section-card">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-user-circle"></i>
                    Informations du patient
                </h2>
            </div>
            <div class="section-body">
                <div class="patient-grid">
                    <div>
                        <label for="patient_nom" class="form-label">Nom du patient</label>
                        <input type="text" class="form-control" id="patient_nom" name="patient_nom" required placeholder="Entrez le nom du patient">
                    </div>
                    <div>
                        <label for="patient_prenom" class="form-label">Prénom du patient</label>
                        <input type="text" class="form-control" id="patient_prenom" name="patient_prenom" required placeholder="Entrez le prénom du patient">
                    </div>
                    <div>
                        <label for="patient_date_naissance" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="patient_date_naissance" name="patient_date_naissance">
                    </div>
                    <div>
                        <label for="patient_sexe" class="form-label">Sexe</label>
                        <select class="form-select" id="patient_sexe" name="patient_sexe">
                            <option value="" selected disabled>Choisir</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                    <div>
                        <label for="patient_telephone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="patient_telephone" name="patient_telephone" placeholder="Ex: 06 12 34 56 78">
                    </div>
                    <div>
                        <label for="patient_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="patient_email" name="patient_email" placeholder="patient@exemple.com">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="patient_adresse" class="form-label">Adresse complète</label>
                        <input type="text" class="form-control" id="patient_adresse" name="patient_adresse" placeholder="Adresse du patient">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Médicaments -->
        <div class="section-card">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-pills"></i>
                    Prescription médicamenteuse
                </h2>
                <button type="button" id="add-medication" class="btn-outline-green">
                    <span class="add-icon">+</span> Ajouter un médicament
                </button>
            </div>
            <div class="section-body">
                <div id="medications-container" class="medication-container">
                    <div class="medication-item">
                        <div class="medication-header">
                            <h3 class="medication-title">Médicament #1</h3>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="medicament_1" class="form-label">Nom du médicament</label>
                                <input type="text" class="form-control" id="medicament_1" name="medicaments[0][nom]" required placeholder="Ex: Paracétamol">
                            </div>
                            <div class="col-md-3">
                                <label for="dosage_1" class="form-label">Dosage</label>
                                <input type="text" class="form-control" id="dosage_1" name="medicaments[0][dosage]" required placeholder="Ex: 1000mg">
                            </div>
                            <div class="col-md-3">
                                <label for="forme_1" class="form-label">Forme</label>
                                <select class="form-select" id="forme_1" name="medicaments[0][forme]">
                                    <option value="" selected disabled>Choisir</option>
                                    <option value="comprimé">Comprimé</option>
                                    <option value="gélule">Gélule</option>
                                    <option value="sirop">Sirop</option>
                                    <option value="solution">Solution</option>
                                    <option value="poudre">Poudre</option>
                                    <option value="patch">Patch</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="posologie_1" class="form-label">Posologie</label>
                                <input type="text" class="form-control" id="posologie_1" name="medicaments[0][posologie]" required placeholder="Ex: 1 comprimé 3 fois par jour">
                            </div>
                            <div class="col-md-3">
                                <label for="duree_1" class="form-label">Durée</label>
                                <input type="text" class="form-control" id="duree_1" name="medicaments[0][duree]" placeholder="Ex: 7 jours">
                            </div>
                            <div class="col-md-3">
                                <label for="voie_1" class="form-label">Voie d'administration</label>
                                <select class="form-select" id="voie_1" name="medicaments[0][voie]">
                                    <option value="" selected disabled>Choisir</option>
                                    <option value="orale">Orale</option>
                                    <option value="cutanée">Cutanée</option>
                                    <option value="inhalée">Inhalée</option>
                                    <option value="intraveineuse">Intraveineuse</option>
                                    <option value="intramusculaire">Intramusculaire</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="instructions_1" class="form-label">Instructions spéciales</label>
                                <textarea class="form-control" id="instructions_1" name="medicaments[0][instructions]" rows="2" placeholder="Ex: À prendre pendant les repas"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Notes et remarques -->
        <div class="section-card">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-clipboard-list"></i>
                    Notes et recommandations
                </h2>
            </div>
            <div class="section-body">
                <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Ajouter des notes ou recommandations supplémentaires pour le patient..."></textarea>
            </div>
        </div>
        
        <!-- Date et signature -->
        <div class="section-card">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-signature"></i>
                    Date et signature
                </h2>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="date_prescription" class="form-label">Date de prescription</label>
                        <input type="date" class="form-control" id="date_prescription" name="date_prescription" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lieu_prescription" class="form-label">Lieu</label>
                        <input type="text" class="form-control" id="lieu_prescription" name="lieu_prescription" placeholder="Ex: Paris">
                    </div>
                </div>
                
                <div class="signature-area">
                    <p class="signature-title">Signature du médecin</p>
                    <p class="signature-subtitle">Cette ordonnance sera validée électroniquement lors de sa soumission</p>
                </div>
            </div>
        </div>
        
        <div class="submit-container">
            <button type="button" class="btn btn-outline-secondary px-4 py-3">Annuler</button>
            <button type="submit" class="btn-primary-green px-5 py-3 pulse">
                <i class="fas fa-check-circle"></i> Valider l'ordonnance
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let medicationCount = 1;
        
        document.getElementById('add-medication').addEventListener('click', function() {
            medicationCount++;
            
            const medicationItem = document.createElement('div');
            medicationItem.className = 'medication-item fadeInUp';
            medicationItem.innerHTML = `
                <div class="medication-header">
                    <h3 class="medication-title">Médicament #${medicationCount}</h3>
                    <button type="button" class="btn-outline-danger remove-medication">
                        <i class="fas fa-times"></i> Retirer
                    </button>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="medicament_${medicationCount}" class="form-label">Nom du médicament</label>
                        <input type="text" class="form-control" id="medicament_${medicationCount}" name="medicaments[${medicationCount-1}][nom]" required placeholder="Ex: Paracétamol">
                    </div>
                    <div class="col-md-3">
                        <label for="dosage_${medicationCount}" class="form-label">Dosage</label>
                        <input type="text" class="form-control" id="dosage_${medicationCount}" name="medicaments[${medicationCount-1}][dosage]" required placeholder="Ex: 1000mg">
                    </div>
                    <div class="col-md-3">
                        <label for="forme_${medicationCount}" class="form-label">Forme</label>
                        <select class="form-select" id="forme_${medicationCount}" name="medicaments[${medicationCount-1}][forme]">
                            <option value="" selected disabled>Choisir</option>
                            <option value="comprimé">Comprimé</option>
                            <option value="gélule">Gélule</option>
                            <option value="sirop">Sirop</option>
                            <option value="solution">Solution</option>
                            <option value="poudre">Poudre</option>
                            <option value="patch">Patch</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="posologie_${medicationCount}" class="form-label">Posologie</label>
                        <input type="text" class="form-control" id="posologie_${medicationCount}" name="medicaments[${medicationCount-1}][posologie]" required placeholder="Ex: 1 comprimé 3 fois par jour">
                    </div>
                    <div class="col-md-3">
                        <label for="duree_${medicationCount}" class="form-label">Durée</label>
                        <input type="text" class="form-control" id="duree_${medicationCount}" name="medicaments[${medicationCount-1}][duree]" placeholder="Ex: 7 jours">
                    </div>
                    <div class="col-md-3">
                        <label for="voie_${medicationCount}" class="form-label">Voie d'administration</label>
                        <select class="form-select" id="voie_${medicationCount}" name="medicaments[${medicationCount-1}][voie]">
                            <option value="" selected disabled>Choisir</option>
                            <option value="orale">Orale</option>
                            <option value="cutanée">Cutanée</option>
                            <option value="inhalée">Inhalée</option>
                            <option value="intraveineuse">Intraveineuse</option>
                            <option value="intramusculaire">Intramusculaire</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <label for="instructions_${medicationCount}" class="form-label">Instructions spéciales</label>
                        <textarea class="form-control" id="instructions_${medicationCount}" name="medicaments[${medicationCount-1}][instructions]" rows="2" placeholder="Ex: À prendre pendant les repas"></textarea>
                    </div>
                </div>
            `;
            
            document.getElementById('medications-container').appendChild(medicationItem);
            
            // Scroll to the newly added medication
            medicationItem.scrollIntoView({behavior: 'smooth'});
            
            // Add event listener to newly added remove button
            medicationItem.querySelector('.remove-medication').addEventListener('click', function() {
                medicationItem.classList.remove('fadeInUp');
                medicationItem.classList.add('fadeOut');
                setTimeout(() => {
                    medicationItem.remove();
                }, 500);
            });
        });
        
        // Event delegation for dynamically added remove buttons
        document.getElementById('medications-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-medication') || e.target.parentElement.classList.contains('remove-medication')) {
                const item = e.target.closest('.medication-item');
                if (item) {
                    item.classList.remove('fadeInUp');
                    item.classList.add('fadeOut');
                    setTimeout(() => {
                        item.remove();
                    }, 500);
                }
            }
        });
    });
</script>
@endsection