@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-yellow-500 text-sm font-black leading-5 text-yellow-300
            focus:outline-none focus:border-yellow-300 text-shadow-md transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-black leading-5
            text-white hover:text-yellow-500  focus:outline-none focus:text-yellow-600
             transition duration-150 ease-in-out transform hover:scale-125';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
