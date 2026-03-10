{{-- /resources/views/partials/home/_stats-section.blade.php --}}

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
        @forelse ($approvals as $approval)
            <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-primaryBg px-8 pb-8 pt-80 flex-shrink-0 w-[300px] sm:w-[384px] snap-center hover:scale-[1.02] transition-transform duration-300">
                @if($approval->image_base64)
                    <img src="{{ str_starts_with($approval->image_base64, 'data:') ? $approval->image_base64 : asset($approval->image_base64) }}" alt="{{ $approval->course }}" class="absolute inset-0 -z-10 h-full w-full object-cover">
                @else
                    <div class="absolute inset-0 -z-10 h-full w-full bg-gray-800"></div>
                @endif
                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-ringColor"></div>

                <div class="flex flex-wrap items-center gap-y-1 text-sm leading-6 text-gray-300">
                    <div class="-ml-4 flex items-center gap-x-4">
                        <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div class="flex gap-x-2.5 font-medium">
                            {{ $approval->student_name }}
                        </div>
                    </div>
                </div>
                <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                    <span class="absolute inset-0"></span>
                    {{ $approval->course }}
                </h3>
            </article>
        @empty
            <div class="text-white">Nenhuma aprovação cadastrada no momento.</div>
        @endforelse
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
