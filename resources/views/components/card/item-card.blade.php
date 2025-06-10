{{-- @dd($product) --}}
<div class="card-shadow relative min-w-52 h-64 rounded-xl">
    <a href="{{ route('product.show', $product->id) }}" class="flex flex-col bg-primary w-full h-full rounded-xl">
        {{-- nama url gambar taro di src nya, nnti taro dia punya pilihan kalo gak ada gambar nya --}}
        <img src="{{ asset($product['img_url'] ?? '/assets/item-image-doesnt-exist.svg') }}" alt="images" class="w-full h-auto max-h-32 object-contain">
            
        {{-- nama key category, name, price --}}
        <div class="flex flex-col justify-between p-3 h-full w-full">
            <div>
                <p class="text-primary-2">{{ $product['category'] }}</p>
                <p>{{ $product['name'] }}</p>
            </div>
            <p>Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
        </div>
    </a>
    <a href="" class="iconoir-cart text-xl absolute right-4 bottom-4"></a>
</div>