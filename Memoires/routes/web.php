<?php
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChefProjetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\UserController;
use App\Models\Prestataire;
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
        Route::get('add/user',[UserController::class,'add'])->name('add_user');
        Route::post('store/user',[UserController::class,'store'])->name('store_user');
        Route::get('list/user',[UserController::class,'list'])->name('list_user');
        Route::get('edit/user/{id}',[UserController::class,'edit'])->name('edit_user');
        Route::post('/update/user/{id}', [UserController::class, 'update'])->name('update_user');
        Route::get('/show/user/{id}', [UserController::class, 'show'])->name('show_user');
        Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('delete_user');
// Route pour activer/désactiver un utilisateur
        Route::POST('/user/toggle-status/{id}', [UserController::class, 'toggleStatus'])->name('toggle_user_status');
// Enregistrer un prestataire   
        Route::get('add/prestataire',[PrestataireController::class,'add'])->name('add_prestataire');
        Route::get('list/prestataire',[PrestataireController::class,'list'])->name('list_prestataire');
        Route::post('store/prestataire',[PrestataireController::class,'store'])->name('store_prestataire');
        Route::get('edit/prestataire/{id}',[PrestataireController::class,'edit'])->name('edit_prestataire');
        Route::post('update/prestataire/{id}', [PrestataireController::class, 'update'])->name('update_prestataire');
        Route::delete('prestataire/delete/{id}', [PrestataireController::class, 'delete'])->name('delete_prestataire');
    });
    
Route::group(['middleware' => 'responsable'], function()
    {
        Route::get('responsable/dashboard',[DashboardController::class,'dashboard'])->name('responsable_dashboard');
        Route::get('add/projet',[ResponsableController::class,'add'])->name('add_projet');
        Route::post('store/projet',[ResponsableController::class,'store'])->name('store_projet');
        Route::get('list/projet',[ResponsableController::class,'list'])->name('list_projet');
        Route::get('edit/projet/{id}',[ResponsableController::class,'edit'])->name('edit_projet');
        Route::post('update/projet/{id}', [ResponsableController::class, 'update'])->name('update_projet');
        Route::get('show/projet/{id}', [ResponsableController::class, 'show'])->name('show_projet');
        Route::delete('projet/delete/{id}', [ResponsableController::class, 'delete'])->name('delete_projet');
        Route::get('/structures/{programme_id}', [ResponsableController::class, 'getStructuresByProgramme']);

    });

Route::group(['middleware' => 'directeur'], function()
    {
        Route::get('directeur/dashboard',[DashboardController::class,'dashboard'])->name('directeur_dashboard');
        Route::get('list/projet/n/affecter',[DirecteurController::class,'list'])->name('list_projet_n_affect');
        Route::post('update/projet/n/affecter{id}', [DirecteurController::class, 'update'])->name('update_projet_n_affect');
        Route::get('affecter/projet/{id}',[DirecteurController::class,'affecter'])->name('affecter_projet');
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::get('/notification/lire/{id}', [NotificationController::class, 'markAsRead'])->name('marquer_lecture');
        Route::delete('/notification/{id}', [NotificationController::class, 'delete'])->name('notification_delete');
        Route::get('/notifications/marquer-tout-lu', [NotificationController::class, 'markAllAsRead'])->name('notification_all_read');
    });


Route::group(['middleware' => 'chefprojet'], function()
    { 
        Route::get('chefProjet/dashboard',[DashboardController::class,'dashboard'])->name('chefProjet_dashboard');
        Route::get('add/activite',[ActiviteController::class,'add'])->name('add_activite');
        Route::post('store/activite',[ActiviteController::class,'store'])->name('store_activite');
        Route::get('list/activite',[ActiviteController::class,'list'])->name('list_activite');
        Route::get('edit/activite/{id}',[ActiviteController::class,'edit'])->name('edit_activite');
        Route::post('update/activite/{id}', [ActiviteController::class, 'update'])->name('update_activite');
        Route::delete('delete/activite/{id}', [ActiviteController::class, 'delete'])->name('delete_activite');
        Route::get('/projets/chef/{id}', [ProjetController::class, 'projetsParChef'])->name('projets_parchef');
        Route::get('/etape/proj/{id}', [ChefProjetController::class, 'etapeProj'])->name('etape_proj');
        Route::get('/act/proj', [ChefProjetController::class, 'actProj'])->name('act_proj');
        Route::get('showp/projet/{id}', [ChefProjetController::class, 'showp'])->name('showp_projet');
        Route::get('addd/{id}',[ChefProjetController::class,'addd'])->name('addd');
        Route::post('updat/{id}', [ChefProjetController::class, 'updat'])->name('updat');
        Route::get('/projets/{projet}/etapes', [ChefProjetController::class, 'getEtapes'])->name('projets_etapes');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    });

    
    




