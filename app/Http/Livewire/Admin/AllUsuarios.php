<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AllUsuarios extends Component
{
    use WithPagination;

    public $search;
    public $sort='id';
    public $direction='desc';
    protected $listeners = ['render'=> 'render'];

    public function render()
    {
        $datos = User::select('id','name','email','status','role_id','profile_photo_path')
            ->where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(2);

        return view('livewire.admin.all-usuarios', compact('datos'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function order($sort){

        if ($this->sort == $sort) {
            if($this->direction== 'desc'){
                $this->direction= 'asc';
            }else {
                $this->direction= 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction= 'asc';
        }
    }
}
