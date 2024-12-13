<title>Instrucciones</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



@include('menu/menu_top')




<div>
    <div class="row" style="margin-top: 10px;margin-left: 10px;">
        <h1>Lista Instrucciones de Deconstruccion de Prendas</h1>

      
        <a class="btn btn-success" href="javascript:void(0)" id="createNewMaterialTextil" style="height: 40px;margin-left: 10px;margin-top: 10px;">AGREGAR</a>
      
    </div>



    <table class="table table-bordered data-table" style="width:100%">
        <thead>
            <tr>
               <!--  <th>ID</th> -->

                <th>Nombre</th>
                <th>Detalles</th>

               

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
                <form id="materialTextilForm" name="materialTextilForm" class="form-horizontal" enctype="multipart/form-data">
                   <!--  <input type="hidden" name="id_usuario" id="id_usuario"> -->
                    <input type="hidden" name="material_textil_id" id="material_textil_id">


                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tipo</label>
                        <div class="col-sm-12">
                            <input type="text" id="nombre" name="nombre" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detalles</label>
                        <div class="col-sm-12">
                            <input type="text" id="detalles" name="detalles" placeholder="" class="form-control" required="">
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

                <p>Seguro que desea eliminar el material textil <strong id="label_nombre"></strong>?</p>
                <input type="hidden" name="material_textil_id_eliminar" id="material_textil_id_eliminar">

                <button type="submit" class="btn btn-danger float-right eliminarButton" id="eliminarButton">Eliminar
                </button>


            </div>
        </div>
    </div>
</div>

@include('menu/menu_bot')

<script type="text/javascript">
    $(function() {

        $("#nav-instrucciones").addClass("active");

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
                    data: 'detalles',
                    name: 'detalles'
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
            ajax: "{{ route('materiales_textiles.index') }}",
            columns: columnas
        });
        $('#createNewMaterialTextil').click(function() {
            $('#saveBtn').val("create-material-textil");
            $('#material_textil_id').val('');
            $('#materialTextilForm').trigger("reset");
            $('#modelHeading').html("Agregar Material");
            $('#ajaxModel').modal('show');
        });
        $('body').on('click', '.editMaterialTextil', function() {
            var material_textil_id = $(this).data('id');
            $.get("{{ route('materiales_textiles.index') }}" + '/' + material_textil_id + '/edit', function(data) {
                $('#modelHeading').html("Editar Material");
                $('#saveBtn').val("edit-material-textil");
                $('#ajaxModel').modal('show');
                $('#material_textil_id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#detalles').val(data.detalles);
 
              


            })
        });
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Guardando...');

            var data = new FormData($('#materialTextilForm')[0]);
            $.ajax({
                data: data,
                url: "{{ route('materiales_textiles.store') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function(data) {

                    $('#materialTextilForm').trigger("reset");
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

        $('body').on('click', '.deleteMaterialTextil', function() {


            $('#deleteModal').modal('show');

            var material_textil_id = $(this).data("id");
            var material_textil_nombre = $(this).data("nombre");

            $('#material_textil_id_eliminar').val(material_textil_id);
            $("#label_nombre").text(material_textil_nombre);
          
        });

        $('body').on('click', '.eliminarButton', function() {



            var material_textil_id = $("#material_textil_id_eliminar").val();


            $.ajax({
                type: "DELETE",
                url: "{{ route('materiales_textiles.store') }}" + '/' + material_textil_id,
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