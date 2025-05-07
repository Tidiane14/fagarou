<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Livreur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .animate-bounce-slow {
            animation: bounce 3s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .input-highlight:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-3xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="flex justify-center mb-4">
                    <div class="bg-green-100 p-4 rounded-full animate-bounce-slow">
                        <i class="fas fa-truck-fast text-green-600 text-4xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Devenez un Livreur, un Partenaire</h1>
                <p class="text-gray-600">Rejoignez notre réseau de livreurs et commencez à gagner de l'argent dès aujourd'hui</p>
            </div>

            <!-- Progress Steps -->
            <div class="flex justify-between mb-8 relative">
                <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 -z-10"></div>
                <div class="step flex flex-col items-center" data-step="1">
                    <div class="w-8 h-8 rounded-full bg-green-600 text-white flex items-center justify-center mb-2">1</div>
                    <span class="text-sm font-medium text-green-600">Informations</span>
                </div>
                <div class="step flex flex-col items-center" data-step="2">
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mb-2">2</div>
                    <span class="text-sm font-medium text-gray-500">Véhicule</span>
                </div>
                <div class="step flex flex-col items-center" data-step="3">
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mb-2">3</div>
                    <span class="text-sm font-medium text-gray-500">Documents</span>
                </div>
            </div>

            <!-- Form -->
            <form id="deliveryForm" class="bg-white rounded-xl shadow-md p-6 md:p-8">
                <!-- Step 1: Personal Info -->
                <div class="form-step active" data-step="1">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-user-circle text-green-500 mr-2"></i> Informations Personnelles
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <div class="relative">
                                <input type="text" id="firstName" name="firstName" required 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition input-highlight"
                                    placeholder="Votre prénom">
                                <i class="fas fa-user absolute right-3 top-3.5 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <div class="relative">
                                <input type="text" id="lastName" name="lastName" required 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition input-highlight"
                                    placeholder="Votre nom">
                                <i class="fas fa-user absolute right-3 top-3.5 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <input type="email" id="email" name="email" required 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition input-highlight"
                                    placeholder="email@exemple.com">
                                <i class="fas fa-envelope absolute right-3 top-3.5 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <div class="relative">
                                <input type="tel" id="phone" name="phone" required 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition input-highlight"
                                    placeholder="06 12 34 56 78">
                                <i class="fas fa-phone absolute right-3 top-3.5 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                            <div class="relative">
                                <input type="text" id="address" name="address" required 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition input-highlight"
                                    placeholder="Votre adresse complète">
                                <i class="fas fa-map-marker-alt absolute right-3 top-3.5 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end mt-8">
                        <button type="button" class="next-step bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-6 rounded-lg transition duration-300 flex items-center">
                            Suivant <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 2: Vehicle Info -->
                <div class="form-step hidden" data-step="2">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-car
