<!-- resources/views/profile/show.blade.php -->
<x-layout>
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('assets/profile-photo.svg') }}')">

        <div class="w-full max-w-3xl px-6">
            <h1 class="text-3xl font-semibold text-center text-[#5B2333] mb-6">Halo, {{ $user->name }}!</h1>

            <div class="bg-white/90 backdrop-blur-md border border-[#5B2333] shadow-md p-8 w-full rounded-md">
                <div class="border border-[#5B2333] p-6 rounded">
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <label class="w-1/3 italic text-sm text-gray-800">Name</label>
                            <input type="text" readonly class="w-2/3 border px-3 py-1 text-sm" value="{{ $user->name }}">
                        </div>
                        <div class="flex items-center">
                            <label class="w-1/3 italic text-sm text-gray-800">Phone Number</label>
                            <input type="text" readonly class="w-2/3 border px-3 py-1 text-sm" value="{{ $user->phone_number }}">
                        </div>
                        <div class="flex items-center">
                            <label class="w-1/3 italic text-sm text-gray-800">Email</label>
                            <input type="text" readonly class="w-2/3 border px-3 py-1 text-sm" value="{{ $user->email }}">
                        </div>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('profile.edit') }}"
                        class="bg-[#5B2333] text-white px-8 py-2 rounded hover:bg-[#411726] transition text-sm">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
