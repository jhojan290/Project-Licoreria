<div class="flex flex-col h-full bg-[#121212] text-white font-display">

    @if(count($this->cartItems) > 0)
        <div class="flex-shrink-0 px-6 py-4 bg-[#181611] border-b border-white/5 flex items-center justify-between text-sm z-10">
            
            <label class="flex items-center gap-3 cursor-pointer group select-none">
                <div class="relative flex items-center">
                    <input 
                        type="checkbox" 
                        wire:click="toggleSelectAll" 
                        @if($this->isAllSelected) checked @endif
                        class="peer h-5 w-5 cursor-pointer appearance-none rounded border border-white/20 bg-[#121212] checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all focus:ring-0 focus:ring-offset-0"
                    >
                    <span class="material-symbols-outlined absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[16px] text-black opacity-0 peer-checked:opacity-100 pointer-events-none">check</span>
                </div>
                <span class="text-xs font-bold text-gray-400 group-hover:text-white transition-colors">
                    Seleccionar todo
                </span>
            </label>

            @if(count($selected) > 0)
                <button 
                    wire:click="deleteSelected"
                    class="flex items-center gap-1.5 text-red-400 hover:text-white hover:bg-red-500/10 px-3 py-1.5 rounded-lg transition-all border border-red-500/20 hover:border-red-500/50"
                >
                    <span class="material-symbols-outlined text-[18px]">delete_sweep</span>
                    <span class="text-xs font-bold">Borrar ({{ count($selected) }})</span>
                </button>
            @endif
        </div>
    @endif

    <div class="flex-1 overflow-y-auto p-4 sm:p-6 min-h-0 custom-scrollbar relative space-y-4">
        
        @forelse($this->cartItems as $item)
            <div wire:key="cart-item-{{ $item['id'] }}" 
                 class="group flex gap-4 p-3 rounded-xl transition-all duration-300 hover:bg-white/5 border 
                 {{ in_array($item['id'], $selected) ? 'bg-white/[0.02] border-[#D4AF37]/30' : 'border-transparent opacity-90 hover:opacity-100' }}">
                
                <div class="flex items-center self-center flex-shrink-0">
                     <label class="relative flex items-center cursor-pointer p-1">
                        <input 
                            type="checkbox" 
                            value="{{ $item['id'] }}"
                            wire:model.live="selected"
                            class="peer h-5 w-5 cursor-pointer appearance-none rounded border border-white/20 bg-[#181611] checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all focus:ring-0"
                        >
                        <span class="material-symbols-outlined absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[16px] text-black opacity-0 peer-checked:opacity-100 pointer-events-none">check</span>
                    </label>
                </div>

                <div class="relative h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg border border-white/10 bg-[#0a0a0a]">
                    @if($item['image_path'])
                        <img src="{{ asset('storage/' . $item['image_path']) }}" alt="{{ $item['name'] }}" class="h-full w-full object-contain p-1">
                    @else
                        <div class="flex h-full w-full items-center justify-center text-gray-700">
                            <span class="material-symbols-outlined text-3xl">image</span>
                        </div>
                    @endif
                </div>

                <div class="flex flex-1 flex-col justify-between py-0.5">
                    <div class="flex justify-between items-start gap-3">
                        <div class="min-w-0">
                            <h3 class="text-sm font-bold text-white leading-tight truncate group-hover:text-[#D4AF37] transition-colors">
                                <a href="{{ route('product.detail', $item['id']) }}">
                                    {{ $item['name'] }}
                                </a>
                            </h3>
                            <p class="text-[10px] uppercase tracking-wider text-gray-500 mt-1 font-bold">{{ $item['volume'] ?? 'Unidad' }}</p>
                        </div>
                        
                        <p class="text-sm font-bold whitespace-nowrap {{ in_array($item['id'], $selected) ? 'text-[#D4AF37]' : 'text-gray-500' }}">
                            ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between mt-2">
                        <div class="flex items-center gap-1 bg-black rounded-lg p-1 border border-white/10 shadow-inner">
                            <button wire:click="decrement({{ $item['id'] }})" class="w-6 h-6 flex items-center justify-center rounded hover:bg-white/10 text-gray-400 hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-sm">remove</span>
                            </button>
                            <span class="text-xs font-bold w-6 text-center text-white">{{ $item['quantity'] }}</span>
                            <button wire:click="increment({{ $item['id'] }})" 
                                    @if($item['quantity'] >= $item['stock_limit']) disabled @endif
                                    class="w-6 h-6 flex items-center justify-center rounded hover:bg-white/10 text-gray-400 hover:text-white transition-colors disabled:opacity-30 disabled:cursor-not-allowed">
                                <span class="material-symbols-outlined text-sm">add</span>
                            </button>
                        </div>

                        <button wire:click="remove({{ $item['id'] }})" class="p-1.5 rounded-lg text-gray-600 hover:text-red-400 hover:bg-red-500/5 transition-all" title="Eliminar del carrito">
                            <span class="material-symbols-outlined text-lg block">delete</span>
                        </button>
                    </div>
                </div>
            </div>

        @empty
            <div class="flex flex-col items-center justify-center h-[50vh] text-center opacity-60 animate-fade-in px-6">
                <div class="p-6 rounded-full bg-white/5 mb-4 border border-white/5">
                    <span class="material-symbols-outlined text-5xl text-gray-500">shopping_cart_off</span>
                </div>
                <h3 class="text-lg font-bold text-white">Tu carrito está vacío</h3>
                <p class="text-sm text-gray-400 mt-2 max-w-[200px] leading-relaxed">¡Explora nuestro catálogo y añade licores premium!</p>
                <button @click="$dispatch('close-sidebar')" class="mt-6 text-[#D4AF37] text-sm font-bold hover:underline cursor-pointer transition-colors hover:text-white">
                    Ir a Comprar
                </button>
            </div>
        @endforelse

    </div>

    @if(count($this->cartItems) > 0)
        <div class="flex-shrink-0 p-6 border-t border-white/10 bg-[#151515] shadow-[0_-10px_40px_rgba(0,0,0,0.5)] z-20">
            
            <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm text-gray-400">
                    <span>Subtotal <span class="text-xs">({{ count($selected) }} items)</span></span>
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
                wire:click="proceedToCheckout"
                wire:loading.attr="disabled"
                wire:target="proceedToCheckout"
                @disabled(count($selected) == 0)
                class="w-full h-14 rounded-xl text-base font-black uppercase tracking-wide transition-all shadow-lg flex items-center justify-center gap-2 group relative overflow-hidden
                {{ count($selected) > 0 
                    ? 'bg-[#D4AF37] text-[#121212] hover:bg-white shadow-yellow-900/20 transform active:scale-[0.98] cursor-pointer' 
                    : 'bg-white/10 text-gray-500 cursor-not-allowed opacity-50' }}"
            >
                <span wire:loading.remove wire:target="proceedToCheckout" class="flex items-center gap-2 relative z-10">
                    <span>Pagar Ahora</span>
                    <span class="material-symbols-outlined text-xl group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </span>

                <span wire:loading.flex wire:target="proceedToCheckout" class="items-center gap-2 relative z-10">
                    <svg class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Procesando...</span>
                </span>
            </button>

            <div class="mt-4 text-center">
                <button @click="$dispatch('close-sidebar')" class="text-xs font-bold text-gray-500 hover:text-white transition-colors cursor-pointer">
                    Seguir Comprando
                </button>
            </div>
        </div>
    @endif

</div>