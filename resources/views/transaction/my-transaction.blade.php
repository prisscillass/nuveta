<x-layout>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-xl font-semibold text-[#501A2E] mb-6">My Orders</h1>

        {{-- Tampilkan pesan sukses di bagian atas --}}
        {{-- @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif --}}

        {{-- Filter --}}
        {{-- <form method="GET" action="{{ route('transaction.index') }}" class="flex items-center justify-between mb-6 flex-wrap gap-4"> --}}
            {{-- @php
                $statusOptions = ['all' => 'All', 'in progress' => 'In Progress', 'delivered' => 'Delivered', 'cancelled' => 'Cancelled'];
                $currentStatus = request('status', 'all');
            @endphp

            <div class="flex gap-3 flex-wrap">
                @foreach ($statusOptions as $key => $label)
                    <a href="{{ route('transaction.index', ['status' => $key]) }}"
                       class="px-4 py-1 rounded-full border text-sm transition-all
                              {{ $currentStatus === $key 
                                 ? 'bg-[#501A2E] text-white' 
                                 : 'text-[#501A2E] border-[#501A2E] hover:bg-[#f2e8ec]' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div> --}}

            {{-- Date Range --}}
            {{-- <div class="flex items-center gap-2">
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                       class="border px-3 py-1 rounded-md text-sm">
                <span class="text-gray-500">to</span>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                       class="border px-3 py-1 rounded-md text-sm">
                <button type="submit" class="ml-2 bg-[#501A2E] text-white px-3 py-1 rounded-md text-sm">Filter</button>
            </div>
        </form> --}}

        {{-- Order List --}}
        <div class="space-y-4 text-sm">
            @if(count($transactions))
                <p class="text-sm text-gray-500 mb-4">Showing {{ $transactions->count() }} orders</p>
                @foreach ($transactions as $transaction)
                    @php
                        $transactionItems = $transaction->transactionItem;
                        $totalPrice = 0;
                    @endphp

                    <div class="border rounded-lg mb-6">
                        <div class="bg-gray-50 p-4 border-b">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-500 text-sm ml-2">
                                        {{ $transaction->created_at->format('d M Y H:i') }}
                                    </span>
                                </div>
                                <div class="text-sm">
                                    Shipping: {{ strtoupper($transaction->expedition) }}
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            @foreach ($transactionItems as $item)
                                <div class="flex justify-between py-3 border-b last:border-0">
                                    <div>
                                        <p class="font-medium">{{ $item->product->name }}</p>
                                        <p class="text-sm text-gray-600">
                                            {{ $item->transaction_quantity }} x Rp{{ number_format($item->product->price, 0) }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        @php
                                            $total = $item->product->price * $item->transaction_quantity;
                                            $totalPrice += $total;
                                        @endphp
                                        <p>Rp{{ number_format($total, 0) }}</p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="flex justify-between pt-4 font-bold">
                                <span>Total</span>
                                {{-- @dd($item);
                                @php
                                    $totalAll = $item->product->price * $item->transaction_quantity;
                                @endphp --}}
                                <span>Rp{{ number_format($transaction->total, 0) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-500">No orders found.</p>
            @endif
        </div>
    </div>
</x-layout>