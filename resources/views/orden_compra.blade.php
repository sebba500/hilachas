<title>OrdenesCompra</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">




@include('menu/menu_top')





<div class="row">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="icon-notebook primary font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <h3>19</h3>
                            <span>Ordenes creadas último mes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="icon-envelope-letter warning font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <h3>15</h3>
                            <span>Ordenes enviadas último mes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="lni lni-exit"></i>
                            <span class="fa fa-money success font-large-2 float-left"></span>
                            <!--  <i class="fa-money success font-large-2 float-left"></i>  -->
                        </div>
                        <div class="media-body text-right">
                            <h3>$ 154.589</h3>
                            <span>Valor ordenes enviadas último mes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="align-self-center">
                            <i class="icon-social-dropbox danger font-large-2 float-left"></i>
                        </div>
                        <div class="media-body text-right">
                            <h3>423</h3>
                            <span>Productos comprados último mes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <a href="{{ url('/ListaProductos') }}" class="btn btn-xs btn-info pull-right">Productos</a> -->
<div>
    <div class="row" style="margin-top: 10px;margin-left:10px;">
        <h2>ORDENES DE COMPRA</h2>


        <a class="btn btn-success" href="javascript:void(0)" id="createNewOrdenCompra" style="height: 40px;margin-left: 10px;margin-top: 10px;">NUEVA ORDEN</a>

    </div>



    <table class="table  table-bordered data-table" style="width:100%">
        <thead>
            <tr>

                <th>Numero</th>
                <th>N° Cotización</th>
                <th>Forma de pago</th>
                <th>Estado</th>
                <th>Fecha Creación</th>
                <th>Monto Orden</th>
                <th>Proveedor</th>
                <th width="300px">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>



</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="orden_compraForm" name="orden_compraForm" class="form-horizontal" enctype="multipart/form-data">

                    <input type="hidden" name="orden_compra_id" id="orden_compra_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Número</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="numero" name="numero" placeholder="" value="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Cotización</label>
                        <div class="col-sm-12">
                            <input type="text" id="cotizacion" name="cotizacion" placeholder="" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Forma de Pago</label>
                        <div class="col-sm-12">

                            <select class="form-control" name="forma_pago" id="forma_pago">
                                <option value="Contado">Contado</option>
                                <option value="Crédito">Crédito</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Proveedor</label>
                        <div class="col-sm-12">

                            <select class="form-control" name="proveedor" id="proveedor">

                            </select>



                        </div>
                    </div>

                    <hr>

                    <div style="border: 1px solid;border-radius: 10px;padding: 20px;margin-bottom: 30px;">

                        <div class="row ">
                            <div class="col-lg-8 ">

                                <label class="col-sm-4 control-label">Producto</label>
                                <div class="col-sm-12">

                                    <select class="form-control" name="producto" id="producto">

                                    </select>



                                </div>
                            </div>
                            <div class="col-lg-2">

                                <label class="col-sm-4 control-label">Cantidad</label>
                                <div class="col-sm-12">
                                    <input type="number" id="cantidad" name="cantidad" placeholder="" class="form-control" value="1">
                                </div>
                            </div>

                            <div class="col-lg-2">

                                <label class="col-sm-4 control-label">&zwnj;</label>
                                <div class="col-sm-12">

                                    <button type="button" class="btn btn-success float-right" id="agregar_producto" style="width: 100px;height: 38px;">
                                        <span data-feather="plus"></span>
                                    </button>



                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <table class="table  table-bordered " style="width:100%; margin-top:50px">
                                <thead>
                                    <tr>

                                        <th>producto</th>
                                        <th>cantidad</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @if(count($items))
                                    @foreach ($items as $item)
                                    <td> {{ $item->nombre }} </td>

                                    @endforeach


                                    <td>
                                        <button type="button" class="btn btn-danger float-right" id="eliminar_producto">
                                            <span data-feather="trash"></span>
                                        </button>
                                    </td>
                                    @endif

                                    <tr>
                                        <td> producto 1 </td>
                                        <td> 1000 </td>
                                        <td>
                                            <button type="button" class="btn btn-danger float-right" id="eliminar_producto">
                                                <span data-feather="trash"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> producto 1.1 </td>
                                        <td> 1000 </td>
                                        <td>
                                            <button type="button" class="btn btn-danger float-right" id="eliminar_producto">
                                                <span data-feather="trash"></span>
                                            </button>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
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

                <p>Seguro que desea eliminar la orden?</p>
                <input type="hidden" name="orden_compra_id_eliminar" id="orden_compra_id_eliminar">

                <button type="submit" class="btn btn-danger float-right eliminarButton" id="eliminarButton">Eliminar
                </button>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="enviarModal" aria-hidden="true">


    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Confirmar acción</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-lg-12">

                <p>¿Enviar la orden al proveedor?</p>
                <input type="hidden" name="id_proveedor_enviar" id="id_proveedor_enviar">

                <button type="submit" class="btn btn-primary float-right" id="enviar_boton">Enviar
                </button>


            </div>
        </div>
    </div>
</div>



@include('menu/menu_bot')


<script type="text/javascript">
    $(function() {

        $("#nav-ordenes_compra").addClass("active");







        cantidad_productos = "_TOTAL_ registros totales";
        columnas = [{
                data: 'numero',
                name: 'numero'
            },
            {
                data: 'cotizacion',
                name: 'cotizacion'
            },
            {
                data: 'forma_pago',
                name: 'forma_pago'
            },
            {
                data: 'estado',
                render: function(data, type, row, meta) {
                    // Condiciones para cambiar el valor de la celda
                    if (data == 0) {
                        return 'Creada';
                    } else if (data == 10) {
                        return 'Enviada';
                    } else {
                        return data; // Valor por defecto
                    }
                },
                name: 'estado'
            },
            {
                data: 'fecha_creacion',
                name: 'fecha_creacion'
            },
            {
                data: 'monto_orden',
                render: $.fn.dataTable.render.number('.', '.', 0, ''),
                name: 'monto_orden'
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var table = $('.data-table').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "Sin registros disponibles",
                "info": cantidad_productos,
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
            ajax: "{{ route('ordenes_compra.index') }}",
            columns: columnas
        });



        $('#proveedor').change(function() {
            $.ajax({
                url: "{{URL::to('getDatosProducto/')}}" + "/" + $('#proveedor').val(),
                type: 'GET',
                success: function(data) {


                    var sel = $("#producto");
                    sel.empty();
                    for (var i = 0; i < data.productos.length; i++) {
                        sel.append('<option value="' + data.productos[i].id + '">' + data.productos[i].nombre + '</option>');
                    }



                    $('#ajaxModel').modal('show');

                    $("#createNewOrdenCompra").prop("disabled", false);
                    $("#createNewOrdenCompra").html(`NUEVA ORDEN`);






                }
            })

        });

        $('#createNewOrdenCompra').click(function() {


            $("#createNewOrdenCompra").prop("disabled", true);
            $("#createNewOrdenCompra").html(`<i class="fa fa-circle-o-notch fa-spin" style="font-size:18px" ></i><span style="font-size:16px;margin-left:5px">NUEVA ORDEN</span>`);


            $('#saveBtn').val("create-orden_compra");
            $('#orden_compra_id').val('');
            $('#orden_compraForm').trigger("reset");
            $('#modelHeading').html("Crear orden de compra");
            $.ajax({
                url: "{{URL::to('getDatosProveedor')}}",
                type: 'GET',
                success: function(data) {


                    var sel = $("#proveedor");
                    sel.empty();
                    for (var i = 0; i < data.proveedores.length; i++) {
                        sel.append('<option value="' + data.proveedores[i].id + '">' + data.proveedores[i].nombre + '</option>');
                    }


                    $.ajax({
                        url: "{{URL::to('getDatosProducto/')}}" + "/" + data.proveedores[0].id,
                        type: 'GET',
                        success: function(data) {


                            var sel = $("#producto");
                            sel.empty();
                            for (var i = 0; i < data.productos.length; i++) {
                                sel.append('<option value="' + data.productos[i].id + '">' + data.productos[i].nombre + '</option>');
                            }



                            $('#ajaxModel').modal('show');

                            $("#createNewOrdenCompra").prop("disabled", false);
                            $("#createNewOrdenCompra").html(`NUEVA ORDEN`);






                        }
                    })




                }
            })

        });




        $('#agregar_producto').click(function(e) {
            /* e.preventDefault();
            $(this).html('Guardando...');

            var data = new FormData($('#orden_compraForm')[0]);
            $.ajax({
                data: data,
                url: "{{URL::to('agregarProducto')}}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function(data) {

                    $('#orden_compraForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                    $('#saveBtn').html('Guardar');




                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Error');

                }
            }); */
        });

        $('body').on('click', '.enviarOrdenCompra', function() {


            $('#enviarModal').modal('show');

            var id_proveedor = $(this).data("id_proveedor");


            $('#id_proveedor_enviar').val(id_proveedor);


        });

        $('#enviar_boton').click(function(e) {
            e.preventDefault();

            var data = {
                id_proveedor: $('#id_proveedor_enviar').val()
            };
           
            $.ajax({
                data: JSON.stringify(data),
                url: "{{URL::to('enviarOrden')}}",
                type: "POST",

                contentType: "application/json",
                processData: false,
                success: function(data) {


                    $('#enviarModal').modal('hide');
                    table.draw();






                },
                error: function(data) {
                    console.log('Error:', data);


                }
            });
        });



        $('body').on('click', '.editOrdenCompra', function() {

            var orden_compra_id = $(this).data('id');

            $("#boton-editar" + orden_compra_id).prop("disabled", true);
            $("#boton-editar" + orden_compra_id).html(`<i class="fa fa-circle-o-notch fa-spin" style="font-size:17px"></i><span style="font-size:13px;margin-left:5px">Editar</span>`);


            $.get("{{ route('ordenes_compra.index') }}" + '/' + orden_compra_id + '/edit', function(data) {
                $('#modelHeading').html("Editar orden_compra");
                $('#saveBtn').val("edit-orden_compra");


                $('#orden_compra_id').val(data.id);
                $('#rut').val(data.rut);
                $('#nombre').val(data.nombre);
                $('#fecha_nacimiento').val(data.fecha_nacimiento);
                $('#genero').val(data.genero);
                $('#domicilio').val(data.domicilio);
                $('#ciudad').val(data.ciudad);
                $('#celular').val(data.celular);
                $('#cargo').val(data.cargo);
                $('#grupo_sangre').val(data.grupo_sangre);
                $('#peso').val(data.peso);
                $('#estatura').val(data.estatura);
                $('#enfermedad_base').val(data.enfermedad_base);
                $('#alergia').val(data.alergia);
                $('#medicamento_prescrito').val(data.medicamento_prescrito);
                $('#rut_empresa').val(data.rut_empresa);
                $('#nombre_empresa').val(data.nombre_empresa);
                $('#direccion_empresa').val(data.direccion_empresa);
                $('#ciudad_empresa').val(data.ciudad_empresa);
                $('#contacto_emergencia').val(data.contacto_emergencia);
                $('#cargo_contacto').val(data.cargo_contacto);
                $('#fono_emergencia').val(data.fono_emergencia);
                $('#observacion').val(data.observacion);
                //$('#foto').val(data.foto);

                if (data.foto) {

                    $("#label_foto").text("FOTO CARGADA");
                    $("#label_foto").css("color", "green");
                } else {
                    $("#label_foto").text("FOTO SIN CARGAR");
                    $("#label_foto").css("color", "red");
                }

                $.ajax({
                    url: "{{URL::to('getDatosEmpresa')}}",
                    type: 'GET',
                    success: function(data1) {

                        $("#boton-editar" + orden_compra_id).prop("disabled", false);
                        $("#boton-editar" + orden_compra_id).html(`Editar`);

                        $('#ajaxModel').modal('show');
                        var sel = $("#mutualidad");
                        sel.empty();
                        for (var i = 0; i < data1.length; i++) {


                            sel.append('<option value="' + data1[i].id + '">' + data1[i].nombre + '</option>');

                            if (data.mutualidad == data1[i].id) {


                                sel.val(data1[i].id);
                            }
                        }

                        //console.log(data.mutualidad);

                    }
                })

            })
        });
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Guardando...');

            var data = new FormData($('#orden_compraForm')[0]);
            $.ajax({
                data: data,
                url: "{{ route('ordenes_compra.store') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function(data) {

                    $('#orden_compraForm').trigger("reset");
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



        $('body').on('click', '.deleteOrdenCompra', function() {


            $('#deleteModal').modal('show');

            var orden_compra_id = $(this).data("id");
            var orden_compra_rut = $(this).data("rut");

            $('#orden_compra_id_eliminar').val(orden_compra_id);
            $("#label_rut").text(orden_compra_rut);
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



            var orden_compra_id = $("#orden_compra_id_eliminar").val();


            $.ajax({
                type: "DELETE",
                url: "{{ route('ordenes_compra.store') }}" + '/' + orden_compra_id,
                success: function(data) {
                    table.draw();
                    $('#deleteModal').modal('hide');
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });





        $('body').on('click', '.verOrdenCompra', function() {



            var orden_compra_id = $(this).data("id");

            window.open("{{URL::to('orden_compra/')}}" + "/" + orden_compra_id, '_blank');

            //var uri = "{{ route('orden_compraQR', ':variable') }}";
            //uri = uri.replace(':variable', orden_compra_id);




            /*  $.ajax({
                 url: uri,
                 type: "get",
                 dataType: 'json',
                 success: function(data) {
                    
                   
                     window.location.href = "{{URL::to('orden_compra/')}}"+"/"+data.datos;
                 },
                 error: function(data) {
                     console.log('Error:', data);
                 }
             }); */
        });




    });
</script>