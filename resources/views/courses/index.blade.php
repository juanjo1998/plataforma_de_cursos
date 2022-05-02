<x-app-layout>
    {{-- bg and search --}}
    <section class="bg-cover bg-center mb-14" style="background-image: url({{asset('img/courses/bg-courses.jpg')}})">
        <div class="container py-36">
           <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl mb-2">Obten todos nuestros cursos</h1>
                <p class="text-white text-lg mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, quasi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, in?</p>

                {{-- search --}}
                @livewire('search')
           </div>
        </div>
    </section>

    {{-- CourseIndex - livewire --}}

    @livewire('courses-index')

</x-app-layout>