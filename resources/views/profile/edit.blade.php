<x-app-layout>
    <x-slot name="header">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-bold text-3xl text-[#212121] leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-[#F4F2F3] min-h-screen pt-4 pb-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- PROFILE INFORMATION -->
            <div class="p-4 sm:p-8 bg-white shadow rounded-2xl text-[#212121]">
                <div class="w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- UPDATE PASSWORD -->
            <div class="p-4 sm:p-8 bg-white shadow rounded-2xl text-[#212121]">
                <div class="w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- DELETE USER -->
            <div class="p-4 sm:p-8 bg-white shadow rounded-2xl text-[#212121]">
                <div class="w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>