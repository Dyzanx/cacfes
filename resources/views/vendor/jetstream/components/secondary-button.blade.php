<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-pink-800 hover:bg-pink-900 focus:border focu:border-pink-700 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:text-gray-100 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
