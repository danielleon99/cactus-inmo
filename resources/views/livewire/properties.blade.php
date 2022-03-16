<div>

        <select name="property_id" wire:model="filter" class="w-auto border border-black rounded-md">
            <option value="" selected>Seleccione una opción</option>
            @foreach ($statusOptions as $key=>$option)
        <option value="{{$key}}">{{$option}}</option>
        @endforeach
    </select>

    <button wire:click="fetchProperties()"
        class="absolute top-15 right-96 px-4 py-2 bg-gray-800 border border-black rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
        Sincronizar propiedades
    </button>
    <input placeholder="Buscar" type="text" value="{{$search}}" wire:model="search" 
    class="absolute h-9 w-60 px-4 py-2 top-15 right-28 border border-black rounded-md">
    <i class="fas fa-search" style="position: absolute; margin-top: 13px; margin-left: 1060px"></i>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
    <div class="grid grid-flow-row grid-cols-3 gap-1">
    @foreach ($properties as $property)
    <div class="max-w-sm rounded overflow-hidden shadow-lg h-48 mt-5">
    <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{ Str::words($property->name, 20, '...') }}</div>
    <p class="text-gray-700 text-base">
    {{$property->id}}
    </p>
    <p class="text-gray-700 text-base" style="color: {{$this->getPurposeStatusColor($property->purpose_status)}}">
    {{$this->getPurposeStatusName($property->purpose_status)}}
    </p>
    </div>
    <div class="px-4 pt-4 pb-2">
    <a href="{{ url('todoList', $property->id) }}"
    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
    Recordatorios
    </a>
    <button 
    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
    Editar
    </button>
    <button 
    class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
    Eliminar
    </button>
    </div>
    </div>
    @endforeach
    </div>
    </div>
    <div class="py-4">
    {{ $properties->links() }}
    </div>
    </div>
</div>