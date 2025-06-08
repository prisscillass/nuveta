<h1 class="text-2xl font-serif italic">{{ $product['name'] }}</h1>

<div class="space-y-3 text-sm">
    <div class="flex justify-between border-t pt-2">
        <span class="text-gray-600">Stock</span>
        <span class="font-medium">{{ $product['stock'] }}</span>
    </div>
    <div class="flex justify-between border-t pt-2">
        <span class="text-gray-600">Brand</span>
        <span class="italic">{{ $product['brand'] }}</span>
    </div>
    <div class="flex justify-between border-t pt-2">
        <span class="text-gray-600">Size</span>
        <span>{{ $product['size'] }}</span>
    </div>
    <div class="flex justify-between border-t pt-2 border-b pb-2">
        <span class="text-gray-600">Condition</span>
        <span>{{ $product['condition'] }}</span>
    </div>
</div>