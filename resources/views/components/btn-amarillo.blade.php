<div>
    {{-- <button class="transition duration-300 ease-in-out transform hover:scale-125 bg-yellow-400 text-yellow-700
    hover:text-yellow-400 font-bold py-2 px-4 rounded">{{$slot}}</button> --}}

    @props(['active'])

@php
$classes = ($active ?? false)
            ? 'block border-yellow-400 text-base font-medium text-white bg-yellow-50
            focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition pr-4'
            : 'block border-transparent text-base font-medium text-white hover:text-gray-800
            hover:bg-transparent hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50
            focus:border-gray-300 transition duration-150 ease-linear transform hover:scale-125 pr-4';
            // ? 'block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50
            // focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition'
            // : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800
            // hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50
            // focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
</div>
