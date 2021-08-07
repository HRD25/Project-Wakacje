<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Offerts\Controller;
use Illuminate\View\View;

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

Route::group([
    'middleware' => 'auth'
], function () {

    // ADD OFFERT
    Route::group([
        'namespace' => '/add/Offert',
        'as' => 'add'
    ], function () {
        Route::post('', [Controller::class, 'add'])->name('');
        Route::get('', [Controller::class, 'showAdd'])->name('.show');
    });

    // OFFERT
    Route::group([
        'as' => 'get.'
    ], function () {
        Route::get('/Offerts', [Controller::class, 'Offerts'])->name('offerts');
        Route::get('/Offert/{id}', [Controller::class, 'Offert'])->name('offert');
    });

    // DELETE OFFERT
    Route::delete('/Offert/delete/{id}', [Controller::class, 'delete'])->name('deleteOffert');

    //  SEARCH OFFERT
    Route::post('/search', [OfferController::class, 'search'])->name('search');
});

Route::get('/home', [Controller::class, 'home'])->name('home');

Route::get('/info', function () {
    return View('user.shared.info');
})->name('info');

Route::get('admin/home', function () {
    return View('admin.dashboard');
});

Auth::routes();
