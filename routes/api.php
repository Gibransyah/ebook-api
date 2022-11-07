<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HeloController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::get('halo', function(){
//     $data = ["me" => "Cantik"];

//     return $data;
// });

// Route::resource('helocontroller', HeloController::class);
// Route::resource('siswa', SiswaController::class);
// Route::resource('book', BookController::class);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
// });

//public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/books', [AuthController::class, 'idex']);
Route::post('/Books/{id}', [AuthController::class, 'show']);
Route::post('/Authors', [AuthController::class, 'index']);
Route::post('/Authors/{id}', [AuthController::class, 'show']);

//protected routes
Route::middleware('auth:sanctum')->group(function () {
  Route::resource('books', BookController::class)->except('create', 'edit', 'show', 'index');
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::resource('autors', AuthorController::class)->except('create', 'edit', 'show', 'index');
});
