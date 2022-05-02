<x-app-layout>

    {{-- image and description course --}}
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- course image --}}
            <figure>
                 <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}">   
            </figure>     
            
            {{-- course description --}}

            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class="fas fa-list alt"></i> Categoría: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{$course->students_count}}</p>
                <p><i class="far fa-star"></i> Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
           <section class="card mb-12">
               <div class="card-body">
                   <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>

                   {{-- goals --}}
                   <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                       @foreach ($course->goals as $goal)
                           <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                       @endforeach
                   </ul>
               </div>
           </section>

           {{-- course sections --}}
           <section class="mb-12">
               <h1 class="font-bold text-3xl mb-2">Temario</h1>

               @foreach ($course->sections as $section)
                   <article class="mb-4 shadow"
                   @if ($loop->first)
                        x-data="{'open':true}"
                        
                        @else

                        x-data="{'open':false}"

                   @endif                   
                   >
                       <header class="border border-gray-300 px-4 py-2 cursor-pointer bg-gray-700 hover:bg-gray-500 text-white" x-on:click="open = !open">
                           <h1 class="font-bold text-lg">{{$section->name}}</h1>
                       </header>
                       <div class="bg-white py-2 px-4" x-show="open">
                           <ul class="grid grid-cols-1 gap-2">
                               @foreach ($section->lessons as $lesson)    
                                <li class="text-gray-700 text-base"><i class="fas fa-play-circle text-gray-600"></i> {{$lesson->name}}</li>         
                               @endforeach
                           </ul>
                       </div>
                   </article>
               @endforeach
           </section>

           {{-- requirements --}}

           <section class="mb-8">
               <h1 class="font-bold text-3xl">Requisitos</h1>

               <ul class="list-disc list-inside">
                   @foreach ($course->requirements as $requirement)
                       <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                   @endforeach
               </ul>

           </section>

           {{-- course description --}}

           <section>
               <h1 class="font-bold text-3xl">Descripción</h1>
               <div class="text-gray-700 text-base">
                {{$course->description}}
               </div>
           </section>
        </div>   

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center justify-center mb-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">
                                Prof: <span class="text-gray-400">{{$course->teacher->name}}</span>
                            </h1>
                            <a href="" class="text-blue-400 text-sm font-bold">{{'@'.Str::slug($course->teacher->name,'')}}</a>
                        </div>                        
                    </div>
                    
                    <div class="flex justify-center">                      
                      @can('enrolled',$course)

                      <a href="{{route('courses.status',$course)}}" class="btn btn-red">Continuar con el curso</a>

                      @else
                      
                      <form action="{{route('courses.enrolled',$course)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-red">Tomar curso</button>
                       </form>
                      @endcan
                    </div>

                </div>
            </section>    
            
            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}">
                        <div class="ml-3">
                            <h1>
                                <a href="{{route('courses.show',$similar)}}" class="font-bold text-gray-500 mb-3" href="">{{Str::limit($similar->title,40)}}</a>
                            </h1>

                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}">
                                <p class="text-gray-700 text-sm ml-2">{{$similar->teacher->name}}</p>
                            </div>
                            
                            <p class="text-sm">
                                <i class="fas fa-star mr-2 text-yellow-400"></i>
                                {{$similar->rating}}
                            </p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>      
    </div>
</x-app-layout>