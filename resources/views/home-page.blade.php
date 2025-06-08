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

    <div>
        <p class="text-primary-2 ">What Are We?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores dicta doloremque earum possimus consequuntur laborum, eum odit suscipit beatae, error, fugit a nostrum molestias eius sapiente veniam incidunt odio repudiandae.</p>
    </div>
</x-layout>