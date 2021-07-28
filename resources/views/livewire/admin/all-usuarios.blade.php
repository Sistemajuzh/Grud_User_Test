<div>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administración de Usuarios') }}
        </h2>
    </x-slot> --}}



    <div class="px-6 py-4 flex items-center">
        <x-jet-input type="text" class="flex-1 mr-4 text-yellow-800" placeholder="Buscar" wire:model='search' />

        {{-- @livewire('admin.edit-usuario') --}}
    </div>

    @if ($datos->count())
        <!-- Tabla Talwindui.com -->
        <x-table>
            <table class="w-full divide-y divide-gray-900 table-auto">
                <thead class="bg-gray-800">
                    <tr>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('id')">
                            ID
                            {{-- ** ICONO DE ORDEN ** --}}
                            @if ($sort == 'id' && $direction == 'desc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @elseif ($sort == 'id' && $direction=='asc')
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                            {{-- ** FIN ICONO ** --}}
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('name')">
                            NOMBRE / EMAIL
                            {{-- ** ICONO DE ORDEN ** --}}
                            @if ($sort == 'name' && $direction == 'desc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @elseif ($sort == 'name' && $direction=='asc')
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                            {{-- ** FIN ICONO ** --}}
                        </th>

                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('email')">
                            ESTATUS
                            {{-- ** ICONO DE ORDEN ** --}}
                            @if ($sort == 'email' && $direction == 'desc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @elseif ($sort == 'email' && $direction=='asc')
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                            {{-- ** FIN ICONO ** --}}
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acceso
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Editar</span>

                        </th>

                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-yellow-200">
                    @foreach ($datos as $key)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $key->id }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">

                                        @if ($key->profile_photo_path)
                                            <img class="h-10 w-10 rounded-full"
                                            src="{{ 'storage/'.$key->profile_photo_path }}" alt="Imagen">
                                        @else
                                            <img class="h-10 w-10 rounded-full" src='NoImage.png' alt="Imagen">
                                        @endif

                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $key->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $key->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            @if ($key->status==1)
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-500">
                                    Activo
                                </span>
                            </td>
                            @elseif($key->status==2)
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Suspendido
                                </span>
                            </td>
                            @endif

                            @if ($key->role_id==1)
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500">
                                Administrador
                            </td>
                            @elseif ($key->role_id==2)
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-500">
                                Clientes
                            </td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Sin Definir
                            </td>
                            @endif

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @livewire('admin.edit-usuario', ['user' => $key], key($key->id))
                            </td>
                        </tr>
                    @endforeach

                    <!-- More items... -->
                </tbody>
            </table>
        </x-table>
    @else
        <div class="px-6 py-4 bg-gray-900 text-gray-50">
            No hay registros disponibles.
        </div>
    @endif

    @if ($datos->hasPages())

        <div class="px-6 py-3 ">
            {{ $datos->links() }}
        </div>

    @endif

</div>
