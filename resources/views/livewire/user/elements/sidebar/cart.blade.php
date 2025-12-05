<div class="flex flex-col h-full bg-[#121212] text-white font-display">
    @if(count($this->cartItems) > 0)
        <div class="flex-shrink-0 px-6 py-3 bg-[#181611] border-b border-white/5 flex items-center justify-between text-sm animate-fade-in-down z-10">
            
            <label class="flex items-center gap-3 cursor-pointer group select-none">
                <div class="relative flex items-center">
                    <input 
                        type="checkbox" 
                        wire:click="toggleSelectAll" 
                        @checked($this->isAllSelected)
                        wire:key="select-all-{{ count($selected) }}"
                        class="peer h-5 w-5 cursor-pointer appearance-none rounded border border-white/20 bg-[#121212] checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all focus:ring-0 focus:ring-offset-0"
                    >
                    <span class="material-symbols-outlined absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[16px] text-black opacity-0 peer-checked:opacity-100 pointer-events-none">check</span>
                </div>
                <span class="text-xs font-bold text-gray-400 group-hover:text-white transition-colors uppercase tracking-wider">
                    Seleccionar todo
                </span>
            </label>

            @if(count($selected) > 0)
                <button 
                    wire:click="deleteSelected"
                    class="flex items-center gap-1.5 text-red-400 hover:text-white hover:bg-red-500/10 px-3 py-1.5 rounded-lg transition-all border border-red-500/20 hover:border-red-500/50 group"
                >
                    <span class="material-symbols-outlined text-[18px] group-hover:scale-110 transition-transform">delete_sweep</span>
                    <span class="text-xs font-bold">Borrar ({{ count($selected) }})</span>
                </button>
            @endif
        </div>
    @endif

    <div class="flex-1 overflow-y-auto p-4 sm:p-6 min-h-0 custom-scrollbar relative space-y-4">
        
        @forelse($this->cartItems as $item)
            <div wire:key="cart-item-{{ $item['id'] }}" 
                 class="group flex gap-4 p-3 rounded-xl transition-all duration-300 hover:bg-white/5 border 
                 {{ in_array($item['id'], $selected) ? 'bg-white/[0.02] border-[#D4AF37]/30 shadow-lg shadow-black/20' : 'border-transparent opacity-80 hover:opacity-100 grayscale-[0.3] hover:grayscale-0' }}">
                
                <div class="flex items-center self-center flex-shrink-0 pl-1">
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

                <div class="relative h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg border border-white/10 bg-[#0a0a0a] group-hover:border-white/20 transition-colors">
                    @if($item['image_path'])
                        <img src="{{ asset('storage/' . $item['image_path']) }}" alt="{{ $item['name'] }}" class="h-full w-full object-contain p-1 group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="flex h-full w-full items-center justify-center text-gray-700">
                            <span class="material-symbols-outlined text-3xl">image</span>
                        </div>
                    @endif
                </div>

                <div class="flex flex-1 flex-col justify-between py-0.5 min-w-0">
                    <div class="flex justify-between items-start gap-3">
                        <div class="min-w-0 pr-2">
                            <h3 class="text-sm font-bold text-white leading-tight truncate group-hover:text-[#D4AF37] transition-colors">
                                <a href="{{ route('product.detail', $item['id']) }}" class="hover:underline decoration-white/30 underline-offset-2">
                                    {{ $item['name'] }}
                                </a>
                            </h3>
                            <p class="text-[10px] uppercase tracking-wider text-gray-500 mt-1 font-bold">{{ $item['volume'] ?? 'Unidad' }}</p>
                        </div>
                        
                        <p class="text-sm font-black whitespace-nowrap {{ in_array($item['id'], $selected) ? 'text-[#D4AF37]' : 'text-gray-500' }}">
                            ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between mt-2">
                        <div class="flex items-center gap-1 bg-black rounded-lg p-1 border border-white/10 shadow-inner group-hover:border-white/20 transition-colors">
                            <button wire:click="decrement({{ $item['id'] }})" class="w-6 h-6 flex items-center justify-center rounded hover:bg-white/10 text-gray-400 hover:text-white transition-colors active:scale-90">
                                <span class="material-symbols-outlined text-sm">remove</span>
                            </button>
                            <span class="text-xs font-bold w-8 text-center text-white">{{ $item['quantity'] }}</span>
                            <button wire:click="increment({{ $item['id'] }})" 
                                    @if($item['quantity'] >= $item['stock_limit']) disabled @endif
                                    class="w-6 h-6 flex items-center justify-center rounded hover:bg-white/10 text-gray-400 hover:text-white transition-colors active:scale-90 disabled:opacity-30 disabled:cursor-not-allowed">
                                <span class="material-symbols-outlined text-sm">add</span>
                            </button>
                        </div>

                        <button wire:click="remove({{ $item['id'] }})" class="p-1.5 rounded-lg text-gray-600 hover:text-red-400 hover:bg-red-500/10 transition-all group/del" title="Eliminar del carrito">
                            <span class="material-symbols-outlined text-lg block group-hover/del:scale-110 transition-transform">delete</span>
                        </button>
                    </div>
                </div>
            </div>

        @empty
            <div class="flex flex-col items-center justify-center h-[50vh] text-center opacity-60 animate-fade-in px-6">
                <div class="p-6 rounded-full bg-white/5 mb-6 border border-white/5">
                    <span class="material-symbols-outlined text-6xl text-gray-600">shopping_cart_off</span>
                </div>
                <h3 class="text-xl font-black text-white tracking-tight mb-2">Tu carrito está vacío</h3>
                <p class="text-sm text-gray-400 max-w-[220px] leading-relaxed mx-auto">¡Explora nuestro catálogo y añade licores premium a tu colección!</p>
                <button @click="$dispatch('close-sidebar')" class="mt-8 px-8 py-3 rounded-full border border-[#D4AF37] text-[#D4AF37] text-sm font-bold uppercase tracking-widest hover:bg-[#D4AF37] hover:text-black transition-all shadow-lg hover:shadow-[#D4AF37]/20">
                    Ir a Comprar
                </button>
            </div>
        @endforelse

    </div>

    @if(count($this->cartItems) > 0)
        <div class="flex-shrink-0 p-6 border-t border-white/10 bg-[#151515] shadow-[0_-10px_40px_rgba(0,0,0,0.5)] z-20">
            
            <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm text-gray-400">
                    <span>Subtotal <span class="text-xs text-gray-600">({{ count($selected) }} items)</span></span>
                    <span class="font-medium text-white">${{ number_format($this->total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-400">
                    <span>Envío</span>
                    <span class="font-bold text-green-400 text-xs uppercase tracking-wider bg-green-400/10 px-2 py-0.5 rounded">Gratis</span>
                </div>
            </div>

            <div class="flex justify-between items-end pt-4 border-t border-white/10 mb-6">
                <span class="text-base font-bold text-white">Total a Pagar</span>
                <span class="text-3xl font-black text-[#D4AF37] leading-none tracking-tight">
                    ${{ number_format($this->total, 0, ',', '.') }}
                </span>
            </div>

            <div x-data="{ redirecting: false }" class="w-full mt-8">
    
                <button 
                    type="button"
                    
                    {{-- 1. Al hacer clic, activamos la bandera de Alpine inmediatamente --}}
                    @click="redirecting = true; $wire.proceedToCheckout()"
                    
                    {{-- 2. Deshabilitamos si no hay selección O si ya estamos redirigiendo --}}
                    :disabled="redirecting || {{ count($selected) == 0 ? 'true' : 'false' }}"
                    
                    class="w-full h-16 rounded-2xl text-lg font-black uppercase tracking-wide transition-all shadow-xl flex items-center justify-center gap-3 group relative overflow-hidden disabled:opacity-50 disabled:cursor-not-allowed
                    {{ count($selected) > 0 
                        ? 'bg-[#D4AF37] text-[#121212] hover:bg-white hover:scale-[1.02] shadow-yellow-900/20 cursor-pointer' 
                        : 'bg-white/10 text-gray-500' }}"
                >
                    <div x-show="!redirecting" class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out {{ count($selected) == 0 ? 'hidden' : '' }}"></div>

                    <span x-show="!redirecting" class="flex items-center gap-2 relative z-10">
                        <span>Pagar Ahora</span>
                        <span class="material-symbols-outlined text-2xl leading-none flex items-center group-hover:translate-x-1 transition-transform">
                            arrow_forward
                        </span>
                    </span>
                    
                    <span x-show="redirecting" x-cloak class="flex items-center gap-3 relative z-10">
                        <svg class="animate-spin h-6 w-6 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Procesando...</span>
                    </span>
                </button>

            </div>

            <div class="mt-5 text-center">
                <button @click="$dispatch('close-sidebar')" class="text-xs font-bold text-gray-500 hover:text-white transition-colors cursor-pointer border-b border-transparent hover:border-white pb-0.5">
                    Seguir Comprando
                </button>
            </div>
        </div>
    @endif

</div>