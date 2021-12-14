<?php

namespace App\Http\Livewire;

use App\Models\Servicio;
use App\Models\Sucursal;
use Livewire\Component;

class CrudServicios extends Component
{
    public $nombre,$id_servicio,$precio,$sucursal_id;
    public $sucursales;
    public $search;
    public $modal = false;

    protected $rules = [
        'nombre' => 'required|min:2',
        'precio' => 'required|numeric',
        'sucursal_id' => 'required',
    ];
    protected $messages = [
        'required' => 'El campo es requerido.',
    ];

    public function render()
    {
        $servicios = Servicio::where('nombre','like','%'.$this->search.'%')
                        ->get();
        return view('livewire.servicios.crud-servicios',compact('servicios'));
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->sucursales = Sucursal::all();
        $this->abrirModal();
    }
    public function save()
    {
        $this->validate();
        dd($this->nombre);
        Servicio::updateOrCreate(['id'=>$this->id_servicio],
        [
            'nombre'=>$this->nombre,
            'precio'=>$this->precio,
            'sucursal_id'=>$this->sucursal_id,
        ]);
        $this->cerrarModal();
    }
    public function editar($id)
    {
        $servicio = Servicio::findOrFail($id);
        $this->sucursales = Sucursal::all();
        $this->id_servicio = $servicio->id;
        $this->nombre = $servicio->nombre;
        $this->precio = $servicio->precio;
        $this->sucursal_id = $servicio->sucursal_id;
        $this->abrirModal();
    }
    public function borrar($id)
    {
        Servicio::findOrFail($id)->delete();
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
        $this->precio = '';
        $this->sucursal_id = '';
        $this->id_servicio = '';
    }
}
