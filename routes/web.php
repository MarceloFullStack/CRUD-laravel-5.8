<?php

use App\User;
use Illuminate\Support\Facades\Auth;
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

//primeira rota default
Route::get('/', function () {
    return view('welcome');
});

//proteger paginas com login e senha
/*caso seja necessario que apenas paginas espeficicas sejam protegidas vc pode fazer assim
Route::middleware('auth')->get('/home'), function () {
    //return view('home');
}
*/

Route::middleware('auth')->group(function(){


//passando parametros via URL
Route::get('/ola/{nome}', function ($nome) {

    return view('hello',['teste'=>$nome]);
});

//listarTodos
Route::get('usuarios', 'UserController@listar');

//criar usuario
Route::post('usuarios', 'UserController@criar');

//deletar
Route::get('usuarios/{id}/delete', 'UserController@deletar');

//pegr formulario edicao
Route::get('usuarios/{id}/editar', 'UserController@editForm');

//edicao

Route::post('usuarios/{id}', 'UserController@edit');

});

//rota criada pelo comando php artisan make:auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
