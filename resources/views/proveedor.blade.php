<title>Proveedores</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



@include('menu/menu_top')




<div>
    <div class="row" style="margin-top: 10px;margin-left: 10px;">
        <h1>PROVEEDORES</h1>

      
        <a class="btn btn-success" href="javascript:void(0)" id="createNewMutualidad" style="height: 40px;margin-left: 10px;margin-top: 10px;">AGREGAR</a>
      
    </div>



    <table class="table table-bordered data-table" style="width:100%">
        <thead>
            <tr>
               <!--  <th>ID</th> -->

                <th>Nombre</th>
                <th>Rut</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Contacto</th>
               

                <th width="300px">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="proveedorForm" name="proveedorForm" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id_usuario" id="id_usuario">
                    <input type="hidden" name="proveedor_id" id="proveedor_id">


                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" id="nombre" name="nombre" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Rut</label>
                        <div class="col-sm-12">
                            <input type="text" id="rut" name="rut" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" id="email" name="email" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Dirección</label>
                        <div class="col-sm-12">
                            <input type="text" id="direccion" name="direccion" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Teléfono</label>
                        <div class="col-sm-12">
                            <input type="text" id="telefono" name="telefono" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Contacto</label>
                        <div class="col-sm-12">
                            <input type="text" id="contacto" name="contacto" placeholder="" class="form-control" required="">
                        </div>
                    </div>
        



                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" class="btn btn-primary float-right" id="saveBtn" value="create">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" aria-hidden="true">


    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Confirmar acción</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-lg-12">

                <p>Seguro que desea eliminar la proveedor <strong id="label_nombre"></strong>?</p>
                <input type="hidden" name="proveedor_id_eliminar" id="proveedor_id_eliminar">

                <button type="submit" class="btn btn-danger float-right eliminarButton" id="eliminarButton">Eliminar
                </button>


            </div>
        </div>
    </div>
</div>

@include('menu/menu_bot')

<script type="text/javascript">
    $(function() {

        $("#nav-proveedores").addClass("active");

        var es_admin = <?= Auth::user()->admin ?>;

     
            columnas = [/* {
                    data: 'id',
                    name: 'id'
                }, */

                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'rut',
                    name: 'rut'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'direccion',
                    name: 'direccion'
                },
                {
                    data: 'telefono',
                    name: 'telefono'
                },
                {
                    data: 'contacto',
                    name: 'contacto'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "Sin registros disponibles",
                "info": " _TOTAL_ registros totales",
                "infoEmpty": "Mostrando 0 entradas",
                "infoFiltered": "(Filtrado de _MAX_ registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar de forma ascendente",
                    "sortDescending": ": Actuvar para ordenar de forma descendente"
                }
            },


            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('proveedores.index') }}",
            columns: columnas
        });
        $('#createNewMutualidad').click(function() {
            $('#saveBtn').val("create-proveedor");
            $('#proveedor_id').val('');
            $('#proveedorForm').trigger("reset");
            $('#modelHeading').html("Crear Proveedor");
            $('#ajaxModel').modal('show');
        });
        $('body').on('click', '.editMutualidad', function() {
            var proveedor_id = $(this).data('id');
            $.get("{{ route('proveedores.index') }}" + '/' + proveedor_id + '/edit', function(data) {
                $('#modelHeading').html("Editar Proveedor");
                $('#saveBtn').val("edit-proveedor");
                $('#ajaxModel').modal('show');
                $('#proveedor_id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#rut').val(data.rut);
                $('#email').val(data.email);
                $('#direccion').val(data.direccion);
                $('#telefono').val(data.telefono);
                $('#contacto').val(data.contacto);
              


            })
        });
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Guardando...');

            var data = new FormData($('#proveedorForm')[0]);
            $.ajax({
                data: data,
                url: "{{ route('proveedores.store') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function(data) {

                    $('#proveedorForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                    $('#saveBtn').html('Guardar');

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Error');
                }
            });
        });

        $('body').on('click', '.deleteMutualidad', function() {


            $('#deleteModal').modal('show');

            var proveedor_id = $(this).data("id");
            var proveedor_nombre = $(this).data("nombre");

            $('#proveedor_id_eliminar').val(proveedor_id);
            $("#label_nombre").text(proveedor_nombre);
            /*
             confirm("Are You sure want to delete !");

             $.ajax({
                 type: "DELETE",
                 url: "{{ route('ordenes_compra.store') }}" + '/' + orden_compra_id,
                 success: function(data) {
                     table.draw();
                 },
                 error: function(data) {
                     console.log('Error:', data);
                 }
             }); */
        });

        $('body').on('click', '.eliminarButton', function() {



            var proveedor_id = $("#proveedor_id_eliminar").val();


            $.ajax({
                type: "DELETE",
                url: "{{ route('proveedores.store') }}" + '/' + proveedor_id,
                success: function(data) {
                    table.draw();
                    $('#deleteModal').modal('hide');
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });







    });
</script>