<x-app-layout>
    {{-- bg and search --}}
    <section class="bg-cover bg-center mb-14" style="background-image: url({{asset('img/home/bg-home.jpg')}})">
        <div class="container py-36">
           <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl mb-2">Plataforma De Cursos</h1>
                <p class="text-white text-lg mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, quasi?</p>

                {{-- search --}}
                @livewire('search')
           </div>
        </div>
    </section>

    {{-- content --}}
    <section class="mb-24">
        <h1 class="text-center text-gray-600 text-3xl mb-6">CONTENIDO</h1>
        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure class="mb-2">
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/course-1.jpg')}}" alt="">
                </figure>

                <header>
                    <h1 class="text-center text-xl text-gray-700">Primer Curso</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis fugiat autem dignissimos debitis non consequuntur dolorum quo voluptatibus amet cupiditate?</p>
            </article>

            <article>
                <figure class="mb-2">
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/course-2.jpg')}}" alt="">
                </figure>

                <header>
                    <h1 class="text-center text-xl text-gray-700">Segundo Curso</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis fugiat autem dignissimos debitis non consequuntur dolorum quo voluptatibus amet cupiditate?</p>
            </article>

            <article>
                <figure class="mb-2">
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/course-3.jpg')}}" alt="">
                </figure>

                <header>
                    <h1 class="text-center text-xl text-gray-700">Tercer Curso</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis fugiat autem dignissimos debitis non consequuntur dolorum quo voluptatibus amet cupiditate?</p>
            </article>

            <article>
                <figure class="mb-2">
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/course-4.jpg')}}" alt="">
                </figure>

                <header>
                    <h1 class="text-center text-xl text-gray-700">Cuarto Curso</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis fugiat autem dignissimos debitis non consequuntur dolorum quo voluptatibus amet cupiditate?</p>
            </article>
        </div>
    </section>

    {{-- catalog --}}
    <section class="bg-gray-700 py-12 mb-24">
        <h1 class="text-center text-white text-3xl mb-2">¿No sabes que curso adquirir?</h1>
        <p class="text-white text-center mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci</p>
        <div class="flex justify-center">
            <!-- component -->
            <a href="{{route('courses.index')}}" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">
                Catálogo de cursos
            </a>
        </div>
    </section>

    {{-- last courses --}}
    <section class="mb-24">
        <h1 class="text-gray-600 text-3xl text-center uppercase">Últimos cursos</h1>
        <p class="text-gray-500 text-center text-sm mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, dolorem.</p>

        {{-- last courses list --}}
        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>
</x-app-layout>