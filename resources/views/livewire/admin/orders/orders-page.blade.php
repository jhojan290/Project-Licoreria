@section('title', 'Órdenes | LicUp')

{{-- 1. ENVOLVEMOS TODO EN x-data PARA CONTROLAR EL MODAL --}}
<div x-data="{ 
    showModal: false, 
    targetId: null, 
    mode: 'bulk' // 'bulk' o 'single'
}" class="layout-container flex h-full grow flex-col bg-background-dark min-h-screen font-display">

    <div class="flex flex-1 justify-center py-8 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-[95%] 2xl:max-w-7xl flex-1 flex flex-col">

            <main class="flex-1">
                
                {{-- CABECERA Y BOTÓN DE ACCIÓN MASIVA --}}
                <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight">
                            Gestión de <span class="text-[#D4AF37]">Órdenes</span>
                        </h1>
                        <p class="text-gray-400 text-sm mt-1">Control de pedidos y despachos.</p>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        {{-- Botón de Eliminación Masiva --}}
                        @if(count($selectedOrders) > 0)
                            <button 
                                type="button"
                                {{-- 2. CAMBIO: Ahora abre el modal en modo 'bulk' --}}
                                @click="mode = 'bulk'; showModal = true"
                                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg flex items-center gap-2 transition-colors border border-red-500 shadow-lg shadow-red-900/20 animate-pulse">
                                <span class="material-symbols-outlined text-sm">delete</span>
                                <span class="text-sm">Eliminar ({{ count($selectedOrders) }})</span>
                            </button>
                        @endif

                        <div class="text-sm text-gray-500 font-medium bg-[#121212] px-4 py-2 rounded-lg border border-white/10">
                            Total: <span class="text-white font-bold">{{ $orders->total() }}</span>
                        </div>
                    </div>
                </div>

                {{-- BUSCADOR --}}
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

                {{-- TABLA / GRID DE ÓRDENES --}}
                <div class="bg-[#121212] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
                    
                    {{-- Encabezado --}}
                    <div class="hidden md:grid grid-cols-12 gap-4 bg-white/5 px-6 py-4 border-b border-white/5 text-xs font-bold text-gray-400 uppercase tracking-wider items-center">
                        <div class="col-span-1 flex justify-center">
                            @php
                                // Verificamos si en esta página hay ALGO que se pueda seleccionar
                                $hasValidOrders = $orders->contains(fn($o) => in_array($o->status, ['completed', 'cancelled']));
                            @endphp

                            <div class="relative flex items-center justify-center">
                                <input 
                                    type="checkbox" 
                                    wire:click="toggleSelectAll" 
                                    @checked($this->isAllSelected)
                                    wire:key="select-all-{{ count($selectedOrders) }}"
                                    
                                    {{-- LÓGICA DE DESACTIVACIÓN --}}
                                    @if(!$hasValidOrders) disabled @endif
                                    
                                    class="peer h-5 w-5 rounded border-white/30 bg-[#181611] 
                                        checked:bg-[#D4AF37] checked:border-[#D4AF37] focus:ring-0 transition-all appearance-none
                                        {{-- Estilos condicionales: si está disabled, se ve apagado --}}
                                        disabled:opacity-30 disabled:cursor-not-allowed disabled:bg-gray-800 disabled:border-gray-700
                                        enabled:cursor-pointer"
                                    
                                    title="{{ $hasValidOrders ? 'Seleccionar todas las permitidas' : 'No hay órdenes para seleccionar' }}"
                                >
                                
                                {{-- Solo mostramos el chulito si está habilitado --}}
                                @if($hasValidOrders)
                                    <span class="material-symbols-outlined absolute text-black opacity-0 peer-checked:opacity-100 pointer-events-none text-base font-bold">
                                        check
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-span-1">Orden</div>
                        <div class="col-span-3">Cliente</div>
                        <div class="col-span-2">Fecha</div>
                        <div class="col-span-1 text-center">Metodo</div>
                        <div class="col-span-2 text-center">Estado</div>
                        <div class="col-span-1 text-right">Total</div>
                        <div class="col-span-1 text-center">Acciones</div>
                    </div>

                    <div class="divide-y divide-white/5">
                        @forelse($orders as $order)
                            <div wire:key="order-{{ $order->id }}" class="group md:grid md:grid-cols-12 md:gap-4 md:items-center px-6 py-4 hover:bg-white/[0.02] transition-colors flex flex-col gap-3 relative">
                                
                                {{-- Checkbox Individual --}}
                                <div class="md:col-span-1 flex items-center md:justify-center mb-2 md:mb-0">
    
                                    @if(in_array($order->status, ['completed', 'cancelled']))
                                        
                                        {{-- OPCIÓN 1: CHECKBOX ACTIVO (Estilo Personalizado) --}}
                                        <div class="relative flex items-center justify-center">
                                            <input 
                                                type="checkbox" 
                                                value="{{ $order->id }}" 
                                                wire:model.live="selectedOrders" 
                                                class="peer h-5 w-5 rounded border-white/30 bg-[#181611] checked:bg-[#D4AF37] checked:border-[#D4AF37] focus:ring-0 cursor-pointer transition-all appearance-none"
                                            >
                                            
                                            {{-- El Icono (Chulito) que aparece al marcar --}}
                                            <span class="material-symbols-outlined absolute text-black opacity-0 peer-checked:opacity-100 pointer-events-none text-base font-bold">
                                                check
                                            </span>
                                        </div>

                                    @else
                                        
                                        {{-- OPCIÓN 2: CHECKBOX DESHABILITADO (Estilo coherente pero apagado) --}}
                                        <div class="relative flex items-center justify-center tooltip-container group/tooltip">
                                            <input 
                                                disabled 
                                                type="checkbox" 
                                                class="h-5 w-5 rounded border-white/10 bg-white/5 cursor-not-allowed appearance-none"
                                            >
                                            {{-- Opcional: Un pequeño tooltip visual si quieres explicar por qué no se puede --}}
                                        </div>

                                    @endif

                                    <span class="md:hidden ml-2 text-gray-500 text-xs">Seleccionar</span>
                                </div>

                                {{-- ID Orden --}}
                                <div class="md:col-span-1 md:text-center flex justify-between items-center">
                                    <span class="font-mono font-bold text-[#D4AF37]">#{{ $order->id }}</span>
                                    <span class="md:hidden text-xs font-bold text-gray-500 uppercase tracking-wider">ID Orden</span>
                                </div>

                                {{-- Cliente --}}
                                <div class="md:col-span-3 flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-white/10 flex items-center justify-center text-xs font-bold text-gray-400">
                                        {{ substr($order->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-white">{{ $order->user->name }}</p>
                                        <p class="text-xs text-gray-500 truncate max-w-[150px]">{{ $order->user->email }}</p>
                                    </div>
                                </div>

                                {{-- Fecha --}}
                                <div class="md:col-span-2 flex justify-between md:block">
                                    <span class="md:hidden text-gray-500 text-xs">Fecha:</span>
                                    <span class="text-sm text-gray-400">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                </div>

                                {{-- Método de Pago --}}
                                <div class="md:col-span-1 flex justify-between md:justify-center">
                                    <span class="md:hidden text-gray-500 text-xs">Pago:</span>
                                    <div class="flex items-center gap-2" title="{{ $order->payment_method }}">
                                        <span class="material-symbols-outlined text-gray-600 text-sm">credit_card</span>
                                        <span class="text-sm text-gray-300 capitalize md:hidden xl:block">{{ $order->payment_method }}</span>
                                    </div>
                                </div>

                                {{-- Estado --}}
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
                                        <span class="w-1.5 h-1.5 rounded-full bg-current mr-1.5 {{ $order->status == 'pending' ? 'animate-pulse' : '' }}"></span>
                                        {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                    </span>
                                </div>

                                {{-- Total --}}
                                <div class="md:col-span-1 text-right flex justify-between md:block border-t border-white/5 pt-2 md:border-0 md:pt-0 mt-2 md:mt-0">
                                    <span class="md:hidden text-white font-bold">Total</span>
                                    <span class="text-sm font-black text-[#D4AF37]">${{ number_format($order->total, 0, ',', '.') }}</span>
                                </div>

                                {{-- Acciones --}}
                                <div class="md:col-span-1 flex justify-end md:justify-center gap-2 mt-2 md:mt-0">
                                    <a href="{{ route('admin.orders.detail', $order->id) }}" 
                                    class="h-8 w-8 flex items-center justify-center rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white transition-all border border-blue-500/20"
                                    title="Ver Detalles">
                                        <span class="material-symbols-outlined text-lg">visibility</span>
                                    </a>

                                    @if(in_array($order->status, ['completed', 'cancelled']))
                                        <button 
                                            type="button"
                                            {{-- 3. CAMBIO: Abre modal en modo 'single' y guarda el ID --}}
                                            @click="mode = 'single'; targetId = {{ $order->id }}; showModal = true"
                                            class="h-8 w-8 flex items-center justify-center rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all border border-red-500/20"
                                            title="Eliminar Orden">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    @endif
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
        </div>
    </div>

    {{-- 4. TU MODAL PERSONALIZADO (Integrado con Alpine) --}}
    <div x-show="showModal" 
        style="display: none;" 
        class="fixed inset-0 z-[100] flex items-center justify-center px-4"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak>
        
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="showModal = false"></div>

        <div class="relative bg-[#181611] border border-white/10 rounded-2xl p-6 max-w-sm w-full text-center shadow-2xl transform transition-all"
            x-show="showModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0">
            
            <div class="w-12 h-12 rounded-full bg-red-500/10 flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-red-500 text-2xl">warning</span>
            </div>
            
            <h3 class="text-lg font-bold text-white mb-2">¿Estás seguro?</h3>
            
            {{-- Texto Dinámico --}}
            {{-- Dentro de tu div del Modal --}}
            <p class="text-sm text-gray-400 mb-6">
                <template x-if="mode === 'bulk'">
                    {{-- CAMBIO AQUÍ: Usamos x-text="$wire.selectedOrders.length" en vez de {{ count... }} --}}
                    <span>
                        Vas a eliminar permanentemente 
                        <strong class="text-white" x-text="$wire.selectedOrders.length"></strong> 
                        órdenes seleccionadas.
                    </span>
                </template>
                
                <template x-if="mode === 'single'">
                    <span>
                        Vas a eliminar permanentemente la orden 
                        <strong class="text-[#D4AF37]">#<span x-text="targetId"></span></strong>.
                    </span>
                </template>
            </p>

            <div class="flex gap-3 justify-center">
                <button @click="showModal = false" class="px-4 py-2 rounded-lg border border-white/10 text-gray-300 text-sm font-bold hover:bg-white/5 transition-colors">
                    Cancelar
                </button>
                
                {{-- Botón Confirmar --}}
                <button 
                    @click="
                        if(mode === 'bulk') { $wire.deleteSelected() } 
                        else { $wire.deleteOrder(targetId) }; 
                        showModal = false
                    " 
                    class="px-4 py-2 rounded-lg bg-red-500 text-white text-sm font-bold hover:bg-red-600 transition-colors shadow-lg shadow-red-900/20"
                >
                    Sí, Eliminar
                </button>
            </div>
        </div>
    </div>

</div>

