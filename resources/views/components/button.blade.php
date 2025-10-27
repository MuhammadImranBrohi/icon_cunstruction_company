<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 btn-primary border border-transparent rounded-pill font-semibold text-xs text-white uppercase tracking-widest hover:bg-dark-700 focus:bg-dark-700  focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
