@extends('front.layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container pt-6">
        <div class="flex items-center justify-start gap-4 mt-10 mb-7 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors cursor-pointer">Home</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="{{ route('product.index') }}" class="hover:text-primary transition-colors cursor-pointer">
                <span>All Courses</span>
            </a>
        </div>

        <div class="flex flex-wrap justify-between gap-8 mb-10">
            <div class="flex-1 min-w-[250px]">
                <h1 class="text-4xl font-bold mob:text-3xl mb-8">All Products</h1>

                <div class="container grid mob:grid-cols-1 mintab:grid-cols-2 grid-cols-3 gap-6 mb-10">
                    @foreach ($products as $product)
                        <div
                            class="border rounded-md mb-5 group hover:shadow-lg border-gray-300 overflow-hidden flex flex-col bg-white transition-shadow duration-300">
                            <a href="{{ route('product.show', $product->slug) }}" class="block overflow-hidden relative">
                                <img class="w-full object-cover max-h-[285px] h-[285px] transition-transform group-hover:scale-105"
                                    src="{{ $product->image }}" alt="{{ $product->name }}" />
                                <div
                                    class="absolute top-3 left-3 bg-teal-600 text-white px-3 py-1 rounded text-sm font-semibold shadow-md select-none">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </div>
                            </a>

                            <div class="px-5 py-4 flex flex-col flex-grow">
                                <a href="{{ route('product.show', $product->slug) }}" class="block mb-2">
                                    <h2
                                        class="text-xl font-semibold hover:text-primary  line-clamp-2 transition-colors duration-200">
                                        {{ $product->name }}
                                    </h2>
                                </a>

                                <p class="text-gray-600 mb-5 flex-grow line-clamp-3">
                                    {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                                </p>

                                <div class="flex items-center justify-between border-t pt-3">
                                    <span class="text-xl font-bold text-gray-900">£{{ $product->price }}</span>
                                    <a href="{{ route('product.show', $product->slug) }}"
                                        class="font-medium rounded px-4 py-2 bg-primary text-white hover:bg-teal-700 transition">
                                        Read more
                                    </a>
                                </div>

                                @if (isset($cart[$product->id]))
                                    <button class="mt-4 w-full bg-gray-500 text-white px-4 py-2 rounded cursor-not-allowed"
                                        disabled>
                                        Already in Cart
                                    </button>
                                @else
                                    @php
                                        $isInCart = in_array($product->id, $cartProductIds ?? []);
                                    @endphp
                                    <form class="add-to-cart-form mt-4" data-id="{{ $product->id }}">
                                        @csrf
                                        <button type="submit"
                                            class="w-full px-4 py-2 text-white rounded transition
                                            {{ $isInCart ? 'bg-gray-400 cursor-not-allowed' : 'bg-primary hover:bg-primary/80' }}"
                                            {{ $isInCart ? 'disabled' : '' }}>
                                            {{ $isInCart ? 'Added to Cart' : 'Add to Cart' }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>



    <div class="container flex flex-wrap items-center justify-center gap-2 text-[#626A77] mb-10">
        @for ($page = 1; $page <= $products->lastPage(); $page++)
            <a href="{{ $products->url($page) }}"
                class="footer-icon border w-[50px] h-[50px] flex items-center justify-center rounded-full
                {{ $page == $products->currentPage() ? 'bg-teal-500 text-white' : 'hover:bg-blue-100' }}">
                {{ $page }}
            </a>
        @endfor

        @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}"
                class="border w-[50px] h-[50px] flex items-center justify-center rounded-full hover:bg-blue-100">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        @else
            <span
                class="border w-[50px] h-[50px] flex items-center justify-center text-gray-400 cursor-not-allowed rounded-full">
                <i class="fa-solid fa-arrow-right"></i>
            </span>
        @endif
    </div>





@endsection
