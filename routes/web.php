<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ensure Auth facade is imported if not already
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeautyPlannerController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SavedArticleController;

Route::middleware(['auth'])->group(function () {
    Route::get('/saved', [SavedArticleController::class, 'index'])->name('saved.index');
    Route::post('/saved/{artikelId}', [SavedArticleController::class, 'store'])->name('saved.store');
    Route::delete('/saved/{artikelId}', [SavedArticleController::class, 'destroy'])->name('saved.destroy');
});


Route::get('/', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

// Route::get('/', function () {
//     return view('home');
// })->middleware(['auth'])->name('home');
// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth'])->name('admin.index');
    
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/team', function () {
    return view('meetourteam');
})
    ->middleware(['auth'])
    ->name('team');

Route::get('/profile', function () {
    return view('profile');
})->name('profile'); // Correct route name for the view page

Route::post('/artikel/favorite', [FavouriteController::class, 'favorite'])->name('artikel.favorite');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.view');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.edit');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin/users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/kategori/store', [AdminController::class, 'kategori'])->name('kategori.store');
    Route::delete('/kategori/{id}', [AdminController::class, 'destroyKategori'])->name('kategori.destroy');
    Route::put('/kategori/{id}', [AdminController::class, 'updateKategori'])->name('kategori.update');
    Route::post('/artikel', [AdminController::class, 'artikel'])->name('artikel.store');
    Route::get('/penggunaa', [AdminController::class, 'pengguna'])->name('penggunaa.index');
    Route::get('/artikels', [AdminController::class, 'artikels'])->name('artikels.index');
    Route::get('/kategorii', [AdminController::class, 'kategorii'])->name('kategorii.index');
    Route::get('/masukkan-pengguna', [AdminController::class, 'masukkan'])->name('feedback.index');
    Route::put('/feedbacks/{id}/mark-as-read', [AdminController::class, 'markAsRead'])->name('feedbacks.markAsRead');
    // Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.edit');
});

Route::get('/register', function () {
    return view('signup'); // Placeholder for your actual registration view
})->name('register');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Planner
Route::middleware('auth')->group(function () {
    Route::get('/beauty-planners', [BeautyPlannerController::class, 'index'])->name('beauty-planners.index');
    Route::post('/beauty-planners', [BeautyPlannerController::class, 'store'])->name('beauty-planners.store');
    Route::post('/beauty-planner/{id}/done', [BeautyPlannerController::class, 'toggleDone']);
    Route::get('/beauty-planners/sort', [BeautyPlannerController::class, 'sort'])->name('beauty-planners.sort');
    Route::post('/beauty-planners/{id}', [BeautyPlannerController::class, 'update'])->name('beauty-planners.update');
    Route::delete('/beauty-planners/{id}', [BeautyPlannerController::class, 'destroy'])->name('beauty-planners.destroy');
});
// Feedback
Route::middleware('auth')->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('Feedback.index');
    Route::post('/feedback/edit', [FeedbackController::class, 'store'])->name('feedback.store');
    // Route::post('/beauty-planners', [BeautyPlannerController::class, 'store'])->name('beauty-planners.store');
    // Route::post('/beauty-planner/{id}/done', [BeautyPlannerController::class, 'toggleDone']);
    // Route::get('/beauty-planners/sort', [BeautyPlannerController::class, 'sort'])->name('beauty-planners.sort');
    // Route::post('/beauty-planners/{id}', [BeautyPlannerController::class, 'update'])->name('beauty-planners.update');
    // Route::delete('/beauty-planners/{id}', [BeautyPlannerController::class, 'destroy'])->name('beauty-planners.destroy');
});

// Journal
Route::middleware('auth')->group(function () {
    Route::get('/journal', [JournalController::class, 'index'])->name('journal.index');
    Route::delete('/journal/{id}', [JournalController::class, 'destroy'])->name('journal.destroy');
    Route::post('/store', [JournalController::class, 'store'])->name('journal.store');
    Route::get('/menulis-journal', [JournalController::class, 'menulis'])->name('menulis-journal.menulis');
});

// Edukasi
Route::middleware('auth')->group(function () {
    Route::get('/edukasi', [EducationController::class, 'index'])->name('edukasi.index');
    Route::get('/rekomendasi', [EducationController::class, 'inder'])->name('rekomendasi.index');
    Route::get('/bookmark', [EducationController::class, 'indeb'])->name('bookmark.index');
    // Route::delete('/journal/{id}', [JournalController::class, 'destroy'])->name('journal.destroy');
    // Route::post('/store', [JournalController::class, 'store'])->name('journal.store');
    // Route::get('/menulis-journal', [JournalController::class, 'menulis'])->name('menulis-journal.menulis');
});

// favorite
Route::middleware('auth')->group(function () {
    Route::get('/favorit', [FavouriteController::class, 'index'])->name('favorit.index');
    // Route::delete('/journal/{id}', [JournalController::class, 'destroy'])->name('journal.destroy');
    // Route::post('/store', [JournalController::class, 'store'])->name('journal.store');
    // Route::get('/menulis-journal', [JournalController::class, 'menulis'])->name('menulis-journal.menulis');
});

Route::get('/cek-filament', function () {
    return Route::has('filament.pages.dashboard') ? 'Filament Aktif' : 'Filament Tidak Aktif';
});
