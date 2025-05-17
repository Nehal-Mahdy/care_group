<x-guest-layout>
    <div class="d-flex justify-content-center align-items-center  bg-light">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            <h4 class="text-center text-primary fw-bold">{{ __('Forgot Password?') }}</h4>
            <p class="text-center text-muted">
                {{ __('No problem! Enter your email below, and we will send you a link to reset your password.') }}
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-3">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        required autofocus>

                    @if ($errors->has('email'))
                        <div class="text-danger mt-1">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
