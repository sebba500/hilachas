<title>Productos</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">





@include('menu/menu_top')



<!-- <a href="{{ url('/ListaOrdenesCompra') }}" class="btn btn-xs btn-info pull-right">OrdenesCompra</a> -->
<div>


    <div class="row" style="margin-top: 10px;margin-left: 10px;">
        <h1>PRODUCTOS</h1>


        <a class="btn btn-success" href="javascript:void(0)" id="createNewProducto" style="height: 40px;margin-left: 10px;margin-top: 10px;">AGREGAR</a>

    </div>



    <table class="table table-bordered data-table" style="width:100%">
        <thead>
            <tr>
               <!--  <th>ID</th> -->
               
                <th>Nombre</th>
                <th>Código</th>
                <th>Detalles</th>
                <th>Precio</th>
                <th>Proveedor</th>

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
                <form id="productoForm" name="productoForm" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="producto_id" id="producto_id">


                   

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" id="nombre" name="nombre" placeholder="" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Código</label>
                        <div class="col-sm-12">
                            <input type="text" id="codigo" name="codigo" placeholder="" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detalles</label>
                        <div class="col-sm-12">
                            <input type="text" id="detalles" name="detalles" placeholder="" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">Precio</label>
                        <div class="col-sm-12">
                            <input type="text" id="precio" name="precio" placeholder="" class="form-control" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-4 control-label">Proveedor</label>
                        <div class="col-sm-12">

                            <select class="form-control" name="proveedor" id="proveedor">

                            </select>



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

                <p>Seguro que desea eliminar el producto?</p>
                <input type="hidden" name="producto_id_eliminar" id="producto_id_eliminar">

                <button type="submit" class="btn btn-danger float-right eliminarButton" id="eliminarButton">Eliminar
                </button>


            </div>
        </div>
    </div>
</div>


@include('menu/menu_bot')

<script type="text/javascript">
    $(function() {


        $("#nav-productos").addClass("active");



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "Sin registros disponibles",
                "info": "_TOTAL_ registros totales",
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
            ajax: "{{ route('productos.index') }}",
            columns: [/* {
                    data: 'id',
                    name: 'id'
                }, */

               
                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'codigo',
                    name: 'codigo'
                },


                {
                    data: 'detalles',
                    name: 'detalles'
                },
                {
                    data: 'precio',
                    name: 'precio'
                },
                {
                    data: 'nombre_proveedor',
                    name: 'nombre_proveedor'
                },



                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]


        });



        $('#createNewProducto').click(function() {

            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");


            $('#producto_id').val('');
            $('#productoForm').trigger("reset");
            $('#modelHeading').html("Crear Producto");

            $.ajax({
                url: "{{URL::to('getDatosProveedor')}}",
                type: 'GET',
                success: function(data) {


                    var sel = $("#proveedor");
                    sel.empty();
                    for (var i = 0; i < data.proveedores.length; i++) {
                        sel.append('<option value="' + data.proveedores[i].id + '">' + data.proveedores[i].nombre + '</option>');
                    }


                    $("#createNewOrdenCompra").prop("disabled", false);
                    $("#createNewOrdenCompra").html(`AGREGAR`);




                    $('#ajaxModel').modal('show');
                }
            })


        });



        /* $("#productoForm").on("submit", function(e) {

            console.log("hola");
            
        }); */


        $('body').on('click', '.editProducto', function() {


            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");

            var producto_id = $(this).data('id');

            $("#boton-editar" + producto_id).prop("disabled", true);
            $("#boton-editar" + producto_id).html(`<i class="fa fa-circle-o-notch fa-spin" style="font-size:17px"></i><span style="font-size:13px;margin-left:5px">Editar &nbsp;<i class="icon-pencil ">&nbsp;</i></span>`);

            $.get("{{ route('productos.index') }}" + '/' + producto_id + '/edit', function(data) {
                $('#modelHeading').html("Editar Producto");

                $.ajax({
                    url: "{{URL::to('getDatosProveedor')}}",
                    type: 'GET',
                    success: function(data1) {


                        $("#boton-editar" + producto_id).prop("disabled", false);
                        $("#boton-editar" + producto_id).html(`Editar &nbsp;<i class="icon-pencil ">&nbsp;</i>`);

                        $('#ajaxModel').modal('show');
                        $('#producto_id').val(data.id);
                        $('#nombre').val(data.nombre);
                        $('#codigo').val(data.codigo);
                        $('#detalles').val(data.detalles);
                        $('#precio').val(data.precio);

                        
                          
               
                        var sel = $("#proveedor");
                        sel.empty();
            
                        for (var i = 0; i < data1.proveedores.length; i++) {

                            sel.append('<option value="' + data1.proveedores[i].id + '">' + data1.proveedores[i].nombre + '</option>');
                           

                            if (data.id_proveedor == data1.proveedores[i].id) {


                                sel.val(data1.proveedores[i].id);
                            }
                        }

                     

                    }
                })







            })
        });
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Guardando...');

            var data = new FormData($('#productoForm')[0]);


            $.ajax({
                data: data,
                url: "{{ route('productos.store') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function(data) {

                    $('#productoForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                    $('#saveBtn').html('Guardar');
                    $("#saveBtn").css("background-color", "#007bff");
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Error');
                    $("#saveBtn").css("background-color", "#007bff");
                }
            });
            //}

        });









        $('body').on('click', '.deleteProducto', function() {


            $('#deleteModal').modal('show');

            var producto_id = $(this).data("id");


            $('#producto_id_eliminar').val(producto_id);

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



            var producto_id = $("#producto_id_eliminar").val();


            $.ajax({
                type: "DELETE",
                url: "{{ route('productos.store') }}" + '/' + producto_id,
                success: function(data) {
                    table.draw();
                    $('#deleteModal').modal('hide');
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });




        $('#rut').keyup(function() {
            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");
        });
        $('#nombre').keyup(function() {
            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");
        });
        $('#password').keyup(function() {
            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");
        });



    });
</script>