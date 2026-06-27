@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => 'border-gray-300 bg-white text-[#212121] placeholder:text-gray-500 focus:border-[#008080] focus:ring-[#008080] rounded-lg shadow-sm'
    ]) }}
>