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

        <!-- HEADER + BUTTON -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-[#212121]">
                    {{ __('M-Money Dashboard') }}
                </h1>

                <p class="text-gray-600 mt-2">
                    {{ __('Welcome back!') }}
                </p>
            </div>

            <!-- BUTTON TAMBAH TRANSAKSI -->
            <a href="/transaction/create"
                class="bg-[#008080] text-white px-5 py-2 rounded-xl shadow hover:opacity-90 transition">
                {{ __('+ Add Transactions') }}
            </a>
        </div>

        <!-- CARDS -->
        <div class="grid grid-cols-3 gap-6 mt-8">

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">{{ __('Balance') }}</p>
                <h2 class="text-2xl font-bold text-[#212121] mt-2">
                    Rp {{ number_format($balance ?? 0, 0, ',', '.') }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">{{ __('Income') }}</p>
                <h2 class="text-2xl font-bold text-green-600 mt-2">
                    Rp {{ number_format($income ?? 0, 0, ',', '.') }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <p class="text-gray-500">{{ __('Expenses') }}</p>
                <h2 class="text-2xl font-bold text-red-500 mt-2">
                    Rp {{ number_format($expense ?? 0, 0, ',', '.') }}
                </h2>
            </div>

        </div>

        <!-- TABLE -->
        <div class="mt-10 bg-white p-6 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-[#212121] mb-4">
                {{ __('Recent Transactions') }}
            </h2>

            <table class="w-full text-left">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">{{ __('Date') }}</th>
                        <th class="py-2">{{ __('Category') }}</th>
                        <th class="py-2">{{ __('Title') }}</th>
                        <th class="py-2">{{ __('Type') }}</th>
                        <th class="py-2">{{ __('Amount') }}</th>
                    </tr>
                </thead>

                <tbody>

                    @if(isset($transactions) && count($transactions) > 0)

                        @foreach ($transactions as $t)
                            <tr class="border-b">
                                <td class="py-2">
                                    {{ $t->date }}
                                </td>

                                <td class="py-2">
                                    {{ __($t->category) }}
                                </td>

                                <td class="py-2 text-gray-700">
                                    {{ $t->title }}
                                </td>

                                <td class="py-2">
                                    @if($t->type == 'income')
                                        <span class="text-green-600 font-medium">
                                            {{ __('Income') }}
                                        </span>
                                    @else
                                        <span class="text-red-500 font-medium">
                                            {{ __('Expenses') }}
                                        </span>
                                    @endif
                                </td>

                                <td class="py-2 font-semibold">
                                    Rp {{ number_format($t->amount, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach

                    @else

                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-400">
                                {{ __('No Data') }}
                            </td>
                        </tr>

                    @endif

                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>