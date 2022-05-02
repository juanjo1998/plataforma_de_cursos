<div class="container py-8">
      <x-table-responsive>
            <div class="px-6 py-4 flex">
                <x-jet-input type="text" class="flex-1 px-6 py-2" placeholder="Buscar producto" wire:model="search">
                </x-jet-input>          
                
                <a  href="{{route('instructor.courses.create')}}" class="btn btn-dark ml-2">Crear nuevo curso</a>
            </div>
                @if ($courses->count())                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>                           
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Matriculados
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Calificación
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                                {{-- <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($courses as $course)                            
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">                                                    
                                              @isset($course->image)
                                                    <img class="h-10 w-10 rounded-full object-cover" src="{{Storage::url($course->image->url)}}">   
                                                @else 
                                                    <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/414628/pexels-photo-414628.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                                              @endisset                                                                                          
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                {{$course->title}}
                                                </div>
                                                <div class="text-sm text-gra-500">
                                                    <p class="text-gray-500">{{$course->category->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{$course->students->count()}}
                                        </div>

                                        <div class="text-sm text-gray-500">
                                            Alumnos matriculados
                                        </div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">                                                                                                                   
                                       {{-- stars --}}
                                       <div class="flex items-center">
                                        {{$course->rating}}      

                                            <ul class="flex text-sm ml-2">
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i>
                                                </li>
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i>
                                                </li>
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i>
                                                </li>
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i>
                                                </li>
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i>
                                                </li>
                                            </ul>
                                       </div>

                                        <div class="text-sm text-gray-500">
                                            Valoración del curso
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @switch($course->status)
                                            @case(1)
                                            <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                                @break
                                            @case(2)
                                            <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revisión
                                            </span>
                                                @break  
                                                
                                            @case(3)
                                            <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                            </span>
                                                @break    
                                        @endswitch                                                   
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-center">
                                            <a href="{{route('instructor.courses.edit',$course)}}" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-300 mr-2">Edit</a>
                                            <form action="">
                                                <button href="" class="bg-red-400 text-white px-4 py-2 rounded hover:bg-red-300">Del</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                            <!-- More people... -->
                        </tbody>
                    </table>
                    @else
                    <div class="flex justify-center px-6 py-4">
                       <span class="text-red-400 text-lg font-semibold">No se encontraron coincidencias</span>
                    </div>
                @endif
                
                @if ($courses->hasPages())                    
                    <div class="px-6 py-4">
                        {{$courses->links()}}
                    </div>
                @endif
                
        </x-table-responsive>   
</div>
