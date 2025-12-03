<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

    @if($success)
        <div class="flex flex-col items-center justify-center pt-20 animate-in zoom-in duration-500 text-center">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-green-500/20 text-green-500 mb-6 shadow-[0_0_30px_rgba(34,197,94,0.3)]">
                <span class="material-symbols-outlined text-6xl">check_circle</span>
            </div>
            <h1 class="text-4xl font-black text-white mb-4">¡Compra Exitosa!</h1>
            <p class="text-gray-400 text-lg mb-8 max-w-lg">
                Hemos enviado la factura electrónica a tu correo. Gracias por confiar en LicUp.
            </p>

            <a href="{{ route('catalog') }}" class="inline-flex h-12 px-8 items-center justify-center rounded-xl bg-[#D4AF37] text-[#121212] font-bold hover:bg-white transition-all shadow-lg hover:scale-105 no-underline">
                Volver al Catálogo
            </a>
        </div>
    @else

        <div class="flex items-center justify-between mb-8">
            <a href="{{ route('catalog') }}" class="flex items-center gap-2 text-gray-400 hover:text-[#D4AF37] transition-colors font-medium">
                <span class="material-symbols-outlined">arrow_back</span>
                Volver al Catálogo
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-8">

                <!-- DATOS DE ENVÍO -->
                <div class="bg-[#181611] p-6 rounded-2xl border border-white/10">
                    <h2 class="text-xl font-bold mb-6 text-white flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#D4AF37]">local_shipping</span> 
                        Datos de Envío
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Dirección</label>
                            <input wire:model="address" type="text" class="w-full h-11 px-4 rounded-lg bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none">
                            @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Ciudad</label>
                            <input wire:model="city" type="text" class="w-full h-11 px-4 rounded-lg bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none">
                            @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Teléfono</label>
                            <input wire:model="phone" type="text" class="w-full h-11 px-4 rounded-lg bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none">
                            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Cédula / ID</label>
                            <input wire:model="identification" type="text" class="w-full h-11 px-4 rounded-lg bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none">
                            @error('identification') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- PAGO -->
                <div class="bg-[#181611] p-6 rounded-2xl border border-white/10">
                    <h2 class="text-xl font-bold mb-6 text-white flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#D4AF37]">payments</span>
                        Pago Seguro
                    </h2>

                    @if(count($selected) > 0)

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <button wire:click="$set('selectedPaymentMethod','nequi')"
                            class="h-14 rounded-xl border border-white/10 transition-all flex items-center justify-center
                            {{ $selectedPaymentMethod == 'nequi' ? 'bg-[#da0081] scale-105' : 'bg-[#200020]' }}">
                            <span class="text-white font-bold">Nequi</span>
                        </button>

                        <button wire:click="$set('selectedPaymentMethod','bancolombia')"
                            class="h-14 rounded-xl border border-white/10 transition-all flex items-center justify-center
                            {{ $selectedPaymentMethod == 'bancolombia' ? 'bg-yellow-400 text-black scale-105' : 'bg-white text-black' }}">
                            <span class="font-bold">Bancolombia</span>
                        </button>

                        <button wire:click="$set('selectedPaymentMethod','daviplata')"
                            class="h-14 rounded-xl border border-white/10 transition-all flex items-center justify-center
                            {{ $selectedPaymentMethod == 'daviplata' ? 'bg-[#c41e2b] scale-105' : 'bg-[#EF3340]' }}">
                            <span class="font-bold">Daviplata</span>
                        </button>

                        <button wire:click="$set('selectedPaymentMethod','pse')"
                            class="h-14 rounded-xl border border-white/10 transition-all flex items-center justify-center
                            {{ $selectedPaymentMethod == 'pse' ? 'bg-[#002470] scale-105' : 'bg-[#0033A0]' }}">
                            <span class="font-bold">PSE</span>
                        </button>

                    </div>

                    <!-- BOTÓN FINALIZAR -->
                    <div class="mt-6">
                        <button wire:click="completeOrder"
                            wire:loading.attr="disabled"
                            class="w-full h-14 rounded-xl bg-[#D4AF37] text-[#121212] font-black text-lg hover:bg-white transition-all shadow-lg hover:scale-105 disabled:opacity-50">
                            <span wire:loading.remove>Finalizar Compra</span>
                            <span wire:loading>Procesando...</span>
                        </button>

                        @error('selectedPaymentMethod')
                            <p class="text-red-500 text-sm mt-2 text-center">{{ $message }}</p>
                        @enderror

                        @error('payment')
                            <p class="text-red-500 text-sm mt-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    @else
                        <div class="text-center py-4 text-red-400 bg-red-500/10 rounded-lg border border-red-500/20">
                            Debes seleccionar al menos un producto para pagar.
                        </div>
                    @endif
                </div>

            </div>

            <!-- RESUMEN -->
            <div class="lg:col-span-1">
                <div class="bg-[#181611] p-6 rounded-2xl border border-white/10 sticky top-8">
                    <h3 class="text-lg font-bold text-white mb-4">Resumen del Pedido</h3>

                    <div class="space-y-4 mb-6 max-h-[400px] overflow-y-auto custom-scrollbar pr-2">
                        @foreach($cartItems as $item)
                        <div class="flex gap-3 p-2 rounded-lg {{ in_array($item['id'], $selected) ? 'bg-white/5' : 'opacity-50' }}">
                            <input type="checkbox" value="{{ $item['id'] }}" wire:model.live="selected">
                            <img src="{{ asset('storage/' . $item['image_path']) }}" class="h-10">
                            <div class="flex-1">
                                <p class="text-sm text-white">{{ $item['name'] }}</p>
                                <p class="text-xs text-gray-500">x{{ $item['quantity'] }}</p>
                            </div>
                            <p class="text-sm font-bold text-[#D4AF37]">
                                ${{ number_format($item['price'] * $item['quantity'], 0) }}
                            </p>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t border-white/10 pt-4">
                        <div class="flex justify-between text-white text-xl font-black">
                            <span>Total</span>
                            <span class="text-[#D4AF37]">${{ number_format($this->checkoutTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endif
</div>
