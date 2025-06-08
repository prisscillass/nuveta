<div class="card-shadow relative min-w-52 h-64 rounded-xl">
    <a href="" class="flex flex-col bg-primary w-full h-full rounded-xl">
        {{-- nama url gambar taro di src nya, nnti taro dia punya pilihan kalo gak ada gambar nya --}}
        <img src="{{ asset($data['img_url'] ?? '/assets/item-image-doesnt-exist.svg') }}" alt="images" class="w-full h-auto max-h-32 object-contain">
            
        {{-- nama key category, name, price --}}
        <div class="flex flex-col justify-between p-3 h-full w-full">
            <div>
                <p class="text-primary-2">{{ $data['category'] }}</p>
                <p>{{ $data['name'] }}</p>
            </div>
            <div class="flex justify-between items-end">
                <p>Rp{{ number_format($data['price'], 0, ',', '.') }}</p>
                <i class="iconoir-cart text-xl"></i>
            </div>
        </div>
    </a>
</div>