@extends('front.layouts.app')

@section('title', 'Thank You')

@section('content')

    <body class="font-poppins">
        <header class=" bg-gray-600 py-48 bg-top bg-cover" style="background-image: url({{ asset('image/confirmed.svg') }});">
            <h2 class="pt-8 md:text-2xl text-lg font-semibold text-center text-white">
                Thank you! Your order has been successfully confirmed
            </h2>
        </header>

        <section class="container relative z-10 bg-white border shadow-xl px-14 mob:px-7 py-14 rounded-xl bottom-40">
            <div class="text-center text-9xl text-primary mb-9">
                <i class="fa-regular fa-circle-check fa-beat"></i>
            </div>


            <div class="flex flex-col gap-5 mt-6">
                <h5 class="text-xl font-bold text-primary">Order Summary</h5>

                <div class="flex justify-between px-4">
                    <h5 class="font-semibold">Order Number:</h5>
                    <span class="text-slate-600">{{ $order->order_number }}</span>
                </div>

                <div class="flex justify-between px-4">
                    <h5 class="font-semibold">Order Date:</h5>
                    <span class="text-slate-600">{{ $order->created_at->format('l, F j, Y (T)') }}</span>
                </div>

                <div class="flex justify-between px-4">
                    <h5 class="font-semibold">Payment Method:</h5>
                    <span class="text-slate-600">{{ $order->payment_method ?? 'N/A' }}</span>
                </div>
            </div>

            <div class="flex flex-col gap-5 mt-10">
                <h5 class="text-xl font-bold text-primary">Order Items</h5>

                @foreach ($order->products as $product)
                    <div class="flex justify-between items-center px-4 border-b py-3">
                        <div class="flex items-center gap-4">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-14 w-14 rounded-md" />
                            <div>
                                <h5 class="font-semibold">{{ $product->name }}</h5>
                                <p class="text-sm text-gray-500">Quantity: {{ $product->pivot->quantity }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <h5 class="font-semibold text-gray-700">£{{ number_format($product->pivot->total, 2) }}</h5>
                            <p class="text-sm text-gray-400">£{{ $product->pivot->price }} x
                                {{ $product->pivot->quantity }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 px-4 border-t pt-6">
                <div class="flex justify-between mb-2">
                    <span>Subtotal:</span>
                    <span>£{{ number_format($order->total_price, 2) }}</span>
                </div>

                @if ($order->discount)
                    <div class="flex justify-between text-red-600 mb-2">
                        <span>Discount:</span>
                        <span>-£{{ number_format($order->discount, 2) }}</span>
                    </div>
                @endif

                <div class="flex justify-between font-bold text-primary text-lg">
                    <span>Total:</span>
                    <span>
                        £{{ number_format($order->total_price - ($order->discount ?? 0), 2) }}
                    </span>
                </div>
            </div>

            <div class="flex justify-center mt-8">
                <a href="{{ route('product.index') }}"
                    class="bg-primary text-center text-white w-1/2 mob:w-full text-base font-medium rounded-xl py-2 px-5 hover:bg-teal-700 transition-colors border border-primary">
                    Continue shopping
                </a>
            </div>
        </section>
    </body>
@endsection
