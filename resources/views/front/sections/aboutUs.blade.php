<section data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500" class="container md:py-[70px] py-11">
    <div class="container grid items-center justify-center gap-10 md:justify-between md:grid-cols-2 text-start">
        <div class="relative about-left">
            <img src="{{ asset('image/medical-supplies (2).svg') }}" class="w-full rounded-md" alt="" />

            <div class="trust-circle">
                <p class="leading-7 uppercase">
                    Trusted By <br /><span class="font-bold text-3xl md:text-[40px]">50k+</span>
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-4 right-side">
            <h2 class="text-5xl mob:text-2xl font-bold text-[#0c1a33]">
                Your Trusted Medical Supplies Partner
            </h2>

            <h3 class="text-xl mob:text-sm text-teal-800">
                Serving Healthcare Since 2005
            </h3>

            <p class="text-[#626A77]">
                We provide high-quality medical equipment and supplies to healthcare
                professionals and individuals worldwide. Our commitment is to deliver
                reliable products with exceptional customer service and fast delivery.
            </p>

            <a href="tel:0800 123 4567" class="text-xl mob:text-sm text-teal-800">
                Call Us: 0800 123 4567
            </a>

            <a href="{{ route('product.index') }}"
                class="px-8 py-3 w-52 font-bold text-center text-white bg-teal-500 border-2 border-white rounded-full hover:bg-white transition-colors hover:border-teal-600 hover:text-teal-800">
                Shop Now
            </a>
        </div>
    </div>
</section>
