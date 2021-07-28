<div>
    {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
    <a wire:click="$set('open',true)">
        <x-btn-edit/>
    </a>

    {{-- <button class="bg-blue-500 hover:bg-blue-700 text-yellow-500 font-bold py-2 px-4 rounded-full">
        Button
      </button> --}}

    <x-jet-dialog-modal wire:model='open'>
        <x-slot name='title'>
            <div class="flex">
                <div class="flex-1">
                    Editar usuario: <strong>{{ $user->name }}</strong>
                </div>
                <div class="flex-3">
                    <img src="{{ $user->profile_photo_url }}" alt="Imagen de Usuario"
                        class="h-10 w-10 rounded-full flex-wrap">
                </div>
            </div>

        </x-slot>

        <x-slot name='content'>
            <pre>
            @php
               //  var_dump(session('id'));
            @endphp
        </pre>

            <div class="mb-4">
                <x-jet-label value='Correo' />
                <x-jet-input value='{{ $user->email }}' wire:model.defer='user.email' type='text' class='w-full' />
                    <x-jet-input-error for='user.email'/>
            </div>

            <div class="mb-4">
                <x-jet-label value='Roles' />
                <select id="Roles" wire:model='user.role_id' name="Roles" class="w-full">
                    @if ($user->role_id == 1)
                        <option value="1">Administrador</option>
                        <option value="2">Clientes</option>
                        <option value="0">Sin Definir</option>
                    @elseif ($user->role_id==2)
                        <option value="2">Clientes</option>
                        <option value="1">Administrador</option>
                        <option value="0">Sin Definir</option>
                    @else
                        <option value="0">Sin Definir</option>
                        <option value="1">Administrador</option>
                        <option value="2">Clientes</option>
                    @endif
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label value='Estatus' />
                <select id="Estatus" wire:model='user.status' name="Status" class="w-full">
                    @if ($user->status == 1)
                        <option value="1">Activo</option>
                        <option value="2">Suspendido</option>
                    @else
                        <option value="2">Suspendido</option>
                        <option value="1">Activo</option>
                    @endif
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label>
                    <span>Usuario creado {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }} y actualizado
                        {{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}.</span>
                </x-jet-label>
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click='save' wire:loading.attr='disabled' class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
