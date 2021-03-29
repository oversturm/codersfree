<div>
   @foreach ($section->lessons as $item)
       <article class="card mt-4">
           <div class="card-body">

            @if ($lesson->id == $item->id)
                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="lesson.name" type="text" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                @error('lesson.name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                <div class="flex item-center mt-4">
                    <label class="w-32">Plataforma:</label>
                    <select wire:model="lesson.platform_id" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($platforms as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <div class="flex items-center mt-4">
                        <label class="w-32">URL:</label>
                        <input wire:model="lesson.url" type="text" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                @error('lesson.url')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                <div class="mt-4 flex justify-end">
                    <button class="btn btn-danger text-xs" wire:click="cancel">Cancelar</button>
                    <button class="btn btn-primary ml-2 text-xs" wire:click="update">Actualizar</button>
                </div>

            @else
                <header>
                    <h1><i class="far fa-play-circle text-blue-500 mr-1"></i> Lección: {{ $item->name }}</h1>
                </header>
                <div>
                    <hr class="my-2">
                    <p class="text-sm">Plataforma: {{$item->platform->name}} </p>
                    <p class="text-sm">Enlace: <a class="text-blue-400" href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></p>

                    <div class="mt-2">
                        <button class="btn btn-primary text-sm" wire:click="edit({{ $item }})">Editar</button>
                        <button class="btn btn-danger text-sm" wire:click="destroy({{ $item }})">Eliminar</button>
                    </div>
                </div>
                @endif
           </div>
       </article>
   @endforeach


   <div class="mt-4" x-data="{open: false}">
    <a x-show="!open" x-on:click="open = true" class="flex item-center cursor-pointer">
        <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
        Agregar nueva Lección
    </a>
    <article class="card" x-show="open">
        <div class="card-body">
            <h1 class="text-xl font-bold mb-4">Agregar nueva Lección</h1>
            <div>
                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="name" type="text" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                <div class="flex item-center mt-4">
                    <label class="w-32">Plataforma:</label>
                    <select wire:model="platform_id" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($platforms as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('platform_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                <div>
                    <div class="flex items-center mt-4">
                        <label class="w-32">URL:</label>
                        <input wire:model="url" type="text" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                @error('url')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
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
