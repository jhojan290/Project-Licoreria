<div class="min-h-screen bg-background-dark py-12 px-4 sm:px-6 lg:px-8 font-display relative overflow-hidden">
    
    <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-[#1a1a1a] to-transparent -z-10"></div>
    <div class="absolute -top-24 right-0 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        
        @if($success)
            <div class="flex flex-col items-center justify-center min-h-[60vh] animate-fade-in-up text-center">
                <div class="relative mb-8">
                    <div class="absolute inset-0 bg-green-500/20 blur-2xl rounded-full animate-pulse"></div>
                    <div class="relative bg-[#121212] border-2 border-green-500/50 p-6 rounded-full shadow-2xl">
                        <span class="material-symbols-outlined text-6xl text-green-500">whatsapp</span>
                    </div>
                </div>
                
                <h1 class="text-5xl font-black text-white mb-4 tracking-tight">¡Casi listo!</h1>
                <p class="text-gray-400 text-lg mb-8 max-w-lg leading-relaxed">
                    Tu pedido <strong>ha sido registrado</strong> en nuestro sistema.
                    <br><br>
                    Se ha abierto una nueva pestaña con <strong>WhatsApp</strong> para que confirmes el pago y el envío con nuestro administrador.
                </p>
                
                <div class="flex flex-col gap-4">
                    <p class="text-xs text-gray-500">¿No se abrió WhatsApp?</p>
                    <a href="{{ route('catalog') }}" class="text-[#D4AF37] font-bold hover:underline">Volver al Catálogo</a>
                </div>
            </div>
        @else      
            <div class="flex items-center justify-between mb-10">
                <a href="{{ route('catalog') }}" class="group flex items-center gap-3 text-gray-400 hover:text-white transition-colors font-bold uppercase tracking-widest text-xs">
                    <div class="w-8 h-8 rounded-full border border-white/10 flex items-center justify-center group-hover:border-[#D4AF37] group-hover:text-[#D4AF37] transition-all">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                    </div>
                    Volver al Catálogo
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">

                <div class="lg:col-span-2 space-y-8">

                    <section class="bg-[#121212] border border-white/5 rounded-3xl p-8 shadow-xl relative overflow-hidden group hover:border-white/10 transition-colors">
                        <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-9xl">local_shipping</span>
                        </div>

                        <div class="flex items-center gap-4 mb-8 relative z-10">
                            <div class="w-10 h-10 rounded-full bg-[#D4AF37] flex items-center justify-center text-black font-bold text-lg shadow-lg">1</div>
                            <h2 class="text-2xl font-bold text-white tracking-tight">Información de Envío</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-[#D4AF37] uppercase tracking-widest mb-2 ml-1">Dirección de Entrega</label>
                                <div class="relative group/input">
                                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within/input:text-white transition-colors">home_pin</span>
                                    <input wire:model="address" type="text" placeholder="Calle 123 # 45-67, Torre A..." 
                                        class="w-full h-14 pl-12 pr-4 rounded-xl bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all placeholder:text-gray-600 font-medium">
                                </div>
                                @error('address') <span class="text-red-400 text-xs mt-1 font-bold ml-1 flex items-center gap-1"><span class="material-symbols-outlined text-sm">error</span> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 ml-1">Ciudad</label>
                                <input wire:model="city" type="text" 
                                    class="w-full h-14 px-4 rounded-xl bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all">
                                @error('city') <span class="text-red-400 text-xs mt-1 font-bold ml-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 ml-1">Teléfono</label>
                                <input wire:model="phone" type="text" 
                                    class="w-full h-14 px-4 rounded-xl bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all">
                                @error('phone') <span class="text-red-400 text-xs mt-1 font-bold ml-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 ml-1">Cédula / ID</label>
                                <input wire:model="identification" type="text" 
                                    class="w-full h-14 px-4 rounded-xl bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none transition-all">
                                @error('identification') <span class="text-red-400 text-xs mt-1 font-bold ml-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </section>

                    <section class="bg-[#121212] border border-white/5 rounded-3xl p-8 shadow-xl relative overflow-hidden group hover:border-white/10 transition-colors">
                        <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-9xl">credit_card</span>
                        </div>

                        <div class="flex items-center gap-4 mb-8 relative z-10">
                            <div class="w-10 h-10 rounded-full bg-[#D4AF37] flex items-center justify-center text-black font-bold text-lg shadow-lg">2</div>
                            <h2 class="text-2xl font-bold text-white tracking-tight">Método de Pago</h2>
                        </div>
                        
                        @if(count($selected) > 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
    
                                <div wire:click="$set('selectedPaymentMethod', 'nequi')" 
                                    class="h-20 rounded-2xl border cursor-pointer transition-all flex items-center justify-start px-6 gap-4 relative overflow-hidden group
                                    {{ $selectedPaymentMethod === 'nequi' ? 'bg-[#200020] border-[#DA0063] shadow-[0_0_20px_rgba(218,0,99,0.3)]' : 'bg-[#181611] border-white/10 hover:border-[#DA0063]/50 hover:bg-[#200020]/50' }}">
                                    
                                    <div class="w-12 h-12 flex-shrink-0 rounded-full bg-white p-1 flex items-center justify-center overflow-hidden border border-white/10 shadow-sm">
                                        <img src="{{ asset('img/nequi.jpg') }}" class="h-full w-full object-contain" alt="Nequi">
                                    </div>
                                    
                                    <span class="text-white font-bold text-lg">Nequi</span>
                                    
                                    @if($selectedPaymentMethod === 'nequi')
                                        <div class="absolute top-3 right-3 text-[#DA0063]"><span class="material-symbols-outlined text-xl">check_circle</span></div>
                                    @endif
                                </div>

                                <div wire:click="$set('selectedPaymentMethod', 'bancolombia')" 
                                    class="h-20 rounded-2xl border cursor-pointer transition-all flex items-center justify-start px-6 gap-4 relative overflow-hidden group
                                    {{ $selectedPaymentMethod === 'bancolombia' ? 'bg-white border-[#FDDA24] shadow-[0_0_20px_rgba(253,218,36,0.4)]' : 'bg-[#181611] border-white/10 hover:border-white hover:bg-white/10' }}">
                                    
                                    <div class="w-12 h-12 flex-shrink-0 rounded-full bg-white p-1 flex items-center justify-center overflow-hidden border border-gray-200 shadow-sm">
                                        <img src="{{ asset('img/bancolombia.jpg') }}" class="h-full w-full object-contain" alt="Bancolombia">
                                    </div>
                                    
                                    <span class="font-bold text-lg {{ $selectedPaymentMethod === 'bancolombia' ? 'text-black' : 'text-white' }}">Bancolombia</span>
                                    
                                    @if($selectedPaymentMethod === 'bancolombia')
                                        <div class="absolute top-3 right-3 text-black"><span class="material-symbols-outlined text-xl">check_circle</span></div>
                                    @endif
                                </div>

                                <div wire:click="$set('selectedPaymentMethod', 'daviplata')" 
                                    class="h-20 rounded-2xl border cursor-pointer transition-all flex items-center justify-start px-6 gap-4 relative overflow-hidden group
                                    {{ $selectedPaymentMethod === 'daviplata' ? 'bg-[#ED1C24] border-white shadow-[0_0_20px_rgba(237,28,36,0.4)]' : 'bg-[#181611] border-white/10 hover:border-[#ED1C24]/50 hover:bg-[#ED1C24]/10' }}">
                                    
                                    <div class="w-12 h-12 flex-shrink-0 rounded-full bg-white p-1 flex items-center justify-center overflow-hidden border border-white/10 shadow-sm">
                                        <img src="{{ asset('img/davivienda.png') }}" class="h-full w-full object-contain" alt="Daviplata">
                                    </div>
                                    
                                    <span class="font-bold text-lg text-white">Daviplata</span>
                                    
                                    @if($selectedPaymentMethod === 'daviplata')
                                        <div class="absolute top-3 right-3 text-white"><span class="material-symbols-outlined text-xl">check_circle</span></div>
                                    @endif
                                </div>

                                <div wire:click="$set('selectedPaymentMethod', 'pse')" 
                                    class="h-20 rounded-2xl border cursor-pointer transition-all flex items-center justify-start px-6 gap-4 relative overflow-hidden group
                                    {{ $selectedPaymentMethod === 'pse' ? 'bg-[#0033A0] border-[#D4AF37] shadow-[0_0_20px_rgba(0,51,160,0.2)]' : 'bg-[#181611] border-white/10 hover:border-[#0033A0] hover:bg-[#0033A0]/20' }}">
                                    
                                    <div class="w-12 h-12 flex-shrink-0 rounded-full bg-white p-1 flex items-center justify-center overflow-hidden border border-gray-200 shadow-sm">
                                        <img src="{{ asset('img/pse.jpg') }}" class="h-full w-full object-contain" alt="PSE">
                                    </div>

                                    <span class="font-bold text-lg text-white">PSE</span>
                                    
                                    @if($selectedPaymentMethod === 'pse')
                                        <div class="absolute top-3 right-3 text-[#0033A0]"><span class="material-symbols-outlined text-xl">check_circle</span></div>
                                    @endif
                                </div>

                            </div>

                            @error('selectedPaymentMethod') 
                                <div class="text-red-400 text-sm font-bold text-center p-3 rounded-xl bg-red-500/10 border border-red-500/20 animate-pulse">
                                    ⚠️ {{ $message }}
                                </div> 
                            @enderror
                        @else
                            <div class="flex flex-col items-center justify-center py-8 text-center border-2 border-dashed border-white/10 rounded-xl bg-white/5">
                                <span class="material-symbols-outlined text-4xl text-gray-600 mb-2">shopping_cart_off</span>
                                <p class="text-gray-400 font-medium">Selecciona productos en el resumen para habilitar el pago.</p>
                            </div>
                        @endif
                    </section>
                </div>

                <div class="lg:col-span-1" x-data="{ showModal: false }">
                    <div class="bg-[#181611] p-6 rounded-2xl border border-white/10 sticky top-8">
                        
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-white">Resumen del Pedido</h3>
                        </div>

                        @if(count($cartItems) > 0)
                            <div class="flex items-center justify-between mb-4 pb-4 border-b border-white/5">
                                
                                <label class="flex items-center gap-2 cursor-pointer group select-none">
                                    <div class="relative flex items-center">
                                        <input 
                                            type="checkbox" 
                                            wire:click="toggleSelectAll" 
                                            {{-- 2. ESTADO VISUAL (Usa la propiedad computada) --}}
                                            {{-- Esto asegura que Livewire controle el estado --}}
                                            @checked($this->isAllSelected)

                                            {{-- 3. TRUCO PARA FORZAR ACTUALIZACIÓN --}}
                                            {{-- Al cambiar la cantidad de seleccionados, obligamos a repintar este input --}}
                                            wire:key="select-all-{{ count($selected) }}"
                                            class="peer h-4 w-4 cursor-pointer appearance-none rounded border border-white/30 bg-[#181611] checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all focus:ring-0"
                                        >
                                        <span class="material-symbols-outlined absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[12px] text-black opacity-0 peer-checked:opacity-100 pointer-events-none">check</span>
                                    </div>
                                    <span class="text-xs font-bold text-gray-400 group-hover:text-white transition-colors uppercase tracking-wider">
                                        Todo
                                    </span>
                                </label>

                                @if(count($selected) > 0)
                                    <button 
                                        @click="showModal = true" 
                                        class="text-xs font-bold text-red-400 hover:text-white hover:bg-red-500/20 px-2 py-1 rounded transition-all flex items-center gap-1 border border-red-500/20 group"
                                        title="Quitar seleccionados"
                                    >
                                        <span class="material-symbols-outlined text-sm group-hover:scale-110 transition-transform">delete_sweep</span>
                                        Quitar ({{ count($selected) }})
                                    </button>
                                @endif
                            </div>
                        @endif
                        
                        <div class="space-y-4 mb-8 max-h-[350px] overflow-y-auto custom-scrollbar pr-2">
                            @foreach($cartItems as $item)
                                <div wire:key="checkout-item-{{ $item['id'] }}" 
                                    class="group flex gap-3 p-3 rounded-xl border transition-all duration-300 {{ in_array($item['id'], $selected) ? 'bg-white/5 border-[#D4AF37]/30' : 'border-transparent opacity-60 hover:opacity-100' }}">
                                    
                                    <div class="flex items-center self-center">
                                        <label class="relative flex items-center cursor-pointer p-1">
                                            <input type="checkbox" value="{{ $item['id'] }}" wire:model.live="selected" 
                                                class="peer h-5 w-5 rounded border-white/30 bg-[#121212] text-[#D4AF37] focus:ring-[#D4AF37] cursor-pointer transition-all appearance-none checked:bg-[#D4AF37] checked:border-[#D4AF37]">
                                            <span class="material-symbols-outlined absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[16px] text-black opacity-0 peer-checked:opacity-100 pointer-events-none">check</span>
                                        </label>
                                    </div>

                                    <div class="h-14 w-14 rounded-lg bg-white/10 overflow-hidden flex-shrink-0 border border-white/5">
                                        @if($item['image_path'])
                                            <img src="{{ asset('storage/' . $item['image_path']) }}" class="h-full w-full object-contain p-0.5">
                                        @endif
                                    </div>
                                    
                                    <div class="flex-1 min-w-0 flex flex-col justify-center">
                                        <p class="text-sm text-white font-medium line-clamp-1">{{ $item['name'] }}</p>
                                        <div class="flex justify-between items-center mt-0.5">
                                            <p class="text-xs text-gray-500">x{{ $item['quantity'] }}</p>
                                            
                                            <button 
                                                wire:click="remove({{ $item['id'] }})" 
                                                class="text-gray-600 hover:text-red-400 transition-colors p-1 rounded-full hover:bg-red-500/10"
                                                title="Eliminar solo este producto"
                                            >
                                                <span class="material-symbols-outlined text-base">delete</span>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <p class="text-sm font-black self-start whitespace-nowrap {{ in_array($item['id'], $selected) ? 'text-[#D4AF37]' : 'text-gray-600' }}">
                                        ${{ number_format($item['price'] * $item['quantity'], 0) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-white/10 pt-4 space-y-2">
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>Productos ({{ count($selected) }})</span>
                                <span>${{ number_format($this->checkoutTotal, 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="flex justify-between text-white text-xl font-black pt-2 mb-6">
                                <span>Total a Pagar</span>
                                <span class="text-[#D4AF37]">${{ number_format($this->checkoutTotal, 0, ',', '.') }}</span>
                            </div>

                            <button 
                                wire:click="confirmOrder" 
                                wire:loading.attr="disabled" 
                                wire:target="confirmOrder"
                                @if(count($selected) == 0) disabled @endif
                                class="w-full h-16 rounded-2xl text-lg font-black uppercase tracking-wide transition-all shadow-xl flex items-center justify-center gap-2 group relative overflow-hidden
                                {{ count($selected) > 0 
                                    ? 'bg-[#25D366] text-white hover:bg-[#1ebd59] shadow-green-900/20 cursor-pointer' 
                                    : 'bg-white/10 text-gray-500 cursor-not-allowed' }}"
                            >
                                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out {{ count($selected) == 0 ? 'hidden' : '' }}"></div>

                                <span wire:loading.remove wire:target="confirmOrder" class="flex items-center gap-2 relative z-10">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.31-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                    Confirmar en WhatsApp
                                </span>
                                
                                {{-- Estado Cargando --}}
                                <span wire:loading.flex wire:target="confirmOrder" class="items-center gap-2 relative z-10">
                                    <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    <span>Procesando...</span>
                                </span>
                            </button>
                            
                            <p class="text-center text-[10px] text-gray-500 mt-4 leading-tight px-4">
                                Serás redirigido al chat para finalizar tu pago y envío.
                            </p>
                        </div>
                    </div>

                    <div x-show="showModal" 
                        style="display: none;" 
                        class="fixed inset-0 z-[100] flex items-center justify-center px-4"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-cloak
                    >
                        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="showModal = false"></div>

                        <div class="relative bg-[#181611] border border-white/10 rounded-2xl p-6 max-w-sm w-full text-center shadow-2xl transform transition-all"
                            x-show="showModal"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        >
                            <div class="w-12 h-12 rounded-full bg-red-500/10 flex items-center justify-center mx-auto mb-4">
                                <span class="material-symbols-outlined text-red-500 text-2xl">warning</span>
                            </div>
                            
                            <h3 class="text-lg font-bold text-white mb-2">¿Estás seguro?</h3>
                            <p class="text-sm text-gray-400 mb-6">
                                Vas a eliminar {{ count($selected) }} productos de tu lista de compra actual.
                            </p>

                            <div class="flex gap-3 justify-center">
                                <button @click="showModal = false" class="px-4 py-2 rounded-lg border border-white/10 text-gray-300 text-sm font-bold hover:bg-white/5 transition-colors">
                                    Cancelar
                                </button>
                                
                                <button 
                                    wire:click="removeSelection" 
                                    @click="showModal = false" 
                                    class="px-4 py-2 rounded-lg bg-red-500 text-white text-sm font-bold hover:bg-red-600 transition-colors shadow-lg shadow-red-900/20"
                                >
                                    Sí, Quitar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@script
<script>
    $wire.on('open-whatsapp', (event) => {
        // En Livewire 3, event es el objeto con los parámetros
        window.open(event.url, '_blank');
    });
</script>
@endscript