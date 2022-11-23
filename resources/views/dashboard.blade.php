<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    You're logged in! Abinadad
                </div>

                <table class="content-table"> 
                    <thead> 
                        <tr> 
                            <th>Nombre</th> 
                            <th>Platillo favorito</th> 
                            <th>Alergias / no le gusta</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr> 
                            <td>Emmanuel</td> 
                            <td>Enchiladas</td> 
                            <td>Pasas</td> 
                        </tr>
                    </tbody> 
                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>
