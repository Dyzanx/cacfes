@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-pink-300 focus:bg-pink-400 border-pink-400 focus:border-2 focus:border-pink-500 focus:ring focus:ring-pink-500 rounded-md shadow-sm']) !!}>
