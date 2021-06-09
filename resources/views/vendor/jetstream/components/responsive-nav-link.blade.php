@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-pink-400 text-base font-medium text-gray-900 bg-pink-300 focus:outline-none focus:text-gray-900 focus:bg-pink-400 focus:border-pink-600 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-pink-400 hover:border-pink-600 focus:outline-none focus:text-gray-900 focus:bg-pink-400 focus:border-pink-600 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>