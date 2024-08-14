<!DOCTYPE html>
<html>

<head>
    <title>QR</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <div class="text-center" style="margin-top: 50px;">
        <label>{!!$rut!!}</label>
    </div> 
    <div class="text-center">
        <label>{!!$nombre!!}</label>
    </div> 
    <div class="card-body text-center">

        <img src="data:image/png;base64,{!! base64_encode($qrcode) !!}" style=" width:500px;image-rendering: pixelated;"/>
    </div>
</body>

</html>