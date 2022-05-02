<div class="mt-8">
   <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
      <div class="lg:col-span-2">
         <div class="embed-responsive">
            {!!$current->iframe!!}
         </div>
         <h1 class="text-3xl text-greay-600 font-bold mt-4">{{$current->name}}</h1>

         @if ($current->description)
             <div class="text-gray-600">
                {{$current->description->name}}
             </div>
         @endif

         {{-- toggle --}}

         <div class="flex items-center mt-4 cursor-pointer mb-2" wire:click="completed">
            @if ($current->completed)
               <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
            @else
               <i class="fas fa-toggle-off text-2xl text-gray-600"></i>            
            @endif
          
            <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
         </div>

         <div class="card">
            <div class="card-body flex">
               @if ($this->previous)                   
                  <a wire:click="changeLesson({{$current}})" class="btn btn-dark" href="{{route('courses.status',$current)}}">Previous</a>
               @endif

               @if ($this->next)                   
                  <a wire:click="changeLesson({{$current}})" class="btn btn-dark ml-auto" href="{{route('courses.status',$current)}}">Next</a>
               @endif
               
            </div>
         </div>
        
      </div>
      <div class="card">
         <div class="card-body">            
            <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>
            <div class="flex items-center">
               <figure>
                  <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}">
               </figure>
               <div>
                  <p>{{$course->teacher->name}}</p>
                  <a class="text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name,'')}}</a>
               </div>
            </div>

            {{-- porcent --}}

            <p class="text-gray-600 text-sm mt-2">{{$this->advance .'%'}} completado</p>

            {{-- progress bar --}}
            <div class="relative pt-1">
               <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                 <div style="width:{{$this->advance .'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500 transition-all duration-500"></div>
               </div>
            </div>

            {{-- sections --}}
            <ul>
               @foreach ($course->sections as $section)
                   <li class="text-gray-600 mb-4">
                      <a href="" class="font-bold text-base mb-2 inline-block">{{$section->name}}</a>
                      {{-- lessons --}}
                      <ul>
                         @foreach ($section->lessons as $lesson)
                           <li class="flex">
                              <div>
                                    @if ($lesson->completed)
                                       @if ($lesson->id == $current->id)
                                          <i class="far fa-check-square mr-2 text-2xl"></i>   
                                          @else
                                          <i class="far fa-check-square mr-2 text-2xl"></i>     
                                       @endif                                                                                 
                                    @else                     
                                       @if ($lesson->id == $current->id)
                                             <i class="far fa-square mr-2 text-2xl"></i>
                                       @else
                                       <i class="far fa-square mr-2 text-2xl"></i>
                                       @endif                
                                 @endif
                              </div>
                              <ul class="w-full">
                                 @if ($lesson->id == $current->id)
                                    <li class="bg-pink-200 mb-3">
                                       <a wire:click="changeLesson({{$lesson}})" class="cursor-pointer">{{$lesson->name}}</a>                                                    
                                    </li>
                                 @else
                                    <li class="hover:bg-pink-200 mb-3 transition-all duration-100">
                                       <a wire:click="changeLesson({{$lesson}})" class="cursor-pointer">{{$lesson->name}}</a>                                                    
                                    </li>
                                 @endif
                                
                              </ul>
                           </li>
                         @endforeach
                      </ul>
                   </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
</div>
