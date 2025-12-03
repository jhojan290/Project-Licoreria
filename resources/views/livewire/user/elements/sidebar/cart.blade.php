<div class="flex flex-col h-full text-white">

    @if(count($this->cartItems) > 0)
        <div class="px-6 py-3 bg-white/5 border-b border-white/5 flex items-center justify-between text-sm animate-in fade-in slide-in-from-top-2 duration-300">
            
            <label class="flex items-center gap-3 cursor-pointer group select-none">
                <div class="relative flex items-center">
                    <input 
                        type="checkbox" 
                        wire:click="toggleSelectAll" 
                        @if($this->isAllSelected) checked @endif
                        class="peer h-5 w-5 cursor-pointer appearance-none rounded border border-white/30 bg-[#181611] checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all focus:ring-0 focus:ring-offset-0"
                    >
                    <span class="material-symbols-outlined absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[16px] text-black opacity-0 peer-checked:opacity-100 pointer-events-none">check</span>
                </div>
                <span class="text-xs text-gray-400 group-hover:text-white transition-colors">
                    Seleccionar todo
                </span>
            </label>

            @if(count($selected) > 0)
                <button 
                    wire:click="deleteSelected"
                    class="text-red-400 hover:text-white hover:bg-red-500 flex items-center gap-1.5 text-xs font-bold transition-all px-3 py-1.5 rounded-md bg-red-500/10 border border-red-500/20"
                >
                    <span class="material-symbols-outlined text-[18px]">delete_sweep</span>
                    Borrar ({{ count($selected) }})
                </button>
            @endif
        </div>
    @endif

    <div class="flex-1 overflow-y-auto p-6 min-h-0 custom-scrollbar relative">
        <div class="flex flex-col gap-6">

            @forelse($this->cartItems as $item)
                <div wire:key="cart-item-{{ $item['id'] }}" class="group flex gap-4 animate-in slide-in-from-right-4 duration-300">
                    
                    <div class="flex items-center self-center">
                        <label class="relative flex items-center cursor-pointer">
                            <input 
                                type="checkbox" 
                                value="{{ $item['id'] }}"
                                wire:model.live="selected"
                                class="peer h-5 w-5 cursor-pointer appearance-none rounded border border-white/30 bg-[#181611] checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all focus:ring-0"
                            >
                            <span class="material-symbols-outlined absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[16px] text-black opacity-0 peer-checked:opacity-100 pointer-events-none">check</span>
                        </label>
                    </div>

                    <div class="relative h-20 w-20 flex-shrink-0 overflow-hidden rounded-xl border border-white/10 bg-white/5">
                        @if($item['image_path'])
                            <img src="{{ asset('storage/' . $item['image_path']) }}" alt="{{ $item['name'] }}" class="h-full w-full object-contain p-1">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-gray-600">
                                <span class="material-symbols-outlined text-2xl">image</span>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-1 flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-sm font-bold text-white leading-tight line-clamp-2">
                                    <a href="{{ route('product.detail', $item['id']) }}" class="hover:text-[#D4AF37] transition-colors">
                                        {{ $item['name'] }}
                                    </a>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $item['volume'] ?? 'Unidad' }}</p>
                            </div>
                            
                            <p class="text-sm font-bold whitespace-nowrap {{ in_array($item['id'], $selected) ? 'text-[#D4AF37]' : 'text-gray-600' }}">
                                ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center gap-3 bg-white/5 rounded-lg px-2 py-1 border border-white/5">
                                <button wire:click="decrement({{ $item['id'] }})" class="text-gray-400 hover:text-white h-6 w-6 flex items-center justify-center">-</button>
                                <span class="text-sm font-bold w-4 text-center text-white">{{ $item['quantity'] }}</span>
                                <button wire:click="increment({{ $item['id'] }})" class="text-gray-400 hover:text-white h-6 w-6 flex items-center justify-center">+</button>
                            </div>

                            <button wire:click="remove({{ $item['id'] }})" class="text-xs text-gray-600 hover:text-red-400 transition-colors flex items-center gap-1">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="border-b border-white/5 last:hidden"></div>

            @empty
                <div class="flex flex-col items-center justify-center h-full py-20 text-center opacity-60">
                    <div class="p-6 rounded-full bg-white/5 mb-4">
                        <span class="material-symbols-outlined text-5xl text-gray-400">production_quantity_limits</span>
                    </div>
                    <h3 class="text-lg font-bold text-white">Tu carrito está vacío</h3>
                    <p class="text-sm text-gray-400 mt-1 max-w-[200px]">¡Explora nuestro catálogo y añade licores premium!</p>
                    <button @click="open = false" class="mt-6 text-[#D4AF37] text-sm font-bold hover:underline cursor-pointer">
                        Ir a Comprar
                    </button>
                </div>
            @endforelse

        </div>
    </div>

    @if(count($this->cartItems) > 0)
        <div class="mt-auto p-6 border-t border-white/10 bg-[#181611] flex-shrink-0 shadow-[0_-10px_40px_rgba(0,0,0,0.5)] z-20">
            
            <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm text-gray-400">
                    <span>Subtotal ({{ count($selected) }} items)</span>
                    <span class="font-medium text-white">${{ number_format($this->total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-400">
                    <span>Envío</span>
                    <span class="font-medium text-green-400">Gratis</span>
                </div>
            </div>

            <div class="flex justify-between items-end pt-4 border-t border-white/10 mb-6">
                <span class="text-base font-medium text-white">Total a Pagar</span>
                <span class="text-2xl font-black text-[#D4AF37] leading-none">
                    ${{ number_format($this->total, 0, ',', '.') }}
                </span>
            </div>

            <button 
                type="button"
                
                {{-- 1. CONEXIÓN: Llama a tu función PHP --}}
                wire:click="proceedToCheckout"
                
                {{-- 2. FEEDBACK: Se deshabilita mientras procesa --}}
                wire:loading.attr="disabled"
                wire:target="proceedToCheckout"
                
                {{-- 3. ESTADO: Si no hay nada seleccionado, se ve gris y no funciona --}}
                @disabled(count($selected) == 0)
                
                class="w-full font-black py-3.5 px-6 rounded-xl text-base transition-all shadow-lg flex items-center justify-center gap-2
                {{ count($selected) > 0 
                    ? 'bg-[#D4AF37] text-[#121212] hover:bg-white shadow-yellow-900/20 transform active:scale-[0.98] cursor-pointer' 
                    : 'bg-white/10 text-gray-500 cursor-not-allowed opacity-50' }}"
            >
                <span wire:loading.remove wire:target="proceedToCheckout" class="flex items-center gap-2">
                    <span>Proceder al Pago</span>
                    <span class="material-symbols-outlined text-xl">arrow_forward</span>
                </span>

                <span wire:loading.flex wire:target="proceedToCheckout" class="items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Procesando...</span>
                </span>
            </button>

            <div class="mt-4 text-center">
                <button @click="open = false" class="text-xs font-bold text-gray-500 hover:text-white transition-colors cursor-pointer">
                    Seguir Comprando
                </button>
            </div>
        </div>
    @endif

</div>