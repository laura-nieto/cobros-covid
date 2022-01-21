<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SucursalController;
use App\Http\Livewire\Calendario;
use App\Http\Livewire\Cortesia;
use App\Http\Livewire\CortesiaHistorial;
use App\Http\Livewire\CrudServicios;
use App\Http\Livewire\CrudSucursales;
use App\Http\Livewire\CrudUser;
use App\Http\Livewire\Logo\CrudSettings;
use App\Http\Livewire\Paciente\PacienteResultado;
use App\Http\Livewire\Paciente\PacienteVista;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//GET SERVICIOS
Route::post('servicios/sucursal/{id}',[SucursalController::class,'get_servicios']);
Route::get('/busqueda',[CitaController::class,'coincidencias']);
Route::post('/busqueda',[CitaController::class,'guardarSesion']);
Route::get('/pedir/cita',[CitaController::class,'index'])->name('datosPaciente');
Route::post('/pedir/cita',[CitaController::class,'datos_paciente']);
Route::get('/pedir/cita/pago',[CitaController::class,'forma_pago'])->name('forma_pago');

//PAYPAL
Route::get('paypal/checkout',[PaypalController::class,'getExpressCheckout'])->name('paypal.checkout');
Route::get('paypal/checkout-success/{idpago}',[PaypalController::class,'getExpressCheckoutSuccess'])->name('paypal.success');
Route::get('paypal/checkout-cancel/{idpago}',[PaypalController::class,'cancelPage'])->name('paypal.cancel');
//CORTESIA
Route::get('pago/cortesia',[CitaController::class,'pagoCortesia'])->name('pago.cortesia');
//MERCADOPAGO
Route::get('mercadoPago/success',[MercadoPagoController::class,'success'])->name('mercadoPago.success');
Route::get('mercadoPago/failure',[MercadoPagoController::class,'fail'])->name('mercadoPago.fail');

Route::middleware(['auth:sanctum','verified'])->group(function(){
    // SETTING PAGE
    Route::get('/themes',CrudSettings::class)->name('admin.settings')->middleware('permission:admin.settings');
    //ROLES
    Route::resource('roles',RoleController::class)->names('admin.roles');
    Route::get('roles/{id}/delete',[RoleController::class,'destroy'])->name('admin.role.destroy');
    //USUARIOS
    Route::get('/users',CrudUser::class)->name('admin.users')->middleware('permission:admin.users.index');
    //SUCURSALES
    Route::get('/sucursales',CrudSucursales::class)->name('admin.sucursales')->middleware('permission:admin.sucursales.index');
    //SERVICIOS
    Route::get('/servicios',CrudServicios::class)->name('admin.servicios')->middleware('permission:admin.servicios.index');
    //PACIENTE
    Route::get('/paciente/{id}',PacienteVista::class)->name('admin.paciente.index')->middleware('permission:admin.paciente.index');
    Route::get('/pacientes/resultado',PacienteResultado::class)->name('admin.paciente.resultados')->middleware('permission:admin.paciente.index');
    //CITAS
    Route::get('/calendario',Calendario::class)->name('admin.calendario.index')->middleware('permission:admin.calendario.index');
    //CORTESIAS
    Route::get('/cortesias',Cortesia::class)->name('admin.cortesia')->middleware('permission:admin.cortesia');
    Route::get('/cortesias/historial',CortesiaHistorial::class)->name('admin.cortesia.historial'); //->middleware('permission:admin.cortesia.historial');
});