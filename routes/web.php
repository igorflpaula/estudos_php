<?php

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

// Route::get('/', function () {
//     return 'Olá';
// });

$rotaControllers = '\\App\\Http\\Controllers\\'; 
// Não gostei, no Laravel 8+ é necessário passar todo o caminho
// Antes era -> Route::get('/', 'PrincipalController@principal');

Route::get('/', [$rotaControllers.PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [$rotaControllers.SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [$rotaControllers.ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function() { return 'login';})->name('site.login');

Route::prefix('/app')->group( function() {
    Route::get('/clientes', function() { return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', [$rotaControllers.FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function() { return 'produtos';})->name('site.produtos');
});

// Route::controller(PrincipalController::class)->middleware('auth')->group( function() {
    // Route::prefix('/users')->group( function(){
        // Route::get('/teste', 'site.index');
    // });
// });


Route::get('/teste/{p1}/{p2}', [$rotaControllers.TesteController::class, 'teste']);

// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

// Route::redirect('/rota2', '/rota1', 301);

Route::fallback(function (){
    echo 'Rota não encontrada.<a href="'.route('site.index').'"> Clique aqui</a> para ser redirecionado.';
});