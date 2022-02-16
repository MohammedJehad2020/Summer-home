<?php

use App\Http\Controllers\ScrapeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomesController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('get_data', [ScrapeController::class, 'get_data']);

//  الراوتات مش راضية تشتغل معي مش عرف ليش

// Route::namespace('Admin')
//     ->prefix('admin')
//     ->group(function () {

//         Route::resource('homes', 'HomesController');
//     });


   Route::get('admin/homes/index', 'Admin\HomesController@index');
   Route::get('admin/homes/create', 'Admin\HomesController@create');
   Route::post('admin/homes/store', 'Admin\HomesController@store')->name('home_store');

   

    // Route::resource('admin/homes', 'Admin\HomesController');
    