<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/comics', function () { // url che vede l'utente nel browser
    $comics = config('comics');
    // $data = [
    //     'comics' => $comics
    // ];
    return view('comics.index', compact('comics')); // la pagina che si trova in resources/views
})->name('comics.index'); // Nome della rotta da usare in href

Route::get('/comics/{comic}', function ($comicIndex) {
    $comics = config('comics');
    if ($comicIndex >= 0 && $comicIndex < count($comics)) {
        $singleComic = $comics[$comicIndex];
        return view('comics.show', compact('singleComic'));
    } else {
        return abort(404);
    }
})->name('comics.show');
