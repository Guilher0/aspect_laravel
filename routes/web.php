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

// Rotas de Administração para Gerenciamento de Imagens e Módulos
// Para proteção de segurança, o acesso é limitado por autenticação.
// Caso a aplicação exija outro middleware, 'auth' deve ser alterado de acordo.
Route::prefix('admin/images')->middleware('auth')->name('admin.images.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ImageController::class, 'index'])->name('index');

    // Módulos
    Route::post('/modules', [\App\Http\Controllers\ImageController::class, 'storeModule'])->name('modules.store');

    // Imagens
    Route::post('/store', [\App\Http\Controllers\ImageController::class, 'storeImage'])->name('store');
    Route::put('/{id}', [\App\Http\Controllers\ImageController::class, 'updateImage'])->name('update');
    Route::delete('/{id}', [\App\Http\Controllers\ImageController::class, 'destroyImage'])->name('destroy');
});
