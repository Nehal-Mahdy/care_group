@extends('front.layouts.app')

@section('title', 'Forgot Password')

@section('content')

    <section>
        <div class="flex flex-col items-center justify-center h-[40vh] m-auto bg-center bg-cover"
            style="
          background-image: linear-gradient(
              rgba(0, 0, 0, 0.5),
              rgba(0, 0, 0, 0.5)
            ),
            url(./images/bird.jpg);
        ">
            <div class="container w-1/2 text-center text-white">
                <h2 class="text-6xl font-bold mob:text-2xl mb-9">Forgot your Password!</h2>

                <div class="flex items-center justify-center gap-4">
                    <a class="text-white hover:text-primary transition-colors cursor-pointer" href="/">
                        Home
                    </a>
                    <i class="fa-solid fa-chevron-right"></i> <span> Profile </span>
                </div>
            </div>
        </div>
    </section>

    <section class="container pt-20 pb-12">
        <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-6 text-[#0B1C39]">Forgot Password</h2>

            @if (session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('customer.password.email') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700" for="email">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full p-2 border rounded-lg outline-none">
                    @error('email')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                    Send Password Reset Link
                </button>
            </form>
        </div>
    </section>
@endsection
