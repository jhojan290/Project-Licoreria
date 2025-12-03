
<div class="layout-container flex h-full grow flex-col">

    <!-- Main Container -->
    <div class="flex flex-1 justify-center py-5 sm:px-4 md:px-10 lg:px-20 xl:px-40">

        <div class="layout-content-container flex flex-col w-full max-w-7xl flex-1">


            <main class="flex-1 px-4 md:px-10 py-8">
                
                <div class="flex flex-wrap justify-between gap-4 mb-6">
                    <p class="text-gray-900 dark:text-white text-4xl font-black leading-tight">
                        Gestión de Inventario
                    </p>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center gap-4 p-4 rounded-lg bg-white/50 dark:bg-black/20 mb-6 border border-black/10 dark:border-white/10">
                    <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                        <div class="relative w-full sm:w-64">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
                            <input wire:model.live.debounce.300ms="search" 
                                type="text" placeholder="Buscar producto..." 
                                class="w-full h-10 pl-10 pr-4 rounded-lg bg-gray-100 dark:bg-[#27241b] border-transparent focus:ring-2 focus:ring-primary text-gray-800 dark:text-gray-200"
                            />
                        </div>
                        <div class="relative w-full sm:w-auto">
                            <select wire:model.live="categoryFilter" class="h-10 w-full sm:w-55 rounded-lg bg-gray-100 dark:bg-[#27241b] border-transparent focus:border-licup focus:ring-2 focus:ring-licup focus:outline-none text-gray-800 dark:text-gray-200 appearance-none pr-10 pl-4 cursor-pointer transition-all">
                                <option value="">Todas las categorías</option>
                                <option value="Whiskey">Whiskey</option>
                                <option value="Ron">Ron</option>
                                <option value="Ginebra">Ginebra</option>
                                <option value="Vino">Vino</option>
                                <option value="Tequila">Tequila</option>
                                <option value="Vodka">Vodka</option>
                                <option value="Brandy">Brandy</option>
                                <option value="Aguardiente">Aguardiente</option>
                                <option value="Cerveza">Cerveza</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                                <span class="material-symbols-outlined text-gray-500 dark:text-gray-400">expand_more</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        
                        {{-- 1. NUEVO: BOTÓN DE BASURA MASIVA (Mínimo 2 seleccionados) --}}
                        @if(count($selected) >= 2)
                            <button 
                                type="button"
                                x-data
                                wire:click="$dispatch('open-delete-modal', { ids: @js($selected) })"
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 animate-in fade-in zoom-in border border-red-500/20 cursor-pointer"
                                title="Borrar seleccionados ({{ count($selected) }})"
                            >
                                <span class="material-symbols-outlined text-xl">delete_sweep</span>
                            </button>
                        @endif

                        {{-- 2. BOTÓN EXPORTAR (El que me pasaste) --}}
                        <div x-data="{ open: false }" class="relative">
                            <button 
                                @click="open = !open"
                                type="button"
                                {{-- Deshabilitamos el clic mientras se exporta para evitar errores --}}
                                wire:loading.attr="disabled"
                                wire:target="exportExcel"
                                class="flex h-10 items-center justify-center gap-2 px-4 rounded-lg bg-green-500/10 text-green-500 hover:bg-green-500 hover:text-white border border-green-500/20 transition-all cursor-pointer focus:outline-none disabled:opacity-50 disabled:cursor-wait"
                                title="Opciones de Exportación"
                            >
                                
                                {{-- ESTADO NORMAL (Visible cuando NO se está exportando) --}}
                                <div wire:loading.remove wire:target="exportExcel" class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-xl">download</span>
                                    <span class="hidden md:inline text-sm font-bold">Exportar</span>
                                    <span class="material-symbols-outlined text-lg transition-transform duration-200" :class="{'rotate-180': open}">expand_more</span>
                                </div>

                                {{-- ESTADO CARGANDO (Visible SOLO cuando se está exportando) --}}
                                <div wire:loading.flex wire:target="exportExcel" class="items-center gap-2">
                                    <svg class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span class="text-sm font-bold">Generando...</span>
                                </div>

                            </button>

                            <div x-show="open" 
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                @click.away="open = false"
                                x-cloak
                                class="absolute top-full right-0 mt-2 w-48 rounded-lg bg-[#121212] border border-white/10 shadow-xl py-2 z-50"
                            >
                                <button 
                                    wire:click="exportExcel('page')" 
                                    @click="open = false"
                                    class="w-full text-left flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-green-400 transition-colors"
                                >
                                    <span class="material-symbols-outlined text-lg">article</span>
                                    Página Actual
                                </button>

                                <button 
                                    wire:click="exportExcel('all')" 
                                    @click="open = false"
                                    class="w-full text-left flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-green-400 transition-colors"
                                >
                                    <span class="material-symbols-outlined text-lg">inventory_2</span>
                                    Todo el Inventario
                                </button>
                            </div>

                        </div>

                        {{-- 3. BOTÓN AGREGAR --}}
                        <button type="button" x-data @click="$dispatch('open-modal', { view: 'create-prod' })"
                            class="flex w-full md:w-auto cursor-pointer items-center justify-center rounded-lg h-10 bg-primary text-[#181611] gap-2 text-sm font-bold px-4 hover:opacity-90 transition-opacity">
                            <span class="material-symbols-outlined text-xl">add</span>
                            <span>Agregar Nuevo Producto</span>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-black/10 dark:border-[#554e3a] bg-white dark:bg-[#181611]">
                    <table class="min-w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-[#27241b]">
                                {{-- 1. CONDICIONAL: El Checkbox maestro solo aparece si hay productos --}}
                                @if($products->count() > 0)
                                    <th class="px-4 py-3 w-10 text-center">
                                        <div class="flex items-center justify-center">
                                            <input 
                                                type="checkbox" 
                                                wire:click="toggleSelectAll"
                                                @if($this->isAllSelected) checked @endif
                                                class="h-5 w-5 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-[#181611] dark:border-white/20 cursor-pointer"
                                                title="Seleccionar todos"
                                            />
                                        </div>
                                    </th>
                                @endif
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium">Producto</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium">Marca</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium">Categoría</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium text-center">Volumen</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium text-center">% Alcohol</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium text-center">Stock</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium">Precio</th>
                                <th class="px-4 py-3 text-gray-600 dark:text-white text-sm font-medium text-center">Imagen</th>
                                <th class="px-4 py-3 text-right text-gray-600 dark:text-white text-sm font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-black/10 dark:divide-t-[#554e3a]">
                            @forelse($products as $product)
                                <tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors group">
                                    
                                    <td class="px-4 py-3 text-center">
                                        <input 
                                            type="checkbox" 
                                            value="{{ $product->id }}" 
                                            wire:model.live="selected" 
                                            class="h-5 w-5 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-[#181611] dark:border-white/20 cursor-pointer"
                                        />
                                    </td>

                                    <td class="px-4 py-4 align-middle"> <div class="text-base font-bold text-gray-900 dark:text-white">{{ $product->name }}</div>
                                    </td>

                                    <td class="px-4 py-4 align-middle text-gray-500 dark:text-[#bbb39b] text-sm font-medium">
                                        {{ $product->brand }}
                                    </td>

                                    <td class="px-4 py-4 align-middle text-gray-500 dark:text-[#bbb39b] text-sm">
                                        {{ $product->category }}
                                    </td>

                                    <td class="px-4 py-4 align-middle text-center">
                                        <span class="text-xs bg-white/10 px-3 py-1 rounded-full text-gray-300 whitespace-nowrap border border-white/5">
                                            {{ $product->volume ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 align-middle text-center text-sm text-gray-500 dark:text-[#bbb39b]">
                                        {{ $product->alcohol_percentage ? $product->alcohol_percentage . '%' : '-' }}
                                    </td>
                                    
                                    <td class="px-4 py-4 align-middle text-center">
                                        <div class="inline-flex flex-col items-center justify-center w-16 py-1 rounded-lg bg-gray-100 dark:bg-[#2a261c] border border-black/5 dark:border-white/5">
                                            <span class="text-sm font-bold text-gray-900 dark:text-white">{{ $product->stock }}</span>
                                            <span class="text-[10px] text-gray-500 uppercase tracking-wide">Und</span>
                                        </div>
                                    </td>
                                    
                                    <td class="px-4 py-4 align-middle text-gray-500 dark:text-[#bbb39b] text-base font-bold tracking-wide">
                                        ${{ number_format($product->price, 2) }}
                                    </td>

                                    <td class="px-4 py-4 align-middle">
                                        <div class="flex justify-center">
                                            <div class="h-24 w-24 rounded-xl overflow-hidden bg-white dark:bg-[#121212] border border-gray-200 dark:border-white/10 flex items-center justify-center shadow-md group-hover:shadow-lg transition-all transform group-hover:scale-105">
                                                @if($product->image_path)
                                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="h-full w-full object-contain p-1">
                                                @else
                                                    <span class="material-symbols-outlined text-gray-400 text-4xl">image</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="px-4 py-4 align-middle text-right">
                                        <div class="flex items-center justify-end gap-3">
                                            <button wire:click="$dispatch('open-modal', { view: 'create-prod', productId: {{ $product->id }} })"
                                                class="h-10 w-10 flex items-center justify-center rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white transition-all" 
                                                title="Editar">
                                                <span class="material-symbols-outlined text-xl">edit</span>
                                            </button>
                                            
                                            <button 
                                                wire:click="$dispatch('open-delete-modal', { ids: {{ $product->id }} })" 
                                                class="h-10 w-10 flex items-center justify-center rounded-lg bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white transition-all" 
                                                title="Eliminar"
                                            >
                                                <span class="material-symbols-outlined text-xl">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="px-4 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center gap-3 w-full h-full">
                                            <div class="p-4 rounded-full bg-gray-100 dark:bg-white/5 mb-2">
                                                <span class="material-symbols-outlined text-5xl text-gray-400 dark:text-gray-600">inventory_2</span>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">No hay productos</h3>
                                            <p class="text-gray-500 dark:text-gray-400 text-sm max-w-xs mx-auto">
                                                No se encontraron productos en el inventario o no coinciden con tu búsqueda.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $products->links('pagination::tailwind') }}
                </div>
            </main>
        </div>
    </div>
</div>