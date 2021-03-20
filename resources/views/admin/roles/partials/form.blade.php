<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder'=>'Escriba un nombre']) !!}

    @error('name')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


<p style="color: #808080" class="text-bold mb-1">Permisos:</p>
@error('permissions')
        <p class="text-danger">
            <strong class=" text-xs ">{{ $message }}</strong>
        </p>
@enderror
@foreach ($permissions as $permission)
    <label class="mr-2">
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
        {{ $permission->name }}

    </label>
@endforeach

<div>
