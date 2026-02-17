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
