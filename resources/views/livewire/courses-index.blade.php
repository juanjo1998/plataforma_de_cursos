<div>
    <div class="bg-gray-200 py-4">
        <div class="container flex">           
            <button class="btn btn-dark mr-4" wire:click="resetFilter">
                <i class="fas fa-book mr-2"></i>
                Todos los cursos
            </button>

            <!-- btn categories -->
            <div class="relative mr-4" x-data="{open:false}">
                <button class="btn btn-dark" x-on:click="open = !open">
                    <i class="fas fa-filter"></i>
                        {{$categories_name}}
                    <i class="fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                   @foreach ($categories as $category)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-indigo-500 hover:text-white" wire:click="$set('category_id',{{$category->id}})" x-on:click="open = false">{{$category->name}}</a>                                 
                   @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            
            <!-- btn level -->
            <div class="relative mr-4" x-data="{open:false}">
                <button class="btn btn-dark" x-on:click="open = !open">
                    <i class="fas fa-layer-group"></i>
                        {{$levels_name}}
                    <i class="fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                    @foreach ($levels as $level)                        
                        <a class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white cursor-pointer" wire:click="$set('level_id',{{$level->id}})" x-on:click="open = false">{{$level->name}}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
        </div>
    </div>

    {{-- last courses list --}}
    <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8 mb-6">
        @foreach ($courses as $course)
           <x-course-card :course="$course"/>
        @endforeach
    </div>
    
    <div class="container">
        {{$courses->links()}}
    </div>
</div>
