<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Agenda escolar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="principal/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="principal/css/style.css" rel="stylesheet">

    <style type="text/css">
        
    </style>
</head>

<body>



<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-primary">KidToList</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="/" class="nav-item nav-link active">Inicio</a>
                <a href="{{url('ver_calendario')}}" class="nav-item nav-link">Calendario</a>
                <div class="nav-item dropdown">
                </div>
                <a href="#" class="nav-item nav-link">Contact</a>
            </div>
            <a href="login" class="btn btn-primary px-4">Iniciar sesion</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->

    {{-- -------------------------------------------------------- --}}
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center; padding: 25px">Calendario Académico 2024</h1>
                <table class="table table-bordered table-striped" 
                    style="margin-top: 20px; text-align: center">
                    <thead style="background-color: #3A4546">
                        <th style="color: white">Descripción</th>
                        <th style="color: white; ">Fecha</th>
                    </thead>
                <tbody >
                    @foreach ($calendario as $calender)
                       <tr>
                            <td>{{$calender->Descripcion}}</td>
                            <td>{{$calender->Fecha}}</td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
                
            </div>
        </div>
    </div>
    
    {{-- -------------------------------------------------------- --}}


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>