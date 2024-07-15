<?php

use App\Http\Controllers\CrimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


use App\Models\Category;

Route::get('/', function () {
    return redirect('archive');
})->name('main');
Route::get('archive', function () {
    $categories = Category::all();
    return view('home', compact('categories'));
});


Route::get('archive/{category}', function ($name) {
    $category = Category::where('name', $name)->firstOrFail();
    return view('crimes', compact('category'));
})->name('crimes');

Route::resource('crimes', CrimeController::class)->middleware(['auth', 'verified']);

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
