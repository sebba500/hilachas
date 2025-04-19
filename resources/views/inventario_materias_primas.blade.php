<title>Instrucciones</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


@include('menu/menu_top')


<div class="row">
    <div class="col-xl-6 col-md-12">
        <a href="{{ url('/InventarioPrendas') }}">
            <div class="card card-button overflow-hidden">
                <div class="card-content">
                    <div class="card-body cleartfix">
                        <div class="media align-items-stretch">
                            <div class="align-self-center">
                                <i class="fa-solid fa-layer-group primary font-large-3 mr-3"></i>
                            </div>
                            <div class="media-body">
                                <h2 style="text-align: center;">Prendas</h2>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-6 col-md-12">

        <div class="card active">
            <div class="card-content">
                <div class="card-body clearfix">
                    <div class="media align-items-stretch">
                        <div class="align-self-center">
                            <i class="fa-solid fa-cubes warning font-large-3 mr-3"></i>
                        </div>
                        <div class="media-body">
                            <h2 style="text-align: center;">Materias Primas</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div>
    <div class="row" style="margin-top: 10px;margin-left: 10px;">
        <!--   <h1>Inventario Prendas</h1>


        <a class="btn btn-info" href="javascript:void(0)" id="agregarPrenda" style="height: 40px;margin-left: 10px;margin-top: 10px;">INGRESAR PRENDA</a>
 -->
    </div>


    <!-- <div class="row">
        <div class="col-12">
            <div id="contenedor-datos">
              
            </div>
        </div>
    </div> -->
    
     <div class="row" id="contenedor-datos">
        
    </div>
<!-- 
    <table class="table table-bordered data-table" style="width:100%">
        <thead>
            <tr>
               

                <th>Producto textil</th>
                <th>Tipo tejido</th>
                <th>Material textil</th>
                <th>Origen</th>
                <th>Color</th>
                <th width="300px">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table> -->
</div>




</div>



@include('menu/menu_bot')

<script type="text/javascript">
    $(function() {

        // Hacer la solicitud AJAX
        fetch("{{ url('/getDatosInventarioMateriasPrimas') }}")
            .then(response => response.json())
            .then(data => {
                // Referencia al contenedor
                const contenedor = document.getElementById('contenedor-datos');

                // Limpiar el contenedor (opcional si se recarga)
                contenedor.innerHTML = '';

                // Recorrer los datos y construir los divs
                data.forEach(dato => {
                    const div = document.createElement('div');
                    div.className = 'col-xl-3 col-sm-6 col-12';
                    div.innerHTML = `
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="fa-solid fa-cube  font-large-3 float-left" style="color:${dato.color_codigo}"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3>${dato.nombre_material_textil}</h3>
                                            <h4>${dato.color}</h4>
                                            <span>${dato.peso} Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    contenedor.appendChild(div);
                });
            })
            .catch(error => console.error('Error al cargar los datos:', error));



  

        $("#nav-inventario").addClass("active");

        var es_admin = <?= Auth::user()->admin ?>;


        /*
        columnas = [
          

            {
                data: 'tipo_producto_textil',
                name: 'tipo_producto_textil'
            },
            {
                data: 'nombre_tipo_tejido',
                name: 'nombre_tipo_tejido'
            },
            {
                data: 'nombre_material_textil',
                name: 'nombre_material_textil'
            },
            {
                data: 'origen',
                name: 'origen'
            },
            {
                data: 'color',
                name: 'color'
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
            ajax: "{{ route('inventario_prendas.index') }}",
            columns: columnas
        }); */


        $('#agregarPrenda').click(function() {

            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");


            $('#prenda_id').val('');
            $('#inventarioPrendasForm').trigger("reset");
            $('#modelHeading').html("Ingresar Prenda");

            $.ajax({
                url: "{{URL::to('getDatosParaInventarioPrendas')}}",
                type: 'GET',
                success: function(data) {

                    var sel = $("#producto_textil");
                    sel.empty();
                    for (var i = 0; i < data.productos_textiles.length; i++) {
                        sel.append('<option value="' + data.productos_textiles[i].id + '">' + data.productos_textiles[i].tipo + '</option>');
                    }

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


                    $("#agregarPrenda").prop("disabled", false);
                    $("#agregarPrenda").html(`Ingresar Prenda`);

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

            var data = new FormData($('#inventarioPrendasForm')[0]);


            $.ajax({
                data: data,
                url: "{{ route('inventario_prendas.store') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function(data) {

                    $('#inventarioPrendasForm').trigger("reset");
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

        $('body').on('click', '.procesarPrenda', function() {

            const datos = table.row($(this).closest('tr')).data();

            $.ajax({
                url: "{{URL::to('getDatosInstruccionesFiltradas')}}",
                type: 'GET',
                data: {
                    datos: datos
                },
                success: function(data) {

                    $('#instruccion').val(data.instrucciones);
                    $('#procesarModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });

        });

        $('body').on('click', '.procesarButton', function() {

            const datos = table.row($(this).closest('tr')).data();

            $.ajax({
                url: "{{URL::to('getDatosInstruccionesFiltradas')}}",
                type: 'GET',
                data: {
                    datos: datos
                },
                success: function(data) {

                    $('#instruccion').val(data.instrucciones);
                    $('#procesarModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });

        });



        $('body').on('click', '.deletePrenda', function() {


            $('#deleteModal').modal('show');

            var prenda_id = $(this).data("id");


            $('#prenda_id_eliminar').val(prenda_id);


        });

        $('body').on('click', '.eliminarButton', function() {



            var prenda_id = $("#prenda_id_eliminar").val();


            $.ajax({
                type: "DELETE",
                url: "{{ route('inventario_prendas.store') }}" + '/' + prenda_id,
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