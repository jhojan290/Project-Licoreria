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
                <div class="flex items-center gap-2 opacity-50">
                    <span class="material-symbols-outlined text-sm">lock</span>
                    <span class="text-xs font-bold uppercase tracking-widest">Pago Seguro SSL</span>
                </div>
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
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6 relative z-10">
                                <div wire:click="$set('selectedPaymentMethod', 'nequi')" 
                                    class="h-20 rounded-2xl border cursor-pointer transition-all flex items-center justify-start px-6 gap-4 relative overflow-hidden group
                                    {{ $selectedPaymentMethod === 'nequi' ? 'bg-[#200020] border-[#D4AF37] shadow-[0_0_20px_rgba(218,0,129,0.2)]' : 'bg-[#181611] border-white/10 hover:border-white/30 hover:bg-[#200020]/40' }}">
                                    <div class="w-10 h-10 rounded-full bg-[#DA0081] flex items-center justify-center text-white font-bold text-xs">N</div>
                                    <span class="text-white font-bold text-lg">Nequi</span>
                                    @if($selectedPaymentMethod === 'nequi')
                                        <div class="absolute top-3 right-3 text-[#D4AF37]"><span class="material-symbols-outlined text-xl">check_circle</span></div>
                                    @endif
                                </div>

                                <div wire:click="$set('selectedPaymentMethod', 'bancolombia')" 
                                    class="h-20 rounded-2xl border cursor-pointer transition-all flex items-center justify-start px-6 gap-4 relative overflow-hidden group
                                    {{ $selectedPaymentMethod === 'bancolombia' ? 'bg-white border-[#D4AF37] shadow-[0_0_20px_rgba(255,255,255,0.2)]' : 'bg-[#181611] border-white/10 hover:border-white/30 hover:bg-white/10' }}">
                                    <div class="w-10 h-10 rounded-full bg-yellow-400 flex items-center justify-center text-black font-bold text-xs">B</div>
                                    <span class="font-bold text-lg {{ $selectedPaymentMethod === 'bancolombia' ? 'text-black' : 'text-white' }}">Bancolombia</span>
                                    @if($selectedPaymentMethod === 'bancolombia')
                                        <div class="absolute top-3 right-3 text-black"><span class="material-symbols-outlined text-xl">check_circle</span></div>
                                    @endif
                                </div>

                                <div wire:click="$set('selectedPaymentMethod', 'daviplata')" 
                                    class="h-20 rounded-2xl border cursor-pointer transition-all flex items-center justify-start px-6 gap-4 relative overflow-hidden group
                                    {{ $selectedPaymentMethod === 'daviplata' ? 'bg-[#EF3340] border-[#D4AF37] shadow-[0_0_20px_rgba(239,51,64,0.2)]' : 'bg-[#181611] border-white/10 hover:border-white/30 hover:bg-[#EF3340]/20' }}">
                                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#EF3340] font-bold text-xs">D</div>
                                    <span class="font-bold text-lg text-white">Daviplata</span>
                                    @if($selectedPaymentMethod === 'daviplata')
                                        <div class="absolute top-3 right-3 text-white"><span class="material-symbols-outlined text-xl">check_circle</span></div>
                                    @endif
                                </div>

                                <div wire:click="$set('selectedPaymentMethod', 'pse')" 
                                    class="h-20 rounded-2xl border cursor-pointer transition-all flex items-center justify-start px-6 gap-4 relative overflow-hidden group
                                    {{ $selectedPaymentMethod === 'pse' ? 'bg-[#0033A0] border-[#D4AF37] shadow-[0_0_20px_rgba(0,51,160,0.2)]' : 'bg-[#181611] border-white/10 hover:border-white/30 hover:bg-[#0033A0]/20' }}">
                                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#0033A0] font-bold text-xs">P</div>
                                    <span class="font-bold text-lg text-white">PSE</span>
                                    @if($selectedPaymentMethod === 'pse')
                                        <div class="absolute top-3 right-3 text-white"><span class="material-symbols-outlined text-xl">check_circle</span></div>
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

                <div class="lg:col-span-1">
                    <div class="bg-[#181611] p-6 md:p-8 rounded-3xl border border-white/10 sticky top-24 shadow-2xl">
                        
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-black text-white tracking-tight">Tu Pedido</h3>
                            @if(count($selected) > 0)
                                <button 
                                    wire:click="removeSelection"
                                    wire:confirm="¿Quitar los productos seleccionados?"
                                    class="text-xs font-bold text-red-400 hover:text-white hover:bg-red-500 px-3 py-1.5 rounded-lg transition-all border border-red-500/30 flex items-center gap-1"
                                >
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                    Quitar ({{ count($selected) }})
                                </button>
                            @endif
                        </div>
                        
                        <div class="space-y-4 mb-8 max-h-[350px] overflow-y-auto custom-scrollbar pr-2">
                            @foreach($cartItems as $item)
                                <div wire:key="checkout-item-{{ $item['id'] }}" 
                                     class="group flex gap-4 p-3 rounded-xl border transition-all duration-300 {{ in_array($item['id'], $selected) ? 'bg-white/5 border-[#D4AF37]/30' : 'border-transparent opacity-50 grayscale hover:opacity-80' }}">
                                    
                                    <div class="flex items-center">
                                        <input type="checkbox" value="{{ $item['id'] }}" wire:model.live="selected" 
                                            class="h-5 w-5 rounded border-white/30 bg-[#121212] text-[#D4AF37] focus:ring-[#D4AF37] cursor-pointer transition-all">
                                    </div>

                                    <div class="h-14 w-14 rounded-lg bg-white/10 overflow-hidden flex-shrink-0 border border-white/5">
                                        @if($item['image_path'])
                                            <img src="{{ asset('storage/' . $item['image_path']) }}" class="h-full w-full object-contain p-0.5">
                                        @endif
                                    </div>
                                    
                                    <div class="flex-1 min-w-0 flex flex-col justify-center">
                                        <p class="text-sm text-white font-bold line-clamp-1 group-hover:text-[#D4AF37] transition-colors">{{ $item['name'] }}</p>
                                        <p class="text-xs text-gray-500 font-medium">Cant: {{ $item['quantity'] }}</p>
                                    </div>
                                    
                                    <p class="text-sm font-black self-center whitespace-nowrap {{ in_array($item['id'], $selected) ? 'text-[#D4AF37]' : 'text-gray-600' }}">
                                        ${{ number_format($item['price'] * $item['quantity'], 0) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="space-y-3 border-t border-white/10 pt-6">
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>Subtotal ({{ count($selected) }})</span>
                                <span class="text-white font-medium">${{ number_format($this->checkoutTotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>Envío</span>
                                <span class="text-green-400 font-bold uppercase tracking-wider">Gratis</span>
                            </div>
                            
                            <div class="flex justify-between items-end pt-4 border-t border-white/10 mt-4">
                                <span class="text-white font-bold">Total a Pagar</span>
                                <span class="text-3xl font-black text-[#D4AF37] leading-none">
                                    ${{ number_format($this->checkoutTotal, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <button 
                            wire:click="completeOrder" 
                            wire:loading.attr="disabled" 
                            wire:target="completeOrder"
                            @if(count($selected) == 0) disabled @endif
                            class="w-full h-16 mt-8 rounded-2xl text-lg font-black uppercase tracking-wide transition-all shadow-xl flex items-center justify-center gap-3 group relative overflow-hidden
                            {{ count($selected) > 0 
                                ? 'bg-[#D4AF37] text-[#121212] hover:bg-white hover:scale-[1.02] shadow-[#D4AF37]/20' 
                                : 'bg-white/10 text-gray-500 cursor-not-allowed' }}"
                        >
                            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out"></div>

                            <span wire:loading.remove wire:target="completeOrder" class="flex items-center gap-2 relative z-10">
                                <span>Confirmar Pedido</span>
                                <span class="material-symbols-outlined text-2xl group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </span>
                            
                            <span wire:loading.flex wire:target="completeOrder" class="items-center gap-3 relative z-10">
                                <svg class="animate-spin h-6 w-6 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                <span>Procesando...</span>
                            </span>
                        </button>
                        
                        <p class="text-center text-[10px] text-gray-500 mt-4 leading-tight px-4">
                            Al confirmar la compra, aceptas nuestros <a href="#" class="underline hover:text-white">Términos y Condiciones</a> y <a href="#" class="underline hover:text-white">Política de Privacidad</a>.
                        </p>
                    </div>
                </div>

            </div>
        @endif
    </div>
</div>