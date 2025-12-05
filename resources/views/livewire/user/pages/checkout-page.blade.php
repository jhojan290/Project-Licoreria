<div class="min-h-screen bg-background-dark py-12 px-4 sm:px-6 lg:px-8 font-display relative overflow-hidden">
    
    <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-[#1a1a1a] to-transparent -z-10"></div>
    <div class="absolute -top-24 right-0 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        
        @if($success)
            <div class="flex flex-col items-center justify-center min-h-[60vh] animate-fade-in-up text-center">
                <div class="relative mb-8">
                    <div class="absolute inset-0 bg-green-500/20 blur-2xl rounded-full animate-pulse"></div>
                    <div class="relative bg-[#121212] border-2 border-green-500/50 p-6 rounded-full shadow-2xl">
                        <span class="material-symbols-outlined text-6xl text-green-500">check_circle</span>
                    </div>
                </div>
                
                <h1 class="text-5xl font-black text-white mb-4 tracking-tight">¡Compra Exitosa!</h1>
                <p class="text-gray-400 text-lg mb-10 max-w-md leading-relaxed">
                    Tu pedido ha sido procesado. Hemos enviado la factura electrónica y los detalles de envío a tu correo.
                </p>
                
                <a href="{{ route('catalog') }}" class="group relative inline-flex h-14 px-10 items-center justify-center rounded-full bg-[#D4AF37] text-[#121212] font-bold text-lg hover:bg-white transition-all shadow-[0_0_30px_rgba(212,175,55,0.3)] hover:shadow-[0_0_40px_rgba(255,255,255,0.4)] hover:-translate-y-1">
                    <span class="material-symbols-outlined mr-2 group-hover:-translate-x-1 transition-transform">arrow_back</span>
                    Volver al Catálogo
                </a>
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
                                wire:click="initiatePayment"  {{-- CAMBIO: Llamamos a iniciar, no a completar --}}
                                wire:loading.attr="disabled" 
                                wire:target="initiatePayment"
                                @if(count($selected) == 0) disabled @endif
                                class="w-full h-16 mt-8 rounded-2xl text-lg font-black uppercase tracking-wide transition-all shadow-xl flex items-center justify-center gap-3 group relative overflow-hidden
                                {{ count($selected) > 0 
                                    ? 'bg-[#D4AF37] text-[#121212] hover:bg-white hover:scale-[1.02] shadow-yellow-900/20 cursor-pointer' 
                                    : 'bg-white/10 text-gray-500 cursor-not-allowed' }}"
                            >
                                <span wire:loading.remove wire:target="initiatePayment" class="flex items-center gap-2 relative z-10">
                                    <span>Continuar al Pago</span> {{-- Texto más realista --}}
                                    <span class="material-symbols-outlined text-2xl group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                </span>
                                
                                <span wire:loading.flex wire:target="initiatePayment" class="items-center gap-3 relative z-10">
                                    <svg class="animate-spin h-6 w-6 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    <span>Procesando...</span>
                                </span>
                            </button>
                            
                            <p class="text-center text-[10px] text-gray-500 mt-4 leading-tight px-4">
                                Al confirmar, aceptas nuestros <a href="#" class="underline hover:text-white">Términos y Condiciones</a>.
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

    <div x-data="{ open: @entangle('showBankModal') }" 
        x-show="open" 
        x-cloak
        class="fixed inset-0 z-[100] flex items-center justify-center px-4 font-display"
    >
        <div 
            x-show="open" 
            x-transition.opacity 
            @click="open = false" 
            class="absolute inset-0 bg-black/90 backdrop-blur-md cursor-pointer"
        ></div>

        <div x-show="open" 
            @click.stop
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-10"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden z-10"
        >
            <div class="px-8 py-6 flex items-center justify-between rounded-t-3xl border-b border-black/5
                {{ $selectedPaymentMethod === 'nequi' ? 'bg-[#120031]' : '' }}
                {{ $selectedPaymentMethod === 'daviplata' ? 'bg-[#ED1C24]' : '' }}
                {{ $selectedPaymentMethod === 'bancolombia' ? 'bg-white' : '' }}
                {{ $selectedPaymentMethod === 'pse' ? 'bg-white' : '' }}
            ">
                
                <div class="flex items-center gap-4">
                    @if(in_array($selectedPaymentMethod, ['nequi', 'daviplata']))
                        <div class="bg-white p-2 rounded-xl shadow-lg border border-white/20 flex items-center justify-center h-14 w-14">
                            @if($selectedPaymentMethod === 'nequi')
                                <img src="{{ asset('img/nequi.jpg') }}" class="h-full w-full object-contain rounded-lg">
                            @else
                                <img src="{{ asset('img/davivienda.png') }}" class="h-full w-full object-contain">
                            @endif
                        </div>
                        <div class="flex flex-col text-white">
                            <span class="text-xs opacity-80 font-medium uppercase tracking-wider">Pagando con</span>
                            <span class="text-xl font-bold capitalize">{{ $selectedPaymentMethod }}</span>
                        </div>

                    @else
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Pagando con</span>
                            @if($selectedPaymentMethod === 'bancolombia')
                                <img src="{{ asset('img/bancolombia.jpg') }}" class="h-10 w-auto object-contain">
                            @elseif($selectedPaymentMethod === 'pse')
                                <img src="{{ asset('img/pse.jpg') }}" class="h-12 w-auto object-contain">
                            @endif
                        </div>
                    @endif
                </div>

                <button @click="open = false" 
                    class="p-2 rounded-full transition-all hover:scale-110 focus:outline-none
                    {{ in_array($selectedPaymentMethod, ['nequi', 'daviplata']) 
                        ? 'text-white/70 hover:text-white hover:bg-white/10' 
                        : 'text-gray-400 hover:text-black hover:bg-gray-100' }}">
                    <span class="material-symbols-outlined text-2xl">close</span>
                </button>
            </div>

            <div class="p-8 bg-white text-gray-800">
                
                <div class="text-center mb-6">
                    <p class="text-sm text-gray-500 uppercase tracking-wider font-bold mb-1">Total a Pagar</p>
                    <p class="text-3xl font-black text-gray-900">${{ number_format($this->checkoutTotal, 0, ',', '.') }}</p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                            @if($selectedPaymentMethod === 'nequi' || $selectedPaymentMethod === 'daviplata')
                                Número de Celular
                            @elseif($selectedPaymentMethod === 'bancolombia')
                                Usuario Sucursal Virtual
                            @else
                                Correo Electrónico registrado en PSE
                            @endif
                        </label>
                        <input type="text" wire:model="bankField" 
                            class="w-full h-12 px-4 rounded-xl bg-gray-100 border border-gray-200 text-gray-900 focus:border-black focus:ring-0 font-bold text-lg outline-none transition-all"
                            placeholder="{{ $selectedPaymentMethod === 'nequi' ? '300 123 4567' : 'Ingresa tus datos...' }}"
                        >
                        @error('bankField') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
                    </div>

                    <p class="text-xs text-gray-400 text-center leading-relaxed">
                        Estás en un entorno seguro simulado. Al continuar, se procesará el pedido en LicUp.
                    </p>
                </div>

                <button 
                    wire:click="finalizeTransaction"
                    wire:loading.attr="disabled"
                    class="w-full h-14 mt-6 rounded-xl text-white font-bold text-lg shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed
                    {{ $selectedPaymentMethod === 'nequi' ? 'bg-[#DA0081] hover:bg-[#b5006b]' : '' }}
                    {{ $selectedPaymentMethod === 'daviplata' ? 'bg-[#ED1C24] hover:bg-[#c4151c]' : '' }}
                    {{ $selectedPaymentMethod === 'bancolombia' ? 'bg-[#FDDA24] text-black hover:bg-yellow-500' : '' }}
                    {{ $selectedPaymentMethod === 'pse' ? 'bg-[#0071CE] hover:bg-[#005bb5]' : '' }}"
                >
                    <span wire:loading.remove class="flex items-center justify-center w-full h-full">
                        Pagar Ahora
                    </span>
                    
                    <span wire:loading.flex class="items-center justify-center gap-2 w-full h-full">
                        <svg class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Procesando...</span>
                    </span>
                </button>

            </div>
        </div>
    </div>
</div>