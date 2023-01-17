<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MERKATARITZA</title>

    {{-- CSS --}}
    <link href="{{asset('CSS/index.css')}}" rel="stylesheet" type="text/css">

    {{-- JS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('JS/animCofre.js')}}"></script>

</head>
<body>
    
    @include('layouts.header')
   
    <main>
        {{-- COFRE --}}
        <section class=" align-items-center justify-content-center" id="oro" >
            <img class="w-100"  src="{{asset('IMG/oroEspañol.jpeg')}}" alt="">
        </section>
        <section class="d-flex align-items-center justify-content-center flex-column" id="cofre">
            <div class="container text-center">
                <div class="row align-items-center">
                    <img class="col d-none d-xl-block candado" src="{{asset('IMG/candado.png')}}" alt="">
                    <div class="col">
                        <img id="fondo" src="{{asset('IMG/fondo5.png')}}" alt="fondo">
                        <h1 id="titulo" class="mb-5 text-dark">MERKATARITZA</h1>
                        <p class="mb-5 text-center text-dark">
                            Bilatu 2 giltzarrapoen konbinazioa joko ezberdinetan, kutxa desblokeatu ahal izateko. Joko bakoitzak letra bat emango dizu,
                            giltzarrapoaren konbinazioaren zati bat izango da. Bi giltzarrapoak irekita dituzunean, kutxa ireki dezakezu.                            
                        </p>
                        {{-- <button onclick="location.href='#juegos'" class="btn btn-primary">ABRIR COFRE</button> --}}
                        <button id="animatu" class="btn btn-primary">ABRIR COFRE</button>
                    </div>
                    <img class="col d-none d-xl-block candado" src="{{asset('IMG/candado.png')}}" alt="">
                </div>
            </div>
        </section>
        <p class="my-3 text-light text-center" id="juegos">Txurdinaga</p>

        {{-- LOS JUEGOS --}}
        <section class="container" id="candado">
            {{-- CANDADO 1 --}}
            <a class="text-decoration-none" href="{{ route('Comercio.juego', 1)  }}"> {{-- nºcandado--}}
                <article class="my-5 text-light d-flex align-items-center">
                    <h1 class="mx-5">* * *</h1>
                    <img id="fondoCandado" src="{{asset('IMG/cerradura.png')}}" alt="fondo">
                    <div>
                        <h3 class="mx-5 my-4">KANDADU Nº1</h3>
                    </div>
                </article>
            </a>

            {{-- CANDADO 2 --}}
            <a class="text-decoration-none" href="{{ route('Comercio.juego', 2)  }}">
                <article class="mb-5 text-light d-flex align-items-center">
                    <h1 class="mx-5">* * *</h1>
                    <img id="fondoCandado" src="{{asset('IMG/cerradura.png')}}" alt="fondo">
                    <div>
                        <h3 class="mx-5 my-4">KANDADU Nº2</h3>
                    </div>
                </article>
            </a>
        </section>
    </main>

    @include('layouts.footer')

</body>
</html>