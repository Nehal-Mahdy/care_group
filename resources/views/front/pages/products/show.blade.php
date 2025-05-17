@extends('front.layouts.app')

@section('title', $product->name)
@section('meta')
    <meta name="description" content="{{ $product->name }}">
    <meta name="keywords" content="{{ $product->name }}">
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:description" content="{{ $product->name }}" />
    <meta property="og:image" content="{{ asset($product->image) }}" />
    <meta property="og:url" content="{{ route('product.show', $product->slug) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta name="twitter:title" content="{{ $product->name }}" />
    <meta name="twitter:description" content="{{ $product->name }}" />
    <meta name="twitter:image" content="{{ asset($product->image) }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{{ config('app.name') }}" />
    <meta name="twitter:creator" content="{{ config('app.name') }}" />
    <meta name="twitter:url" content="{{ route('product.show', $product->slug) }}" />
@endsection
@section('content')

    <div class="container  mt-5 text-sm mb-7">
        <div class="flex flex-wrap items-center justify-start gap-4 mt-4 mob:gap-1 mb-7">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors cursor-pointer">Home</a>
            <a href="#"><i class="fa-solid fa-chevron-right"></i>
                <a href="{{ route('product.index') }}" class="hover:text-primary transition-colors cursor-pointer">
                    <span> All Products </span>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>{{ $product->name }}</span>
        </div>
    </div>

    <section class=" bg-gray-600 pt-7 pb-5">
        <div class="container">
            <div class="flex flex-wrap justify-between w-1/2 mb-5 text-white mb">

                <div class="flex items-center">
                    <span class="text-4xl font-light mob:text-3xl text-primary"><i
                            class="fa-regular fa-bookmark"></i></span>
                    <div class="flex flex-col pl-1 ml-3">
                        <a href="#"
                            class="text-sm transition-colors hover:text-primary ">{{ $product->category->name }}</a>
                    </div>
                </div>
            </div>
            <div class="w-3/4 mintab:w-1/2 mob:w-full">
                <h1 class="pb-6 mb-6 text-4xl font-bold text-white border-b">{{ $product->name }}</h1>
            </div>

        </div>
    </section>

    <section class="container grid grid-cols-3 gap-10 mintab:grid-cols-2 mob:gap-0 mob:grid-cols-1">
        <div class="col-span-2 py-16 min">
            <div class="mb-10">
                <div class="bg-[#f1f2f7] flex justify-around">
                    <label onclick="showContent('Description-content', this)"
                        class="px-3 py-[18px] w-full text-center border-primary font-bold transition cursor-pointer tab bg-white border-t-4">
                        Description
                    </label>

                    <label onclick="showContent('Category-content', this)"
                        class="px-3 py-[18px] w-full text-center border-primary font-bold transition cursor-pointer tab">Category</label>
                </div>
            </div>

            <div id="Description-content" class="content bg-white border-t-4">
                <div class="text-[#626A77] text-start pt-7">
                    <p class="mb-4">{{ $product->description }}</p>

                </div>
            </div>

            <div id="Category-content" class="content hidden">
                <div class="text-[#626A77] text-start pt-7">
                    <span class="mb-4">category name:</span>
                    <p class="mb-4">{{ $product->category->name }}</p>
                    <span class="mb-4">category Description:</span>
                    <p class="mb-4">{{ $product->category->description }}</p>

                </div>
            </div>



        </div>

        <div class="col-span-1 md:z-10 md:relative md:bottom-40 mintab:z-10 mintab:relative mintab:bottom-40">
            <div class="bg-white shadow-lg">
                <img src="{{ $product->image }}" class="w-full" alt="{{ $product->name }}" />
                <div class="flex flex-col items-center justify-center p-5">
                    <span class="text-center mb-[10px] text-xl text-primary font-medium">£{{ $product->price }}</span>
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
        </div>
    </section>

@endsection
