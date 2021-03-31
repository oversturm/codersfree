<div>
   <article class="card" x-data="{open: false}">
       <div class="card-body bg-gray-100">
           <header>
               <h1 x-on:click="open = !open" class="cursor-pointer">Descriptcion de la leccion</h1>
           </header>

           <div x-show="open">
               <hr class="my-2">

               @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>

                        @error('description.name')
                            <span class="text-sm text-re-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-end mt-2">
                            <button wire:click="destroy" type="button" class="btn btn-danger text-xs">Eliminar</button>
                            <button type="submit" class="btn btn-primary text-xs ml-2">Actualizar</button>
                        </div>
                    </form>
                @else

                    <div>
                        <textarea wire:model="name" class="mt-1 focus:ring-gray-400 focus:border-gray-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Agregue una descripcion de la lección"></textarea>

                        @error('name')
                            <span class="text-sm text-re-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-end mt-2">
                            <button wire:click="store" class="btn btn-primary text-xs ml-2">Agregar</button>
                        </div>
                    </div>

               @endif
           </div>
       </div>
   </article>
</div>
