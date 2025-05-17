<section class="relative mob:pb-7">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            @php
                $defaultImage = asset('image/default.png');
            @endphp

            <!-- Slide 1 -->
            <div class="flex flex-col items-center justify-center h-screen m-auto bg-center mob:h-[80vh] bg-cover swiper-slide"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('image/hero-slide1.jpg') }}');">
                <div class="container text-center text-white mob:w-3/4 md:w-1/2">
                    <h5 class="mb-5 text-lg tracking-wider uppercase">Premium Health Supplies</h5>
                    <h2 class="text-6xl font-bold mob:text-2xl mb-9">Your Trusted Source for Medical Products</h2>
                    <a href="/shop" class="flex items-center justify-center">
                        <button
                            class="px-10 py-3 font-bold text-white border-2 border-white rounded-full hover:bg-teal-600 hover:border-teal-600 transition-colors">
                            Shop Now
                        </button>
                    </a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="flex flex-col items-center justify-center h-screen m-auto bg-center mob:h-[80vh] bg-cover swiper-slide"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('image/hero-slide2.jpg') }}');">
                <div class="container text-center text-white mob:w-3/4 md:w-1/2">
                    <h5 class="mb-5 text-lg tracking-wider uppercase">Fast & Secure Delivery</h5>
                    <h2 class="text-6xl font-bold mob:text-2xl mb-9">Get Medical Essentials at Your Doorstep</h2>
                    <a href="/delivery-info" class="flex items-center justify-center">
                        <button
                            class="px-10 py-3 font-bold text-white border-2 border-white rounded-full hover:bg-teal-600 hover:border-teal-600 transition-colors">
                            Learn More
                        </button>
                    </a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="flex flex-col items-center justify-center h-screen m-auto bg-center mob:h-[80vh] bg-cover swiper-slide"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('image/hero-slide3.jpg') }}');">
                <div class="container text-center text-white mob:w-3/4 md:w-1/2">
                    <h5 class="mb-5 text-lg tracking-wider uppercase">Trusted by Professionals</h5>
                    <h2 class="text-6xl font-bold mob:text-2xl mb-9">Shop Medical Equipment with Confidence</h2>
                    <a href="/contact" class="flex items-center justify-center">
                        <button
                            class="px-10 py-3 font-bold text-white border-2 border-white rounded-full hover:bg-teal-600 hover:border-teal-600 transition-colors">
                            Contact Us
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="md:swiper-button-next"></div>
        <div class="md:swiper-button-prev"></div>
    </div>
</section>
