{{-- /resources/views/partials/home/_stats-section.blade.php --}}

@php
    $blogPosts = [
        [
            'id' => 1,
            'title' => 'Aprovados em Medicina em Tocantins',
            'href' => '#',
            'description' => '',
            'imageKey' => 'stats_aprovados_med_to',
            'imageUrl' => 'images/ProfsMed.jpg',
            'date' => '',
            'datetime' => '2020-03-16',
            'author' => [
                'name' => 'Professores NERD🧠',
                'imageUrl' => 'images/1nerd.jpg',
                'imageKey' => 'stats_aprovados_med_to_author',
            ],
        ],
        [
            'id' => 2,
            'title' => 'Aprovado em Agronomia no Pará',
            'href' => '#',
            'description' => '',
            'imageKey' => 'stats_aprovado_agro_pa',
            'imageUrl' => 'images/aluno7.jpg',
            'date' => '',
            'datetime' => '2020-03-16',
            'author' => [
                'name' => 'Aluno NERD✨',
                'imageUrl' => 'images/1nerd.jpg',
                'imageKey' => 'stats_aprovado_agro_pa_author',
            ],
        ],
        [
            'id' => 3,
            'title' => 'Aprovado em Medicina na ITPAC',
            'href' => '#',
            'description' => '',
            'imageKey' => 'stats_aprovado_med_itpac',
            'imageUrl' => 'images/aluno1.jpg',
            'date' => 'Mar 10, 2020',
            'datetime' => '2020-03-10',
            'author' => [
                'name' => 'Aluno NERD✨',
                'imageUrl' => '',
                'imageKey' => 'stats_aprovado_med_itpac_author',
            ],
        ],
        [
            'id' => 4,
            'title' => 'Aprovado em Agronomia na UFT',
            'href' => '#',
            'description' => '',
            'imageKey' => 'stats_aprovado_agro_uft',
            'imageUrl' => 'images/aluno2.jpg',
            'date' => 'Feb 12, 2020',
            'datetime' => '2020-02-12',
            'author' => [
                'name' => 'Aluno NERD✨',
                'imageUrl' => '',
                'imageKey' => 'stats_aprovado_agro_uft_author',
            ],
        ],
        [
            'id' => 5,
            'title' => 'Aprovadas em Medicina na UNIRG E UNIRV',
            'href' => '#',
            'description' => '',
            'imageKey' => 'stats_aprovado_med_unirg_unirv',
            'imageUrl' => 'images/aluno5.jpg',
            'date' => 'Feb 12, 2020',
            'datetime' => '2020-02-12',
            'author' => [
                'name' => 'Aluno NERD✨',
                'imageUrl' => '',
                'imageKey' => 'stats_aprovado_med_unirg_unirv_author',
            ],
        ],
    ];
@endphp

<section class="mt-32 flex max-w-7xl flex-col justify-center px-6 max-[640px]:mx-0 sm:mt-40 sm:w-full lg:px-0 mx-auto">
    <div class="mx-auto flex max-w-7xl flex-col">
        <h2 class="text-3xl font-bold tracking-tight text-primaryText sm:text-4xl">
            Veja algumas aprovações de nossos NERDS✨
        </h2>
        <p class="mt-2 text-lg leading-8 text-primaryText/80">
            No NERD, a aprovação dos nossos alunos é a nossa maior recompensa.
            Leia os relatos de quem confiou em nossa metodologia e descubra como
            transformamos desafios em conquistas. Junte-se a nós e faça parte
            dessa história de sucesso!
        </p>
    </div>

    {{-- Container do Carrossel com Scroll Snap para melhor UX --}}
    <div class="flex overflow-x-auto gap-8 pb-8 mt-16 snap-x snap-mandatory scroll-smooth hide-scroll-bar">
        @foreach ($blogPosts as $post)
            <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-primaryBg px-8 pb-8 pt-80 flex-shrink-0 w-[300px] sm:w-[384px] snap-center hover:scale-[1.02] transition-transform duration-300">
                <x-dynamic-image
                    module="home"
                    key="{{ $post['imageKey'] }}"
                    fallback="{{ $post['imageUrl'] }}"
                    alt="{{ $post['title'] }}"
                    class="absolute inset-0 -z-10 h-full w-full object-cover"
                />
                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-ringColor"></div>

                <div class="flex flex-wrap items-center gap-y-1 text-sm leading-6 text-gray-300">
                    <div class="-ml-4 flex items-center gap-x-4">
                        <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div class="flex gap-x-2.5 font-medium">
                            {{ $post['author']['name'] }}
                        </div>
                    </div>
                </div>
                <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                    <span class="absolute inset-0"></span>
                    {{ $post['title'] }}
                </h3>
            </article>
        @endforeach
    </div>
</section>

<style>
    /* Esconde a barra de rolagem mas mantém a funcionalidade */
    .hide-scroll-bar::-webkit-scrollbar {
        display: none;
    }
    .hide-scroll-bar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
