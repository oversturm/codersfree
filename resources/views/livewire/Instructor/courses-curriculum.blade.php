<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <h1 class="font-bold text-lg uppercase">Lecciones del Curso</h1>
    <hr class="mt-2 mb-6">


    @foreach ($course->sections as $item)
        <article class="card mb-6">
            <div class="card-body bg-gray-100">
                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model="section.name" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ingrese el nombre de la sección">

                        @error('section.name')

                            <span class="text-xs text-red-500">{{ $message }}</span>

                        @enderror


                    </form>
                @else
                    <header class=" flex justify-between items-center">
                        <h1 class="cursor-pointer"><strong>Sección: </strong>{{ $item->name }} </h1>
                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{ $item }})"></i>
                        </div>
                    </header>

                    <div>
                        @livewire('instructor.courses-lesson', ['section'=> $item], key($item->id))
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex item-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva seccion
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva sección</h1>
                <div>
                    <input wire:model="name" type="text" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Escriba el nombre de la Sección">
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-2">
                    <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>

            </div>
        </article>
    </div>
</div>
