<section data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500"
    class="container Popular Courses py-[70px] mob:py-12 bg-[#f6f7fb]">

    <div class="flex items-center justify-center">
        <div class="text-center tittle">
            <h2 class="font-bold text-[40px] mob:text-2xl text-[#0b1c36]">
                Innovative <br />
                Medical Solutions
            </h2>
            <p class="py-3 mb-16 text-[#8f9297] max-w-lg mob:text-sm">
                Explore our range of high-quality medical products designed to support professionals and improve patient
                care.
            </p>
        </div>
    </div>

    <div class="relative">
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                @foreach ($products as $product)
                    <div
                        class="transition-all duration-500 bg-white rounded-xl shadow hover:shadow-xl swiper-slide popular-courses relative group">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                class="w-full h-[270px] object-cover rounded-t-xl" />
                        </a>

                        <div class="p-5 space-y-4">
                            <!-- Price -->
                            <div class="flex items-center justify-between">
                                <span class="px-4 py-1 text-sm font-semibold text-white bg-primary rounded-full">
                                    {{ $product->price }} $
                                </span>
                            </div>

                            <!-- Name -->
                            <a href="{{ route('product.show', $product->slug) }}">
                                <h4 class="text-lg font-semibold text-[#0b1c36] hover:text-primary ">
                                    {{ $product->name }}
                                </h4>
                            </a>

                            <!-- Description -->
                            <div class="text-sm text-gray-600">
                                <p>{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                            </div>

                            <!-- Category -->
                            <div class="text-sm text-gray-500">
                                <i class="pr-2 text-primary fa-solid fa-tag"></i>
                                {{ $product->category->name }}
                            </div>

                            <!-- Add to Cart -->
                            @php
                                $isInCart = in_array($product->id, $cartProductIds ?? []);
                            @endphp

                            <form class="add-to-cart-form" data-id="{{ $product->id }}">
                                @csrf
                                <button type="submit"
                                    class="w-full px-4 py-2 mt-3 text-white transition rounded
            {{ $isInCart ? 'bg-gray-400 cursor-not-allowed' : 'bg-primary hover:bg-primary/80' }}"
                                    {{ $isInCart ? 'disabled' : '' }}>
                                    {{ $isInCart ? 'Added to Cart' : 'Add to Cart' }}
                                </button>
                            </form>


                        </div>
                    </div>
                @endforeach
            </div>
            <div class="relative pt-5 swiper-pagination top-12"></div>
        </div>
    </div>
</section>
