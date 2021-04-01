<div class="card" x-data="{open: false}">
    <div class="card-body bg-gray-100">
        <header>
            <h1 class="cursor-pointer" x-on:click="open = !open">Recursos de la Leccion</h1>
        </header>

        <div x-show="open">

            <hr class="my-2">

            @if ($lesson->resource)

                <div class="flex justify-between items-center">
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{ $lesson->resource->url }}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>

            @else

            <form wire:submit.prevent="save">
                <div class="flex item-center">
                    <input wire:model="file" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="file">
                    <button class="btn btn-primary text-sm" type="submit">Guardar</button>
                </div>

                <div class="text-blue-400 text-bold mt-1 text-xs" wire:loading wire:target="file">
                    Cargando...
                </div>

                @error('file')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </form>

            @endif

        </div>
    </div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
