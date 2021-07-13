<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-800 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
