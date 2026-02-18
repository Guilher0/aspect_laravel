{{-- /resources/views/pages/contact.blade.php --}}

@extends('layouts.app')

@section('title', 'Contato')

@section('content')

    <div class="mx-auto flex max-w-7xl flex-col items-center justify-between lg:flex-row">
        <div class="relative px-6 pb-20 pt-24 sm:pt-32 lg:static lg:px-8 lg:py-48">
            <svg
                class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-onPrimaryBg/20 [mask-image:radial-gradient(32rem_32rem_at_center,white,transparent)]"
                aria-hidden="true"
            >
                <defs>
                    <pattern
                        id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84"
                        width="200"
                        height="200"
                        x="50%"
                        y="-1"
                        patternUnits="userSpaceOnUse"
                    >
                        <path d="M.5 200V.5H200" fill="none" />
                    </pattern>
                </defs>
                <svg
                    x="50%"
                    y="-1"
                    class="overflow-visible fill-onPrimaryBg/10"
                >
                    <path
                        d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                        stroke-width="0"
                    />
                </svg>
                <rect
                    width="100%"
                    height="100%"
                    stroke-width="0"
                    fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)"
                />
            </svg>
            <div
                class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                aria-hidden="true"
            >
                <div
                    class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-primary-50 to-primary-500 opacity-10 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"
                >
                </div>
            </div>
            <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                <div class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden ring-1 ring-ringColor/5"></div>
                <h2 class="text-3xl font-bold tracking-tight text-primaryText">
                    Entre em contato
                </h2>
                <p class="mt-6 text-lg leading-8 text-primaryText/95">
                    Tem alguma dúvida ou precisa de assistência? Entre em contato
                    conosco e retornaremos o mais rápido possível. Estamos aqui para
                    ajudar com qualquer pergunta ou suporte que você possa precisar.
                </p>
                <dl class="mt-10 space-y-4 text-base leading-8 text-primaryText/95">
                    <div class="flex items-center gap-x-4">
                        <dt class="flex-none">
                            <span class="sr-only">Endereço</span>
                            {{-- BuildingOffice2Icon --}}
                            <svg class="h-7 w-6 text-primaryText/95" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                            </svg>
                        </dt>
                        <dd>
                            Av. Paraná, 1815
                            <br />
                            St. Central, Gurupi-TO CEP: 77403-050
                        </dd>
                    </div>
                    <div class="flex gap-x-4">
                        <dt class="flex-none">
                            <span class="sr-only">Contato</span>
                            {{-- PhoneIcon --}}
                            <svg class="h-7 w-6 text-primaryText/95" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </dt>
                        <dd>
                            <a
                                class="hover:text-primaryText"
                                href="tel:+55 (63) 98433-0632"
                            >
                                +55 (63) 98433-0632
                            </a>
                        </dd>
                    </div>
                    <div class="flex gap-x-4">
                        <dt class="flex-none">
                            <span class="sr-only">Email</span>
                            {{-- EnvelopeIcon --}}
                            <svg class="h-7 w-6 text-primaryText/95" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </dt>
                        <dd>
                            <a
                                class="hover:text-primaryText"
                                href="mailto:comercial@nerdeduca.com.br"
                            >
                                comercial@nerdeduca.com.br
                            </a>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d976.6312348248524!2d-49.07563912635762!3d-11.72802193272858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x933e950adeab048d%3A0x9c879f38509e1d1f!2sNERD!5e0!3m2!1spt-BR!2sbr!4v1741548719357!5m2!1spt-BR!2sbr"
            width="600"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg"
            referrerpolicy="no-referrer-when-downgrade"
        ></iframe>

        {{-- Formulário comentado conforme o original --}}
        {{--
        <form
            action="#"
            method="POST"
            class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-48"
        >
            <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div>
                        <label
                            for="first-name"
                            class="block text-sm font-semibold leading-6 text-primaryText"
                        >
                            First name
                        </label>
                        <div class="mt-2.5">
                            <input
                                type="text"
                                name="first-name"
                                id="first-name"
                                autocomplete="given-name"
                                class="focus:ring-primaary-500 block w-full rounded-md border-0 bg-primaryText/5 px-3.5 py-2 text-primaryText shadow-sm ring-1 ring-inset ring-primaryText/10 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div>
                        <label
                            for="last-name"
                            class="block text-sm font-semibold leading-6 text-primaryText"
                        >
                            Last name
                        </label>
                        <div class="mt-2.5">
                            <input
                                type="text"
                                name="last-name"
                                id="last-name"
                                autocomplete="family-name"
                                class="block w-full rounded-md border-0 bg-primaryText/5 px-3.5 py-2 text-primaryText shadow-sm ring-1 ring-inset ring-primaryText/10 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="email"
                            class="block text-sm font-semibold leading-6 text-primaryText"
                        >
                            Email
                        </label>
                        <div class="mt-2.5">
                            <input
                                type="email"
                                name="email"
                                id="email"
                                autocomplete="email"
                                class="block w-full rounded-md border-0 bg-primaryText/5 px-3.5 py-2 text-primaryText shadow-sm ring-1 ring-inset ring-primaryText/10 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="phone-number"
                            class="block text-sm font-semibold leading-6 text-primaryText"
                        >
                            Phone number
                        </label>
                        <div class="mt-2.5">
                            <input
                                type="tel"
                                name="phone-number"
                                id="phone-number"
                                autocomplete="tel"
                                class="block w-full rounded-md border-0 bg-primaryText/5 px-3.5 py-2 text-primaryText shadow-sm ring-1 ring-inset ring-primaryText/10 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="message"
                            class="block text-sm font-semibold leading-6 text-primaryText"
                        >
                            Message
                        </label>
                        <div class="mt-2.5">
                            <textarea
                                name="message"
                                id="message"
                                rows="4"
                                class="block w-full rounded-md border-0 bg-primaryText/5 px-3.5 py-2 text-primaryText shadow-sm ring-1 ring-inset ring-primaryText/10 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6"
                            ></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-end">
                    <button
                        type="submit"
                        class="rounded-md bg-primary-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-primary-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-500"
                    >
                        Send message
                    </button>
                </div>
            </div>
        </form>
        --}}
    </div>
@endsection
