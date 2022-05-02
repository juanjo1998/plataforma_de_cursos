@props(['course'])

<article class="card">
    <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}">  
                            
    <div class="card-body">
        {{-- course title --}}
        <h1 class="card-title">{{Str::limit($course->title,30)}}</h1>
        {{-- professor --}}
        <p class="text-red-600 text-sm mb-2 underline">Prof: {{$course->teacher->name}}</p>

        <div class="flex items-center mb-3">
            {{-- stars --}}
            <ul class="flex text-sm">
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
            {{-- registered users --}}
            <p class="text-sm text-gray-500 ml-auto"> 
                <i class="fas fa-users"></i>
                ({{$course->students_count}})
            </p>                            
        </div>

        {{-- button info --}}
        <a href="{{route('courses.show',$course)}}" class="bg-indigo-500 hover:bg-opacity-80 text-white font-bold py-2 px-4 rounded w-full inline-block text-center cursor-pointer">
            Más Información
        </a>
    </div>
</article>