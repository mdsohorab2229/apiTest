<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\userController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;


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
Route::get('show', [ClasseController::class, 'index']);
Route::post('add', [ClasseController::class, 'store']);
Route::PATCH('edit/{id}', [ClasseController::class, 'update']);
Route::put('delete/{id}', [ClasseController::class, 'destroy']);

// subject controller used
Route::get('subject/show', [SubjectController::class, 'index']);
Route::post('subject/add', [SubjectController::class, 'store']);
Route::get('subject/show/{id}', [SubjectController::class, 'show']);
Route::patch('subject/edit/{id}', [SubjectController::class, 'update']);
Route::delete('subject/delete/{id}', [SubjectController::class, 'destroy']);




Route::post('/register/user/using/passport', [ClasseController::class, 'registerUserUsingPassport']);


// user controllers used
Route::post('user/add', [UserController::class, 'store']);


Route::post('/register/user/using/passport', [userController::class, 'registerUserUsingPassport']);

// use student controller
Route::get('student/show',[StudentController::class, 'index']);
Route::post('student/add', [StudentController::class, 'store']);
Route::get('student/data/{id}', [StudentController::class, 'show']);
Route::put('student/update/{id}', [StudentController::class, 'update']);
Route::delete('student/delete/{id}', [StudentController::class, 'destroy']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
