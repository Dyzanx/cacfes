<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-200 border border-gray-700 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest shadow-sm hover:text-gray-700 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
