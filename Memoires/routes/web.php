<?php

use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/log', function () {
//     return view('auth.login');
// });
// Route::get('/fog', function () {
//     return view('auth.forgot');
// });

// Route::get('/add/user', function () {
//     return view('admin.user.enregistrement');
// });





// ensemble des routes permettant l'authentification des utilisateur
Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'authlogin'])->name('auth_login');
Route::get('logout',[AuthController::class,'logout'])->name('auth_logout');
Route::get('forgot-password',[AuthController::class,'forgot'])->name('auth_forgot');
Route::post('request/email',[AuthController::class,'requestemail'])->name('request_email');
Route::get('reset/{token}', [AuthController::class, 'showResetForm'])->name('password_reset');
Route::post('reset/{token}', [AuthController::class, 'resetPassword'])->name('password_update');


// ensemble des routes permettant de voir chaque dashboard 
Route::group(['middleware' => 'admin'], function()
    {
        Route::get('admin/dashboard',[DashboardController::class,'dashboard'])->name('admin_dashboard');
    });
    
Route::group(['middleware' => 'responsable'], function()
    {
        Route::get('responsable/dashboard',[DashboardController::class,'dashboard'])->name('responsable_dashboard');
    });

Route::group(['middleware' => 'directeur'], function()
    {
        Route::get('directeur/dashboard',[DashboardController::class,'dashboard'])->name('directeur_dashboard');
    });


Route::group(['middleware' => 'chefprojet'], function()
    {
        Route::get('chefProjet/dashboard',[DashboardController::class,'dashboard'])->name('chefProjet_dashboard');
    });


// ensemble des routes lier aux activitésqs
Route::get('add/activite',[ActiviteController::class,'addactivite'])->name('add_activite');

