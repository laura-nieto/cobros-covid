<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class CrudUser extends Component
{
    public $nombre,$apellido,$email,$password,$id_user;
    public $modal = false;
    //public $modalDelete = false;
    public $search;
    public $roles,$role_id;

    protected $rules = [
        'nombre' => 'required|min:2',
        'apellido' => 'required|min:2',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ];
    protected $messages = [
        'required' => 'El campo es requerido.',
        'email' => 'La dirección de Email debe tener un formato adecuado.',
        'unique' => 'Ya existe un registro con ese Email.',
        'min' => 'El campo debe tener al menos :min caracteres',
    ];

    public function render()
    {
        $users = User::where('nombre','like','%'.$this->search.'%')
                ->orWhere('apellido','like','%'.$this->search.'%')
                ->get();

        return view('livewire.users.crud-user',compact('users'));
    }
    public function crear()
    {
        $this->roles = Role::all();
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function editar($id)
    {
        $this->roles = Role::all();
        $user = User::findOrFail($id);
        $this->id_user = $user->id;
        $this->nombre = $user->nombre;
        $this->apellido = $user->apellido;
        $this->email = $user->email;
        $this->abrirModal();
    }
    public function save()
    {
        $this->validate();
        $user = User::updateOrCreate(['id'=>$this->id_user],
        [
            'nombre'=>$this->nombre,
            'apellido'=>$this->apellido,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
        ]);
        $user->roles()->sync([$this->role_id]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
    public function borrar($id)
    {
        User::findOrFail($id)->delete();
    }



    //FUNCIONES MODAL
    public function abrirModal()
    {
        $this->modal = true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }
    public function limpiarCampos()
    {
        $this->nombre = '';
        $this->apellido = '';
        $this->email = '';
        $this->password = '';
    }
}
