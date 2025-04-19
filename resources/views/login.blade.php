<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-light">

    <!-- Login 13 - Bootstrap Brain Component -->
    <section class=" py-3 py-md-5" style="margin-top: 5%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <!-- <div class="text-center mb-3">
                                <a href="#!">
                                    <img src="./assets/img/bsb-logo.svg" alt="BootstrapBrain Logo" width="175" height="57">
                                </a>
                            </div> -->
                            <h1 style=" font-weight: 900; padding: 10px 30px;" class="text-center"> <span>LOGO</span> <!--  <img src="{{ asset('images/logo.png') }}" alt="Imagen PNG" style="width: 200px; height: auto;"> --> </h1>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Inicie sesión con su cuenta</h2>
                            <form action="{{ route('auth.authenticate') }}" method="POST" id="form_login">
                                @csrf
                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <label for="rut" class="form-label">Rut</label>
                                            <input type="text" class="form-control" name="rut" id="rut" required>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <label for="password" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" name="password" id="password" value="" required>

                                        </div>
                                    </div>
                                    <!--  <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                                                <label class="form-check-label text-secondary" for="rememberMe">
                                                    Keep me logged in
                                                </label>
                                            </div>
                                            <a href="#!" class="link-primary text-decoration-none">Forgot password?</a>
                                        </div>
                                    </div> -->
                                    <div class="container">
                                        <div class="row">
                                            <div class="col text-center">
                                            <button class="btn btn-primary btn-lg" type="submit" id="boton_iniciar">Iniciar Sesión</button>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <!--   <div class="col-5">
                                        <div class="d-grid my-3">

                                            <a href="{{ url('/formulario') }}" class="btn btn-primary btn-lg" id="boton_registrar"> Registrarse</a>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-12">
                                        <p class="m-0 text-secondary text-center">Don't have an account? <a href="#!" class="link-primary text-decoration-none">Sign up</a></p>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#boton_iniciar").click(function() {

                $(this).prop("disabled", true);

                $(this).html(
                    `<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i> Cargando`
                );
                $("#form_login").submit();


            });


        });
    </script>
</body>

</html>