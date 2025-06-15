<x-layout>
    {{-- <div class="flex justify-center items-center md:flex-row bg-primary gap-8 max-w-screen-xl p-3 rounded-xl shadow"> --}}
    <form action="{{ route('cart.store', $product->id) }}" method="post" class="flex justify-center items-start w-full p-8 gap-6 max-w-screen-xl m-auto min-h-[480px]">
        @csrf
        <div class="flex w-full gap-x-4">
            {{-- Product Picture --}}
            <div class="w-full h-[320px] rounded-xl">
                <img src="{{ asset($product['img_url'] ?? '/assets/item-image-doesnt-exist.svg') }}" alt="product-image"
                    class="w-full h-full object-contain rounded-lg" />
            </div>


            {{-- Product Details --}}
            <div class="w-full h-full min-h-80 text-primary-2 flex flex-col justify-between">
                <div class="w-full sm:w-80">
                    {{-- name product --}}
                    <h1 class="text-2xl italic font-semibold ">{{ $product->name }}</h1>

                    {{-- Detail List --}}
                    <div class="flex flex-col gap-y-2 divide-y-2 divide-primary-2 pt-2">
                        <div class="flex justify-between">
                            {{-- stock --}}
                            <span class="font-medium">Stock</span>
                            <span>{{ $product->stock }}</span>
                        </div>

                        <div class="flex justify-between pt-2">
                            {{-- brand --}}
                            <span class="font-medium">Brand</span>
                            <span class="italic">{{ $product->brand }}</span>
                        </div>

                        <div class="flex justify-between pt-2">
                            {{-- size --}}
                            <span class="font-medium">Size</span>
                            <span>{{ $product->size }}</span>
                        </div>

                        <div class="flex justify-between py-2">
                            {{-- condition --}}
                            <span class="font-medium">Condition</span>
                            <span>{{ $product->condition }}</span>
                        </div>
                    </div>

                    {{-- Quantity and Price --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center border border-primary-2 rounded-md overflow-hidden">
                            <div class="cursor-pointer px-4 py-2 text-xl" id="subtraction">-</div>
                            {{--nyimpan data buat di controller--}}
                            <input type="hidden" value="{{ $product->id }}" name="buyid">
                            <input readonly class="px-4 py-2 text-xl w-12 text-center bg-primary" name="buyqty" id="buyqty" value="1"></input>
                            <div class="cursor-pointer px-4 py-2 text-xl" id="addition">+</div>
                        </div>
                        {{-- price --}}
                        <div class="text-xl font-semibold">Rp{{ number_format($product['price'], 0, ',', '.') }}</div>
                    </div>
                </div>

                <button type="submit" class="bg-primary-2 text-white font-bold text-lg px-6 py-3 rounded-md w-full sm:w-80">
                    {{-- @dd($product); --}}
                    Add To Cart
                </button>
            </div>
        </div>
    </form>
</x-layout>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Ambil elemen HTML input simpan dalam buyqtyInput
        // lalu buat variabel buyqty yang berisi value dari elemen HTML di variabel buyqtyInput
        const buyqtyInput = document.getElementById('buyqty');
        let buyqty = Number(buyqtyInput.value);
        const availableStock = @json($product->stock);
        document.getElementById('subtraction').addEventListener('click', () => {
            if (buyqty > 1) { // Hindari nilai negatif
                buyqty -= 1;
                buyqtyInput.value = buyqty;
            }
        });

        document.getElementById('addition').addEventListener('click', () => {
            if (!(buyqty >= availableStock)) {
                buyqty += 1;
                buyqtyInput.value = buyqty;
            }
        });
    });
</script>