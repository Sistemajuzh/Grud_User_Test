<div>
    @php
if (auth()->check()) {
    # code...
    $nav_links = [
        [
            'name' => 'Clientes',
            'route' => '/',
            'active' => Request::path() == '/' ? 'active' : ''
        ],
        [
            'name' => 'Usuarios',
            'route' => route('usuarios'),
            'active' => request()->routeIs('usuarios')
        ],
        [
            'name' => 'Tablero',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard')
        ],
        [
            'name' => 'Test',
            'route' => route('test'),
            'active' => request()->routeIs('test')
        ]
    ];
} else {
    # Para los no Logueados
    $nav_links = [
        [
            'name' => 'Clientes',
            'route' => '/',
            'active' => Request::path() == '/' ? 'active' : ''
        ]
];
}
@endphp
<div class=" w-full top-0 fixed-top bg-opacity-50 pb-11">


<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach ($nav_links as $nav_link)

                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                        {{ $nav_link['name'] }}
                    </x-jet-nav-link>

                    @endforeach
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($nav_links as $nav_link)

            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                {{ $nav_link['name'] }}
            </x-jet-responsive-nav-link>

            @endforeach
        </div>
    </div>
</nav>
</div>


</div>
