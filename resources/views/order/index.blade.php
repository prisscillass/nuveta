<x-layout>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-xl font-semibold text-[#501A2E] mb-6">My Orders</h1>

        {{-- Tampilkan pesan sukses di bagian atas --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Filter --}}
        <form method="GET" action="{{ route('order.index') }}" class="flex items-center justify-between mb-6 flex-wrap gap-4">
            @php
                $statusOptions = ['all' => 'All', 'in progress' => 'In Progress', 'delivered' => 'Delivered', 'cancelled' => 'Cancelled'];
                $currentStatus = request('status', 'all');
            @endphp

            <div class="flex gap-3 flex-wrap">
                @foreach ($statusOptions as $key => $label)
                    <a href="{{ route('order.index', ['status' => $key]) }}"
                       class="px-4 py-1 rounded-full border text-sm transition-all
                              {{ $currentStatus === $key 
                                 ? 'bg-[#501A2E] text-white' 
                                 : 'text-[#501A2E] border-[#501A2E] hover:bg-[#f2e8ec]' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            {{-- Date Range --}}
            <div class="flex items-center gap-2">
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                       class="border px-3 py-1 rounded-md text-sm">
                <span class="text-gray-500">to</span>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                       class="border px-3 py-1 rounded-md text-sm">
                <button type="submit" class="ml-2 bg-[#501A2E] text-white px-3 py-1 rounded-md text-sm">Filter</button>
            </div>
        </form>

        {{-- Order List --}}
        <div class="space-y-4 text-sm">
            @if($orders->count())
                <p class="text-sm text-gray-500 mb-4">Showing {{ $orders->count() }} orders</p>
                
                @foreach ($orders as $orderGroup)
                <div class="border rounded-lg mb-6">
                    <div class="bg-gray-50 p-4 border-b">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-xs px-2 py-1 rounded-full font-medium
                                    {{ $orderGroup['status'] === 'in progress' ? 'bg-yellow-100 text-yellow-700' : 
                                       ($orderGroup['status'] === 'delivered' ? 'bg-green-100 text-green-700' : 
                                       ($orderGroup['status'] === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700')) }}">
                                    {{ ucfirst($orderGroup['status']) }}
                                </span>
                                <span class="text-gray-500 text-sm ml-2">
                                    {{ $orderGroup['date']->format('d M Y H:i') }}
                                </span>
                            </div>
                            <div class="text-sm">
                                Shipping: {{ strtoupper($orderGroup['expedition']) }}
                            </div>
                        </div>
                    </div>

                    <div class="p-4">
                       @foreach ($orderGroup['items'] as $item)
                            <div class="flex justify-between py-3 border-b last:border-0">
                                <div>
                                    <p class="font-medium">{{ $item->product->name }}</p>
                                    <p class="text-sm text-gray-600">
                                        {{ $item->quantity }} x Rp{{ number_format($item->product->price, 0) }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p>Rp{{ number_format($item->product->price * $item->quantity, 0) }}</p>
                                </div>
                            </div>
                        @endforeach

                        <div class="flex justify-between pt-4 font-bold">
                            <span>Total</span>
                            <span>Rp{{ number_format($orderGroup['total'] + $item->product->price , 0) }}</span>
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