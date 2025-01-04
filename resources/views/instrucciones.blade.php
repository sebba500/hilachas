<title>Instrucciones</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



@include('menu/menu_top')




<div>
    <div class="row" style="margin-top: 10px;margin-left: 10px;">
        <h1>Lista Instrucciones de Deconstruccion de Prendas</h1>


        <a class="btn btn-success" href="javascript:void(0)" id="createNewInstruccion" style="height: 40px;margin-left: 10px;margin-top: 10px;">AGREGAR</a>

    </div>



    <table class="table table-bordered data-table" style="width:100%">
        <thead>
            <tr>
                <!--  <th>ID</th> -->

                <th>Tipo tejido</th>
                <th>Material textil</th>
                <th>Instrucciones</th>
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
                <form id="instruccionForm" name="instruccionForm" class="form-horizontal" enctype="multipart/form-data">
                    <!--  <input type="hidden" name="id_usuario" id="id_usuario"> -->
                    <input type="hidden" name="instruccion_id" id="instruccion_id">


                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tipo Tejido</label>
                        <div class="col-sm-12">

                            <select class="form-control" name="tipo_tejido" id="tipo_tejido">

                            </select>



                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Material Textil</label>
                        <div class="col-sm-12">

                            <select class="form-control" name="material_textil" id="material_textil">

                            </select>



                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-4 control-label">Instrucciones</label>
                        <div class="col-sm-12">

                            <textarea rows="4" id="instruccion" name="instruccion" style="width: 100%;"></textarea>
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

                <p>Seguro que desea eliminar el registro</strong>?</p>
                <input type="hidden" name="instruccion_id_eliminar" id="instruccion_id_eliminar">

                <button type="submit" class="btn btn-danger float-right eliminarButton" id="eliminarButton">Eliminar
                </button>


            </div>
        </div>
    </div>
</div>

@include('menu/menu_bot')

<script type="text/javascript">
    $(function() {

    
       /*  const tipoTejidoSelect = document.getElementById("tipo_tejido");
        tipoTejidoSelect.addEventListener("change", function(event) {
            
            const selectedValue = event.target.value;

    
            $.ajax({
            url: "{{URL::to('getDatosParaInstrucciones')}}",
            type: 'GET',
            data: { tipo_tejido: selectedValue }, // Enviar el valor seleccionado
            success: function(data) {
                console.log("Datos recibidos:", data.dato);
                // Aquí puedes manejar la respuesta
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
        }); */



        $("#nav-instrucciones").addClass("active");

        var es_admin = <?= Auth::user()->admin ?>;


        columnas = [
            /* {
                                data: 'id',
                                name: 'id'
                            }, */

            {
                data: 'nombre_tipo_tejido',
                name: 'nombre_tipo_tejido'
            },
            {
                data: 'nombre_materiales_textiles',
                name: 'nombre_materiales_textiles'
            },
            {
                data: 'instrucciones',
                name: 'instrucciones'
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
            ajax: "{{ route('instrucciones.index') }}",
            columns: columnas
        });
        $('#createNewInstruccion').click(function() {

            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");


            $('#instruccion_id').val('');
            $('#instruccionForm').trigger("reset");
            $('#modelHeading').html("Agregar Instruccion");

            $.ajax({
                url: "{{URL::to('getDatosParaInstrucciones')}}",
                type: 'GET',
                success: function(data) {


                    var sel = $("#tipo_tejido");
                    sel.empty();
                    for (var i = 0; i < data.tipos_tejidos.length; i++) {
                        sel.append('<option value="' + data.tipos_tejidos[i].id + '">' + data.tipos_tejidos[i].nombre + '</option>');
                    }

                    var sel = $("#material_textil");
                    sel.empty();
                    for (var i = 0; i < data.materiales_textiles.length; i++) {
                        sel.append('<option value="' + data.materiales_textiles[i].id + '">' + data.materiales_textiles[i].nombre + '</option>');
                    }


                    $("#createNewInstruccion").prop("disabled", false);
                    $("#createNewInstruccion").html(`AGREGAR`);

                    $('#ajaxModel').modal('show');

                }
            })




        });
        $('body').on('click', '.editInstruccion', function() {


            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");

            var instruccion_id = $(this).data('id');

            $("#boton-editar" + instruccion_id).prop("disabled", true);
            $("#boton-editar" + instruccion_id).html(`<i class="fa fa-circle-o-notch fa-spin" style="font-size:17px"></i><span style="font-size:13px;margin-left:5px">Editar &nbsp;<i class="icon-pencil ">&nbsp;</i></span>`);

            $.get("{{ route('instrucciones.index') }}" + '/' + instruccion_id + '/edit', function(data) {
                $('#modelHeading').html("Editar Instrucción");

                $.ajax({
                    url: "{{URL::to('getDatosParaInstrucciones')}}",
                    type: 'GET',
                    success: function(data1) {

                        var sel = $("#tipo_tejido");
                        sel.empty();

                        for (var i = 0; i < data1.tipos_tejidos.length; i++) {

                            sel.append('<option value="' + data1.tipos_tejidos[i].id + '">' + data1.tipos_tejidos[i].nombre + '</option>');


                            if (data.id_tipo_tejido == data1.tipos_tejidos[i].id) {


                                sel.val(data1.tipos_tejidos[i].id);
                            }
                        }

                        var sel = $("#material_textil");
                        sel.empty();

                        for (var i = 0; i < data1.materiales_textiles.length; i++) {

                            sel.append('<option value="' + data1.materiales_textiles[i].id + '">' + data1.materiales_textiles[i].nombre + '</option>');


                            if (data.id_material_textil == data1.materiales_textiles[i].id) {


                                sel.val(data1.materiales_textiles[i].id);
                            }
                        }


                        $("#boton-editar" + instruccion_id).prop("disabled", false);
                        $("#boton-editar" + instruccion_id).html(`Editar &nbsp;<i class="icon-pencil ">&nbsp;</i>`);

                        $('#ajaxModel').modal('show');
                        $('#instruccion_id').val(data.id);
                        $('#instruccion').val(data.instrucciones);

                    }
                })







            })
        });
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Guardando...');

            var data = new FormData($('#instruccionForm')[0]);


            $.ajax({
                data: data,
                url: "{{ route('instrucciones.store') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function(data) {

                    $('#instruccionForm').trigger("reset");
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

        $('body').on('click', '.deleteInstruccion', function() {


            $('#deleteModal').modal('show');

            var instruccion_id = $(this).data("id");
            /*  var minstruccion_nombre = $(this).data("nombre"); */

            $('#instruccion_id_eliminar').val(instruccion_id);
            /* $("#label_nombre").text(material_textil_nombre); */

        });

        $('body').on('click', '.eliminarButton', function() {



            var instruccion_id = $("#instruccion_id_eliminar").val();


            $.ajax({
                type: "DELETE",
                url: "{{ route('instrucciones.store') }}" + '/' + instruccion_id,
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