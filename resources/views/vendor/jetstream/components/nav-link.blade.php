@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center pt-1 border-b-2 border-gray-300 text-sm font-medium leading-5 text-white hover:text-gray-100 focus:outline-none focus:border-gray-200 transition'
            : 'inline-flex items-center pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-200 hover:text-white hover:border-gray-100 focus:outline-none focus:text-gray-200 focus:border-gray-200 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
