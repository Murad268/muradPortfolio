<?php

use App\Models\Lang;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('language/{code}', [\App\Http\Controllers\SwitchLanguageController::class, 'switch'])->name('language.switch');

$repository = app(\App\Repositories\MenuRepository::class);
$lang = Cache::get('app_locale', config('app.locale'));

Route::prefix('')
    ->name('client.')
    ->middleware('web') // Add the 'web' middleware here
    ->group(function () use ($repository, $lang) {
        foreach ($repository->all() as $link) {

            if ($link->code == 'home') {
                Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name($link->code);
            } else if ($link->code == 'blogs') {
                Route::get($link->getTranslation('link', $lang), [\App\Http\Controllers\BlogController::class, 'index'])->name($link->code);
            } else if ($link->code == 'blog') {
                Route::get($link->getTranslation('link', $lang)."/{slug}", [\App\Http\Controllers\BlogController::class, 'blog'])->name($link->code);
            } else if ($link->code == 'projects') {
                Route::get($link->getTranslation('link', $lang), [\App\Http\Controllers\ProjectController::class, 'index'])->name($link->code);
            } else if ($link->code == 'contact') {
                Route::get($link->getTranslation('link', $lang), [\App\Http\Controllers\ContactController::class, 'index'])->name($link->code);
            }
        }
    });


