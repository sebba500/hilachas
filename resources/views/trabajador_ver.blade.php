<!DOCTYPE html>
<html>

<head>
    <title>Crud trabajadores VISTA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <!-- <div style="margin: 50px;">

        <label>{{{ $trabajador['foto'] }}}</label> 


    </div> -->
    <section style="background-color: #eee;">
        <div>


            <div>
                <div class="col-lg-12">
                    <div class="card mb-12">
                        <div class="card-body text-center">
                            <img src="{{ URL::to('/') }}/fotos/{{{ $trabajador['foto'] }}}" alt="avatar" style="width: 250px;">

                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="card mb-12">
                        <div class="card-body text-center">
                        <h3 class="text-center">FICHA DE IDENTIFICACIÓN</h3>

                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="card mb-12">
                        <div class="card-body">
                        <h5 style="margin-bottom: 40px;">INFORMACIÓN PERSONAL</h5>

                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Nombre</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['nombre'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Rut</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['rut'] }}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Domicilio</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['domicilio'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Ciudad</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['ciudad'] }}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Celular</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['celular'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Cargo</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['cargo'] }}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Fecha Nacimiento</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['fecha_nacimiento'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Edad</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{!!$edad!!}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Proveedor</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['mutualidad'] }}}</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>

                    <div class="card mb-12">
                        <div class="card-body">
                        <h5 style="margin-bottom: 40px;">INFORMACIÓN DE SALUD</h5>

                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Grupo Sanguíneo</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="text-muted mb-0">{{{ $trabajador['grupo_sangre'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Peso</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="text-muted mb-0">{{{ $trabajador['peso'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Estatura</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="text-muted mb-0">{{{ $trabajador['estatura'] }}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Enfermedad de Base</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['enfermedad_base'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Alérgico</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['alergia'] }}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Celular</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['celular'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Cargo</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['cargo'] }}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Medicamento Prescrito</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['medicamento_prescrito'] }}}</p>
                                </div>
                               
                            </div>
                            <hr>
                            
                        </div>
                    </div>

                    <div class="card mb-12">
                        <div class="card-body">
                        <h5 style="margin-bottom: 40px;">INFORMACIÓN EMPRESA</h5>

                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Empresa</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['nombre_empresa'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Rut</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['rut_empresa'] }}}</p>
                                </div>
                               
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Domicilio</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['domicilio_empresa'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Ciudad</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['ciudad_empresa'] }}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Contacto Emergencia</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['contacto_emergencia'] }}}</p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="mb-0">Fono Emergencia</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['fono_emergencia'] }}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <p class="mb-0">Cargo contacto</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="text-muted mb-0">{{{ $trabajador['cargo_contacto'] }}}</p>
                                </div>
                               
                            </div>
                            <hr>

                            
                            
                        </div>
                        <button type="button" class="btn btn-danger " style="width: 300px;height: 100px;font-size: 50px; margin: auto;margin-bottom: 20px;" onclick="document.location.href = 'tel:{!!$celular!!}'">Llamar</button>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</body>

</html>