<div class="flex gap-4 border-b pb-4">
    {{-- Gambar Produk --}}
    <div class="w-24 h-24 rounded overflow-hidden shadow-sm">
        <img src="{{ asset($item->product->img_url ?? '/assets/item-image-doesnt-exist.svg') }}" class="w-full h-full object-cover" />
    </div>

    {{-- Detail Produk --}}
    <div class="flex-1">
        {{-- {{ $details }} --}}
        
        {{-- detail product --}}
        {{-- name --}}
        <h4 class="font-semibold">{{ $item->product->name }}</h4>
        {{-- quantity --}}
        <p>Quantity: {{ $item->cart_quantity }}</p>
        {{-- size --}}
        <p>Size : {{ $item->product->size }}</p>
        {{-- price --}}
        <p class="font-semibold mt-1">Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
    </div>

    {{-- Tombol Delete --}}
    {{-- model binding harus sma namanya kek di param controller dan di route --}}
    <form action="{{ route('cart.destroy', ['cartItem' => $item->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="text-gray-600 hover:text-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3.5a.5.5 0 000 1H4l.401 9.593A2 2 0 006.4 17h7.2a2 2 0 001.999-1.907L16 5h.5a.5.5 0 000-1H15V3a1 1 0 00-1-1H6zm2 5a.5.5 0 011 0v6a.5.5 0 01-1 0V7zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0v-6z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>
</div>