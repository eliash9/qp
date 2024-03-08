<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PelajarController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialiteController;
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

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);


Route::get('login/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
Route::get('/login', [AuthController::class, 'index'])->name('login');


Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['checklogin:admin']], function () {
        Route::get('/admin', [AdminController::class, 'index']);
        Route::put('/admin/change-role/{user}', [AdminController::class, 'changeRole'])->name('change.role');

        Route::get('/admin/user', [AdminController::class, 'users']);
        Route::get('/admin/user_delete/{id}', [AdminController::class, 'user_delete']);

       // Route::get('/admin/room', [AdminController::class, 'room']);

    });

    Route::group(['middleware' => ['checklogin:guru']], function () {

        
      //  Route::put('/guru/change-role/{user}', [GuruController::class, 'changeRole'])->name('change.role');

      //  Route::get('/guru/user', [GuruController::class, 'users']);
      //  Route::get('/guru/user_delete/{id}', [GuruController::class, 'user_delete']);

        Route::get('/guru/rangking', [GuruController::class, 'rangk'])->name('guru.rangking');



        Route::get('/guru', [GuruController::class, 'index']);
        Route::get('/guru/room_add', [GuruController::class, 'add_room']);
        Route::post('/guru/room_add', [GuruController::class, 'save_room']);
        Route::get('/guru/room_delete/{id}', [GuruController::class, 'delete_room']);
        Route::get('/guru/generateCodeForRoom/{id}', [GuruController::class, 'generateCodeForRoom']);
        Route::get('/guru/room/{id}', [GuruController::class, 'detail_room']);
        Route::get('/guru/room/{id}/standing', [GuruController::class, 'stand'])->name('guru.standing');
        Route::get('/guru/start/{id}', [GuruController::class, 'start']);
        // Route::get('/guru/quiz_add/{id_room}', [GuruController::class, 'add_quiz']);
        // Route::post('/guru/quiz_add/{id_room}', [GuruController::class, 'save_quiz']);
        Route::get('guru/room/{id}/quiz_add', [GuruController::class, 'add_quiz']);
        Route::post('guru/room/{id}/quiz_add', [GuruController::class, 'save_quiz']);
        Route::get('/guru/room/{detail}/quiz_delete/{quizzes}', [GuruController::class, 'delete_quiz'])->name('delete.quiz');
        Route::get('/guru/room/{detail}/quiz_edit/{quizzes}', [GuruController::class, 'edit_quiz'])->name('edit.quiz');
        Route::post('/guru/room/{detail}/quiz_update/{quizzes}', [GuruController::class, 'update_quiz'])->name('update.quiz');

        // Route::resource('guru', GuruController::class);
    });

    Route::group(['middleware' => ['checklogin:pelajar']], function () {
        Route::get('/pelajar', [PelajarController::class, 'index']);
        Route::post('/pelajar', [PelajarController::class, 'enter_room']);
        Route::get('/pelajar/room/{room}', [PelajarController::class, 'room'])->name('pelajar.room');
        Route::get('/pelajar/room/{room}/standing', [PelajarController::class, 'stand'])->name('pelajar.standing');
        Route::get('/pelajar/room/{room}/room_post', [PelajarController::class, 'play'])->name('pelajar.room_post');
        Route::post('/pelajar/room/{room}/room_post', [PelajarController::class, 'answer_save'])->name('pelajar.room_post');
        Route::get('/pelajar/room/{room}/done', [PelajarController::class, 'done'])->name('pelajar.done');

        Route::get('/pelajar/rangking', [PelajarController::class, 'rangk'])->name('pelajar.rangking');

        // Route::resource('pelajar', PelajarController::class);
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);