<div class="layout-container flex h-full grow flex-col">
    <div class="flex flex-1 justify-center py-5 sm:px-4 md:px-10 lg:px-20 xl:px-40">
        <div class="layout-content-container flex flex-col w-full max-w-7xl flex-1">

            <main class="flex-1 px-4 md:px-10 py-8">
                
                <div class="mb-6">
                    <p class="text-gray-900 dark:text-white text-4xl font-black leading-tight">
                        Gestión de Órdenes
                    </p>
                </div>

                <div class="flex justify-between items-center gap-4 p-4 rounded-lg bg-white/50 dark:bg-black/20 mb-6 border border-black/10 dark:border-white/10">
                    <div class="relative w-full sm:w-80">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Buscar por ID o Cliente..." 
                            class="w-full h-10 pl-10 pr-4 rounded-lg bg-gray-100 dark:bg-[#27241b] border-transparent focus:ring-2 focus:ring-primary text-gray-800 dark:text-gray-200"
                        />
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-black/10 dark:border-white/10 bg-white dark:bg-[#181611]">
                    <table class="min-w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-[#27241b]">
                                <th class="px-4 py-3 text-white text-sm font-medium w-24">Orden #</th>
                                <th class="px-4 py-3 text-white text-sm font-medium">Cliente</th>
                                <th class="px-4 py-3 text-white text-sm font-medium">Fecha</th>
                                <th class="px-4 py-3 text-white text-sm font-medium">Método</th>
                                <th class="px-4 py-3 text-white text-sm font-medium">Estado</th>
                                <th class="px-4 py-3 text-white text-sm font-medium text-right">Total</th>
                                <th class="px-4 py-3 text-right text-gray-500 dark:text-[#bbb39b] text-sm font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @forelse($orders as $order)
                                <tr wire:key="order-{{ $order->id }}" class="hover:bg-white/5 transition-colors">
                                    
                                    <td class="px-4 py-3 text-sm font-bold text-gray-300">#{{ $order->id }}</td>
                                    
                                    <td class="px-4 py-3 text-sm text-white">{{ $order->user->name }}</td>
                                    
                                    <td class="px-4 py-3 text-sm text-gray-400">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    
                                    <td class="px-4 py-3 text-sm text-gray-300 capitalize">{{ $order->payment_method }}</td>
                                    
                                    <td class="px-4 py-3 text-sm">
                                        @php
                                            $statusColors = [
                                                'pending' => 'bg-yellow-500/10 text-yellow-500',
                                                'completed' => 'bg-green-500/10 text-green-500',
                                                'cancelled' => 'bg-red-500/10 text-red-500',
                                            ];
                                            $statusLabels = [
                                                'pending' => 'Pendiente',
                                                'completed' => 'Completado',
                                                'cancelled' => 'Cancelado',
                                            ];
                                        @endphp
                                        <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold {{ $statusColors[$order->status] ?? 'bg-gray-500/10 text-gray-400' }}">
                                            {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-4 py-3 text-right text-lg font-black text-[#D4AF37]">
                                        ${{ number_format($order->total, 0, ',', '.') }}
                                    </td>
                                    
                                    <td class="px-4 py-3 text-right">
                                        <a href="{{ route('admin.orders.detail', $order->id) }}" 
                                        class="h-8 w-8 inline-flex items-center justify-center rounded-full text-blue-400 hover:bg-white/10 transition-colors bg-blue-500/10"
                                        title="Gestionar Orden">
                                            <span class="material-symbols-outlined text-xl">visibility</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center gap-2">
                                            <span class="material-symbols-outlined text-4xl opacity-50">receipt_long</span>
                                            <p>No hay órdenes de compra registradas.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $orders->links('pagination::tailwind') }}
                </div>
            </main>

            <footer class="mt-auto px-4 md:px-10 py-6 border-t border-black/10 dark:border-white/10">
                <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">© 2025 LicUp. Todos los Derechos Reservados.</p>
                    <div class="flex gap-6">
                        <a class="text-sm text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#">Términos</a>
                        <a class="text-sm text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#">Privacidad</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>
</div>