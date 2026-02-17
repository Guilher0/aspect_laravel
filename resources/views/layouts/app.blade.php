<!DOCTYPE html>
{{-- A classe do tema será adicionada dinamicamente pelo JS --}}
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato | {{ config('app.name', 'Laravel') }}</title>

    {{-- Carrega os assets (CSS e JS) processados pelo Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Carrega a fonte Inter do Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Garante que a fonte Inter seja a padrão */
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="w-full min-h-screen flex flex-col items-center bg-primaryBg antialiased">

    {{-- Botão de Trocar Tema --}}
    <button id="theme-toggle-button" class="w-fit fixed bottom-2 right-2 lg:bottom-auto lg:right-5 lg:top-2 p-2 rounded-md hover:scale-110 active:scale-100 duration-200 text-onPrimaryBg z-50">
        {{-- O ícone (sol/lua) será inserido pelo JavaScript --}}
    </button>

    {{-- Inclui o Header --}}
    @include('partials._header')

    {{-- Conteúdo principal da página --}}
    <main class="isolate mt-24 flex h-full w-full flex-col justify-center lg:max-w-7xl">
        @yield('content')
    </main>

    {{-- Inclui o Footer --}}
    @include('partials._footer')

    {{-- Botão de Voltar ao Topo --}}
    <button id="button-to-top" class="fixed bottom-12 lg:bottom-0 right-2 p-2 lg:p-4 text-primaryText lg:text-lg hidden opacity-0 transition-opacity duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5" fill="currentColor"><path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg>
    </button>

</body>
</html>
