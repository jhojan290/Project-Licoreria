<div>
    <div class="mb-8 border-b border-white/10 pb-5">
        <h2 class="text-3xl font-black leading-tight text-white">
            {{ $isEditMode ? 'Editar Producto' : 'Nuevo Producto' }}
        </h2>
        <p class="mt-2 text-sm text-gray-400">
            {{ $isEditMode ? 'Modifica los detalles del inventario.' : 'Ingresa la información para registrar un nuevo licor.' }}
        </p>
    </div>

    <form wire:submit="save" class="space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="group">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 group-focus-within:text-[#D4AF37] transition-colors">Nombre del Producto</label>
                <input wire:model="name" type="text" placeholder="Ej: Chivas Regal 12"
                    class="w-full h-12 px-4 rounded-xl bg-[#121212] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all placeholder:text-gray-700" />
                @error('name') <span class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
            </div>

            <div class="group">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 group-focus-within:text-[#D4AF37] transition-colors">Marca</label>
                <input wire:model="brand" type="text" placeholder="Ej: Chivas Brothers"
                    class="w-full h-12 px-4 rounded-xl bg-[#121212] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all placeholder:text-gray-700" />
                @error('brand') <span class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Categoría</label>
            <div class="relative">
                <select wire:model="category"
                    class="w-full h-12 px-4 rounded-xl bg-[#121212] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none appearance-none cursor-pointer transition-all">
                    <option value="" class="bg-[#121212]">Selecciona una categoría</option>
                    <option value="Whiskey" class="bg-[#121212]">Whiskey</option>
                    <option value="Ron" class="bg-[#121212]">Ron</option>
                    <option value="Ginebra" class="bg-[#121212]">Ginebra</option>
                    <option value="Vino" class="bg-[#121212]">Vino</option>
                    <option value="Tequila" class="bg-[#121212]">Tequila</option>
                    <option value="Vodka" class="bg-[#121212]">Vodka</option>
                    <option value="Brandy" class="bg-[#121212]">Brandy</option>
                    <option value="Aguardiente" class="bg-[#121212]">Aguardiente</option>
                    <option value="Cerveza" class="bg-[#121212]">Cerveza</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-500">
                    <span class="material-symbols-outlined">expand_more</span>
                </div>
            </div>
            @error('category') <span class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Volumen</label>
                <input wire:model="volume" type="text" placeholder="Ej: 750ml"
                    class="w-full h-12 px-4 rounded-xl bg-[#121212] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all placeholder:text-gray-700" />
                @error('volume') <span class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">% Alcohol</label>
                <div class="relative">
                    <input wire:model="alcohol_percentage" type="number" step="0.1" placeholder="Ej: 40"
                        class="w-full h-12 px-4 rounded-xl bg-[#121212] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all placeholder:text-gray-700 pr-10" />
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-bold">%</span>
                </div>
                @error('alcohol_percentage') <span class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Descripción</label>
            <textarea wire:model="description" rows="3" placeholder="Describe el sabor, aroma y origen..."
                class="w-full p-4 rounded-xl bg-[#121212] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all placeholder:text-gray-700 resize-none"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Precio</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500 font-bold">$</span>
                    <input wire:model="price" type="number" step="0.01"
                        class="w-full h-12 pl-8 pr-4 rounded-xl bg-[#121212] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all font-bold text-lg" />
                </div>
                @error('price') <span class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Stock Inicial</label>
                <input wire:model="stock" type="number"
                    class="w-full h-12 px-4 rounded-xl bg-[#121212] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all font-bold text-lg" />
                @error('stock') <span class="text-red-400 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Imagen del Producto</label>
            
            <label for="file-upload" 
                class="flex flex-col items-center justify-center rounded-xl border border-dashed border-white/20 bg-[#121212] hover:bg-white/5 hover:border-[#D4AF37]/50 transition-all cursor-pointer relative group overflow-hidden min-h-[200px]">
                
                <input id="file-upload" wire:model="image" type="file" class="sr-only" accept="image/*" />

                <div x-data="{ 
                    preview: null, 
                    handleFile(event) {
                        const file = event.target.files[0];
                        if (!file) return;
                        
                        // Creamos un lector para mostrar la imagen AL INSTANTE
                        const reader = new FileReader();
                        reader.onload = (e) => { this.preview = e.target.result };
                        reader.readAsDataURL(file);
                    }
                }" class="relative w-full">
                
                    <input type="file" 
                        wire:model="image" 
                        @change="handleFile"
                        accept="image/png, image/jpeg, image/jpg, image/webp"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                
                    <div class="w-full flex flex-col items-center justify-center transition-opacity duration-300" wire:loading.class="opacity-30">
                        
                        <template x-if="preview">
                            <img :src="preview" class="h-40 object-contain mb-4 drop-shadow-xl rounded-lg">
                        </template>
                
                        <template x-if="!preview">
                            @if ($existingImage)
                                <img src="{{ asset('storage/' . $existingImage) }}" class="h-40 object-contain mb-4 drop-shadow-xl">
                            @else
                                <div class="h-20 w-20 rounded-full bg-white/5 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined text-4xl text-gray-500 group-hover:text-[#D4AF37]">add_photo_alternate</span>
                                </div>
                            @endif
                        </template>
                
                        <div class="text-center">
                            <span class="font-bold text-white group-hover:text-[#D4AF37] transition-colors" 
                                x-text="preview || '{{ $existingImage }}' ? 'Cambiar imagen' : 'Subir imagen'">
                            </span>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG, WEBP hasta 5mb</p>
                        </div>
                    </div>
                </div>

                <div wire:loading.flex wire:target="image" class="absolute inset-0 z-10 flex-col items-center justify-center gap-3 bg-black/80 backdrop-blur-sm">
                    <svg class="animate-spin h-8 w-8 text-[#D4AF37]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    <span class="text-[#D4AF37] font-bold text-sm animate-pulse">Procesando...</span>
                </div>
            </label>
            @error('image') <span class="text-red-400 text-xs mt-1 font-bold block">{{ $message }}</span> @enderror
        </div>

        <div class="pt-6 border-t border-white/10 mt-8 flex flex-col-reverse md:flex-row justify-between gap-4">
            
            <div class="w-full md:w-auto" x-data>
                <input type="file" x-ref="excelInput" wire:model="excelFile" wire:change="importExcel" class="hidden" accept=".xlsx, .xls, .csv" />
                <button type="button" @click="$refs.excelInput.click()" wire:loading.attr="disabled" wire:target="excelFile"
                    class="w-full md:w-auto flex items-center justify-center gap-2 px-6 h-12 rounded-xl border border-white/10 text-gray-400 hover:text-white hover:bg-white/5 hover:border-white/30 transition-all font-bold text-sm group">
                    
                    <span wire:loading.remove wire:target="excelFile" class="material-symbols-outlined text-xl group-hover:text-green-400 transition-colors">table_view</span>
                    <svg wire:loading wire:target="excelFile" class="animate-spin h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    
                    <span wire:loading.remove wire:target="excelFile">Importar Excel</span>
                    <span wire:loading wire:target="excelFile">Subiendo...</span>
                </button>
                @error('excelFile') <span class="block text-red-400 text-xs mt-2 text-center font-bold">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                <button type="button" wire:click="$dispatch('close-modal')" 
                    class="h-12 px-6 rounded-xl border border-white/10 text-gray-400 hover:text-white hover:bg-white/5 transition-all font-bold text-sm">
                    Cancelar
                </button>

                <button type="submit" wire:loading.attr="disabled"
                    class="h-12 px-8 rounded-xl bg-[#D4AF37] text-[#121212] hover:bg-white transition-all shadow-lg shadow-yellow-900/20 font-black text-sm flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed transform active:scale-95">
                    
                    <span wire:loading.remove>{{ $isEditMode ? 'Guardar Cambios' : 'Crear Producto' }}</span>
                    <span wire:loading.flex class="items-center gap-2">
                        <svg class="animate-spin h-4 w-4 text-[#121212]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        <span>Guardando...</span>
                    </span>
                </button>
            </div>
        </div>

    </form>
</div>