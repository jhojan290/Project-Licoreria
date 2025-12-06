@section('title', 'Inventario | LicUp')

<div class="layout-container flex h-full grow flex-col bg-background-dark min-h-screen font-display">
    <div class="flex flex-1 justify-center py-8 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-[95%] 2xl:max-w-7xl flex-1 flex flex-col">

            <main class="flex-1">
                
                <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight">
                            Gestión de <span class="text-[#D4AF37]">Inventario</span>
                        </h1>
                        <p class="text-gray-400 text-sm mt-1">Administra tus productos, precios y stock.</p>
                    </div>
                    
                    <div class="text-sm text-gray-500 font-medium bg-[#121212] px-4 py-2 rounded-lg border border-white/10">
                        Total Productos: <span class="text-white font-bold">{{ $products->total() }}</span>
                    </div>
                </div>

                <div class="bg-[#121212] border border-white/10 rounded-2xl p-4 mb-8 shadow-lg">
                    <div class="flex flex-col lg:flex-row gap-4">
                        
                        <div class="flex-1 flex flex-col sm:flex-row gap-3">
                            <div class="relative flex-grow group">
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">search</span>
                                <input 
                                    wire:model.live.debounce.300ms="search" 
                                    type="text" 
                                    placeholder="Buscar producto, marca..." 
                                    class="w-full h-12 pl-10 pr-4 rounded-xl bg-white/5 border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all text-sm" 
                                />
                            </div>
                            
                            <div class="relative w-full sm:w-56 group">
                                <select wire:model.live="categoryFilter" class="w-full h-12 pl-4 pr-10 rounded-xl bg-white/5 border border-white/10 text-gray-300 text-sm focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] appearance-none cursor-pointer transition-all">
                                    <option value="" class="bg-[#181611] text-white">Categoría: Todas</option>
                                    @foreach(['Whiskey', 'Ron', 'Ginebra', 'Vino', 'Tequila', 'Vodka', 'Brandy', 'Aguardiente', 'Cerveza'] as $cat)
                                        <option value="{{ $cat }}" class="bg-[#181611] text-white">{{ $cat }}</option>
                                    @endforeach
                                </select>
                                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none group-focus-within:text-[#D4AF37]">expand_more</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-3 sm:justify-end">
                            
                            @if(is_array($selected) && count($selected) >= 2)
                                <button 
                                    type="button"
                                    x-data
                                    wire:click="$dispatch('open-delete-modal', { ids: @js($selected) })"
                                    class="h-12 px-4 rounded-xl bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white border border-red-500/20 transition-all font-bold text-sm flex items-center gap-2 justify-center animate-in zoom-in cursor-pointer"
                                    title="Borrar seleccionados ({{ count($selected) }})"
                                >
                                    <span class="material-symbols-outlined">delete_sweep</span>
                                    <span class="hidden sm:inline">Borrar ({{ count($selected) }})</span>
                                </button>
                            @endif

                            <div x-data="{ open: false }" class="relative flex-grow sm:flex-grow-0">
                                <button @click="open = !open" type="button" wire:loading.attr="disabled" wire:target="exportExcel" 
                                    class="w-full sm:w-auto h-12 px-5 rounded-xl bg-white/5 text-gray-300 hover:bg-white/10 hover:text-white border border-white/10 transition-all font-bold text-sm flex items-center justify-center gap-2 focus:outline-none cursor-pointer"
                                >
                                    <div wire:loading.remove wire:target="exportExcel" class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-xl">download</span>
                                        <span>Exportar</span>
                                        <span class="material-symbols-outlined text-lg transition-transform duration-200" :class="{'rotate-180': open}">expand_more</span>
                                    </div>
                                    <div wire:loading.flex wire:target="exportExcel" class="items-center gap-2">
                                        <svg class="animate-spin h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                        <span>Generando...</span>
                                    </div>
                                </button>
                                
                                <div x-show="open" @click.outside="open = false" x-transition x-cloak class="absolute top-full right-0 mt-2 w-48 rounded-xl bg-[#181611] border border-white/10 shadow-2xl py-2 z-30 overflow-hidden">
                                    <button wire:click="exportExcel('page')" @click="open = false" class="w-full text-left flex items-center gap-3 px-4 py-3 text-sm text-gray-400 hover:bg-white/5 hover:text-white transition-colors cursor-pointer">
                                        <span class="material-symbols-outlined text-[#D4AF37]">article</span> Página Actual
                                    </button>
                                    <button wire:click="exportExcel('all')" @click="open = false" class="w-full text-left flex items-center gap-3 px-4 py-3 text-sm text-gray-400 hover:bg-white/5 hover:text-white transition-colors cursor-pointer">
                                        <span class="material-symbols-outlined text-[#D4AF37]">inventory_2</span> Todo el Inventario
                                    </button>
                                </div>
                            </div>

                            <button type="button" x-data @click="$dispatch('open-modal', { view: 'create-prod' })"
                                class="flex-grow sm:flex-grow-0 h-12 px-6 rounded-xl bg-[#D4AF37] text-[#121212] font-black hover:bg-white transition-all shadow-lg shadow-yellow-900/20 flex items-center justify-center gap-2 text-sm cursor-pointer transform active:scale-95">
                                <span class="material-symbols-outlined text-xl">add</span>
                                <span>Nuevo</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-[#121212] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
                    
                    <div class="hidden md:grid grid-cols-12 gap-4 bg-white/5 px-6 py-4 border-b border-white/5 text-xs font-bold text-gray-400 uppercase tracking-wider items-center">
                        <div class="col-span-1 text-center">
                            @if($products->count() > 0)
                                <div class="relative flex items-center justify-center">
                                    <input 
                                        type="checkbox" 
                                        wire:click="toggleSelectAll" 
                                        @checked($this->isAllSelected)
                                        wire:key="select-all-{{ is_array($selected) ? count($selected) : 0 }}"
                                        
                                        {{-- Agregamos clase 'peer' para controlar al hermano (el icono) --}}
                                        class="peer h-5 w-5 rounded border-white/30 bg-[#181611] checked:bg-[#D4AF37] checked:border-[#D4AF37] focus:ring-0 cursor-pointer transition-all appearance-none"
                                        title="Seleccionar todos" 
                                    />
                                    
                                    {{-- El Icono (Chulito) --}}
                                    <span class="material-symbols-outlined absolute text-black opacity-0 peer-checked:opacity-100 pointer-events-none text-base font-bold">
                                        check
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="col-span-1">Img</div>
                        <div class="col-span-2">Producto</div>
                        <div class="col-span-2">Detalles</div> <div class="col-span-2">Categoría</div>
                        <div class="col-span-1 text-center">Stock</div>
                        <div class="col-span-1 text-right">Precio</div>
                        <div class="col-span-2 text-right">Acciones</div>
                    </div>

                    <div class="divide-y divide-white/5">
                        @forelse($products as $product)
                            <div wire:key="prod-{{ $product->id }}" class="group md:grid md:grid-cols-12 md:gap-4 md:items-center px-6 py-4 hover:bg-white/[0.02] transition-colors flex flex-col gap-4 relative">
                                
                                <div class="md:col-span-1 md:text-center flex items-center justify-between md:justify-center">
    
                                    <div class="relative flex items-center justify-center">
                                        <input 
                                            type="checkbox" 
                                            value="{{ $product->id }}" 
                                            wire:model.live="selected" 
                                            
                                            {{-- Clase 'peer' + appearance-none --}}
                                            class="peer h-5 w-5 md:h-5 md:w-5 rounded border-white/30 bg-[#181611] checked:bg-[#D4AF37] checked:border-[#D4AF37] focus:ring-0 cursor-pointer transition-all appearance-none"
                                        >
                                        
                                        {{-- El Icono (Chulito) --}}
                                        <span class="material-symbols-outlined absolute text-black opacity-0 peer-checked:opacity-100 pointer-events-none text-base font-bold">
                                            check
                                        </span>
                                    </div>

                                    <span class="md:hidden text-xs font-bold text-[#D4AF37] uppercase tracking-wider">ID: #{{ $product->id }}</span>
                                </div>
                                
                                <div class="md:col-span-1 flex justify-center md:justify-start">
                                    <div class="h-20 w-20 md:h-12 md:w-12 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center overflow-hidden p-1 relative group-hover:border-[#D4AF37]/30 transition-colors">
                                        @if($product->image_path)
                                            <img src="{{ asset('storage/' . $product->image_path) }}" class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-110">
                                        @else
                                            <span class="material-symbols-outlined text-gray-600 text-xl">image</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="md:col-span-2 text-center md:text-left">
                                    <div class="text-sm font-bold text-white group-hover:text-[#D4AF37] transition-colors">{{ $product->name }}</div>
                                    <div class="text-xs text-gray-500 mt-1 uppercase tracking-wider">{{ $product->brand }}</div>
                                </div>

                                <div class="md:col-span-2 flex flex-col items-center md:items-start gap-1">
                                    <div class="flex items-center gap-2 text-xs text-gray-400">
                                        <span class="material-symbols-outlined text-[14px] text-gray-600">local_drink</span>
                                        {{ $product->volume ?? '-' }}
                                    </div>
                                    @if($product->alcohol_percentage)
                                        <div class="flex items-center gap-2 text-xs text-gray-400">
                                            <span class="material-symbols-outlined text-[14px] text-gray-600">science</span>
                                            {{ $product->alcohol_percentage }}%
                                        </div>
                                    @endif
                                </div>

                                <div class="md:col-span-2 flex justify-center md:justify-start">
                                    <span class="bg-white/5 px-3 py-1 rounded-full border border-white/5 text-xs font-bold text-gray-300">
                                        {{ $product->category }}
                                    </span>
                                </div>

                                <div class="md:col-span-1 flex flex-col items-center justify-center gap-1">
                                    <div class="flex items-center gap-2">
                                        <span class="md:hidden text-gray-500 text-xs">Stock:</span>
                                        <span class="text-sm font-bold {{ $product->stock > 0 ? 'text-white' : 'text-red-500' }}">{{ $product->stock }}</span>
                                    </div>
                                    <div class="w-20 h-1 bg-white/10 rounded-full overflow-hidden">
                                        <div class="h-full {{ $product->stock < 5 ? 'bg-red-500' : 'bg-[#D4AF37]' }}" style="width: {{ min(($product->stock / 50) * 100, 100) }}%"></div>
                                    </div>
                                </div>

                                <div class="md:col-span-1 flex items-center justify-center md:justify-end gap-2">
                                    <span class="md:hidden text-gray-500 text-xs">Precio:</span>
                                    <span class="font-black text-[#D4AF37] text-sm tracking-wide">${{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>

                                <div class="md:col-span-2 flex items-center justify-center md:justify-end gap-2 mt-2 md:mt-0">
                                    <button wire:click="$dispatch('open-modal', { view: 'create-prod', productId: {{ $product->id }} })" 
                                        class="h-9 w-9 flex items-center justify-center rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white transition-all border border-blue-500/20 cursor-pointer" title="Editar">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </button>
                                    
                                    <button wire:click="$dispatch('open-delete-modal', { ids: {{ $product->id }} })" 
                                        class="h-9 w-9 flex items-center justify-center rounded-lg bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white transition-all border border-red-500/20 cursor-pointer" title="Eliminar">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                </div>

                            </div>
                        @empty
                            <div class="py-20 text-center flex flex-col items-center justify-center">
                                <div class="p-4 rounded-full bg-white/5 mb-3 border border-white/5"><span class="material-symbols-outlined text-4xl text-gray-600">inventory_2</span></div>
                                <h3 class="text-lg font-bold text-white">Sin resultados</h3>
                                <p class="text-gray-500 text-sm mt-1">No encontramos productos con esa búsqueda.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="mt-8">
                    {{ $products->links('pagination::tailwind') }}
                </div>

            </main>
        </div>
    </div>
</div>