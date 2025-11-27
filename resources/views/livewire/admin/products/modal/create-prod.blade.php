<div>
    <div class="mb-6 border-b border-gray-200 dark:border-white/10 pb-4">
        <h2 class="text-2xl font-black leading-tight text-gray-900 dark:text-white">
            Agrega Un Nuevo Producto
        </h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Completa la información para registrar un nuevo producto o importa masivamente.
        </p>
    </div>

    <form class="space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="product-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nombre del Producto
                </label>
                <input id="product-name" type="text"
                    class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] 
                        border border-gray-300 dark:border-white/10
                        focus:ring-2 focus:ring-primary focus:border-transparent 
                        text-gray-900 dark:text-gray-100" />
            </div>

            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Marca
            </label>        
                <input id="brand" type="text"
                    class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] 
                        border border-gray-300 dark:border-white/10
                        focus:ring-2 focus:ring-primary focus:border-transparent 
                        text-gray-900 dark:text-gray-100" />
            </div>
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Categoría
            </label>
            <select id="category"
                class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] 
                    border border-gray-300 dark:border-white/10
                    focus:ring-2 focus:ring-primary focus:border-transparent 
                    text-gray-900 dark:text-gray-100">
                <option>Select a category</option>
                <option>Whiskey</option>
                <option>Gin</option>
                <option>Wine</option>
                <option>Tequila</option>
                <option>Vodka</option>
            </select>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Descripción
            </label>
            <textarea id="description" rows="3"
                class="w-full px-4 py-2 rounded-lg bg-gray-50 dark:bg-[#27241b] 
                    border border-gray-300 dark:border-white/10
                    focus:ring-2 focus:ring-primary focus:border-transparent 
                    text-gray-900 dark:text-gray-100"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Precio
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400">
                        $
                    </span>
                    <input id="price" type="number" step="0.01"
                        class="w-full h-10 pl-7 pr-4 rounded-lg bg-gray-50 dark:bg-[#27241b] 
                            border border-gray-300 dark:border-white/10
                            focus:ring-2 focus:ring-primary focus:border-transparent 
                            text-gray-900 dark:text-gray-100" />
                </div>
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Cantidad en Stock
                </label>
                <input id="stock" type="number"
                    class="w-full h-10 px-4 rounded-lg bg-gray-50 dark:bg-[#27241b] 
                        border border-gray-300 dark:border-white/10
                        focus:ring-2 focus:ring-primary focus:border-transparent 
                        text-gray-900 dark:text-gray-100" />
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Imagen
            </label>
            <div class="flex justify-center rounded-lg border border-dashed border-gray-300 dark:border-white/20 px-6 py-6 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
                <div class="text-center">
                    <span class="material-symbols-outlined text-4xl text-gray-400">image</span>
                    <div class="mt-2 flex text-sm text-gray-600 dark:text-gray-400">
                        <label for="file-upload" class="relative cursor-pointer rounded-md font-semibold text-primary hover:text-primary/80">
                            <span>Upload a file</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-6 flex flex-col-reverse sm:flex-row sm:justify-between gap-3 border-t border-gray-200 dark:border-white/10 mt-6">
            
            <button type="button"
                class="flex items-center justify-center gap-2 px-6 py-2.5 rounded-lg border border-gray-300 dark:border-white/10 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-700 dark:hover:text-green-400 hover:border-green-300 font-bold transition-all group">
                <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">table_view</span>
                Importar Excel
            </button>

            <div class="flex flex-col-reverse sm:flex-row gap-3">
                <button type="button"
                    wire:click="$dispatch('close-modal')" 
                    class="px-6 py-2.5 rounded-lg border border-gray-300 dark:border-white/10 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/10 font-bold transition-colors">
                    Cancelar
                </button>

                <button type="submit"
                    class="px-6 py-2.5 rounded-lg bg-primary text-[#181611] hover:bg-primary/90 font-bold shadow-lg shadow-primary/20 transition-all">
                    Guardar Producto
                </button>
            </div>
        </div>

    </form>
</div>