<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1 border-gray-300'.($errors->has('title') ? ' border-red-600':'')]) !!}     
    @error('title')
        <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror                                     
</div>

<div class="mb-4">
    {!! Form::label('Slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly','class' => 'form-input block w-full mt-1 border-gray-300 '.($errors->has('slug') ? 'border-red-600': ''),'id' => 'slug']) !!}
    @error('slug')
        <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror  
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1 border-gray-300 '.($errors->has('subtitle') ? 'border-red-600':'')]) !!}
    @error('subtitle')
        <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror  
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1']) !!}
    @error('description')
        <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror  
</div>

<div class="mb-4 grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoría') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 border-gray-300']) !!}
    </div>

    <div>
        {!! Form::label('level_id', 'Niveles') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 border-gray-300']) !!}
    </div>

    <div>
        {!! Form::label('price_id', 'Precios') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 border-gray-300']) !!}
    </div>
</div>

{{-- image --}}

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-2 gap-4">
   <figure>
       @isset($course->image)
            <img src="{{Storage::url($course->image->url)}}" class="w-full h-64 object-cover object-center" id="picture">          
        @else
            <img class="object-cover object-center" src="https://images.pexels.com/photos/414628/pexels-photo-414628.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" id="picture">
       @endisset
    </figure> 
    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores ea dolor laborum libero! Impedit possimus sit quis quas culpa nostrum accusamus at odit eligendi harum provident perspiciatis, modi voluptates?</p>
        {!! Form::file('file', ['class' => 'border p-2 w-full '.($errors->has('subtitle') ? 'border-red-600':''),'id' => 'file','accept' => 'image/*']) !!}

        @error('file')
            <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror 
    </div>
</div>