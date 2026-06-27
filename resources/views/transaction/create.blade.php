<x-app-layout>
    <div class="min-h-screen bg-[#F4F2F3] flex items-center justify-center p-6">

        <div class="w-full max-w-md bg-white p-6 rounded-2xl shadow">

            <!-- TITLE -->
            <h1 class="text-2xl font-bold mb-6 text-[#212121] text-center">
                {{ __('Add Transactions') }}
            </h1>

            <!-- FORM -->
            <form action="{{ route('transaction.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- AMOUNT -->
                <div>
                    <input
                        type="text"
                        id="amount"
                        name="amount"
                        placeholder="{{ __('Amount') }}"
                        value="{{ old('amount') }}"
                        class="w-full p-3 border-2 border-[#008080] rounded-lg bg-white text-[#212121] focus:outline-none focus:ring-2 focus:ring-[#008080] focus:border-[#008080] @error('amount') border-red-500 @enderror"
                    >

                    @error('amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- TYPE -->
                <div
                    class="relative"
                    x-data="{
                        open: false,
                        selected: '{{ old('type') }}',
                        label() {
                            if (this.selected === 'income') return '{{ __('Income') }}';
                            if (this.selected === 'expense') return '{{ __('Expenses') }}';
                            return '{{ __('Choose Type') }}';
                        }
                    }"
                >
                    <input type="hidden" name="type" x-model="selected">

                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full p-3 border-2 rounded-lg bg-white text-[#212121] border-[#008080] focus:outline-none focus:ring-2 focus:ring-[#008080] focus:border-[#008080] flex items-center justify-between"
                    >
                        <span x-text="label()"></span>

                        <svg
                            class="w-5 h-5 text-[#008080]"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.outside="open = false"
                        x-transition
                        class="absolute z-50 w-full mt-1 bg-white border-2 border-[#008080] rounded-lg overflow-hidden shadow-lg"
                        style="display: none;"
                    >
                        <button
                            type="button"
                            @click="selected = ''; open = false"
                            class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition"
                        >
                            {{ __('Choose Type') }}
                        </button>

                        <button
                            type="button"
                            @click="selected = 'income'; open = false"
                            class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition"
                            :class="selected === 'income' ? 'bg-[#C8E6E2]' : ''"
                        >
                            {{ __('Income') }}
                        </button>

                        <button
                            type="button"
                            @click="selected = 'expense'; open = false"
                            class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition"
                            :class="selected === 'expense' ? 'bg-[#C8E6E2]' : ''"
                        >
                            {{ __('Expenses') }}
                        </button>
                    </div>

                    @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CATEGORY -->
                <div
                    class="relative"
                    x-data="{
                        open: false,
                        selected: '{{ old('category') }}',
                        label() {
                            if (this.selected === 'Food') return '{{ __('Food') }}';
                            if (this.selected === 'Transportation') return '{{ __('Transportation') }}';
                            if (this.selected === 'Shopping') return '{{ __('Shopping') }}';
                            if (this.selected === 'Salary') return '{{ __('Salary') }}';
                            if (this.selected === 'Entertainment') return '{{ __('Entertainment') }}';
                            if (this.selected === 'Others') return '{{ __('Others') }}';
                            return '{{ __('Choose Category') }}';
                        }
                    }"
                >
                    <input type="hidden" name="category" x-model="selected">

                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full p-3 border-2 rounded-lg bg-white text-[#212121] border-[#008080] focus:outline-none focus:ring-2 focus:ring-[#008080] focus:border-[#008080] flex items-center justify-between @error('category') border-red-500 @enderror"
                    >
                        <span x-text="label()"></span>

                        <svg
                            class="w-5 h-5 text-[#008080]"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.outside="open = false"
                        x-transition
                        class="absolute z-50 w-full mt-1 bg-white border-2 border-[#008080] rounded-lg overflow-hidden shadow-lg max-h-60 overflow-y-auto"
                        style="display: none;"
                    >
                        <button type="button" @click="selected = ''; open = false" class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition">{{ __('Choose Category') }}</button>
                        <button type="button" @click="selected = 'Food'; open = false" class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition" :class="selected === 'Food' ? 'bg-[#C8E6E2]' : ''">{{ __('Food') }}</button>
                        <button type="button" @click="selected = 'Transportation'; open = false" class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition" :class="selected === 'Transportation' ? 'bg-[#C8E6E2]' : ''">{{ __('Transportation') }}</button>
                        <button type="button" @click="selected = 'Shopping'; open = false" class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition" :class="selected === 'Shopping' ? 'bg-[#C8E6E2]' : ''">{{ __('Shopping') }}</button>
                        <button type="button" @click="selected = 'Salary'; open = false" class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition" :class="selected === 'Salary' ? 'bg-[#C8E6E2]' : ''">{{ __('Salary') }}</button>
                        <button type="button" @click="selected = 'Entertainment'; open = false" class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition" :class="selected === 'Entertainment' ? 'bg-[#C8E6E2]' : ''">{{ __('Entertainment') }}</button>
                        <button type="button" @click="selected = 'Others'; open = false" class="w-full text-left px-4 py-3 bg-white text-[#212121] hover:bg-[#C8E6E2] transition" :class="selected === 'Others' ? 'bg-[#C8E6E2]' : ''">{{ __('Others') }}</button>
                    </div>

                    @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- TITLE -->
                <div>
                    <input
                        type="text"
                        name="title"
                        placeholder="{{ __('Title (e.g. Nasi Goreng)') }}"
                        value="{{ old('title') }}"
                        class="w-full p-3 border-2 border-[#008080] rounded-lg bg-white text-[#212121] focus:outline-none focus:ring-2 focus:ring-[#008080] focus:border-[#008080] @error('title') border-red-500 @enderror"
                    >

                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- DATE -->
                <div>
                    <input
                        type="date"
                        name="date"
                        value="{{ old('date') }}"
                        class="w-full p-3 border-2 border-[#008080] rounded-lg bg-white text-[#212121] focus:outline-none focus:ring-2 focus:ring-[#008080] focus:border-[#008080] @error('date') border-red-500 @enderror"
                    >

                    @error('date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BUTTON ACTION -->
                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="w-full bg-[#008080] text-white py-3 rounded-lg font-semibold hover:opacity-90 transition"
                    >
                        {{ __('Save') }}
                    </button>

                    <a
                        href="{{ route('dashboard') }}"
                        class="w-full text-center bg-red-600 text-white py-3 rounded-lg font-bold hover:bg-red-700 shadow-lg transition"
                    >
                        {{ __('Cancel') }}
                    </a>

                </div>

            </form>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const amountInput = document.getElementById('amount');

            amountInput.addEventListener('input', function (e) {

                let value = e.target.value.replace(/\D/g, '');

                if (value === '') {
                    e.target.value = '';
                    return;
                }

                e.target.value = new Intl.NumberFormat('id-ID').format(value);
            });

        });
    </script>

</x-app-layout>