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
            <x-card.item-card :product="$product" />
            @empty
            <p class="text-primary-2 text-xl font-semibold my-12 w-full text-center">No Result Found.</p>
            @endforelse
        </div>
    </div>

    <div class="max-w-6xl mx-auto my-20 px-4 flex gap-4 items-start">
        <img src="assets/page-photo.jpeg" alt="about-us" class="w-[250px] rounded-lg shadow-md">
        <div class="text-primary-2 text-justify">
            <h2 class="text-3xl font-semibold mb-4">What Are We?</h2>
            <p class="text-base leading-relaxed italic">
                We are an e-commerce platform thoughtfully created to empower women in discovering rare, stylish, and high-quality fashion items that are often hard to find elsewhere. Our collection consists of handpicked pieces that are either brand new or in pristine, like-new condition—each one carefully selected to ensure that it meets both modern fashion trends and timeless style.
                <br>
                At the heart of our brand is a passion for making exclusive fashion more accessible. We understand that looking great shouldn't come with a high price tag. That’s why we focus on offering these unique finds at more affordable prices, without compromising on quality, authenticity, or aesthetic appeal. Whether you're searching for a standout item to complete your wardrobe or simply exploring new styles, our platform is designed to make your shopping experience easy, enjoyable, and rewarding.
                <br>
                Our mission goes beyond just selling clothes—we aim to create a curated fashion destination that celebrates individuality, sustainability, and affordability. With every product we feature, we strive to help you express your style while making smarter, more conscious fashion choices.
            </p>
        </div>
    </div>
    </div>
</x-layout>