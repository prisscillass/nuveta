<x-layout>
    <div class="flex flex-col md:flex-row bg-[#faf7f6] p-8 gap-8 items-start max-w-5xl mx-auto rounded-xl shadow">
        {{-- Product Picture --}}
        <div class="w-full md:w-1/2">
            <img src="{{ asset('assets/product/samba-shoes.jpg') }}" alt="Adidas Samba Pink"
                class="rounded-lg shadow-md w-full aspect-[4/3] object-cover">

        </div>

        {{-- Product Details --}}
        <div class="w-full md:w-1/2 space-y-6">
            <h1 class="text-3xl italic font-semibold text-gray-900">Adidas Samba Pink</h1>

            {{-- Detail List --}}
            <div class="space-y-4 text-gray-800">
                <div class="flex justify-between border-t pt-2">
                    <span class="font-medium">Stock</span>
                    <span>2</span>
                </div>

                <div class="flex justify-between border-t pt-2">
                    <span class="font-medium">Brand</span>
                    <span class="italic">Adidas</span>
                </div>

                <div class="flex justify-between border-t pt-2">
                    <span class="font-medium">Size</span>
                    <span>Euro 39 = 24.5 CM</span>
                </div>

                <div class="flex justify-between border-t pt-2 pb-2 border-b">
                    <span class="font-medium">Condition</span>
                    <span>Good</span>
                </div>
            </div>

            {{-- Quantity and Price --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center border border-[#5B2333] rounded-md overflow-hidden">
                    <button class="px-4 py-2 text-xl text-[#5B2333]">−</button>
                    <span class="px-4 py-2 text-xl font-medium">1</span>
                    <button class="px-4 py-2 text-xl text-[#5B2333]">+</button>
                </div>
                <div class="text-xl text-[#5B2333] font-semibold">Rp1.450.000,00</div>
            </div>

            <button class="bg-[#5B2333] text-white font-bold text-lg px-6 py-3 hover:bg-[#D7426C] transition w-full">
                Add To Cart
            </button>
        </div>
    </div>
</x-layout>