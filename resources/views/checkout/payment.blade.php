<x-layout>
    <div class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Form Pembayaran --}}
        <div>
            <h2 class="text-2xl font-bold mb-6">Checkout</h2>

            <div class="flex items-center gap-4 border-b pb-2 mb-6">
                <span class="font-medium text-gray-700">Shipping</span>
                <span class="w-6 h-0.5 bg-gray-500"></span>
                <span class="font-semibold text-black border-b-2 border-black">Payment</span>
            </div>

            {{-- Form proses pembayaran --}}
            <form action="{{ route('checkout.payment.process') }}" method="POST" class="space-y-6">
                @csrf
               
                <input type="hidden" name="shipping_method" value="{{ $shippingMethod }}">
                <input type="hidden" name="shipping_cost" value="{{ $shippingCost }}">
                <input type="hidden" name="total" value="{{ $total }}">


                {{-- Metode Pembayaran --}}
                <x-payment-method />

                {{-- Rincian Pembayaran --}}
                <div class="space-y-4">
                    <p class="font-semibold text-lg">Payment Details</p>

        
                    <div class="flex justify-between text-sm">

                    {{-- Count the total --}}
                    @php
                    $subtotal = 0;
                    foreach ($cartItems as $item) {
                    $subtotal += $item->product->price * $item->cart_quantity;
                    }
                    @endphp

                    <span>Subtotal for Product</span>
                    <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>

                    <div class="flex justify-between text-sm">
                        <span>Subtotal for Shipping</span>
                        <span>Rp{{ number_format($shippingCost, 0, ',', '.') }}</span>
                    </div>

                    <hr class="my-2 border-gray-300">

                    <div class="flex justify-between font-bold text-base">
                        {{-- Hitung total Produk --}}
                        @php
                            $subtotal = 0;
                            foreach ($cartItems as $item) {
                                $subtotal += $item->product->price * $item->cart_quantity;
                            }

                            // Hitung total plus ongkir
                            $total = $subtotal + $shippingCost;
                        @endphp
                        <span>Total</span>
                        <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- button bayar --}}

                <button type="submit" class="w-full bg-[#501A2E] text-white font-semibold py-3 rounded-md hover:bg-[#3e1525] transition">
                    Pay Now
                </button>
            </form>
        </div>

        {{-- your cart --}}
        <div class="bg-white rounded-xl p-6 shadow">
            <h3 class="text-lg font-semibold mb-4">Your Cart</h3>
            @foreach($cartItems as $item)
                <x-cart.cart-item :item="$item">
                    <x-slot:image>
                        <img src="{{ asset('assets/product/' . $item->product->img_url) }}" class="w-full h-full object-cover" />
                    </x-slot:image>
                    <x-slot:details>
                        <h4 class="font-semibold">{{ $item->product->name }}</h4>
                        <p>Quantity: {{ $item->quantity }}</p>
                        <p>Size: {{ $item->product->size }}</p>
                        <p class="font-semibold mt-1">Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                    </x-slot:details>
                </x-cart.cart-item>
            @endforeach
        </div>
    </div>
</x-layout>
