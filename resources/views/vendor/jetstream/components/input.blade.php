@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md']) !!}>
