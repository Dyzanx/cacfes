@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md text-gray-900 font-bold text-center']) }}>
    {{ $value ?? $slot }}
</label>
