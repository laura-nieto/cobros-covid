<?php

namespace App\Http\Livewire;

use App\Models\Sucursal;
use Livewire\Component;

class CrudSucursales extends Component
{
    public $nombre,$direccion,$id_sucursal;
    public $search;
    public $modal = false;
    
    protected $rules = [
        'nombre' => 'required|min:2',
        'direccion' => 'required|min:2',
    ];
    protected $messages = [
        'required' => 'El campo es requerido.',
    ];

    public function render()
    {
        $sucursales = Sucursal::where('nombre','like','%'.$this->search.'%')
                        ->get();
        return view('livewire.sucursales.crud-sucursales',compact('sucursales'));
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function save()
    {
        $this->validate();
        Sucursal::updateOrCreate(['id'=>$this->id_sucursal],
        [
            'nombre'=>$this->nombre,
            'direccion'=>$this->direccion,
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
    public function editar($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        $this->id_sucursal = $sucursal->id;
        $this->nombre = $sucursal->nombre;
        $this->direccion = $sucursal->direccion;
        $this->abrirModal();
    }
    public function borrar($id)
    {
        Sucursal::findOrFail($id)->delete();
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
        $this->nombre = NULL;
    }
}
