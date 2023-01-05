<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\NewsInfoController;
use App\Http\Controllers\NewsletterController;
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
 if (App::environment('production')) {
     URL::forceScheme('https');
 }

Route::get('/', [ApiController::class , 'displayNews']);
Route::post('/sourceId', [ApiController::class , 'displayNews']);
Route::post('/newsletter', [NewsletterController::class , 'storeNewUser'])->name('newsletter.post');
Route::put('/edit/{id}', [NewsInfoController::class , 'edit'])->name('news.edit');
Route::post('/create', [NewsInfoController::class , 'store'])->name('news.create');
Route::get('/delete/{id}', [NewsInfoController::class , 'delete'])->name('news.delete');
Route::get('/index', [NewsInfoController::class , 'index'])->name('news.index');
Route::get('/activban', [NewsInfoController::class , 'activban'])->name("news.activerbaniere");
Route::get('/desactivban', [NewsInfoController::class , 'desactivban'])->name('news.desactivban');
Route::get('/updatenews/{id}', [NewsInfoController::class , 'updatescreen'])->name('news.updatescreen');
Route::post('/updatebanner', [NewsInfoController::class , 'updatebanner'])->name('news.updatebanner');
Route::post('/updatebannertext', [NewsInfoController::class , 'updatebannertext'])->name('news.updatebannertext');
Route::get('/details/{id}', [NewsInfoController::class , 'details'])->name('news.details');










