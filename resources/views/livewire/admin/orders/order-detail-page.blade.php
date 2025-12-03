<div class="layout-container flex h-full grow flex-col bg-background-dark min-h-screen font-display">
    <div class="flex flex-1 justify-center py-6 md:py-10 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-7xl flex-1 flex flex-col">

            <header class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-white/10 pb-6">
                
                <div class="flex items-center gap-3">
                    <div class="p-3 rounded-xl bg-[#D4AF37]/10 text-[#D4AF37] border border-[#D4AF37]/20">
                        <span class="material-symbols-outlined text-3xl">receipt_long</span>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">Orden #{{ $order->id }}</h1>
                        <p class="text-sm text-gray-400 mt-0.5">Detalles completos de la transacción</p>
                    </div>
                </div>

                <div class="flex w-full md:w-auto gap-3">
                    <a href="{{ route('admin.orders') }}" 
                       class="flex-1 md:flex-none items-center justify-center h-11 px-5 rounded-xl bg-white/5 text-gray-300 hover:bg-white/10 hover:text-white transition-all text-sm font-bold border border-white/10 group">
                        <span class="material-symbols-outlined text-lg mr-2 group-hover:-translate-x-1 transition-transform">arrow_back</span>
                        Volver
                    </a>
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    @if (session()->has('success'))
                        <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl font-bold text-sm animate-in fade-in flex items-center gap-3">
                            <span class="material-symbols-outlined">check_circle</span>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('status_stock'))
                        <div class="bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 p-4 rounded-xl font-bold text-sm animate-in fade-in flex items-center gap-3">
                            <span class="material-symbols-outlined">inventory_2</span>
                            {{ session('status_stock') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl font-bold text-sm animate-in fade-in flex items-center gap-3">
                            <span class="material-symbols-outlined">error</span>
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="bg-[#121212] rounded-2xl border border-white/10 overflow-hidden shadow-lg">
                        <div class="p-6 border-b border-white/5 flex items-center justify-between bg-white/[0.02]">
                            <h2 class="text-lg font-bold text-white flex items-center gap-2">
                                <span class="material-symbols-outlined text-[#D4AF37] text-xl">shopping_bag</span>
                                Productos Comprados
                            </h2>
                            <span class="text-xs font-bold bg-white/10 px-2 py-1 rounded text-gray-300">{{ count($order->items) }} Ítems</span>
                        </div>
                        
                        <div class="p-6 space-y-6">
                            @foreach($order->items as $item)
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 pb-6 border-b border-white/5 last:border-0 last:pb-0">
                                    
                                    <div class="h-20 w-20 flex-shrink-0 rounded-xl bg-white/5 overflow-hidden border border-white/10 flex items-center justify-center relative">
                                        @if($item->product && $item->product->image_path)
                                            <img src="{{ asset('storage/' . $item->product->image_path) }}" class="h-full w-full object-contain p-1">
                                        @else
                                            <span class="material-symbols-outlined text-gray-600 text-3xl">image</span>
                                        @endif
                                    </div>
                                    
                                    <div class="flex-1 min-w-0 w-full">
                                        <div class="flex justify-between items-start gap-4">
                                            <div>
                                                <p class="text-base font-bold text-white line-clamp-2">{{ $item->product_name }}</p>
                                                <div class="flex items-center gap-3 mt-1">
                                                    <span class="text-xs text-gray-500 bg-white/5 px-2 py-0.5 rounded border border-white/5">{{ $item->product->category ?? 'Licor' }}</span>
                                                    <span class="text-xs text-gray-500">Vol: {{ $item->product->volume ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                            
                                            <div class="text-right">
                                                <p class="text-lg font-black text-[#D4AF37]">
                                                    ${{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                                </p>
                                                <p class="text-xs text-gray-500 font-medium">
                                                    {{ $item->quantity }} x ${{ number_format($item->price, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-6">
                    
                    <div class="bg-[#121212] p-6 rounded-2xl border border-white/10 shadow-lg relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-[#D4AF37]/5 rounded-full blur-[60px] pointer-events-none"></div>
                        
                        <h2 class="text-lg font-bold mb-5 text-white flex items-center gap-2 relative z-10">
                            <span class="material-symbols-outlined text-[#D4AF37]">settings_backup_restore</span> Estado del Pedido
                        </h2>
                        
                        <form wire:submit="updateStatus" class="space-y-5 relative z-10">
                            
                            <div class="flex justify-between items-center p-3 rounded-lg bg-white/5 border border-white/5">
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Actual</span>
                                @php
                                    $colors = [
                                        'pending' => 'text-yellow-400 bg-yellow-400/10 border-yellow-400/20',
                                        'completed' => 'text-green-400 bg-green-400/10 border-green-400/20',
                                        'cancelled' => 'text-red-400 bg-red-400/10 border-red-400/20',
                                    ];
                                    $labels = ['pending' => 'Pendiente', 'completed' => 'Completado', 'cancelled' => 'Cancelado'];
                                    $statusClass = $colors[$order->status] ?? 'text-gray-400 bg-gray-400/10';
                                @endphp
                                <span class="px-3 py-1 rounded-md text-xs font-black uppercase tracking-wide border {{ $statusClass }}">
                                    {{ $labels[$order->status] ?? ucfirst($order->status) }}
                                </span>
                            </div>

                            @if(in_array($order->status, ['completed', 'cancelled']))
                                <div class="p-3 rounded-lg border border-white/10 bg-[#181611] text-center">
                                    <span class="text-gray-500 text-xs flex items-center justify-center gap-1 font-medium">
                                        <span class="material-symbols-outlined text-sm">lock</span>
                                        Orden finalizada. No se puede editar.
                                    </span>
                                </div>
                            @else
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 ml-1">Cambiar a:</label>
                                    <div class="relative group">
                                        <select wire:model="newStatus" class="w-full h-11 pl-4 pr-10 rounded-xl bg-[#181611] border border-white/10 text-white focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] outline-none cursor-pointer appearance-none transition-all hover:border-white/20 text-sm">
                                            <option value="pending" class="bg-[#181611]">Pendiente</option>
                                            <option value="completed" class="bg-[#181611]">Completado</option>
                                            <option value="cancelled" class="bg-[#181611]">Cancelado</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500 group-hover:text-[#D4AF37] transition-colors">
                                            <span class="material-symbols-outlined text-xl">expand_more</span>
                                        </div>
                                    </div>
                                    @error('newStatus') <span class="text-red-400 text-xs mt-1 font-bold ml-1 block">{{ $message }}</span> @enderror
                                </div>
                                
                                <button type="submit" 
                                    wire:loading.attr="disabled"
                                    class="w-full h-11 rounded-xl bg-[#D4AF37] text-[#121212] font-black text-sm hover:bg-white transition-all flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed shadow-lg shadow-yellow-900/20 transform active:scale-95">
                                    <span wire:loading.remove>Actualizar Estado</span>
                                    <span wire:loading class="flex items-center gap-2">
                                        <svg class="animate-spin h-4 w-4 text-[#121212]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                        <span>Guardando...</span>
                                    </span>
                                </button>
                            @endif
                        </form>
                    </div>

                    <div class="bg-[#121212] p-6 rounded-2xl border border-white/10 shadow-lg">
                        <h2 class="text-lg font-bold mb-5 text-white flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#D4AF37]">person</span> Cliente
                        </h2>
                        <div class="space-y-4 text-sm">
                            <div class="group">
                                <span class="block text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-1">Nombre</span>
                                <span class="text-white font-medium group-hover:text-[#D4AF37] transition-colors">{{ $order->user->name }}</span>
                            </div>
                            <div class="group">
                                <span class="block text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-1">Email</span>
                                <span class="text-white font-medium break-all group-hover:text-[#D4AF37] transition-colors">{{ $order->user->email }}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="group">
                                    <span class="block text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-1">Cédula</span>
                                    <span class="text-white font-medium">{{ $order->identification }}</span>
                                </div>
                                <div class="group">
                                    <span class="block text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-1">Teléfono</span>
                                    <span class="text-white font-medium">{{ $order->phone }}</span>
                                </div>
                            </div>
                            <div class="group pt-2 border-t border-white/5">
                                <span class="block text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-1 mt-2">Dirección de Envío</span>
                                <span class="text-white font-medium leading-snug block">{{ $order->address }}</span>
                                <span class="text-gray-400 text-xs">{{ $order->city }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#121212] p-6 rounded-2xl border border-white/10 shadow-lg">
                        <h2 class="text-lg font-bold mb-5 text-white flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#D4AF37]">payments</span> Pago
                        </h2>

                        <div class="space-y-2 border-b border-white/10 pb-4 mb-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Subtotal</span>
                                <span class="text-white font-medium">${{ number_format($order->total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Envío</span>
                                <span class="text-green-400 font-bold text-xs bg-green-400/10 px-2 py-0.5 rounded">GRATIS</span>
                            </div>
                            <div class="flex justify-between text-sm pt-2">
                                <span class="text-gray-400">Método</span>
                                <span class="text-white capitalize font-medium">{{ $order->payment_method }}</span>
                            </div>  
                        </div>

                        <div class="flex justify-between items-end mb-6">
                            <span class="text-white font-bold">Total Pagado</span>
                            <span class="text-2xl font-black text-[#D4AF37] leading-none">${{ number_format($order->total, 0, ',', '.') }}</span>
                        </div>
                        <button 
                                wire:click="downloadInvoice" 
                                wire:loading.attr="disabled"
                                wire:target="downloadInvoice"
                                class="w-full h-11 rounded-xl border border-red-500/30 bg-red-500/10 text-red-400 font-bold text-sm hover:bg-red-500 hover:text-white transition-all flex items-center justify-center gap-2 group disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span wire:loading.remove wire:target="downloadInvoice" class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lg group-hover:-translate-y-0.5 transition-transform">picture_as_pdf</span>
                                    Descargar Factura
                                </span>
                                
                                <span wire:loading.flex wire:target="downloadInvoice" class="items-center gap-2">
                                    <svg class="animate-spin h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    <span>Generando...</span>
                                </span>
                        </button>

                    </div>

                </div>
                
            </div>
            
            <footer class="mt-auto pt-12 pb-6 border-t border-white/5 mt-12">
                <p class="text-xs text-gray-600 text-center">© {{ date('Y') }} LicUp Admin Panel. Todos los derechos reservados.</p>
            </footer>

        </div>
    </div>
</div>