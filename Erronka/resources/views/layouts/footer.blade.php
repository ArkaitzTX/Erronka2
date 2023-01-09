<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('CSS/Header,Footer.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Comercio</title>
</head>

<body>

@yield('content')

<div>

    <section class="">
        <!-- FOOTER -->
        <footer class="text-center text-white" style="background-color: #140C73;">
            <div class="container p-4 pb-0">
                <!-- CONTENIDO -->
                <section class="">
                    <p class="d-flex justify-content-center align-items-center">
                        @if(null !== session()->get('usuario'))
                        <a href="{{ route('Comercio.cerrarSes') }}" type="button" class="btn btn-outline-light btn-rounded">
                            Saioa itxi
                        </a>
                        @else
                            <span class="me-3">Izena eman orain</span>
                            <a href=' {{ route('Comercio.login') }} ' class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">
                                Saioa Hasi
                            </a>
                        @endif
                    </p>
                </section>
            </div>

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color:#101243;">
                © 2023 Copyright:
                <a class="text-white" href="https://fptxurdinaga.hezkuntza.net/">CIFP Txurdinaga LHII</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>

</div>

</body>

</html>