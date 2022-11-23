<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Codigo Postales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
                <br><br><br>

                <!-- INICIA MODAL -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Codigo Postal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body"> 
                        <select class="form-select" aria-label="Default select example" name="selectIdMunicipio" id="selectIdMunicipio">
                            <option selected>Seleccione un municipio</option>
                            @foreach($municipiosArray as $municipio)
                                <option value="{{$municipio['id']}}" name="idmunicipio" id="idmunicipio">{{$municipio['municipio']}}</option>
                            @endforeach
                        </select>

                        <br>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Código postal</span>
                            </div>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="codigoPostal" id="codigoPostal">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" name="guardar" id="guardar">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- FINALIZA MODAL -->

                    <div class="datagrid">
                        <table>
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Municipio</th>
                                    <th>Estado</th>
                                    <th>Codigo Postal</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($codigoPostalesArray as $codigos)
                                <tr>
                                    <td>{{$codigos['id']}}</td>
                                    <td>{{$codigos['municipio']['estado']['estado']}}</td>
                                    <td>{{$codigos['municipio']['municipio']}}</td>
                                    <td>{{$codigos['codigoPostal']}}</td>
                                    <td>
                                        <a href="{{ route('estadoEliminar', $codigos['id']) }}">Eliminar</a>
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $('#selectIdMunicipio').on('change', function() {
        idmunicipio = $(this).val();
    });

        jQuery('#guardar').click(function(e){
          var cp = document.getElementById("codigoPostal").value;

          
          url = 'guardaCP/'+idmunicipio+'/'+cp;
          window.open(url,"_self");
          return false;
        });
    });
</script>

<style>
    .datagrid table {
        border-collapse: collapse; text-align: left; width: 100%;
    } .datagrid {
        font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
    }.datagrid table td, .datagrid table th {
        padding: 3px 10px;
    }.datagrid table thead th {
        background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
        background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');
        background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8;
    } .datagrid table thead th:first-child { border: none;
    }.datagrid table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal;
    }.datagrid table tbody .alt td { background: #E1EEF4; color: #00496B;
    }.datagrid table tbody td:first-child { border-left: none;
    }.datagrid table tbody tr:last-child td { border-bottom: none;
    }.datagrid table tfoot td div { border-top: 1px solid #006699;background: #E1EEF4;
    } .datagrid table tfoot td { padding: 0; font-size: 12px
    } .datagrid table tfoot td div{ padding: 2px;
    }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right;
    }.datagrid table tfoot  li { display: inline;
    }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #006699;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #006699; color: #FFFFFF; background: none; background-color:#00557F;}
</style>
</x-app-layout>
