<x-layout>
    <div class="max-w-6xl mx-auto py-12 px-4 md:px-0 flex flex-col md:flex-row gap-8 bg-[#faf7f6]">
        {{-- Cart Items Section --}}
        <div class="w-full md:w-2/3 space-y-6">
            <h2 class="text-2xl font-bold">Your Cart</h2>
            <p class="text-gray-600">Unready to checkout? <a href="{{ route('home') }}" class="underline text-[#5B2333]">Continue Shopping</a></p>

            <x-cart.cart-item>
                <x-slot:image>
                    <img src="{{ asset('assets/product/coach-bag.jpg') }}" class="w-full h-full object-cover" />
                </x-slot:image>
                <x-slot:details>
                    <h4 class="font-semibold">Coach Cherry Red Bag</h4>
                    <p>Quantity : 1</p>
                    <p>Size : Medium</p>
                    <p class="font-semibold mt-1">Rp1.450.000,00</p>
                </x-slot:details>
            </x-cart.cart-item>

            <x-cart.cart-item>
                <x-slot:image>
                    <img src="{{ asset('assets/product/pants.jpg') }}" class="w-full h-full object-cover" />
                </x-slot:image>
                <x-slot:details>
                    <h4 class="font-semibold">Ribbon Jeans</h4>
                    <p>Quantity : 1</p>
                    <p>Size : S</p>
                    <p class="font-semibold mt-1">Rp1.450.000,00</p>
                </x-slot:details>
            </x-cart.cart-item>
        </div>

        {{-- Summary Section --}}
        <div class="w-full md:w-1/3 space-y-6">
            <h3 class="text-xl font-semibold">Order Summary</h3>
            <input type="text" placeholder="Enter coupon code here"
                class="w-full border border-[#5B2333] px-4 py-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-[#5B2333]">
            <div class="space-y-2 text-gray-800">
                <div class="flex justify-between border-b pb-1">
                    <span>Subtotal</span>
                    <span>Rp2.900.000,00</span>
                </div>
                <div class="flex justify-between border-b pb-1">
                    <span>Shipping</span>
                    <span class="text-sm text-gray-500">Calculate at the next step</span>
                </div>
                <div class="flex justify-between font-bold pt-2">
                    <span>Total</span>
                    <span>Rp2.900.000,00</span>
                </div>
            </div>
            <button class="w-full bg-[#5B2333] text-white font-semibold py-3 hover:bg-[#D7426C] transition">
                Continue to checkout
            </button>
        </div>
    </div>
</x-layout>
<x-layout>
    <div class="max-w-6xl mx-auto py-12 px-4 md:px-0 flex flex-col md:flex-row gap-8 bg-[#faf7f6]">
        {{-- Cart Items Section --}}
        <div class="w-full md:w-2/3 space-y-6">
            <h2 class="text-2xl font-bold">Your Cart</h2>
            <p class="text-gray-600">Unready to checkout? <a href="{{ route('home') }}" class="underline text-[#5B2333]">Continue Shopping</a></p>

            <x-cart.cart-item>
                <x-slot:image>
                    <img src="{{ asset('assets/product/coach-bag.jpg') }}" class="w-full h-full object-cover" />
                </x-slot:image>
                <x-slot:details>
                    <h4 class="font-semibold">Coach Cherry Red Bag</h4>
                    <p>Quantity : 1</p>
                    <p>Size : Medium</p>
                    <p class="font-semibold mt-1">Rp1.450.000,00</p>
                </x-slot:details>
            </x-cart.cart-item>

            <x-cart.cart-item>
                <x-slot:image>
                    <img src="{{ asset('assets/product/pants.jpg') }}" class="w-full h-full object-cover" />
                </x-slot:image>
                <x-slot:details>
                    <h4 class="font-semibold">Couquette Ribbon Jeans</h4>
                    <p>Quantity : 1</p>
                    <p>Size : S</p>
                    <p class="font-semibold mt-1">Rp1.450.000,00</p>
                </x-slot:details>
            </x-cart.cart-item>
        </div>

        {{-- Summary Section --}}
        <div class="w-full md:w-1/3 space-y-6">
            <h3 class="text-xl font-semibold">Order Summary</h3>
            <input type="text" placeholder="Enter coupon code here"
                class="w-full border border-[#5B2333] px-4 py-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-[#5B2333]">
            <div class="space-y-2 text-gray-800">
                <div class="flex justify-between border-b pb-1">
                    <span>Subtotal</span>
                    <span>Rp2.900.000,00</span>
                </div>
                <div class="flex justify-between border-b pb-1">
                    <span>Shipping</span>
                    <span class="text-sm text-gray-500">Calculate at the next step</span>
                </div>
                <div class="flex justify-between font-bold pt-2">
                    <span>Total</span>
                    <span>Rp2.900.000,00</span>
                </div>
            </div>
            <button class="w-full bg-[#5B2333] text-white font-semibold py-3 hover:bg-[#D7426C] transition">
                Continue to checkout
            </button>
        </div>
    </div>
</x-layout>