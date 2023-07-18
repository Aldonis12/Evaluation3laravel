<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UpdateController;
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
    return view('login');
});

Route::post('/login', [LoginController::class, 'Login']);
Route::get('/logout', [LoginController::class, 'Logout']);

//Ajout
Route::get('/PageAjoutPatient', [AddController::class, 'PageAjoutPatient']);
Route::post('/ConfirmeAjoutPatient', [AddController::class, 'AjoutPatient']);

Route::get('/PageAjoutActe', [AddController::class, 'PageAjoutActe']);
Route::post('/ConfirmeAjoutActe', [AddController::class, 'AjoutActe']);

Route::get('/PageAjoutDepense', [AddController::class, 'PageAjoutDepense']);
Route::post('/ConfirmeAjoutDepense', [AddController::class, 'AjoutDepense']);

Route::post('/ConfirmeAjoutPatientActe', [PatientController::class, 'AjoutPatientActe']);

Route::get('/PageAjoutPrixDepense', [AddController::class, 'PageAjoutPrixDepense']);
Route::post('/ConfirmeAjoutPrixDepense', [AddController::class, 'AjoutPrixDepense']);

Route::get('/PageAjoutFacture/{id}', [FactureController::class, 'PageAjoutFacture']);
Route::post('/ConfirmeAjoutFacture', [FactureController::class, 'AjoutFacture']);


//Liste
Route::get('/Patient', [ListController::class, 'ListePatient']);

Route::get('/Acte', [ListController::class, 'ListeActe']);

Route::get('/Depense', [ListController::class, 'ListeDepense']);

Route::get('/ListeActeParPatient/{id}', [PatientController::class, 'ListeActeParPatient']);

Route::get('/ListeFactureParPatient/{id}', [PatientController::class, 'ListeFactureParPatient']);

Route::get('/PrixDepense', [ListController::class, 'ListePrixDepense']);

Route::get('/AllFacture', [ListController::class, 'AllFacture']);
Route::get('/DetailsFacture/{id}', [ListController::class, 'DetailsFacture']);

Route::get('/StatistiqueDepense/{annee}', [ListController::class, 'StatistiqueDepense']);
Route::post('/YearsForDepense', [ListController::class, 'YearsForDepense']);

Route::get('/StatistiqueRecette/{annee}', [ListController::class, 'StatistiqueRecette']);
Route::post('/YearsForRecette', [ListController::class, 'YearsForRecette']);

Route::get('/PatientActe', [PatientController::class, 'ListePatientActe']);

Route::get('/StatistiqueBenefice/{annee}/{mois}', [ListController::class, 'StatistiqueBenefice']);
Route::post('/YearsForBenefice', [ListController::class, 'YearsForBenefice']);



//Modifier
Route::get('/PageModifierPatient/{id}', [UpdateController::class, 'PageModifierPatient']);
Route::post('/ConfirmeModifierPatient', [UpdateController::class, 'ModifierPatient']);

Route::get('/PageModifierActe/{id}', [UpdateController::class, 'PageModifierActe']);
Route::post('/ConfirmeModifierActe', [UpdateController::class, 'ModifierActe']);

Route::get('/PageModifierDepense/{id}', [UpdateController::class, 'PageModifierDepense']);
Route::post('/ConfirmeModifierDepense', [UpdateController::class, 'ModifierDepense']);

Route::get('/PageModifierPrixDepense/{id}', [UpdateController::class, 'PageModifierPrixDepense']);
Route::post('/ConfirmeModifierPrixDepense', [UpdateController::class, 'ModifierPrixDepense']);

Route::get('/PageModifierPatientActe/{id}', [UpdateController::class, 'PageModifierPatientActe']);
Route::post('/ConfirmeModifierPatientActe', [UpdateController::class, 'ModifierPatientActe']);

//Supprimer 
Route::get('/supprimerPatient/{id}',[DeleteController::class, 'DeletePatient']);

Route::get('/supprimerActe/{id}',[DeleteController::class, 'DeleteActe']);

Route::get('/supprimerDepense/{id}',[DeleteController::class, 'DeleteDepense']);

//Generer PDF
Route::get('/genererPDF/{id}', [FactureController::class, 'GenererPDF']);

Route::get('/importFile', [FactureController::class, 'importFile']);
Route::post('/ConfirmeImporteCSV', [FactureController::class, 'importCSV']);

Route::get('/exportCSV', [FactureController::class, 'exportCSV']);



