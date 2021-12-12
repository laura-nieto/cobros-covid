<x-app-layout>
    <div class="py-12 flex-1 p-10">
      <x-slot name="header">
        {{ __('Lista de Roles') }}
      </x-slot>
        @if (session('success'))
            <x-success>{{session('success')}}</x-success>
        @endif
        <x-seccion>
            <div class="my-4 sm:px-6 lg:px-8 border-b-1 pb-3">
                <a href="{{ route('admin.roles.create') }}"
                    class="px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Crear
                    Nuevo</a>
            </div>
            <div class="overflow-hidden sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-200 sm:rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if(!$roles->count())
                            <tr>
                                <td class="px-6 py-4 border-b-2" colspan="2">No existen roles</td>
                            </tr>
                        @else
                            @foreach($roles as $rol)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $rol->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex justify-evenly">
                                            <a href="{{route('admin.roles.edit',$rol->id)}}"
                                                class="px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Editar</a>
                                            <button onclick="toggleModal('modal-id',{{$rol->id}})"
                                                class="px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </x-sesccion-white>
        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="relative w-auto my-6 mx-auto max-w-3xl">
              <!--content-->
              <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                  <h3 class="text-3xl font-semibold">
                    ¿Está seguro desea eliminar el Rol?
                  </h3>
                  <button class="p-1 ml-auto border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                      ×
                    </span>
                  </button>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                  <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
                    Una vez eliminada la información no se puede recuperar.
                  </p>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                  <button class="background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                    Cerrar
                  </button>
                  <a id="a-delete" class="bg-red-500 text-white active:bg-red-500 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                    Eliminar
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
        
    </div>
@section('js')
    <script type="text/javascript">
        function toggleModal(modalID,id){
            document.getElementById('a-delete').setAttribute('href', 'roles/'+id+'/delete');
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
  </script>
@endsection
</x-app-layout>
