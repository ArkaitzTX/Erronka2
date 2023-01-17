<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{asset('CSS/Header,Footer.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

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