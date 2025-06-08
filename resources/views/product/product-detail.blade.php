<x-layout>
    <div class="flex flex-col md:flex-row bg-[#faf7f6] p-8 gap-8 items-start max-w-5xl mx-auto rounded-xl shadow">
        @include('components.product-image', ['img_url' => $product['img_url'], 'name' => $product['name']])
        <div class="w-full md:w-1/2 space-y-6">
            @include('components.product-info', ['product' => $product])
            @include('components.product-price', ['price' => $product['price']])
            @include('components.add-to-cart-button')
        </div>
    </div>
</x-layout>