{{-- /resources/views/pages/about.blade.php --}}

@extends('layouts.app')

@section('title', 'Sobre a NERD')

@php
    $values = [
        [
            'name' => 'Resiliência',
            'description' =>
                'Assim como superamos desafios na pandemia para fundar a NERD, acreditamos na importância de ser resiliente diante das adversidades. Cada obstáculo é uma oportunidade de crescimento.',
        ],
        [
            'name' => 'Paixão pela Educação',
            'description' =>
                'A NERD nasceu do desejo de transformar a vida dos alunos. Nossa paixão pela educação nos motiva a oferecer sempre o melhor, acreditando no poder transformador do conhecimento.',
        ],
        [
            'name' => 'Acolhimento',
            'description' =>
                'Desde os primeiros atendimentos nas casas dos alunos até a criação de um espaço próprio, o acolhimento sempre foi um valor central. Queremos que todos se sintam bem-vindos e apoiados em sua jornada educacional.',
        ],
        [
            'name' => 'Inovação',
            'description' =>
                'A NERD começou com recursos simples, mas com muita criatividade e inovação. Valorizamos a capacidade de encontrar soluções inovadoras para melhorar continuamente nossos métodos de ensino.',
        ],
        [
            'name' => 'Compromisso',
            'description' =>
                'Nosso compromisso com a educação é inabalável. Trabalhamos incansavelmente para garantir que cada aluno tenha acesso a um ensino de qualidade e possa alcançar seu pleno potencial.',
        ],
        [
            'name' => 'Comunidade',
            'description' =>
                'Acreditamos que a educação é uma construção coletiva. Valorizamos a colaboração e o apoio mútuo, criando uma comunidade forte e unida em torno do aprendizado.',
        ],
    ];

    $team = [
        [
            'name' => 'Isabela Brandão',
            'role' => 'CEO',
            'config' => '',
            'imageUrl' => 'images/Isabela.jpg',
        ],
        [
            'name' => 'Amanda Alves',
            'role' => 'CEO',
            'config' => 'object-top',
            'imageUrl' => 'images/Amanda.jpg',
        ],
    ];
@endphp

@section('content')

    <section class="relative isolate -z-10 px-6 text-primaryText lg:px-0">
        <div
            class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
            aria-hidden="true"
        >
            <div
                class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-primary-50 to-primary-500 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
            >
            </div>
        </div>
        <div class="overflow-hidden">
            <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-0 lg:pt-32">
                <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-7xl lg:items-center">
                    <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
                        <h1 class="text-4xl font-bold tracking-tight text-primaryText sm:text-6xl">
                            Nossa história:
                        </h1>
                        <p class="relative mt-6 text-justify text-lg leading-8 text-primaryText/80 sm:max-w-md lg:max-w-none">
                            Em meio a um dos momentos mais desafiadores da nossa
                            geração, nasceu a NERD, um sonho que se tornou realidade em
                            plena pandemia, no ano de 2020, na cidade de Gurupi,
                            Tocantins. Foi em um cenário de incertezas que Isabela
                            Brandão e Amanda Alves decidiram fazer a diferença na vida
                            de alunos que enfrentavam dificuldades no aprendizado.
                            <br />
                            <br />
                            No início, cada atendimento era feito na casa dos próprios
                            alunos, um esforço que logo revelou uma necessidade maior:
                            um espaço onde pudessem acolher mais estudantes e
                            transformar suas jornadas educacionais. Assim, com apenas
                            algumas mesas, um quadro e materiais simples, surgiu o
                            primeiro ambiente da NERD, no fundo de casa, mas carregado
                            de propósito e dedicação.
                            <br />
                            <br />A caminhada não foi fácil, mas a persistência e a
                            paixão pela educação falaram mais alto. Tijolo por tijolo,
                            sonho por sonho, Isabela e Amanda construíram o próprio
                            espaço, um local pensado para impulsionar o aprendizado e
                            oferecer um ensino acessível e acolhedor. Hoje, a NERD se
                            orgulha de contar com dois pontos de atendimento em Gurupi,
                            impactando a vida de muitos alunos e mostrando que a
                            educação transforma e que nenhum obstáculo é grande demais
                            para quem acredita no que faz. Aqui, cada conquista dos
                            nossos alunos é a nossa maior vitória. E seguimos firmes,
                            crescendo e aprendendo juntos, porque ser NERD é acreditar
                            no poder do conhecimento!
                        </p>
                    </div>
                    <div class="mt-14 flex justify-end gap-10 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
                        <div class="mr-auto w-56 flex-none space-y-8 sm:mr-0">
                            <div class="absolute inset-0 transform overflow-hidden opacity-25 transition-transform duration-1000 ">
                                <div class="absolute right-32 top-96 h-96 w-96 animate-pulse rounded-full bg-white mix-blend-overlay blur-3xl filter"></div>
                            </div>
                            <div class="relative">
                                <img
                                    src="{{ asset('images/NerdCEO.JPG') }}"
                                    alt=""
                                    class="aspect-[2/3] w-full rounded-xl bg-primaryBg/5 object-cover shadow-lg"
                                />
                                <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-primaryBg/10"></div>
                            </div>
                            <div class="relative">
                                <img
                                    src="{{ asset('images/ProfsNerd.jpg') }}"
                                    alt=""
                                    class="aspect-[2/3] w-full rounded-xl bg-primaryBg/5 object-cover shadow-lg"
                                />
                                <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-primaryBg/10"></div>
                            </div>
                        </div>
                        <div class="w-48 flex-none space-y-8">
                            <div class="relative">
                                <img
                                    src="{{ asset('images/ProfsMed.jpg') }}"
                                    alt=""
                                    class="mt-44 aspect-[2/3] w-full rounded-xl bg-primaryBg/5 object-cover shadow-lg"
                                />
                                <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-primaryBg/10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values section --}}
    <section class="relative isolate -z-10 mx-auto mt-32 max-w-7xl px-6 sm:mt-40 lg:px-0">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-primaryText sm:text-4xl">
                Os Nossos Valores
            </h2>
        </div>
        <dl class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 text-base leading-7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($values as $value)
                <div key="{{ $value['name'] }}">
                    <dt class="font-semibold text-primaryText">{{ $value['name'] }}</dt>
                    <dd class="mt-1 text-justify text-primaryText/80">
                        {{ $value['description'] }}
                    </dd>
                </div>
            @endforeach
        </dl>
    </section>

    {{-- Image section --}}
    <section class="mt-32 sm:mt-40 xl:mx-auto xl:max-w-7xl xl:px-0">
        <img
            src="{{ asset('images/Nerd2.jpg') }}"
            alt=""
            class="aspect-[5/2] w-full object-cover xl:rounded-3xl"
        />
    </section>

    {{-- Team section --}}
    <section class="mx-auto mt-32 w-full max-w-7xl px-6 sm:mt-40 lg:px-0">
        <div class="mx-auto max-w-7xl ">
            <h2 class="text-center text-3xl font-bold tracking-tight text-primaryText sm:text-4xl">
                Fundadoras:
            </h2>
            <p class="mx-auto mt-6 max-w-4xl text-justify text-lg leading-8 text-primaryText/80">
                Conheça as pessoas por trás da NERD, que dedicam seu tempo e
                esforço para tornar a educação mais acessível e transformadora.
                Cada uma das fundadoras traz consigo uma história única e uma
                paixão inabalável pela educação, trabalhando incansavelmente para
                criar um ambiente acolhedor e inovador.
            </p>
        </div>
        <ul
            role="list"
            class="mx-auto mt-20 flex max-w-2xl justify-center gap-x-10 gap-y-16 text-center lg:max-w-none"
        >
            @foreach ($team as $person)
                <li key="{{ $person['name'] }}">
                    <img
                        class="mx-auto h-44 w-44 rounded-full object-cover {{ $person['config'] }}"
                        src="{{ asset($person['imageUrl']) }}"
                        alt=""
                    />
                    <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-primaryText">
                        {{ $person['name'] }}
                    </h3>
                    <p class="text-sm leading-6 text-primaryText/80">
                        {{ $person['role'] }}
                    </p>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
