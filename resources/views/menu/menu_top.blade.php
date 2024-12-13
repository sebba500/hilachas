<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=echo filemtime();">

    <!-- imports alertify -->
    <link rel="stylesheet" href="css/alertify.min.css?v=echo filemtime();" />
    <link rel="stylesheet" href="css/default.min.css?v=echo filemtime();" />
    <!--  -->


    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">


    <link href="css/dashboard.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow" style="background-color: #5cb954fa;">
        <h1 style=" font-weight: 900; padding: 10px 30px; border-right: 0.1px solid;" class="col-md-3 col-lg-2 mr-0 px-3"> <span style="color: white;">LOGO</span> <!-- <img src="{{ asset('images/logo.png') }}" alt="Imagen PNG" style="width: 100px; height: auto;margin-left: 20px;"> --> </h1>

        <!--  <a href="#" class="logo navbar-brand col-md-3 col-lg-2 mr-0 px-3" style="font-size: 30px;background-color: #3e64ff;"> <span>ID</span> <span style="color: #D4AF37;">GOLD</span> </a> -->
        <!--  <img src="{{ asset('images/logo.png') }}" alt="Imagen PNG"  class="col-md-1 col-lg-1 mr-0 px-3"  style="width: 100px; height: auto" > -->
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">

                <form action="{{ url('logout') }}" method="POST" class="form-inline my-2 my-lg-0">
                    @csrf

                    <a href="javascript:;" onclick="parentNode.submit();" class="btn btn-danger">
                        <i class="lni lni-exit"></i>
                        <span class="fa fa-sign-out"></span>
                        <span>Cerrar Sesión</span>

                    </a>



                    <!--  <button class="btn btn-danger my-2 my-sm-0" type="submit"><i class="lni lni-exit"></i> Cerrar Sesión</button> -->
                </form>


            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="padding-top:68px">
                <div class="sidebar-sticky pt-3">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Menú</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">

                        </a>
                    </h6>
                    <ul class="nav flex-column">



                        <li class="nav-item">

                            <a class="nav-link" id="nav-instrucciones" href="{{ url('/ListaInstrucciones') }}"><span data-feather="scissors"></span> Instrucciones para desmontar</a>


                        </li>

                        <li class="nav-item">

                            <a class="nav-link" id="nav-material_textil" href="{{ url('/ListaMaterialesTextiles') }}"><span data-feather="slack"></span> Materiales Textiles</a>


                        </li>


                        <li class="nav-item">

                            <a class="nav-link" id="nav-producto_textil" href="{{ url('/ListaProductosTextiles') }}"><span data-feather="tag"></span> Productos Textiles</a>


                        </li>






                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Configuración</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">

                        </a>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" id="nav-datos" href="{{ url('/config') }}"><span data-feather="edit"></span> Mis datos</a>
                        </li>
                        <!--  <li class="nav-item">
                            <a class="nav-link" id="nav-suscripcion" href="{{ url('/suscripcion') }}"><span data-feather="calendar"></span> Suscripción</a>
                        </li> -->
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">