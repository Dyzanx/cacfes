@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center pt-1 border-b-2 border-blue-500 text-sm font-medium leading-5 text-gray-100 hover:text-gray-100 focus:outline-none focus:border-blue-600 transition'
            : 'inline-flex items-center pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-900 hover:text-gray-100 hover:border-gray-100 focus:outline-none focus:text-gray-200 focus:border-blue-500 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
