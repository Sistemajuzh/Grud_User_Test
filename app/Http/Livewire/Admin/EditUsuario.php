<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditUsuario extends Component
{
    public $open = false;
    public $user;

    protected $rules = [
        'user.email' => ['required', 'email:rfc,dns',
    ],
        // |unique:users,email,'.$this->id
        'user.role_id' => 'required',
        'user.status' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        $this->validate();
        $this->validate([
            'user.email' => 'unique:users,email,'.$this->user->id,
        ]);

        if (Auth::user()->role_id==1) {
            # Administrador
            $this->user->save();
            $this->reset(['open']);
            $this->emitTo('admin.all-usuarios','render');
            $this->emit('exito','El Usuario se Actualizo Satisfactoriamente.!');
        } else {
            $this->reset(['open']);
            $this->emitTo('admin.all-usuarios','render');
            $this->emit('error','Usted no tiene permiso de Editar.!');
        }


    }

    public function render()
    {
        return view('livewire.admin.edit-usuario');
    }
}
