<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;
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

Route::get('/', HomeController::class )->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Al especificar el endpoint con name() es opcional volver a escribir el endpoint
Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name("logout");

// * Edicion de perfil
Route::get('/editar-Perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-Perfil', [PerfilController::class, 'store'])->name('perfil.store');

// * Publicaciones
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// ? Uso de rout model binging

// * Elimina publicaciones
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// * Comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::post('/Imagenes', [ImagenController::class, 'store'])->name('imagen.store');

// * Likes a fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');


// ? Las variables quedan a la escucha por cualquier valor, pueden generar errores al no estar bien colocadas por gerarquia
// ? Cuando tenemos una ruta de este tipo, Si el navegador no encontró la url en estas rutas tomara esta como la default
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');


// * Siguiendo usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');
