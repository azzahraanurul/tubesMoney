<x-guest-layout>
    <div class="auth-wrap">
        <div class="auth-logo">
            <span>M</span>
        </div>

        <div class="auth-card">
            <div class="auth-tabs">
                <a href="{{ route('login') }}" class="active">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>

            <div class="auth-body">
                <h1>Welcome Back</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

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

                        @error('email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-label-row">
                            <label>Password</label>

                            @if (Route::has('password.request'))
                                <a class="forgot-link" href="{{ route('password.request') }}">
                                    Forgot?
                                </a>
                            @endif
                        </div>

                        <input 
                            class="input" 
                            type="password" 
                            name="password" 
                            placeholder="********" 
                            required
                        >

                        @error('password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn-auth" type="submit">
                        Login
                    </button>

                    <div class="auth-bottom">
                        Don't have an account?
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>