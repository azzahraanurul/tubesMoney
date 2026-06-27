<x-app-layout>
    <div class="min-h-screen bg-[#F4F2F3] p-6">

        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition.opacity.duration.500ms x-init="setTimeout(() => show = false, 3000)" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative mb-6 flex justify-between items-center shadow-sm" role="alert">
                <span class="block sm:inline font-medium">{{ session('success') }}</span>
                <button @click="show = false" class="text-green-700 hover:text-green-900 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif

        <h1 class="text-3xl font-bold text-[#212121]">
            {{ __('M-Money Dashboard') }}
        </h1>

        <p class="text-gray-600 mt-2">
            {{ __('Welcome back!') }}
        </p>

        <div class="mt-10 bg-white p-6 rounded-2xl shadow text-gray-500">
            {{ __('Dashboard akan segera menampilkan ringkasan transaksi Anda.') }}
        </div>

    </div>
</x-app-layout>
