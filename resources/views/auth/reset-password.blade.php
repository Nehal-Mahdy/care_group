<x-guest-layout>
    <div class="d-flex justify-content-center align-items-center bg-light">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            <h4 class="text-center text-primary fw-bold">{{ __('Reset Password') }}</h4>
            <p class="text-center text-muted">
                {{ __('Enter your new password below to reset your account.') }}
            </p>

            <form method="POST" action="{{ route('password.store') }}" class="mt-3">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">

                    @if ($errors->has('email'))
                        <div class="text-danger mt-1">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password" class="form-control" required
                        autocomplete="new-password">

                    @if ($errors->has('password'))
                        <div class="text-danger mt-1">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation"
                        class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        required autocomplete="new-password">

                    @if ($errors->has('password_confirmation'))
                        <div class="text-danger mt-1">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
