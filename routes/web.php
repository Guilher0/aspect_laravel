<?php

use Illuminate\Support\Facades\Route;

// Rota da Home (placeholder por enquanto)
Route::get('/', function () {
    // Quando criar a home, será: return view('pages.home');
    return view('pages.home');
})->name('home');

// Rota de About APONTANDO PARA A NOVA VIEW
Route::get('/about', function () {
    return view('pages.about'); // << ALTERAÇÃO AQUI
})->name('about');

// Rota de Projetos (já criada)
Route::get('/projects', function () {
    return view('pages.projects');
})->name('projects');

// Rota de Contato (já criada)
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Rotas de Autenticação (Aberto)
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

// Rotas de Administração protegidas por Autenticação
// Caso a aplicação exija outro middleware, 'auth' deve ser alterado de acordo.
Route::middleware('auth')->prefix('admin')->group(function () {

    // Rota de Logout
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    // Gerenciamento de Imagens e Módulos
    Route::prefix('images')->name('admin.images.')->group(function () {
        Route::get('/', [\App\Http\Controllers\ImageController::class, 'index'])->name('index');
        Route::post('/modules', [\App\Http\Controllers\ImageController::class, 'storeModule'])->name('modules.store');
        Route::post('/store', [\App\Http\Controllers\ImageController::class, 'storeImage'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\ImageController::class, 'updateImage'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\ImageController::class, 'destroyImage'])->name('destroy');
    });

    // Gerenciamento de Usuários
    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\UserController::class, 'store'])->name('store');
        Route::put('/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
    });

});
