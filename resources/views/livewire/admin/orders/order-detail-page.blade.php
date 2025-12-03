<div class="layout-container flex h-full grow flex-col">
    <div class="flex flex-1 justify-center py-5 sm:px-4 md:px-10 lg:px-20 xl:px-40">
        <div class="layout-content-container flex flex-col w-full max-w-7xl flex-1">

            <header class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-white/10 pb-4 gap-4">
                
                <h1 class="text-3xl sm:text-4xl font-black text-white flex items-center gap-3">
                    <span class="material-symbols-outlined text-[#D4AF37] text-3xl">receipt_long</span>
                    Orden #{{ $order->id }}
                </h1>

                <div class="flex gap-3">
                    <a href="{{ route('admin.orders') }}" 
                        class="flex items-center justify-center h-10 px-4 rounded-lg bg-gray-600/10 text-gray-300 hover:bg-gray-600/20 transition-all text-sm font-bold">
                        <span class="material-symbols-outlined text-lg mr-2">arrow_back</span>
                        Volver
                    </a>
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    @if (session()->has('success'))
                        <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-lg font-bold text-sm animate-in fade-in flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">check_circle</span>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('status_stock'))
                        <div class="bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 p-4 rounded-lg font-bold text-sm animate-in fade-in flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">inventory_2</span>
                            {{ session('status_stock') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-lg font-bold text-sm animate-in fade-in flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">error</span>
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="bg-[#181611] p-6 rounded-xl border border-white/10">
                        <h2 class="text-xl font-bold mb-6 text-white">Productos Comprados</h2>
                        
                        <div class="space-y-4">
                            @foreach($order->items as $item)
                                <div class="flex items-center gap-4 border-b border-white/5 pb-4 last:border-0 last:pb-0">
                                    
                                    <div class="h-16 w-16 flex-shrink-0 rounded-lg bg-white/5 overflow-hidden border border-white/10 flex items-center justify-center">
                                        @if($item->product && $item->product->image_path)
                                            <img src="{{ asset('storage/' . $item->product->image_path) }}" class="h-full w-full object-contain p-1">
                                        @else
                                            <span class="material-symbols-outlined text-gray-600 text-2xl">image</span>
                                        @endif
                                    </div>
                                    
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-white">{{ $item->product_name }}</p>
                                        <p class="text-xs text-gray-500">Volumen: {{ $item->product->volume ?? 'N/A' }}</p>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="text-base font-bold text-[#D4AF37]">
                                            ${{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                        </p>
                                        <p class="text-xs text-gray-400">
                                            {{ $item->quantity }} x ${{ number_format($item->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-8">
                    
                    <div class="bg-[#181611] p-6 rounded-xl border border-white/10">
                        <h2 class="text-xl font-bold mb-4 text-white">Gestionar Estado</h2>
                        
                        {{-- Verificamos si está bloqueado --}}
                        @php
                            $isLocked = in_array($order->status, ['completed', 'cancelled']);
                        @endphp

                        <form wire:submit="updateStatus" class="space-y-4">
                            
                            <div class="flex justify-between items-center pb-2 border-b border-white/10 mb-2">
                                <span class="text-xs font-bold text-gray-500 uppercase">Actual:</span>
                                @php
                                    $colors = ['pending' => 'text-yellow-400', 'completed' => 'text-green-400', 'cancelled' => 'text-red-400'];
                                    $labels = ['pending' => 'Pendiente', 'completed' => 'Completado', 'cancelled' => 'Cancelado'];
                                @endphp
                                <span class="font-black {{ $colors[$order->status] }}">
                                    {{ $labels[$order->status] }}
                                </span>
                            </div>

                            @if($isLocked)
                                <div class="bg-white/5 p-3 rounded-lg border border-white/10 text-center">
                                    <span class="text-gray-400 text-xs flex items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-base">lock</span>
                                        Esta orden ya fue finalizada.
                                    </span>
                                </div>
                            @else
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Cambiar a:</label>
                                    <div class="relative">
                                        <select wire:model="newStatus" class="w-full h-10 px-4 rounded-lg bg-white/5 border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none cursor-pointer appearance-none">
                                            <option value="pending" class="bg-[#181611] text-white">Pendiente</option>
                                            <option value="completed" class="bg-[#181611] text-white">Completado</option>
                                            <option value="cancelled" class="bg-[#181611] text-white">Cancelado</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                            <span class="material-symbols-outlined text-lg">expand_more</span>
                                        </div>
                                    </div>
                                    @error('newStatus') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>

                                <button type="submit" 
                                    wire:loading.attr="disabled"
                                    class="w-full h-10 rounded-lg bg-primary text-black font-bold hover:bg-white transition-all flex items-center justify-center gap-2 disabled:opacity-50"
                                >
                                    <span wire:loading.remove>Actualizar Estado</span>
                                    <span wire:loading>Guardando...</span>
                                </button>
                            @endif
                        </form>
                    </div>

                    <div class="bg-[#181611] p-6 rounded-xl border border-white/10">
                        <h2 class="text-xl font-bold mb-4 text-white">Datos del Cliente</h2>
                        <div class="space-y-3 text-sm">
                            <div class="border-b border-white/5 pb-2">
                                <span class="block text-xs text-gray-500 uppercase font-bold">Cliente</span>
                                <span class="text-white font-medium">{{ $order->user->name }}</span>
                            </div>
                            <div class="border-b border-white/5 pb-2">
                                <span class="block text-xs text-gray-500 uppercase font-bold">Email</span>
                                <span class="text-white font-medium">{{ $order->user->email }}</span>
                            </div>
                            <div class="border-b border-white/5 pb-2">
                                <span class="block text-xs text-gray-500 uppercase font-bold">Identificación</span>
                                <span class="text-white font-medium">{{ $order->identification }}</span>
                            </div>
                            <div class="border-b border-white/5 pb-2">
                                <span class="block text-xs text-gray-500 uppercase font-bold">Teléfono</span>
                                <span class="text-white font-medium">{{ $order->phone }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-500 uppercase font-bold">Dirección de Envío</span>
                                <span class="text-white font-medium">{{ $order->address }}, {{ $order->city }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#181611] p-6 rounded-xl border border-white/10">
                        <h2 class="text-xl font-bold mb-4 text-white">Resumen</h2>

                        <div class="space-y-2 border-b border-white/10 pb-4 mb-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Subtotal:</span>
                                <span class="text-white">${{ number_format($order->total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Envío:</span>
                                <span class="text-green-400 font-bold">Gratis</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Método Pago:</span>
                                <span class="text-white capitalize">{{ $order->payment_method }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between text-2xl font-black mb-6">
                            <span class="text-white">TOTAL:</span>
                            <span class="text-[#D4AF37]">${{ number_format($order->total, 0, ',', '.') }}</span>
                        </div>

                        <button wire:click="downloadInvoice" 
                            wire:loading.attr="disabled"
                            class="w-full h-10 rounded-lg bg-blue-600/20 text-blue-400 font-bold hover:bg-blue-600/40 transition-all flex items-center justify-center gap-2 border border-blue-500/30">
                            <span class="material-symbols-outlined text-lg">mail</span>
                            Reenviar Factura Email
                        </button>
                    </div>

                </div>
                
            </div>
            
            <footer class="mt-auto pt-8 border-t border-white/10">
                <p class="text-sm text-gray-500 dark:text-gray-400 text-center">Sistema de Gestión de Órdenes LicUp.</p>
            </footer>

        </div>
    </div>
</div>