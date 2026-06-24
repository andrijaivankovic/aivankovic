<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kora i Krem - @yield("title")</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    
    <link href="img/favicon.ico" rel="icon">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet"> 

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route("pocetna") }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0"><img src="{{ asset('img/logo.png') }}" height="120" width="120" alt=""></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">

                <a href="{{ route("pocetna") }}" class="nav-item nav-link active">Početna stranica</a>
                <a href="{{ route("katalog") }}" class="nav-item nav-link">Katalog</a>
                <a href="{{ route("kontakt") }}" class="nav-item nav-link">Kontakt</a>

                @guest()
                <a href="{{ route("login") }}" class="nav-item nav-link">Login</a>
                <a href="{{ route("register") }}" class="nav-item nav-link">Register</a>
                @endguest

                
                @auth()


                    @if (auth()->user()->role == "user")
                        <a href="{{ route("moje_narudzbine",auth()->user()->id) }}" class="nav-item nav-link">Moje Narudzbine</a>
                    @endif

                    @if (auth()->user()->role == "admin" || auth()->user()->role == "editor" )
                        <a href="{{ route("preusmeravanje") }}" class="nav-item nav-link">Admin panel</a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST"  class="d-inline d-flex align-items-center m-2">
                        @csrf 
                        
                        <button type="submit" class="nav-item nav-link" style="background: none; border: none; display: inline; cursor: pointer; padding: 0;">
                            Odjavi se 
                        </button>
                    </form>

                    
                @endauth
            </div>
        </div>
    </nav>

    

    
    @yield("content")

    @if (session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @endif

    @if (session("error"))
        <div class="alert alert-danger">
            {{ session("error") }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Adresa Firme</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Hercegovačka 103,Beograd</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+381 64 321 321</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@kora&krem.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Brzi Linkovi</h4>
                    <a class="btn btn-link" href="{{ route("pocetna") }}">Početna stranica</a>
                    <a class="btn btn-link" href="{{ route("katalog") }}">Katalog</a>
                    <a class="btn btn-link" href="{{ route("kontakt") }}">Kontakt</a>
                    <a class="btn btn-link" href="{{ route("login") }}">Login</a>
                </div>
            </div>
        </div>
    </div>




    <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Kora&Krem</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    


    
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')

    <script>
        $(document).ready(function () {
            
            if ($('#tabela-proizvoda').length) {
                $('#tabela-proizvoda').DataTable({
                    destroy: true,
                    "language": {
                        "lengthMenu": "Prikaži _MENU_ proizvoda po stranici",
                        "zeroRecords": "Nije pronađen nijedan proizvod",
                        "info": "Prikazano _START_ do _END_ od ukupno _TOTAL_ proizvoda",
                        "infoEmpty": "Prikazano 0 od 0 proizvoda",
                        "search": "Pretraži proizvode:",
                        "paginate": {
                            "next": "Sledeća",
                            "previous": "Prethodna"
                        }
                    }
                });
            }
            
            
            if ($('#tabela_porudzbina').length) {
                $('#tabela_porudzbina').DataTable({
                    destroy: true,
                    "language": {
                        "lengthMenu": "Prikaži _MENU_ porudžbina po stranici",
                        "zeroRecords": "Nije pronađena nijedna porudžbina",
                        "info": "Prikazano _START_ do _END_ od ukupno _TOTAL_ porudžbina",
                        "infoEmpty": "Prikazano 0 od 0 porudžbina",
                        "search": "Pretraži porudžbine:",
                        "paginate": {
                            "next": "Sledeća",
                            "previous": "Prethodna"
                        }
                    }
                });
            }

            if ($('#tabela_usera').length) {
                $('#tabela_usera').DataTable({
                    destroy: true,
                    "language": {
                        "lengthMenu": "Prikaži _MENU_ usera po stranici",
                        "zeroRecords": "Nije pronađen nijedan user",
                        "info": "Prikazano _START_ do _END_ od ukupno _TOTAL_ usera",
                        "infoEmpty": "Prikazano 0 od 0 usera",
                        "search": "Pretraži usera:",
                        "paginate": {
                            "next": "Sledeća",
                            "previous": "Prethodna"
                        }
                    }
                });
            }
        }); 
    </script>
    
</body>

</html>