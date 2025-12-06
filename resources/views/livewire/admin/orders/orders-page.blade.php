@section('title', 'Órdenes | LicUp')
<div class="layout-container flex h-full grow flex-col bg-background-dark min-h-screen font-display">
    <div class="flex flex-1 justify-center py-8 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-[95%] 2xl:max-w-7xl flex-1 flex flex-col">

            <main class="flex-1">
                
                <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight">
                            Gestión de <span class="text-[#D4AF37]">Órdenes</span>
                        </h1>
                        <p class="text-gray-400 text-sm mt-1">Control de pedidos y despachos.</p>
                    </div>
                    
                    <div class="text-sm text-gray-500 font-medium bg-[#121212] px-4 py-2 rounded-lg border border-white/10">
                        Total Órdenes: <span class="text-white font-bold">{{ $orders->total() }}</span>
                    </div>
                </div>

                <div class="bg-[#121212] border border-white/10 rounded-2xl p-4 mb-8 shadow-lg flex flex-col sm:flex-row gap-4">
                    <div class="relative flex-grow group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">search</span>
                        <input 
                            wire:model.live.debounce.300ms="search" 
                            type="text" 
                            placeholder="Buscar por ID (#123) o Cliente..." 
                            class="w-full h-12 pl-10 pr-4 rounded-xl bg-white/5 border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all text-sm"
                        />
                    </div>
                    </div>

                <div class="bg-[#121212] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
                    
                    <div class="hidden md:grid grid-cols-12 gap-4 bg-white/5 px-6 py-4 border-b border-white/5 text-xs font-bold text-gray-400 uppercase tracking-wider items-center">
                        <div class="col-span-1 text-center"># Orden</div>
                        <div class="col-span-3">Cliente</div>
                        <div class="col-span-2">Fecha</div>
                        <div class="col-span-2">Método</div>
                        <div class="col-span-2 text-center">Estado</div>
                        <div class="col-span-1 text-right">Total</div>
                        <div class="col-span-1 text-right">Ver</div>
                    </div>

                    <div class="divide-y divide-white/5">
                        @forelse($orders as $order)
                            <div wire:key="order-{{ $order->id }}" class="group md:grid md:grid-cols-12 md:gap-4 md:items-center px-6 py-4 hover:bg-white/[0.02] transition-colors flex flex-col gap-3 relative">
                                
                                <div class="md:col-span-1 md:text-center flex justify-between items-center">
                                    <span class="font-mono font-bold text-[#D4AF37]">#{{ $order->id }}</span>
                                    <span class="md:hidden text-xs font-bold text-gray-500 uppercase tracking-wider">ID Orden</span>
                                </div>

                                <div class="md:col-span-3 flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-white/10 flex items-center justify-center text-xs font-bold text-gray-400">
                                        {{ substr($order->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-white">{{ $order->user->name }}</p>
                                        <p class="text-xs text-gray-500 truncate max-w-[150px]">{{ $order->user->email }}</p>
                                    </div>
                                </div>

                                <div class="md:col-span-2 flex justify-between md:block">
                                    <span class="md:hidden text-gray-500 text-xs">Fecha:</span>
                                    <span class="text-sm text-gray-400">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                </div>

                                <div class="md:col-span-2 flex justify-between md:block">
                                    <span class="md:hidden text-gray-500 text-xs">Pago:</span>
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-gray-600 text-sm">credit_card</span>
                                        <span class="text-sm text-gray-300 capitalize">{{ $order->payment_method }}</span>
                                    </div>
                                </div>

                                <div class="md:col-span-2 flex justify-center md:justify-center">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
                                            'completed' => 'bg-green-500/10 text-green-500 border-green-500/20',
                                            'cancelled' => 'bg-red-500/10 text-red-500 border-red-500/20',
                                        ];
                                        $statusLabels = [
                                            'pending' => 'Pendiente',
                                            'completed' => 'Completado',
                                            'cancelled' => 'Cancelado',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border {{ $statusColors[$order->status] ?? 'bg-gray-500/10 text-gray-400' }}">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current mr-1.5 animate-pulse"></span>
                                        {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                    </span>
                                </div>

                                <div class="md:col-span-1 text-right flex justify-between md:block border-t border-white/5 pt-2 md:border-0 md:pt-0 mt-2 md:mt-0">
                                    <span class="md:hidden text-white font-bold">Total a Pagar</span>
                                    <span class="text-sm font-black text-[#D4AF37]">${{ number_format($order->total, 0, ',', '.') }}</span>
                                </div>

                                <div class="md:col-span-1 text-right flex justify-end">
                                    <a href="{{ route('admin.orders.detail', $order->id) }}" 
                                        class="h-9 w-9 flex items-center justify-center rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white transition-all border border-blue-500/20"
                                        title="Ver Detalles">
                                        <span class="material-symbols-outlined text-lg">visibility</span>
                                    </a>
                                </div>

                            </div>
                        @empty
                            <div class="py-20 text-center flex flex-col items-center justify-center">
                                <div class="p-4 rounded-full bg-white/5 mb-3"><span class="material-symbols-outlined text-4xl text-gray-600">receipt_long</span></div>
                                <h3 class="text-lg font-bold text-white">Sin Órdenes</h3>
                                <p class="text-gray-500 text-sm">No se encontraron registros de compra.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="mt-8">
                    {{ $orders->links('pagination::tailwind') }}
                </div>

            </main>

            <footer class="mt-auto py-6 border-t border-white/10">
                <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-4">
                    <p class="text-xs text-gray-500">© 2025 LicUp. Sistema de Gestión.</p>
                    <div class="flex gap-4 text-xs text-gray-500">
                        <a href="#" class="hover:text-white transition-colors">Soporte</a>
                        <a href="#" class="hover:text-white transition-colors">Ayuda</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>
</div>