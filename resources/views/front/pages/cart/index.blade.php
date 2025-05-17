@extends('front.layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <!--**************** start  **************** -->
    <div class="container  my-5 text-sm ">
        <div class="flex flex-wrap items-center justify-start gap-4 mt-4 mob:gap-1">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors cursor-pointer">
                Home
            </a>
            <a href="{{ route('cart.index') }}"><i class="fa-solid fa-chevron-right"></i>
                <span class="hover:text-primary transition-colors cursor-pointer">
                    cart
                </span></a>
        </div>
    </div>

    <!-- hero -->

    <section>
        <div class="flex flex-col items-center justify-center h-[60vh] m-auto bg-center bg-cover"
            style="
          background-image: linear-gradient(
              rgba(0, 0, 0, 0.5),
              rgba(0, 0, 0, 0.5)
            ),
            url({{ asset('image/hero-slide1.jpg') }});
        ">
            <div class="container w-3/4 text-center text-white mob:w-full">
                <h2 class="text-4xl font-semibold mob:text-2xl">
                    Shopping Cart
                </h2>


            </div>
        </div>
    </section>
    <div class="max-w-4xl mx-auto p-6">
        {{-- <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1> --}}

        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (count($cart) > 0)
            <div class="space-y-4">
                @php $total = 0; @endphp
                @foreach ($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                        <div class="flex items-center gap-4">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                class="w-20 h-20 object-cover rounded">
                            <div>
                                <h4 class="font-bold">{{ $item['name'] }}</h4>
                                <div class="flex items-center space-x-2">
                                    <button class="qty-btn px-2 py-1 bg-gray-200 rounded hover:bg-gray-300"
                                        data-id="{{ $id }}" data-action="decrease"
                                        {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>−</button>

                                    <span id="qty-{{ $id }}">{{ $item['quantity'] }}</span>

                                    <button class="qty-btn px-2 py-1 bg-gray-200 rounded hover:bg-gray-300"
                                        data-id="{{ $id }}" data-action="increase">+</button>

                                    <span class="ml-2">× ${{ $item['price'] }}</span>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            <button class="text-red-600 hover:underline">Remove</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 text-right">
                <h3 class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</h3>
                <form action="{{ route('cart.clear') }}" method="POST" class="inline-block mt-2">
                    @csrf
                    <button class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Clear Cart</button>
                </form>

                <!-- New Checkout Button -->
                <form action="{{ route('checkout.show') }}" method="GET" class="inline-block mt-2 ml-4">
                    <button type="submit" class="px-4 py-2 text-white bg-teal-500 rounded hover:bg-teal-600">
                        Proceed to Checkout
                    </button>
                </form>
            </div>
        @else
            <p class="text-gray-600">Your cart is empty.</p>
        @endif
    </div>
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.qty-btn').on('click', function() {
                let id = $(this).data('id');
                let action = $(this).data('action');

                $.ajax({
                    url: "{{ route('cart.update.ajax') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        action: action
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#qty-' + id).text(response.quantity);
                            location.reload(); // Reload to update total
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert("Something went wrong!");
                    }
                });
            });
        });
    </script>
@endsection

@endsection
