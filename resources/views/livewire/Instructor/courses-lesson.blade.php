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
                    <select wire:model="lesson.platform_id">
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
                        <button class="btn btn-danger text-sm">Eliminar</button>
                    </div>
                </div>
                @endif
           </div>
       </article>
   @endforeach
</div>
