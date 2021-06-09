<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:outline-none focus:border-red-800 focus:shadow-outline-red active:bg-red-400 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
