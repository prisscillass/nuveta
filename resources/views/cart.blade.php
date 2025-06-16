<x-layout>
    <div class="max-w-6xl mx-auto py-12 px-4 md:px-0 flex flex-col md:flex-row gap-8 bg-[#faf7f6]">
        {{-- Cart Items Section --}}
        <div class="w-full md:w-2/3 space-y-6">
            <h2 class="text-2xl font-bold">Your Cart</h2>
            <p class="text-gray-600">Unready to checkout? <a href="{{ route('home') }}" class="underline text-[#5B2333]">Continue Shopping</a></p>

            @forelse ($cartItems as $item)
                <x-cart.cart-item :item="$item" />
                {{-- @dd($item->product->img_url) --}}
            @empty
                <p class="text-primary-2 text-xl font-semibold my-12 w-full text-center">There's No Item In Your Cart.</p>
            @endforelse
            {{-- Summary Section --}}
        </div>

        {{-- Summary Section --}}
        <div class="w-full md:w-1/3 space-y-6">
            <h3 class="text-xl font-semibold">Order Summary</h3>
            </button>
            <div class="space-y-2 text-gray-800">
                <div class="flex justify-between border-b pb-1">
                    <span>Shipping</span>
                    <span class="text-sm text-gray-500">Calculate at the next step</span>
                </div>
                <div class="flex justify-between font-bold pt-2">

                    {{-- Count the total --}}
                    @php
                        $subtotal = 0;
                        foreach ($cartItems as $item) {
                            $subtotal += $item->product->price * $item->cart_quantity;
                        }
                    @endphp

                    <span>Total</span>
                    <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
            </div>
            
           <form action="{{ route('transaction.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="cart_id" value="{{ $cart->id ?? '' }}">

                {{-- mengirim semua item di cart buat di transaksinya --}}
                @foreach ($cartItems as $index => $item)
                    <input type="hidden" name="items[{{ $index }}][cart_id]" value="{{ $item->cart_id }}">
                    <input type="hidden" name="items[{{ $index }}][product_id]" value="{{ $item->product->id }}">
                    <input type="hidden" name="items[{{ $index }}][buyqty]" value="{{ $item->cart_quantity }}">
                @endforeach

                <button type="submit"
                    class="block w-full text-center bg-primary-2 text-white font-semibold py-3 rounded-md hover:bg-[#D7426C] transition">
                    Continue to checkout
                </button>
            </form>


        </div>
    </div>
    </div>
</x-layout>