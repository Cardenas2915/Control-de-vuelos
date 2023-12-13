<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block text-center text-sm px-4 py-2 bg-indigo-600 border
    border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-indigo-800
    focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
    transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>