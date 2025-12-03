<div>
    <div class="mb-6 border-b border-gray-200 dark:border-white/10 pb-4">
        <h2 class="text-2xl font-black leading-tight text-gray-900 dark:text-white">
            {{ $isEditMode ? 'Editar Producto' : 'Agrega Un Nuevo Producto' }}
        </h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ $isEditMode ? 'Actualiza los detalles del producto existente.' : 'Completa la información para registrar un nuevo producto.' }}
        </p>
    </div>

    <form wire:submit="save" class="space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre</label>
                <input wire:model="name" type="text"
                    class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] border border-gray-300 dark:border-white/10 focus:ring-2 focus:ring-primary text-gray-900 dark:text-gray-100" />
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Marca</label>
                <input wire:model="brand" type="text"
                    class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] border border-gray-300 dark:border-white/10 focus:ring-2 focus:ring-primary text-gray-900 dark:text-gray-100" />
                @error('brand') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Categoría</label>
            <div class="relative">
                <select wire:model="category"
                    class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] border border-gray-300 dark:border-white/10 focus:border-licup focus:ring-2 focus:ring-licup focus:outline-none text-gray-900 dark:text-gray-100 appearance-none cursor-pointer">
                    <option value="">Selecciona una categoría</option>
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
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500 dark:text-gray-400">
                    <span class="material-symbols-outlined">expand_more</span>
                </div>
            </div>
            @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Volumen</label>
                <input wire:model="volume" type="text" placeholder="Ej: 750ml"
                    class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] border border-gray-300 dark:border-white/10 focus:ring-2 focus:ring-primary text-gray-900 dark:text-gray-100" />
                @error('volume') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">% Alcohol</label>
                <div class="relative">
                    <input wire:model="alcohol_percentage" type="number" step="0.1" placeholder="Ej: 40"
                        class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] border border-gray-300 dark:border-white/10 focus:ring-2 focus:ring-primary text-gray-900 dark:text-gray-100 pr-8" />
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 text-sm font-bold">%</span>
                </div>
                @error('alcohol_percentage') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Descripción</label>
            <textarea wire:model="description" rows="3"
                class="w-full px-4 py-2 rounded-lg bg-gray-50 dark:bg-[#27241b] border border-gray-300 dark:border-white/10 focus:ring-2 focus:ring-primary text-gray-900 dark:text-gray-100"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Precio</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</span>
                    <input wire:model="price" type="number" step="0.01"
                        class="w-full h-10 pl-7 pr-4 rounded-lg bg-gray-50 dark:bg-[#27241b] border border-gray-300 dark:border-white/10 focus:ring-2 focus:ring-primary text-gray-900 dark:text-gray-100" />
                </div>
                @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Stock</label>
                <input wire:model="stock" type="number"
                    class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] border border-gray-300 dark:border-white/10 focus:ring-2 focus:ring-primary text-gray-900 dark:text-gray-100" />
                @error('stock') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Imagen</label>
            
            <label 
                for="file-upload" 
                class="flex flex-col items-center justify-center rounded-lg border border-dashed border-gray-300 dark:border-white/20 p-6 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors cursor-pointer relative group overflow-hidden min-h-[180px]"
            >
                <input id="file-upload" wire:model="image" type="file" class="sr-only" accept="image/*" />

                <div class="w-full flex flex-col items-center justify-center transition-opacity duration-300" wire:loading.class="opacity-30">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="h-32 object-contain mb-4 rounded-md shadow-sm">
                    @elseif ($existingImage)
                        <img src="{{ asset('storage/' . $existingImage) }}" class="h-32 object-contain mb-4 rounded-md shadow-sm">
                    @else
                        <span class="material-symbols-outlined text-4xl text-gray-400 mb-2 group-hover:text-primary transition-colors">image</span>
                    @endif

                    <div class="text-center">
                        <span class="font-semibold text-primary group-hover:text-primary/80">
                            {{ $image || $existingImage ? 'Cambiar imagen' : 'Haz clic para subir una imagen' }}
                        </span>
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF hasta 2MB</p>
                    </div>
                </div>

                <div
                    wire:loading.flex
                    wire:target="image"
                    class="absolute inset-0 z-10 flex-col items-center justify-center gap-3 bg-white/60 dark:bg-black/60 backdrop-blur-sm transition-all"
                >
                    <svg class="animate-spin h-10 w-10 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-primary font-bold animate-pulse">
                        Subiendo imagen...
                    </span>
                </div>
            </label>
            
            @error('image') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="pt-6 flex flex-col-reverse sm:flex-row sm:justify-between gap-3 border-t border-gray-200 dark:border-white/10 mt-6">
            <div class="w-full sm:w-auto" x-data>
                <input 
                    type="file" 
                    x-ref="excelInput" 
                    wire:model="excelFile" 
                    class="hidden" 
                    accept=".xlsx, .xls, .csv"
                />

                <button 
                    type="button"
                    @click="$refs.excelInput.click()"
                    wire:loading.attr="disabled"
                    wire:target="excelFile"
                    class="flex w-full items-center justify-center gap-2 px-6 py-2.5 rounded-lg border border-gray-300 dark:border-white/10 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 hover:border-green-300 font-bold transition-all group cursor-pointer"
                >
                    <span wire:loading.remove wire:target="excelFile" class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">
                        table_view
                    </span>
                    
                    <svg wire:loading wire:target="excelFile" class="animate-spin h-5 w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>

                    <span wire:loading.remove wire:target="excelFile">Importar Excel</span>
                    <span wire:loading wire:target="excelFile">Procesando...</span>
                </button>

                @error('excelFile') 
                    <span class="block text-red-500 text-xs mt-1 text-center">{{ $message }}</span> 
                @enderror
            </div>

            <div class="flex flex-col-reverse sm:flex-row gap-3 w-full sm:w-auto">
                <button type="button" wire:click="$dispatch('close-modal')" 
                    class="px-6 py-2.5 rounded-lg border border-gray-300 dark:border-white/10 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/10 font-bold transition-colors w-full sm:w-auto">
                    Cancelar
                </button>

                <button type="submit" wire:loading.attr="disabled"
                    class="px-6 py-2.5 rounded-lg bg-primary text-[#181611] hover:bg-primary/90 font-bold shadow-lg shadow-primary/20 transition-all disabled:opacity-50 w-full sm:w-auto flex items-center justify-center gap-2">
                    
                    <span wire:loading.remove>
                        {{ $isEditMode ? 'Actualizar Producto' : 'Guardar Producto' }}
                    </span>
                    
                    <span wire:loading.flex class="items-center gap-2">
                        <svg class="animate-spin h-4 w-4 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Guardando...
                    </span>
                </button>
            </div>
        </div>
    </form>
</div>