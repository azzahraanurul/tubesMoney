<x-guest-layout>

    <div class="auth-wrap">

        <!-- LOGO -->
        <div class="auth-logo">
            <img src="{{ asset('image/M-Money.png') }}"
                 alt="M-Money Logo"
                 style="width:70px;">
        </div>

        <div class="auth-card">

            <!-- TAB -->
            <div class="auth-tabs">
                <a href="{{ route('login') }}" class="active">
                    Login
                </a>

                <a href="{{ route('register') }}">
                    Register
                </a>
            </div>

            <!-- BODY -->
            <div class="auth-body">

                <h1>Welcome Back</h1>

                @if ($errors->has('email'))
                    <div class="login-error">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="form-group">
                        <label>Email</label>

                        <input
                            class="input"
                            type="email"
                            name="email"
                            placeholder="hello@example.com"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group">
                        <label>Password</label>

                        <input
                            class="input"
                            type="password"
                            name="password"
                            placeholder="********"
                            required
                        >
                    </div>

                    <!-- BUTTON -->
                    <button class="btn-auth" type="submit">
                        Login
                    </button>

                    <!-- REGISTER LINK -->
                    <div class="auth-bottom">
                        Don't have an account?
                        <a href="{{ route('register') }}">
                            Register
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>

</x-guest-layout>