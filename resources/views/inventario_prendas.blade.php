<title>Instrucciones</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


@include('menu/menu_top')



<section id="stats-subtitle">


    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card overflow-hidden active">
                <div class="card-content">
                    <div class="card-body cleartfix">
                        <div class="media align-items-stretch">
                            <div class="align-self-center">
                                <i class="fa-solid fa-layer-group primary font-large-3 mr-3"></i>
                            </div>
                            <div class="media-body">
                                <h2 style="text-align: center;">Prendas</h2>


                            </div>
                            <div>
                                <i class="icon-plus primary font-large-2 mr-2 btn btn-success" href="javascript:void(0)" id="agregarPrenda" style="color: white !important;"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-12">
            <a href="{{ url('/InventarioMateriasPrimas') }}">
                <div class="card card-button">
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
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card  border-0 fixed-height">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa-solid fa-shirt font-large-2 text-primary  float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h4 class="font-weight-bold text-secondary">Cantidad Productos</h4>
                                <h5 class="d-flex align-items-center justify-content-between">
                                    <select
                                        name="select_producto_textil"
                                        id="select_producto_textil"
                                        class="custom-select border-0 bg-light shadow-sm"
                                        style="width: 80%; font-size: 1rem;margin-left: 20px;">

                                    </select>
                                    <span
                                        id="cantidad_producto_textil"
                                        class="badge"
                                        style="min-width: 40px; text-align: center; font-size: 1rem;padding: 0.5rem; display: inline-block;">
                                        0
                                    </span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card border-0 fixed-height">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa-solid fa-clone text-success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h4 class="font-weight-bold text-secondary">Tela Plano</h4>
                                <h5 class="d-flex align-items-center justify-content-end">
                                    <span
                                        id="cantidad_tela_plano"
                                        class="badge badge-success"
                                        style="min-width: 60px; text-align: center; font-size: 1rem; padding: 0.5rem; display: inline-block; ">
                                        0
                                    </span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card border-0 fixed-height">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa-solid fa-clone text-info font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h4 class="font-weight-bold text-secondary">Tela Stretch</h4>
                                <h5 class="d-flex align-items-center justify-content-end">
                                    <span
                                        id="cantidad_tela_stretch"
                                        class="badge badge-info"
                                        style="min-width: 60px; text-align: center; font-size: 1rem; padding: 0.5rem; display: inline-block; ">
                                        0
                                    </span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card border-0 fixed-height">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa-solid fa-clone text-secondary font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h4 class="font-weight-bold text-secondary">Tejido</h4>
                                <h5 class="d-flex align-items-center justify-content-end">
                                    <span
                                        id="cantidad_tejido"
                                        class="badge badge-secondary"
                                        style="min-width: 60px; text-align: center; font-size: 1rem; padding: 0.5rem; display: inline-block; ">
                                        0
                                    </span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>

<div>
    <div class="row" style="margin-top: 10px;margin-left: 10px;">
        <!--   <h1>Inventario Prendas</h1> -->


        <!--  <a class="btn btn-info" href="javascript:void(0)" id="agregarPrenda" style="height: 40px;margin-left: 10px;margin-top: 10px;">INGRESAR PRENDA</a> -->

    </div>



    <table class="table table-bordered data-table" style="width:100%">
        <thead>
            <tr>
                <!--  <th>ID</th> -->

                <th>Producto textil</th>
                <th>Tipo tejido</th>
                <th>Material textil</th>
                <th>Origen</th>
                <th>Color</th>
                <th>Estampado</th>
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
                <form id="inventarioPrendasForm" name="inventarioPrendasForm" class="form-horizontal" enctype="multipart/form-data">
                    <!--  <input type="hidden" name="id_usuario" id="id_usuario"> -->
                    <input type="hidden" name="prenda_id" id="prenda_id">


                    <div class="form-group">


                        <label class="col-sm-4 control-label">Producto Textil</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <select class="form-control" name="producto_textil" id="producto_textil">

                                </select>

                                <button type="button" id="agregar_producto_textil" class="btn btn-primary"><span data-feather="plus"></span></button>

                            </div>
                        </div>



                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tipo Tejido</label>
                        <div class="col-md-12">


                            <div class="input-group">
                                <select class="form-control" name="tipo_tejido" id="tipo_tejido">

                                </select>

                                <!--  <button type="button" id="agregar_tipo_tejido" class="btn btn-primary"><span data-feather="plus"></span></button> -->

                            </div>



                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Material Textil</label>
                        <div class="col-sm-12">



                            <div class="input-group">
                                <select class="form-control" name="material_textil" id="material_textil">

                                </select>

                                <button type="button" id="agregar_material_textil" class="btn btn-primary"><span data-feather="plus"></span></button>

                            </div>


                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Origen</label>
                        <div class="col-sm-12">

                            <select class="form-control" name="origen" id="origen">
                                <option value="Donación Privada">Donación Privada</option>
                                <option value="Recogido de calle">Recogido de calle</option>
                                <option value="Donación de Evento">Donación de Evento</option>
                                <option value="Fardo">Fardo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="color-wheel-container">
                            <label for="color" class="col-sm-4 control-label" style="text-align: center; margin-bottom: -20px;"><h5>Color</h5></label>
                            <input type="hidden" name="color" id="color">
                            <input type="hidden" name="color_codigo" id="color_codigo">

                            <div class="color-groups">
                                <!-- Colores Cálidos -->
                                <div class="color-group warm-colors">
                                    <h5>Colores Cálidos</h5>
                                    <div class="color-option" style="background-color: #DC137D;" data-value="Rojo-Violeta" data-codigo="#DC137D"></div>
                                    <div class="color-option" style="background-color: #FE0000;" data-value="Rojo" data-codigo="#FE0000"></div>
                                    <div class="color-option" style="background-color: #FB5A00;" data-value="Rojo-Naranjo" data-codigo="#FB5A00"></div>
                                    <div class="color-option" style="background-color: #FD9A00;" data-value="Naranjo" data-codigo="#FD9A00"></div>
                                    <div class="color-option" style="background-color: #FFD700;" data-value="Naranjo-Amarillo" data-codigo="#FFD700"></div>
                                    <div class="color-option" style="background-color: #FCFF00;" data-value="Amarillo" data-codigo="#FCFF00"></div>
                                </div>

                                <!-- Colores Fríos -->
                                <div class="color-group cool-colors">
                                    <h5>Colores Fríos</h5>
                                    <div class="color-option" style="background-color: #D5FE00;" data-value="Amarillo-Verde" data-codigo="#D5FE00"></div>
                                    <div class="color-option" style="background-color: #57D801;" data-value="Verde" data-codigo="#57D801"></div>
                                    <div class="color-option" style="background-color: #0191DA;" data-value="Verde-Azul" data-codigo="#0191DA"></div>
                                    <div class="color-option" style="background-color: #0201FD;" data-value="Azul" data-codigo="#0201FD"></div>
                                    <div class="color-option" style="background-color: #6E01D0;" data-value="Azul-Violeta" data-codigo="#6E01D0"></div>
                                    <div class="color-option" style="background-color: #A101AB;" data-value="Violeta" data-codigo="#A101AB"></div>
                                </div>
                            </div>
                            

                        </div>

                        <div class="color-wheel-container">
                            <label for="color" class="col-sm-4 control-label" style="text-align: center;margin-bottom: -20px;margin-top: 20px;"><h5>Estampado</h5></label>
                            <input type="hidden" name="estampado" id="estampado">


                

                            <div class="estampado-groups">
                                <!-- Estampados Claros -->
                                <div class="estampado-group light-patterns">
                                    <h5>Estampados Claros</h5>
                                    <div class="estampado-option pattern-option" style="background-image: url('https://e7.pngegg.com/pngimages/157/447/png-clipart-floral-design-rubber-stamp-postage-stamps-natural-rubber-flower-flower-rubber-stamps-leaf-monochrome.png');" data-value="Floral-C" data-codigo="#d7d7d0fc"></div>
                                    <div class="estampado-option pattern-option" style="background-image: url('https://i.etsystatic.com/32053703/r/il/fba2e7/3505252148/il_570xN.3505252148_1cf1.jpg');" data-value="Stripes-C" data-codigo="#d7d7d0fc"></div>
                                    <div class="estampado-option pattern-option" style="background-image: url('https://t4.ftcdn.net/jpg/03/09/84/17/360_F_309841744_wYGd2DlTEnqpiEAldx0WKDKcg4GPAw5x.jpg');" data-value="Plaid-C" data-codigo="#d7d7d0fc"></div>
                                    <div class="estampado-option pattern-option" style="background-image: url('https://cdn-icons-png.flaticon.com/512/6036/6036614.png');" data-value="Stamped-C" data-codigo="#d7d7d0fc"></div>
                                </div>

                                <!-- Estampados Oscuros -->
                                <div class="estampado-group dark-patterns">
                                    <h5>Estampados Oscuros</h5>
                                    <div class="estampado-option pattern-option" style="background-image: url('https://e7.pngegg.com/pngimages/157/447/png-clipart-floral-design-rubber-stamp-postage-stamps-natural-rubber-flower-flower-rubber-stamps-leaf-monochrome.png');" data-value="Floral-O" data-codigo="#000000"></div>
                                    <div class="estampado-option pattern-option" style="background-image: url('https://i.etsystatic.com/32053703/r/il/fba2e7/3505252148/il_570xN.3505252148_1cf1.jpg');" data-value="Stripes-O" data-codigo="#000000"></div>
                                    <div class="estampado-option pattern-option" style="background-image: url('https://t4.ftcdn.net/jpg/03/09/84/17/360_F_309841744_wYGd2DlTEnqpiEAldx0WKDKcg4GPAw5x.jpg');" data-value="Plaid-O" data-codigo="#000000"></div>
                                    <div class="estampado-option pattern-option" style="background-image: url('https://cdn-icons-png.flaticon.com/512/6036/6036614.png');" data-value="Stamped-O" data-codigo="#000000"></div>
                                </div>
                            </div>
                        </div>
                        <!-- <label class="col-sm-4 control-label">Color</label>
                        <div class="col-sm-12">

                            <select class="form-control" name="color" id="color">
                                <option value="Rojo-Violeta">Rojo-Violeta</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Rojo-Naranjo">Rojo-Naranjo</option>
                                <option value="Naranjo">Naranjo</option>
                                <option value="Naranjo-Amarillo">Naranjo-Amarillo</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Amarillo-verde">Amarillo-verde</option>
                                <option value="Verde">Verde</option>
                                <option value="Verde-Azul">Verde-Azul</option>
                                <option value="Azul">Azul</option>
                                <option value="Azul-Violeta">Azul-Violeta</option>
                                <option value="Violeta">Violeta</option>
                            </select>
                        </div> -->
                    </div>



                    <!--  <div class="form-group">
                        <label class="col-sm-4 control-label">Instrucciones</label>
                        <div class="col-sm-12">

                            <textarea rows="4" id="instruccion" name="instruccion" style="width: 100%;"></textarea>
                        </div>
                    </div> -->





                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" class="btn btn-primary float-right" id="saveBtn" value="create">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="procesarModal" aria-hidden="true">


    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Registro de deconstrucción</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-lg-12">

                <form id="procesarPrendaForm" name="procesarPrendaForm" class="form-horizontal" enctype="multipart/form-data">
                    <input type="text" hidden id="id_prenda_procesar" name="id_prenda_procesar">
                    <input type="text" hidden id="id_material_textil_procesar" name="id_material_textil_procesar">
                    <input type="text" hidden name="color_procesar" id="color_procesar">
                    <input type="text" hidden name="color_codigo_procesar" id="color_codigo_procesar">
                    <input type="text" hidden name="estampado_procesar" id="estampado_procesar">
                    <div class="form-group">
                        <label class="col-sm-12 control-label">Instrucciones para deconstrucción</label>
                        <div class="col-sm-12">

                            <textarea disabled rows="8" id="instruccion" name="instruccion" style="width: 100%;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="peso" class="col-sm-12 control-label">Peso resultante (kg)</label>
                        <div class="col-sm-12">

                            <input type="text" id="peso" name="peso" class="form-control">
                            <h5 id="error_procesar" style="text-align: center; color: red;"></h5>

                        </div>
                    </div>



                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="button" class="btn btn-success float-right procesarButton" id="procesarButton">Procesar
                        </button>
                    </div>
                </form>
            </div>




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
                <input type="hidden" name="prenda_id_eliminar" id="prenda_id_eliminar">

                <button type="submit" class="btn btn-danger float-right eliminarButton" id="eliminarButton">Eliminar
                </button>


            </div>
        </div>
    </div>
</div>


<!-- MODALS AGREGAR TEXTILES -->

<div class="modal fade" id="agregarProductoTextilModal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="agregarProductoTextilHeading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productoTextilForm" name="productoTextilForm" class="form-horizontal" enctype="multipart/form-data">
                    <!--  <input type="hidden" name="id_usuario" id="id_usuario"> -->
                    <input type="hidden" name="producto_textil_id" id="producto_textil_id">


                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tipo</label>
                        <div class="col-sm-12">
                            <input type="text" id="tipo_producto_textil" name="tipo" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detalles</label>
                        <div class="col-sm-12">
                            <input type="text" id="detalles_producto_textil" name="detalles" placeholder="" class="form-control" required="">
                        </div>
                    </div>





                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" class="btn btn-primary float-right" id="saveProductoTextil" value="create">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="agregarMaterialTextilModal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="agregarMaterialTextilHeading"></h4>
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
                            <input type="text" id="nombre_material_textil" name="nombre" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Detalles</label>
                        <div class="col-sm-12">
                            <input type="text" id="detalles_material_textil" name="detalles" placeholder="" class="form-control" required="">
                        </div>
                    </div>





                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" class="btn btn-primary float-right" id="saveMaterialTextil" value="create">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('menu/menu_bot')

<script type="text/javascript">
    $(function() {

        const selectProductoTextil = document.getElementById('select_producto_textil');
        const spanCantidad = document.getElementById('cantidad_producto_textil');

        const spanCantidadTelaPlano = document.getElementById('cantidad_tela_plano');
        const spanCantidadTelaStretch = document.getElementById('cantidad_tela_stretch');
        const spanCantidadTejido = document.getElementById('cantidad_tejido');

        //funcion para traer info a select productos
        function cargarSelectProductosTextiles() {


            // Hacer la solicitud al cargar la página
            fetch("{{ url('/getDatosProductosTextiles') }}")
                .then(response => response.json())
                .then(data => {


                    // Limpiar el select
                    selectProductoTextil.innerHTML = '<option value="" disabled selected>Seleccione</option>';
                    spanCantidad.textContent = 0;

                    // Llenar el select con los datos recibidos
                    data.productos_textiles.forEach(producto => {
                        const option = document.createElement('option');
                        option.value = producto.id;
                        option.textContent = producto.tipo;
                        selectProductoTextil.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error("Error :", error);
                });

        }

        function cargarTiposTejidos() {




            fetch("{{ url('/getDatosPorTejido') }}")
                .then(response => response.json())
                .then(data => {

                    spanCantidadTelaPlano.textContent = 0;
                    spanCantidadTelaStretch.textContent = 0;
                    spanCantidadTejido.textContent = 0;

                    // asignar los valores a los spans según id_tipo_tejido
                    data.tipos_tejidos.forEach(tipo_tejido => {
                        switch (tipo_tejido.id_tipo_tejido) {
                            case 1: // Tela Plano
                                spanCantidadTelaPlano.textContent = tipo_tejido.total;
                                break;
                            case 2: // Tela Stretch
                                spanCantidadTelaStretch.textContent = tipo_tejido.total;
                                break;
                            case 3: // Tejido
                                spanCantidadTejido.textContent = tipo_tejido.total;
                                break;
                        }
                    });

                    console.log(data);

                })
                .catch(error => {
                    console.error("Error :", error);
                });

        }



        cargarTiposTejidos();
        cargarSelectProductosTextiles();



        selectProductoTextil.addEventListener('change', function() {
            const id_select = selectProductoTextil.value;

            if (id_select) {
                fetch(`{{ url('/getCantidadProducto') }}?id_producto_textil=${id_select}`)
                    .then(response => response.json())
                    .then(data => {

                        spanCantidad.textContent = data.cantidad;
                    })
                    .catch(error => {
                        console.error("Error al obtener la cantidad:", error);
                    });
            } else {
                spanCantidad.textContent = ''; // Limpiar el span si no hay selección
            }
        });

        //funcion para seleccionar color
        const colorOptions = document.querySelectorAll('.color-option');
        const colorInput = document.getElementById('color');
        const colorCodigoInput = document.getElementById('color_codigo');

        colorOptions.forEach(option => {
            option.addEventListener('click', () => {

            // si esta opcion ya esta seleccionada, se deselecciona
            if (option.classList.contains('selected')) {
                option.classList.remove('selected');
                colorInput.value = '';
                colorCodigoInput.value = '';
                return; 
            }


                // quita la clase selected de todos los div
                colorOptions.forEach(opt => opt.classList.remove('selected'));

                // añade la clase selected a la opcion selecionada
                option.classList.add('selected');

                // actualiza el valor del input hidden
                colorInput.value = option.dataset.value;
                colorCodigoInput.value = option.dataset.codigo; // Código hexadecimal
            });
        });
        /////////////////////////////////////////////////////

        //funcion para seleccionar estampado
        const estampadoOptions = document.querySelectorAll('.estampado-option');
        const estampadoInput = document.getElementById('estampado');
        const estampadoCodigoInput = document.getElementById('estampado_codigo');

        estampadoOptions.forEach(option => {
            option.addEventListener('click', () => {

                // si esta opcion ya esta seleccionada, se deselecciona
            if (option.classList.contains('selected')) {
                option.classList.remove('selected');
                estampadoInput.value = '';
                estampadoCodigoInput.value = '';
                return; 
            }

                // quita la clase selected de todos los div
                estampadoOptions.forEach(opt => opt.classList.remove('selected'));

                // añade la clase selected a la opcion selecionada
                option.classList.add('selected');

                // actualiza el valor del input hidden
                estampadoInput.value = option.dataset.value;
                estampadoCodigoInput.value = option.dataset.codigo; // Código hexadecimal
            });
        });
        /////////////////////////////////////////////////////

        $("#nav-inventario").addClass("active");

        var es_admin = <?= Auth::user()->admin ?>;


        columnas = [
            /* {
                                data: 'id',
                                name: 'id'
                            }, */

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
                data: 'estampado',
                name: 'estampado'
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
        });
        $('#agregarPrenda').click(function() {

            $('#saveBtn').html('Guardar');
            $("#saveBtn").css("background-color", "#007bff");


            $('#prenda_id').val('');
            $('#inventarioPrendasForm').trigger("reset");
            /* $('#modelHeading').html("Ingresar Prenda"); */

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
                    /* $("#agregarPrenda").html(`Ingresar Prenda`); */

                    $('#ajaxModel').modal('show');

                }
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
                    cargarSelectProductosTextiles();
                    cargarTiposTejidos();
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

                    $('#id_prenda_procesar').val(datos.id);
                    $('#id_material_textil_procesar').val(datos.id_material_textil);
                    $('#color_procesar').val(datos.color);
                    $('#estampado_procesar').val(datos.estampado);
                    $('#color_codigo_procesar').val(datos.color_codigo);
                    $('#instruccion').val(data.instrucciones);


                    $("#error_procesar").html("");
                    $('#procesarModal').modal('show');



                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });

        });

        $('body').on('click', '.procesarButton', function() {


            if ($('#peso').val() != "") {

                $.ajax({
                    url: "{{URL::to('procesarPrenda')}}",
                    type: 'POST',
                    data: {
                        id_prenda: $('#id_prenda_procesar').val(),
                        id_material_textil: $('#id_material_textil_procesar').val(),
                        peso: $('#peso').val(),
                        color: $('#color_procesar').val(),
                        estampado: $('#estampado_procesar').val(),
                        color_codigo: $('#color_codigo_procesar').val(),
                    },

                    success: function(data) {

                        $("#error_procesar").html("");


                        table.draw();

                        $('#procesarPrendaForm').trigger("reset");

                        $('#procesarModal').modal('hide');

                        cargarSelectProductosTextiles();
                        cargarTiposTejidos();

                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            } else {
                $("#error_procesar").html("Ingrese el peso");
            }


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

                    cargarSelectProductosTextiles();
                    cargarTiposTejidos();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });



        ///////////////////////////      AGREGAR TEXTILES 


        $("#agregarProductoTextilModal").on("hidden.bs.modal", function() {
            $('#ajaxModel').css({
                'filter': 'blur(0px)'
            });
        });


        $('#agregar_producto_textil').click(function() {
            $('#ajaxModel').css({
                'filter': 'blur(5px)'
            });
            $('#producto_textil_id').val('');
            $('#productoTextilForm').trigger("reset");
            $('#agregarProductoTextilHeading').html("Agregar Tipo Producto");
            $('#agregarProductoTextilModal').modal('show');
        });

        $('#saveProductoTextil').click(function(e) {
            e.preventDefault();
            $(this).html('Guardando...');

            var data = new FormData($('#productoTextilForm')[0]);
            $.ajax({
                data: data,
                url: "{{ route('productos_textiles.store') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function(data) {

                    $('#productoTextilForm').trigger("reset");
                    $('#agregarProductoTextilModal').modal('hide');

                    $('#saveProductoTextil').html('Guardar');
                    actualizarTextiles();

                    cargarSelectProductosTextiles();


                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveProductoTextil').html('Error');
                }
            });
        });




        $("#agregarMaterialTextilModal").on("hidden.bs.modal", function() {
            $('#ajaxModel').css({
                'filter': 'blur(0px)'
            });
        });
        $('#agregar_material_textil').click(function() {
            $('#ajaxModel').css({
                'filter': 'blur(5px)'
            });
            $('#material_textil_id').val('');
            $('#materialTextilForm').trigger("reset");
            $('#agregarMaterialTextilHeading').html("Agregar Material");
            $('#agregarMaterialTextilModal').modal('show');
        });

        $('#saveMaterialTextil').click(function(e) {
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
                    $('#agregarMaterialTextilModal').modal('hide');

                    $('#saveMaterialTextil').html('Guardar');
                    actualizarTextiles();

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveMaterialTextil').html('Error');
                }
            });
        });




        function actualizarTextiles() {
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




                }
            })
        }
    });
</script>