@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')

    {{-- Cada seção da página Home agora é um arquivo parcial incluído abaixo. --}}
    {{-- Isso mantém o código limpo e fiel à estrutura original. --}}

    @include('partials.home._hero-section')

    @include('partials.home._hero-partners')

    @include('partials.home._cta-section')

    @include('partials.home._stats-section')

@endsection
