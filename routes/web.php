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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

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



