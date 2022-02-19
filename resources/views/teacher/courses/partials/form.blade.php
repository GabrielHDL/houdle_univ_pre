<div class="mb-4">
    {!! Form::label('title', 'Título del curso') !!}
    {!! Form::text('title', null, ['class' => 'form-input w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}
    @error('title')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>        
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-input w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}
    @error('slug')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>        
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
    @error('subtitle')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>        
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}
    @error('description')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
    @enderror
</div>

<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoría:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input w-full mt-1']) !!}
        @error('category_id')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div>
        {!! Form::label('level_id', 'Niveles:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input w-full mt-1']) !!}
        @error('level_id')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input w-full mt-1']) !!}
        @error('price_id')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
<hr class="mt-2 mb-6">

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{asset('img/cursos/default.jpg')}}" alt="">
        @endisset
    </figure>
    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
        {!! Form::file('file', ['class' => 'form-input w-full mt-1' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
</div>