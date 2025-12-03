<div class="flex-shrink-0 w-64">
    <div class="group/card relative flex flex-col h-full bg-[#121212] border border-white/5 rounded-2xl overflow-hidden hover:border-[#D4AF37]/30 transition-all hover:shadow-xl hover:-translate-y-2 duration-300">
        
        <a href="{{ route('product.detail', $product->id) }}" class="relative h-64 bg-white/5 p-6 flex items-center justify-center overflow-hidden">
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" class="h-full w-full object-contain transition-transform duration-500 group-hover/card:scale-110 drop-shadow-lg">
            @else
                <span class="material-symbols-outlined text-6xl text-gray-700">image</span>
            @endif
        </a>

        <div class="p-5 flex flex-col gap-1">
            <p class="text-[10px] text-[#D4AF37] font-bold uppercase tracking-wider">{{ $product->category }}</p>
            <h3 class="text-white font-bold leading-tight line-clamp-2 min-h-[2.5rem]">
                {{ $product->name }}
            </h3>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-lg font-black text-white">${{ number_format($product->price, 0) }}</span>
                <button wire:click="addToCart({{ $product->id }})" class="h-8 w-8 rounded-full bg-[#D4AF37] text-black flex items-center justify-center hover:bg-white transition-transform hover:scale-110 shadow-lg">
                    <span class="material-symbols-outlined text-base">add</span>
                </button>
            </div>
        </div>
    </div>
</div>