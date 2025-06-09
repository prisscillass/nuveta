<x-layout>
    {{-- carousel --}}
    <div class="w-full max-w-screen-xl m-auto">
        <x-carousel />
    </div>
    
    <div class="max-w-screen-xl m-auto mt-16 flex flex-col justify-center items-center gap-4">
        <p class="text-primary-2 text-2xl font-semibold">CATEGORIES</p>
        <div class="border border-primary-2 w-full h-20 rounded-2xl">
            <div class="flex justify-center items-center h-full m-auto gap-6 gap-x-8 text-xl">
                <a href="/?category=shirts"
                class="flex justify-center items-center w-28 h-12 text-primary-2 hover:bg-primary-2 hover:text-white rounded-xl transition duration-300">
                    Shirts
                </a>
                <a href="/?category=pants"
                class="flex justify-center items-center w-28 h-12 text-primary-2 hover:bg-primary-2 hover:text-white rounded-xl transition duration-300">
                    Pants
                </a>
                <a href="/?category=skincare"
                class="flex justify-center items-center w-28 h-12 text-primary-2 hover:bg-primary-2 hover:text-white rounded-xl transition duration-300">
                    Skincare
                </a>
                <a href="/?category=shoes"
                class="flex justify-center items-center w-28 h-12 text-primary-2 hover:bg-primary-2 hover:text-white rounded-xl transition duration-300">
                    Shoes
                </a>
                <a href="/?category=bags"
                class="flex justify-center items-center w-28 h-12 text-primary-2 hover:bg-primary-2 hover:text-white rounded-xl transition duration-300">
                    Bags
                </a>
            </div>

        </div>
    </div>

    <div class="max-w-screen-xl m-auto mt-16 flex flex-col justify-center items-center gap-4">
        <p class="text-primary-2 text-2xl font-semibold" id="our-products">OUR PRODUCTS</p>

        {{-- cart items --}}
        <div class="flex justify-between items-center w-full">
            @forelse ($products as $product)
                <x-card.item-card :data="$product"/>
            @empty
                <p class="text-primary-2 text-xl font-semibold my-12 w-full text-center">No Result Found.</p>
            @endforelse
        </div>
    </div>

    <div class="flex gap-12 max-w-screen-xl m-auto my-10 mt-20">
        <img src="assets/page-photo.jpeg" alt="about-us" class="w-[350px] rounded-xl">
        <div class="flex flex-col justify-center text-justify text-primary-2 ">
            <p class="font-semibold text-3xl">What Are We?</p>
            <p class="text-xl italic text-sm/7">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>


</div>
</x-layout>