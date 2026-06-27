@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#212121]']) }}>
    {{ $value ?? $slot }}
</label>