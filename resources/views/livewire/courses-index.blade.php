<div>
    <div class="bg-gray-200 py-4 mb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 focus:outline-none" wire:click="restFilters">
                <i class="fas fa-users text-xs mr-2"></i>
                Todos los cursos
            </button>

            {{--  Dropdown Categorias   --}}
            <div class="relative inline-block text-left mr-2" x-data="{ open: false }">
                <div>
                    <button type="button" class="flex justify-center items-center w-full h-12 ml-2 rounded-lg border border-gray-300 shadow px-4 bg-white text-gray-700 hover:bg-gray-50 focus:outline-none " id="options-menu" aria-haspopup="true" aria-expanded="true" x-on:click="open = true" x-on:click.away="open = false">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Categorias
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                </div>

                <div class="origin-center-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" x-show="open">
                    @foreach($categories as $category)
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-blue-200 hover:text-gray-900" role="menuitem" wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false">{{$category->name}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            {{--  ENd Dropdown Categorias  --}}

            {{--   Dropdown Niveles   --}}
            <div class="relative inline-block text-left" x-data="{ open: false }">
                <div>
                    <button type="button" class="flex justify-center items-center w-full h-12 ml-2 rounded-lg border border-gray-300 shadow px-4 bg-white text-gray-700 hover:bg-gray-50 focus:outline-none " id="options-menu" aria-haspopup="true" aria-expanded="true" x-on:click="open = true" x-on:click.away="open = false">
                    <i class="fa fa-layer-group text-sm mr-2"></i>
                    Niveles
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                </div>

                <div class="origin-center-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" x-show="open">
                    @foreach ($levels as $level)
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-blue-200 hover:text-gray-900" role="menuitem" wire:click="$set('level_id', {{$level->id}})">{{$level->name}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            {{--  ENd Dropdown Categorias  --}}


        </div>
    </div>
    {{-- CURSOS --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
        {{--  Nombre Componente, el Rebistro $course lo pasmos como atributo y ponemos : para que reconozca lenguaje php   --}}
            <x-course-card :course="$course"/>
        @endforeach
    </div>
    {{-- end CURSOS --}}
    {{-- PAGINACION --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 mb-6">
    {{$courses->links()}}
</div>
    {{-- END PAGINACION --}}
</div>
