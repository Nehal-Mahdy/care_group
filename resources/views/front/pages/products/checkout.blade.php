@extends('front.layouts.app')

@section('title', 'Checkout')

@section('content')

    <section class="w-full">
        <form action="{{ route('checkout.placeOrder') }}" method="POST"
            class="space-y-6 w-full grid grid-cols-3 md:gap-6 mintab:grid-cols-1 mob:grid-cols-1">
            @csrf
            <!-- left side -->

            <div class="col-span-2 container px-9 py-[70px] mob:py-8">
                <h5 class="text-lg font-medium text-primary mb-6">Your Contact Details</h5>


                <div class="grid grid-cols-2 gap-6 mob:grid-cols-1">
                    {{-- First Name --}}
                    <label class="block">
                        <span class="text-sm font-medium text-slate-700">First Name <span class="text-red-500">*</span></span>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm placeholder-gray-400 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="John" required>
                    </label>

                    {{-- Last Name --}}
                    <label class="block">
                        <span class="text-sm font-medium text-slate-700">Last Name <span
                                class="text-red-500">*</span></span>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm placeholder-gray-400 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="Doe" required>
                    </label>

                    {{-- Phone --}}
                    <label class="block">
                        <span class="text-sm font-medium text-slate-700">Phone Number <span
                                class="text-red-500">*</span></span>
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm placeholder-gray-400 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="+1 234 567 890" required>
                    </label>

                    {{-- Email --}}
                    <label class="block">
                        <span class="text-sm font-medium text-slate-700">Email <span class="text-red-500">*</span></span>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm placeholder-gray-400 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="you@example.com" required>
                    </label>

                    {{-- Address Line 1 --}}
                    <label class="block col-span-2">
                        <span class="text-sm font-medium text-slate-700">Address Line 1 <span
                                class="text-red-500">*</span></span>
                        <input type="text" name="address_1" value="{{ old('address_1') }}"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm placeholder-gray-400 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="Street address, P.O. box, company name, c/o" required>
                    </label>

                    {{-- Address Line 2 --}}
                    <label class="block col-span-2">
                        <span class="text-sm font-medium text-slate-700">Address Line 2</span>
                        <input type="text" name="address_2" value="{{ old('address_2') }}"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm placeholder-gray-400 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="Apartment, suite, unit, building, floor, etc.">
                    </label>

                    {{-- City --}}
                    <label class="block">
                        <span class="text-sm font-medium text-slate-700">City <span class="text-red-500">*</span></span>
                        <input type="text" name="city" value="{{ old('city') }}"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm placeholder-gray-400 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="Enter your city" required>
                    </label>

                    {{-- Postcode --}}
                    <label class="block">
                        <span class="text-sm font-medium text-slate-700">Post/Zip Code <span
                                class="text-red-500">*</span></span>
                        <input type="text" name="postcode" value="{{ old('postcode') }}"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm placeholder-gray-400 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="123456" required>
                    </label>

                    {{-- Country --}}
                    <label class="block col-span-2">
                        <span class="text-sm font-medium text-slate-700">Country <span class="text-red-500">*</span></span>
                        <select name="country"
                            class="w-full mt-1 px-3 py-2 bg-white border rounded-md shadow-sm text-sm text-slate-600 border-slate-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            required>
                            <option value="" disabled selected hidden class="text-gray-400">Select a country
                            </option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->name }}"
                                    {{ old('country') == $country->name ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>



            <!-- right side -->
            <div class="px-7 py-[70px] mob:pt-8 mob:pb-14 flex flex-col gap-5 bg-gray-50 rounded-md shadow-md">
                @if (session('message'))
                    <div class="bg-green-100 text-green-800 p-4 rounded-md">
                        {{ session('message') }}
                    </div>
                @endif

                <h5 class="text-xl font-semibold text-primary mb-4">Order Summary</h5>

                @forelse($cart as $id => $item)
                    <div class="flex items-start gap-4 border-b pb-4 mb-4">
                        <!-- Product Image -->
                        <div class="w-20 h-20 shrink-0">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                class="w-full h-full object-cover rounded-md border" />
                        </div>

                        <!-- Product Details -->
                        <div class="flex flex-col justify-between w-full">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h6 class="font-semibold text-gray-800 text-base">{{ $item['name'] }}</h6>
                                    <p class="text-sm text-gray-500 mt-1">Quantity: <span
                                            class="font-medium">{{ $item['quantity'] }}</span></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-600">Price: ${{ number_format($item['price'], 2) }}</p>
                                    <p class="text-sm font-semibold text-gray-900 mt-1">Subtotal:
                                        ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">Your cart is currently empty.</p>
                @endforelse


                @php
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['price'] * $item['quantity'];
                    }
                @endphp

                <div class="flex justify-between mt-4 pt-4 border-t">
                    <span class="text-base font-semibold text-gray-800">Total:</span>
                    <span class="text-base font-bold text-green-600">${{ number_format($total, 2) }}</span>
                </div>


                <button type="submit"
                    class="mt-6 w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-4 rounded transition">
                    Place Order
                </button>
            </div>
        </form>

        </div>
    </section>

@endsection
