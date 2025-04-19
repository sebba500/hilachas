
    <title>Configuración</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @include('menu/menu_top')





        <div class="card " style="margin-top:20px; padding:20px">
            <div class="row" style="margin-top: 10px;margin-left: 2px;">
                <h1>Datos de usuario</h1>


            </div>

            <form id="datosUsuarioForm">



                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Rut</label>
                        <input type="text" class="form-control" id="rut" name="rut" placeholder="Rut" value="{{$usuario[0]['rut']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{$usuario[0]['nombre']}}">
                    </div>

                </div>

             

            

                <!--  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div> -->


                <button  class="btn btn-primary float-right" id="guardarUsuarioButton">Actualizar</button>

            </form>
        </div>

        <div class="card " style="margin-top:20px; padding:20px">
            <div class="row" style="margin-top: 10px;margin-left: 2px;">
                <h1>Seguridad</h1>


            </div>

            <form id="seguridadForm">



                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Contraseña actual</label>
                        <input type="password" class="form-control" id="actual_pass" name="actual_pass" placeholder="Contraseña" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="nueva_pass" name="nueva_pass" placeholder="Contraseña" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Repetir nueva contraseña</label>
                        <input type="password" class="form-control" id="nueva_pass_repetir" name="nueva_pass_repetir" placeholder="Contraseña" value="">
                    </div>
                </div>



                <button class="btn btn-primary float-right" id="guardarPassButton">Actualizar</button>

            </form>
        </div>


     

    

    @include('menu/menu_bot')

   

    <script type="text/javascript">
        $(function() {

            $("#nav-datos").addClass("active");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            alertify.set('notifier', 'position', 'bottom-center');


           
            $('#guardarUsuarioButton').click(function(e) {
                e.preventDefault();
                $(this).html('Actualizando...');

                var data = new FormData($('#datosUsuarioForm')[0]);

                /* var password = $("#password").val();
                var rut = $("#rut").val();
                var nombre = $("#nombre").val();


                if (password == null || password == "" || rut == "" || rut == "" || nombre == "" || nombre == "") {
                    $('#saveBtn').html('Debe llenar los campos');
                    $("#saveBtn").css("background-color", "red");

                } else { */
                $.ajax({
                    data: data,
                    url: "{{ route('config.storeUser') }}",
                    type: "POST",

                    contentType: false,
                    processData: false,
                    success: function(data) {

                        // $('#datosUsuarioForm').trigger("reset");

                        // console.log(data.datos_usuario.rut);

                        $('#guardarUsuarioButton').html('Actualizar');

                        //  $("#saveBtn").css("background-color", "#007bff"); 

                        // $('#rut').val(data.datos_usuario.rut);


                        alertify.success('Datos actualizados');
                    },
                    error: function(data) {
                        //console.log('Error:', data);
                        $('#guardarUsuarioButton').html('Error');
                        //$("#guardarButton").css("background-color", "#007bff");
                        alertify.error('Hubo un error al guardar');
                    }
                });
                // }

            });

            $('#guardarPassButton').click(function(e) {
                e.preventDefault();
                $(this).html('Actualizando...');

                var data = new FormData($('#seguridadForm')[0]);

                /* var password = $("#password").val();
                var rut = $("#rut").val();
                var nombre = $("#nombre").val();


                if (password == null || password == "" || rut == "" || rut == "" || nombre == "" || nombre == "") {
                    $('#saveBtn').html('Debe llenar los campos');
                    $("#saveBtn").css("background-color", "red");

                } else { */
                $.ajax({
                    data: data,
                    url: "{{ route('config.storePass') }}",
                    type: "POST",

                    contentType: false,
                    processData: false,
                    success: function(data) {


                        if (data.success == 2) {

                            alertify.success('Contraseña actualizada');

                        } else if (data.success == 1) {

                            alertify.warning('Las nuevas contraseñas deben coincidir');
                        } else {

                            alertify.error('Contraseña actual no coincide');
                        }


                        $('#guardarPassButton').html('Actualizar');


                    },
                    error: function(data) {

                        $('#guardarPassButton').html('Error');

                        alertify.error('Hubo un error al guardar');
                    }
                });
                // }

            });







        });
    </script>
