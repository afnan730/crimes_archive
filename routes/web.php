<?php

use App\Http\Controllers\CrimeController;
use Illuminate\Support\Facades\Route;

use App\Models\Category;

Route::get('/', function () {
    return redirect('archive');
});
Route::get('archive', function () {
    $categories = Category::all();
    return view('home', compact('categories'));
});
Route::resource('crimes', CrimeController::class);
Route::get('archive/{category}', function ($name) {
    $category = Category::where('name', $name)->firstOrFail();
    return view('crimes', compact('category'));
})->name('crimes');
