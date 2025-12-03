<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            
            <div class="flex justify-between flex-1 sm:hidden">
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-[#181611] border border-white/10 cursor-default leading-5 rounded-md">
                        Anterior
                    </span>
                @else
                    <button type="button" wire:click="previousPage" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#181611] border border-white/10 leading-5 rounded-md hover:text-primary focus:outline-none transition ease-in-out duration-150">
                        Anterior
                    </button>
                @endif

                @if ($paginator->hasMorePages())
                    <button type="button" wire:click="nextPage" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white bg-[#181611] border border-white/10 leading-5 rounded-md hover:text-primary focus:outline-none transition ease-in-out duration-150">
                        Siguiente
                    </button>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-[#181611] border border-white/10 cursor-default leading-5 rounded-md">
                        Siguiente
                    </span>
                @endif
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                
                <div>
                    <p class="text-sm text-gray-400">
                        Mostrando
                        <span class="font-bold text-white">{{ $paginator->firstItem() }}</span>
                        a
                        <span class="font-bold text-white">{{ $paginator->lastItem() }}</span>
                        de
                        <span class="font-bold text-white">{{ $paginator->total() }}</span>
                        resultados
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex shadow-sm rounded-md gap-1">
                        
                        {{-- Botón Anterior --}}
                        @if ($paginator->onFirstPage())
                            <span aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-[#181611] border border-white/10 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                    <span class="material-symbols-outlined text-lg">chevron_left</span>
                                </span>
                            </span>
                        @else
                            <button type="button" wire:click="previousPage" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-300 bg-[#181611] border border-white/10 rounded-l-md leading-5 hover:bg-white/5 hover:text-primary focus:z-10 focus:outline-none transition ease-in-out duration-150" aria-label="@lang('pagination.previous')">
                                <span class="material-symbols-outlined text-lg">chevron_left</span>
                            </button>
                        @endif

                        {{-- Números de Página --}}
                        @foreach ($elements as $element)
                            
                            {{-- Separador "..." --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-[#181611] border border-white/10 cursor-default leading-5">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array de Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        {{-- PAGINA ACTIVA --}}
                                        <span aria-current="page">
                                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-[#121212] bg-primary border border-primary cursor-default leading-5 rounded-md">
                                                {{ $page }}
                                            </span>
                                        </span>
                                    @else
                                        {{-- PAGINA INACTIVA (Usa wire:click="gotoPage") --}}
                                        <button type="button" wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-[#181611] border border-white/10 leading-5 rounded-md hover:bg-white/5 hover:text-primary focus:z-10 focus:outline-none transition ease-in-out duration-150">
                                            {{ $page }}
                                        </button>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Botón Siguiente --}}
                        @if ($paginator->hasMorePages())
                            <button type="button" wire:click="nextPage" rel="next" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-300 bg-[#181611] border border-white/10 rounded-r-md leading-5 hover:bg-white/5 hover:text-primary focus:z-10 focus:outline-none transition ease-in-out duration-150" aria-label="@lang('pagination.next')">
                                <span class="material-symbols-outlined text-lg">chevron_right</span>
                            </button>
                        @else
                            <span aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-[#181611] border border-white/10 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                                </span>
                            </span>
                        @endif
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>