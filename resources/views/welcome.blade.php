<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auth</title>
    @vite('resources/css/app.css')
</head>

<body
    class="flex flex-col items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat"
    style="background-image: url('/image/money.png');"
>

    <!-- LANGUAGE SWITCHER -->
    <div class="absolute top-6 right-6 z-50">
        <div class="relative inline-block text-left" id="customLangDropdown">
            <!-- Button -->
            <button type="button" id="langBtn" class="inline-flex justify-between items-center w-32 bg-white text-[#008080] border border-[#008080] rounded-md shadow-sm text-sm font-bold px-3 py-2 cursor-pointer transition hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-[#006F67]">
                <span id="langSelectedText">{{ session('locale') == 'id' ? 'Indonesian' : 'English' }}</span>
                <svg class="-mr-1 ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            
            <!-- Menu -->
            <div id="langMenu" class="hidden origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none overflow-hidden">
                <div class="py-1">
                    <a href="/lang/en" class="block px-4 py-2 text-sm text-[#212121] hover:bg-[#C8E6E2] hover:text-[#008080] font-medium transition">English</a>
                    <a href="/lang/id" class="block px-4 py-2 text-sm text-[#212121] hover:bg-[#C8E6E2] hover:text-[#008080] font-medium transition">Indonesian</a>
                </div>
            </div>
        </div>
    </div>

    <!-- LOGO -->
    <div class="mb-3">
        <img src="/image/M-Money.png" alt="Logo" class="w-28 mx-auto">
    </div>

    <!-- CARD -->
    <div class="w-full max-w-md bg-white rounded-md shadow-xl overflow-hidden">

        <!-- Tabs -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any() && !session()->hasOldInput('name'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="relative flex border-b border-[#E7E4F1]">

            <button onclick="showTab('login')" id="loginTab"
                class="flex-1 py-4 text-center font-semibold text-[#006F67] z-10">
                {{ __('Login') }}
            </button>

            <button onclick="showTab('register')" id="registerTab"
                class="flex-1 py-4 text-center text-gray-400 font-semibold z-10">
                {{ __('Register') }}
            </button>

            <!-- UNDERLINE -->
            <div id="underline"
                class="absolute bottom-0 left-0 w-1/2 h-[3px] bg-[#008080] transition-all duration-300">
            </div>
        </div>

        <!-- LOGIN -->
        <div id="loginForm" class="p-8">
            <h2 class="text-2xl font-semibold mb-6 text-[#212121] tracking-wide">
                {{ __('Welcome Back') }}
            </h2>

            <form method="POST" action="/login">
                @csrf

                <label class="block text-sm text-[#666666] mb-2">
                    {{ __('Email') }}
                </label>
                <input type="email" name="email" placeholder="hello@example.com" value="{{ !session()->hasOldInput('name') ? old('email') : '' }}"
                    class="w-full mb-5 px-4 py-3 rounded-sm bg-[#F4F2F3] text-[#212121] placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#006F67]">

                <div class="flex justify-between items-center mb-2">
                    <label class="block text-sm text-[#666666]">
                        {{ __('Password') }}
                    </label>
                </div>

                <input type="password" name="password" placeholder="********"
                    class="w-full mb-5 px-4 py-3 rounded-sm bg-[#F4F2F3] text-[#212121] placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#006F67]">

                <button type="submit"
                    class="w-full bg-[#008080] text-white py-3 rounded-sm font-semibold hover:bg-[#005F58] transition shadow-md">
                    {{ __('Login') }}
                </button>
            </form>

            <div class="text-center mt-5 text-sm text-[#555555]">
                <span>{{ __("Don't have an account?") }}</span>
                <button onclick="showTab('register')" class="font-bold text-[#008080]">
                    {{ __('Register') }}
                </button>
            </div>
        </div>

        <!-- REGISTER -->
        <div id="registerForm" class="hidden p-8">
            <h2 class="text-2xl font-semibold mb-6 text-[#212121] tracking-wide">
                {{ __('Create Account') }}
            </h2>

            <form method="POST" action="/register">
                @csrf

                <label class="block text-sm text-[#666666] mb-2">
                    {{ __('Name') }}
                </label>
                <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}"
                    class="w-full mb-1 px-4 py-3 rounded-sm bg-[#F4F2F3] text-[#212121] placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#006F67] {{ session()->hasOldInput('name') && $errors->has('name') ? 'border border-red-500' : '' }}">
                @if(session()->hasOldInput('name') && $errors->has('name'))
                    <p class="text-red-500 text-xs mb-4">{{ $errors->first('name') }}</p>
                @else
                    <div class="mb-5"></div>
                @endif

                <label class="block text-sm text-[#666666] mb-2">
                    {{ __('Email') }}
                </label>
                <input type="email" name="email" placeholder="hello@example.com" value="{{ session()->hasOldInput('name') ? old('email') : '' }}"
                    class="w-full mb-1 px-4 py-3 rounded-sm bg-[#F4F2F3] text-[#212121] placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#006F67] {{ session()->hasOldInput('name') && $errors->has('email') ? 'border border-red-500' : '' }}">
                @if(session()->hasOldInput('name') && $errors->has('email'))
                    <p class="text-red-500 text-xs mb-4">{{ $errors->first('email') }}</p>
                @else
                    <div class="mb-5"></div>
                @endif

                <label class="block text-sm text-[#666666] mb-2">
                    {{ __('Password') }}
                </label>
                <input type="password" name="password" placeholder="********"
                    class="w-full mb-1 px-4 py-3 rounded-sm bg-[#F4F2F3] text-[#212121] placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#006F67] {{ session()->hasOldInput('name') && $errors->has('password') ? 'border border-red-500' : '' }}">
                <p class="text-xs text-gray-500 mb-1">{{ __('Minimum 8 characters with a mix of letters and numbers.') }}</p>
                @if(session()->hasOldInput('name') && $errors->has('password'))
                    <p class="text-red-500 text-xs mb-4">{{ $errors->first('password') }}</p>
                @else
                    <div class="mb-4"></div>
                @endif

                <label class="block text-sm text-[#666666] mb-2">
                    {{ __('Confirm Password') }}
                </label>
                <input type="password" name="password_confirmation" placeholder="********"
                    class="w-full mb-1 px-4 py-3 rounded-sm bg-[#F4F2F3] text-[#212121] placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#006F67] {{ session()->hasOldInput('name') && $errors->has('password') ? 'border border-red-500' : '' }}">
                <div class="mb-5"></div>

                <button type="submit"
                    class="w-full bg-[#008080] text-white py-3 rounded-sm font-semibold hover:bg-[#005F58] transition shadow-md">
                    {{ __('Register') }}
                </button>
            </form>

            <div class="text-center mt-5 text-sm text-[#555555]">
                <span>{{ __('Already have an account?') }}</span>
                <button onclick="showTab('login')" class="font-bold text-[#008080]">
                    {{ __('Sign In') }}
                </button>
            </div>
        </div>

    </div>

<script>
function showTab(tab) {
    const login = document.getElementById('loginForm');
    const register = document.getElementById('registerForm');
    const underline = document.getElementById('underline');

    const loginTab = document.getElementById('loginTab');
    const registerTab = document.getElementById('registerTab');

    if (tab === 'login') {
        login.classList.remove('hidden');
        register.classList.add('hidden');

        underline.style.left = '0%';

        loginTab.classList.remove('text-gray-400');
        loginTab.classList.add('text-[#006F67]');

        registerTab.classList.add('text-gray-400');
        registerTab.classList.remove('text-[#006F67]');
    } else {
        login.classList.add('hidden');
        register.classList.remove('hidden');

        underline.style.left = '50%';

        registerTab.classList.remove('text-gray-400');
        registerTab.classList.add('text-[#006F67]');

        loginTab.classList.add('text-gray-400');
        loginTab.classList.remove('text-[#006F67]');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    @if(session()->hasOldInput('name'))
        showTab('register');
    @elseif($errors->any())
        showTab('login');
    @else
        showTab('login');
    @endif

    const langBtn = document.getElementById('langBtn');
    const langMenu = document.getElementById('langMenu');

    // Toggle dropdown
    langBtn.addEventListener('click', () => {
        langMenu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!langBtn.contains(e.target) && !langMenu.contains(e.target)) {
            langMenu.classList.add('hidden');
        }
    });

});
</script>

</body>
</html>