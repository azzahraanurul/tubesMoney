<x-guest-layout>
    <div class="auth-wrap">
        <div class="auth-logo">
            <div class="money-logo">M</div>
        </div>

        <div class="auth-card">
            <div class="auth-tabs">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}" class="active">Register</a>
            </div>

            <div class="auth-body">
                <h1>Create Account</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input 
                            class="input" 
                            type="text" 
                            name="name" 
                            placeholder="John Doe" 
                            value="{{ old('name') }}" 
                            required 
                            autofocus
                        >

                        @error('name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input 
                            class="input" 
                            type="email" 
                            name="email" 
                            placeholder="hello@example.com" 
                            value="{{ old('email') }}" 
                            required
                        >

                        @error('email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
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

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input 
                            class="input" 
                            type="password" 
                            name="password_confirmation" 
                            placeholder="********" 
                            required
                        >

                        @error('password_confirmation')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn-primary" type="submit">
                        Register
                    </button>

                    <div class="auth-bottom">
                        Already have an account?
                        <a href="{{ route('login') }}">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>