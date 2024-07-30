<?php

use App\Http\Controllers\CrimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


use App\Models\Category;
use App\Models\Crime;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return redirect('archive/ar');
})->name('main');

Route::get('archive/{lang}', function ($lang) {
    App::setLocale($lang);
    $categories = Category::all();
    return view('home', compact('categories', 'lang'));
})->name('archive');

Route::get('archive/{lang}/category/{name}', function ($lang, $name) {
    App::setLocale($lang);
    $category = Category::where('name_en', $name)->firstOrFail();
    return view('crimes', compact('category', 'lang'));
})->name('crimes');

Route::resource('crimes', CrimeController::class)->middleware(['auth', 'verified']);
Route::get('crime/{lang}/{id}', function ($lang, $id) {
    App::setLocale($lang);

    $crime = Crime::findOrFail($id);
    return view('crimeDetails', compact('crime'));
})->name('crime');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/cards', function () {
    return view('cards');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
