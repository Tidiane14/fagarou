<?php

use App\Http\Controllers\user\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\medicament\MedicamentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LivreurController;



use App\Http\Controllers\livraisonController;

     
use App\Http\Controllers\stock\stockController;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pharmacie;
use Illuminate\Support\Facades\Http;



// Route::get('/', function () {
//     return view('welcome');
// });


//Routes Médicaments
Route::get('/medicaments', [MedicamentController::class, 'index'])->name('medicaments.index');
Route::get('/medicaments/{id}', [MedicamentController::class, 'show'])->name('medicaments.show');
Route::post('/panier/ajouter', [MedicamentController::class, 'addToCart'])->name('panier.ajouter');
Route::get('/medicaments/create', [MedicamentController::class, 'create'])->name('medicaments.create');
Route::get('/medicaments/{id}/edit', [MedicamentController::class, 'edit'])->name('medicaments.edit');
Route::put('/medicaments/{id}', [MedicamentController::class, 'update'])->name('medicaments.update');
Route::delete('/medicaments/{id}', [MedicamentController::class, 'destroy'])->name('medicaments.destroy');




//  Route::get('/register', function () {
//      return view('auth.register');
//  });



// Routes d'authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




// Routes d'inscription
// Routes d'inscription (GET)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Routes d'inscription (POST)
Route::post('/register', [RegisterController::class, 'register']);



// Route d'accueil après connexion

Route::get('/home', function (Request $request) {
    $user = Auth::user();
    $lat = $request->query('lat', 14.6928); // Dakar par défaut
    $lng = $request->query('lng', -17.4467);
    $radius = 10; // rayon en km
    $q = $request->query('q');

    $query = App\Models\Pharmacie::query();

    if ($q) {
        // Recherche par nom ou adresse (ville)
        $query->where(function($sub) use ($q) {
            $sub->where('nom', 'like', "%$q%")
                 ->orWhere('adresse', 'like', "%$q%");
        });
    } elseif ($request->has('lat') && $request->has('lng')) {
        // Recherche géographique par défaut
        $query->selectRaw(
            '*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
            [$lat, $lng, $lat]
        )
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        ->having('distance', '<', $radius)
        ->orderBy('distance');
    } else {
        // Aucune recherche : on prend toutes les pharmacies du Sénégal
        $query->whereNotNull('latitude')->whereNotNull('longitude');
    }

    $pharmacies = $query->limit(100)->get();

    return view('home', compact('user', 'pharmacies', 'lat', 'lng', 'q'));
})->name('home')->middleware('auth');

// Routes pour livreur
Route::get('/livreur/create', [LivreurController::class, 'create'])->name('livreur.create');
Route::post('/livreur/store', [LivreurController::class, 'store'])->name('livreur.store');


// Route page livraison
Route::get('/livraison', [livraisonController::class, 'showLivraison'])->name('livraison');

Route::get('/stock', [stockController::class, 'index'])->name('stocks.index');
//Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/ordonnance ', function () {
    return view('ordonnances');
})->name('ordonance');


Route::get('/administrateur', function () {
    return view('admin.administrateur');
})->name('admin');


Route::get('/profile', function () {
    $user = Auth::user();
    return view('profile', compact('user'));
})->name('profile')->middleware('auth');

Route::get('/pharmacies-proches', function (Request $request) {
    $lat = $request->query('lat', 14.6928);
    $lng = $request->query('lng', -17.4467);
    $radius = 10; // rayon en km

    $pharmacies = Pharmacie::selectRaw(
        '*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
        [$lat, $lng, $lat]
    )
    ->whereNotNull('latitude')
    ->whereNotNull('longitude')
    ->having('distance', '<', $radius)
    ->orderBy('distance')
    ->limit(20)
    ->get();

    return view('pharmacies-proches', compact('pharmacies', 'lat', 'lng'));
})->name('pharmacies.proches')->middleware('auth');

Route::get('/api/pharmacies-proches', function (Request $request) {
    $lat = $request->query('lat', 14.6928);
    $lng = $request->query('lng', -17.4467);
    $radius = 10; // rayon en km

    $pharmacies = Pharmacie::selectRaw(
        '*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
        [$lat, $lng, $lat]
    )
    ->whereNotNull('latitude')
    ->whereNotNull('longitude')
    ->having('distance', '<', $radius)
    ->orderBy('distance')
    ->limit(20)
    ->get();

    return response()->json($pharmacies);
});

Route::get('/osm-proxy', function(Request $request) {
    $q = $request->query('q', '');
    $country = $request->query('country', 'Senegal');
    $url = 'https://nominatim.openstreetmap.org/search';
    $response = Http::withHeaders([
        'User-Agent' => 'FagarouApp/1.0 (contact@tonsite.com)'
    ])->get($url, [
        'country' => $country,
        'q' => $q,
        'format' => 'json',
        'limit' => 50
    ]);
    return $response->json();
});

Route::post('/importer-ordonnance', function(Request $request) {
    $request->validate([
        'ordonnance' => 'required|file|mimes:pdf,jpg,jpeg,png|max:4096'
    ]);
    $path = $request->file('ordonnance')->store('ordonnances', 'public');
    // Ici tu peux enregistrer le chemin dans la base, notifier l'utilisateur, etc.
    return back()->with('success', 'Ordonnance importée avec succès !');
})->name('ordonnance.importer')->middleware('auth');



