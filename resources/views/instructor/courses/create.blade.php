<x-app-layout>
    <div class="container py-8">
        <div class="card card-body">
            <h1 class="text-2xl font-bold">Crear Nuevo Curso</h1>
            <hr class="mb-6 mt-2">

            {!! Form::open(['route'=>'instructor.courses.store', 'files'=>true, 'autocomplete' => 'off']) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}

                @include('instructor.courses.partials.form')

            <div class="flex justify-end">
                {!! Form::submit('Crear Curso', ['Class' => 'btn btn-primary cursor-pointer']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    {{-- Componente con nombre --}}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

        <script src=" {{ asset('js/instructor/courses/form.js') }} "> </script>
    </x-slot>

</x-app-layout>
