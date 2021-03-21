<div class="mb-4">
    {!! Form::label('title', 'Título del Curso') !!}
    {!! Form::text('title', null, ['class'=>'form-input block shadow-sm w-full mt-1 rounded-lg  border-gray-300 focus:border-gray-500 focus:ring-gray-500' .($errors->has('title') ? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-red-600 text-xs">{{ $message }}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del Curso') !!}
    {!! Form::text('slug', null, ['readonly'=>'readonly', 'class'=>'form-input block shadow-sm w-full mt-1 rounded-lg  border-gray-300 focus:border-gray-500 focus:ring-gray-500' .($errors->has('slug') ? ' border-red-600' : '')]) !!}

    @error('slug')
    <strong class="text-red-600 text-xs">{{ $message }}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del Curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block shadow-sm w-full mt-1 rounded-lg  border-gray-300 focus:border-gray-500 focus:ring-gray-500' .($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

    @error('subtitle')
    <strong class="text-red-600 text-xs">{{ $message }}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description', 'Descripción del Curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block shadow-sm w-full mt-1 rounded-lg  border-gray-300 focus:border-gray-500 focus:ring-gray-500' .($errors->has('description') ? ' border-red-600' : '')]) !!}

    @error('description')
    <strong class="text-red-600 text-xs">{{ $message }}</strong>
    @enderror
</div>
<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block shadow-sm w-full mt-1 rounded-lg  border-gray-300 focus:border-gray-500 focus:ring-gray-500']) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Level:') !!}
        {!! Form::select('level_id', $levels, null, ['class'=>'form-input block shadow-sm w-full mt-1 rounded-lg  border-gray-300 focus:border-gray-500 focus:ring-gray-500']) !!}
    </div>
    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block shadow-sm w-full mt-1 rounded-lg  border-gray-300 focus:border-gray-500 focus:ring-gray-500']) !!}
    </div>
</div>
<h1 class="text-2xl font-bold mb-2 mt-8">Imagen del Curso</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/35550/ipad-tablet-technology-touch.jpg?auto=compress&cs=tinysrgb&h=750&w=1260">
        @endisset
    </figure>
    <div class="">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non, nam!</p>

        {{-- Al no tener un label Hemos añadido el id file al final, para que se active el javascript de actualizacion de imagenes  --}}
        {!! Form::file('file', ['class'=>'form-input shadow-sm w-full mt-1  border-gray-300 focus:border-gray-500 focus:ring-gray-500' . ($errors->has('file') ? ' border-red-600' : ''), 'id'=>'file', 'accept' => 'image/*']) !!}
        @error('file')
            <strong class="text-red-600 text-xs">{{ $message }}</strong>
        @enderror
    </div>
</div>
