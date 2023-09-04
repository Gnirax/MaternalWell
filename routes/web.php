<?php

use App\Http\Controllers\Allround;
use App\Http\Controllers\ChildsController;
use App\Http\Controllers\ConsultationsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\MaternalUsersController;
use App\Http\Controllers\MothersController;
use App\Http\Controllers\NursesController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TreatmentsController;
use App\Models\Maternal_users;
use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::controller(MaternalUsersController::class)->group(function (){
    Route::get('/maternal/index','index')->name('index');
    Route::get('/maternal/create','create')->name('create');
    Route::post('/maternal/create/store','store')->name('store');
    Route::get('/maternal/show/{id}','show')->name('show');
    Route::get('/maternal/edit/{id}','edit')->name('edit');
    Route::put('/maternal/edit/update/{id}','update')->name('update');
    Route::get('/maternal/delete/{id}','delete')->name('delete');
    Route::get('/maternal','welcome')->name('welcome');
    Route::post('/maternal/login','login_user')->name('login.user');
    Route::get('/maternal/login/index','login_index')->name('login.index');
    Route::get('/maternal/register','register_index')->name('register.index');
    Route::post('/maternal/register/store','register_users')->name('register.user');
    Route::get('/maternal/dashboard','home')->name('dashboard');
    Route::get('maternal/logout','logout')->name('logout.user');
});

Route::controller(MothersController::class)->group(function (){
    Route::get('/maternal/mothers/index','index')->name('mothers.index');
    Route::get('/maternal/mothers/create','create')->name('mothers.create');
    Route::post('/maternal/mothers/create/store','store')->name('mothers.store');
    Route::get('/maternal/mothers/show/{id}','show')->name('mothers.show');
    Route::get('/maternal/mothers/edit/{id}','edit')->name('mothers.edit');
    Route::put('/maternal/mothers/edit/update/{id}','update')->name('mothers.update');
    Route::delete('/maternal/mothers/delete/{id}','delete')->name('mothers.delete');
    Route::get('/maternal/mothers/medical_history/{id}','history')->name('mothers.history');
    Route::get('/maternal/mothers/consultation','consultation_index')->name('patient.consultation.index');
    Route::get('/maternal/mothers/medication','medication_index')->name('patient.medication.index');
    Route::get('/maternal/mothers/progress','progress_index')->name('patient.progress.index');
    Route::get('/maternal/mothers/children','children_index')->name('patient.children.index');
});

Route::controller(ChildsController::class)->group(function (){
    Route::get('/maternal/childs/index','index')->name('childs.index');
    Route::get('/maternal/childs/create','create')->name('childs.create');
    Route::post('/maternal/childs/create/store','store')->name('childs.store');
    Route::get('/maternal/childs/show/{id}','show')->name('childs.show');
    Route::get('/maternal/childs/edit/{id}','edit')->name('childs.edit');
    Route::put('/maternal/childs/edit/update/{id}','update')->name('childs.update');
    Route::delete('/maternal/childs/delete/{id}','delete')->name('childs.delete');
    Route::get('/maternal/childs/medical_history/{id}','history')->name('childs.history');
});

Route::controller(ConsultationsController::class)->group(function (){
    Route::get('/maternal/consultations/index','index')->name('consultations.index');
    Route::get('/maternal/consultations/create/mother/{id}','mothers_create')->name('consultations.create.mother');
    Route::get('/maternal/consultations/create/childs/{id}','childs_create')->name('consultations.create.child');
    Route::post('/maternal/consultations/create/store','store')->name('consultations.store');
    Route::get('/maternal/consultations/show/{id}','show')->name('consultations.show');
    Route::get('/maternal/consultations/edit/{id}','edit')->name('consultations.edit');
    Route::put('/maternal/consultations/edit/update/{id}','update')->name('consultaions.update');
    Route::get('/maternal/consultations/delete/{id}','delete')->name('consultations.delete');
});

Route::controller(TreatmentsController::class)->group(function (){
    Route::get('/maternal/treatment/index/mothers','mothers_index')->name('treatment.index.mothers');
    Route::get('/maternal/treatment/index/childs','childs_index')->name('treatment.index.childs');
    Route::get('/maternal/treatment/create/mothers/{id}','mothers_create')->name('treatment.create.mothers');
    Route::get('/maternal/treatment/create/childs/{id}','childs_create')->name('treatment.create.childs');
    Route::post('/maternal/treatment/create/store','store')->name('treatment.store');
    Route::get('/maternal/treatment/show/{id}','show')->name('treatment.show');
    Route::get('/maternal/treatment/edit/{id}','edit')->name('treatment.edit');
    Route::put('/maternal/treatment/edit/update/{id}','update')->name('treatment.update');
    Route::delete('/maternal/treatment/delete/{id}','delete')->name('treatment.delete');
});


/*
Route::get('/dashboard',[ProfileController::class,"show"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
