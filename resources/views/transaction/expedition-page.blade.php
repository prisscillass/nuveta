<x-layout>
    <div class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Bagian Shipping --}}
        <div>
            <h2 class="text-2xl font-bold mb-6">Checkout</h2>

            {{-- Step indicator --}}
            <div class="flex items-center gap-4 border-b pb-2 mb-6">
                <span class="font-semibold text-black border-b-2 border-black">Shipping</span>
                <span class="w-6 h-0.5 bg-gray-500"></span>
                <span class="text-gray-600">Payment</span>
            </div>

            <form action="{{ route('transaction.expedition') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-4">
                    @php
                        $shippingOptions = [
                            'anteraja' => ['label' => 'Anteraja', 'price' => 35000],
                            'sicepat' => ['label' => 'SiCepat Express', 'price' => 40000],
                            'lionparcel' => ['label' => 'LionParcel', 'price' => 30000],
                        ];
                    @endphp

                    @foreach($shippingOptions as $key => $option)
                        <label class="block border rounded-lg p-4 cursor-pointer hover:border-[#501A2E]">
                            <div class="flex items-start gap-4">
                                <input type="radio" name="expedition" value="{{ $key }}" class="mt-1 accent-[#501A2E] w-5 h-5" required>
                                <div>
                                    <div class="font-bold text-lg">{{ $option['label'] }}</div>
                                    <div class="text-sm text-gray-500">3-5 Business Days</div>
                                    <div class="text-sm text-gray-700">Rp{{ number_format($option['price'], 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>

                <button type="submit" class="w-full bg-[#501A2E] text-white py-2 rounded hover:bg-[#3e1525] transition">
                    Continue to payment
                </button>
            </form>
        </div>

        {{-- Ringkasan Cart --}}
        <div class="bg-white rounded-xl p-6 shadow">
            <h3 class="text-lg font-semibold mb-4">Your items to be checkouted</h3>

        @forelse ($checkoutedItems as $item)
            <x-cart.cart-item :item="$item" />
        @empty
            <p class="text-primary-2 text-xl font-semibold my-12 w-full text-center">
                There's no item.
            </p>
        @endforelse
        </div>
    </div>
</x-layout>
