<x-layout>
    <div class="max-w-xl mx-auto py-12">
        <h2 class="text-2xl font-bold mb-6 text-[#5B2333]">Edit Profile</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold text-sm mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border px-3 py-2 rounded">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold text-sm mb-1">Phone Number</label>
                <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" class="w-full border px-3 py-2 rounded">
                @error('phone_number')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold text-sm mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border px-3 py-2 rounded">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('profile.show') }}" class="text-[#5B2333] text-sm hover:font-bold">← Back to Profile</a>
                <button type="submit" class="bg-[#5B2333] text-white px-6 py-2 rounded hover:bg-[#411726]">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-layout>
