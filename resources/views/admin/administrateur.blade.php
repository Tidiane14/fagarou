<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administration</title>
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome via CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 flex items-center border-b border-gray-700">
                <span class="text-xl font-bold ml-2">Administration</span>
            </div>
            <nav class="mt-4">
                <div class="px-4 py-2 text-gray-400 uppercase text-xs">Menu principal</div>
                <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-tachometer-alt mr-3"></i> Tableau de bord
                </a>
                <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-users mr-3"></i> Utilisateurs
                </a>
                <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-box mr-3"></i> Produits
                </a>
                <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-shopping-cart mr-3"></i> Commandes
                </a>
                <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-cog mr-3"></i> Paramètres
                </a>
                
                <div class="px-4 py-2 text-gray-400 uppercase text-xs mt-4">Rapports</div>
                <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-chart-bar mr-3"></i> Statistiques
                </a>
                <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-file-alt mr-3"></i> Logs
                </a>
            </nav>
            
            <div class="absolute bottom-0 w-64 mb-6">
                <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 flex items-center">
                    <i class="fas fa-sign-out-alt mr-3"></i> Déconnexion
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <div class="flex items-center">
                    <button class="mr-4 text-gray-500 hover:text-gray-600 focus:outline-none sm:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="text-lg font-semibold">Tableau de bord</h1>
                </div>
                <div class="flex items-center">
                    <div class="relative mr-4">
                        <button class="text-gray-500 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </button>
                    </div>
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/40" alt="Avatar" class="h-8 w-8 rounded-full mr-2">
                        <span class="text-gray-700 mr-1">Admin</span>
                        <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-500 text-white p-3 rounded-full">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm">Utilisateurs</h3>
                                <p class="text-2xl font-semibold">{{ $totalUsers ?? 1250 }}</p>
                                <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 12% ce mois</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="bg-green-500 text-white p-3 rounded-full">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm">Produits</h3>
                                <p class="text-2xl font-semibold">{{ $totalProducts ?? 683 }}</p>
                                <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 5% ce mois</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="bg-purple-500 text-white p-3 rounded-full">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm">Commandes</h3>
                                <p class="text-2xl font-semibold">{{ $totalOrders ?? 245 }}</p>
                                <p class="text-red-500 text-sm"><i class="fas fa-arrow-down"></i> 3% ce mois</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="bg-yellow-500 text-white p-3 rounded-full">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-500 text-sm">Revenus</h3>
                                <p class="text-2xl font-semibold">{{ $totalRevenue ?? '45 320 €' }}</p>
                                <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 8% ce mois</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Activité récente</h2>
                        <a href="#" class="text-blue-500 hover:underline text-sm">Voir tout</a>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentActivities ?? [
                                    ['action' => 'Nouvelle commande', 'user' => 'Jean Dupont', 'date' => 'Il y a 2 heures', 'status' => 'success'],
                                    ['action' => 'Mise à jour produit', 'user' => 'Marie Martin', 'date' => 'Il y a 3 heures', 'status' => 'info'],
                                    ['action' => 'Nouvel utilisateur', 'user' => 'Pierre Durand', 'date' => 'Il y a 5 heures', 'status' => 'success'],
                                    ['action' => 'Commande annulée', 'user' => 'Sophie Petit', 'date' => 'Il y a 6 heures', 'status' => 'danger'],
                                    ['action' => 'Paiement reçu', 'user' => 'Thomas Bernard', 'date' => 'Il y a 8 heures', 'status' => 'success'],
                                ] as $activity)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $activity['action'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $activity['user'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $activity['date'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($activity['status'])
                                            @case('success')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Réussi
                                                </span>
                                                @break
                                            @case('info')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Info
                                                </span>
                                                @break
                                            @case('danger')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Erreur
                                                </span>
                                                @break
                                            @default
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    Neutre
                                                </span>
                                        @endswitch
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Two Column Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Users -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Utilisateurs récents</h2>
                        <div class="space-y-4">
                            @foreach($recentUsers ?? [
                                ['name' => 'Marie Dubois', 'email' => 'marie@example.com', 'role' => 'Admin', 'image' => 'https://via.placeholder.com/40'],
                                ['name' => 'Paul Martin', 'email' => 'paul@example.com', 'role' => 'Utilisateur', 'image' => 'https://via.placeholder.com/40'],
                                ['name' => 'Sophie Leroy', 'email' => 'sophie@example.com', 'role' => 'Éditeur', 'image' => 'https://via.placeholder.com/40'],
                                ['name' => 'Thomas Petit', 'email' => 'thomas@example.com', 'role' => 'Utilisateur', 'image' => 'https://via.placeholder.com/40'],
                            ] as $user)
                            <div class="flex items-center">
                                <img src="{{ $user['image'] }}" alt="User" class="h-10 w-10 rounded-full">
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">{{ $user['name'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $user['email'] }}</p>
                                </div>
                                <div class="ml-auto">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">{{ $user['role'] }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-blue-500 hover:underline text-sm">Voir tous les utilisateurs</a>
                        </div>
                    </div>

                    <!-- Tasks -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Tâches à faire</h2>
                        <div class="space-y-3">
                            @foreach($tasks ?? [
                                ['title' => 'Mettre à jour le catalogue produits', 'priority' => 'high', 'completed' => false],
                                ['title' => 'Répondre aux tickets support', 'priority' => 'medium', 'completed' => false],
                                ['title' => 'Préparer le rapport mensuel', 'priority' => 'high', 'completed' => true],
                                ['title' => 'Modifier les bannières promotionnelles', 'priority' => 'low', 'completed' => false],
                                ['title' => 'Revoir les commentaires en attente', 'priority' => 'medium', 'completed' => false],
                            ] as $task)
                            <div class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ $task['completed'] ? 'checked' : '' }}>
                                <span class="ml-2 text-sm {{ $task['completed'] ? 'line-through text-gray-400' : 'text-gray-700' }}">{{ $task['title'] }}</span>
                                <div class="ml-auto">
                                    @switch($task['priority'])
                                        @case('high')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Urgent</span>
                                            @break
                                        @case('medium')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Normal</span>
                                            @break
                                        @case('low')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Faible</span>
                                            @break
                                    @endswitch
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4 flex justify-between">
                            <a href="#" class="text-blue-500 hover:underline text-sm">Voir toutes les tâches</a>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm py-1 px-3 rounded">
                                <i class="fas fa-plus mr-1"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white py-4 px-6 border-t">
                <div class="text-center text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Mon Application Admin. Tous droits réservés.
                </div>
            </footer>
        </div>
    </div>

    <!-- Alpine.js for interactions (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js" defer></script>
</body>
</html>