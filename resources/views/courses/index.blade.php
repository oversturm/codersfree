<x-app-layout>
    {{--  Portada  --}}
    <section class="bg-cover" style="background-image: url({{asset('img/cursos/programacion.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-4/5 ">
                <h1 class="text-white font-bold text-4xl">Los mejores cursos de programación !GRATIS!</h1>
                <p class="text-white text-lg mt-2">Si estas buscando potenciar tus conocimientos este es tu sitio.</p>

                @livewire('search')

            </div>
        </div>
    </section>

    @livewire('courses-index')

</x-app-layout>
