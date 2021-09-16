@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-gray-300 text-base font-medium text-gray-900 bg-gray-100 focus:outline-none focus:bg-gray-200 focus:border-gray-400 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-700 hover:text-gray-900 bg-white hover:bg-gray-100 hover:border-gray-300 focus:outline-none focus:bg-gray-200 focus:border-gray-400 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>