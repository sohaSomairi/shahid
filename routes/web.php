<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//Auth::routes();
Auth::routes();

Route::get('/', [dashboardController::class,'index']);

/** initiate routes */
Route::get('/', [dashboardController::class,'index']);
Route::get('/initiate', [dashboardController::class,'initiate']);
Route::get('/initiate/years', [dashboardController::class,'years']);
Route::get('/initiate/sections', [dashboardController::class,'sections']);
Route::get('/initiate/filetypes', [dashboardController::class,'filetypes']);
Route::get('/management', [dashboardController::class,'management']);
Route::get('/management/users', [dashboardController::class,'users']);
Route::get('/management/groups', [dashboardController::class,'usergroups']);


/** publishing routes */
Route::get('/publishing', [dashboardController::class,'publish']);
Route::get('/publishing/topics', [dashboardController::class,'topics']);
Route::get('/publishing/titles', [dashboardController::class,'titles']);
Route::get('/publishing/titles/{id}', [dashboardController::class,'opentitle']);
Route::post('/addPoster', [dashboardController::class,'dropzoneStore'])->name('dropzone.store');;
Route::get('/getSection', [dashboardController::class,'getSection']);
Route::get('/gettopic', [dashboardController::class,'gettopic']);
Route::get('/publishing/slider', [dashboardController::class,'slider']);

/** User Profile */
Route::get('/User/myProfile', [dashboardController::class,'me']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
