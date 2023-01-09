<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Comercio</title>

    <link href="{{asset('CSS/index.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    @include('layouts.header')
   
    <main>
        {{-- COFRE --}}
        <section class="d-flex align-items-center flex-column" id="cofre">
            {{-- <img id="fondo" src="{{asset('IMG/fondo2.jpg')}}" alt="fondo"> --}}
            <h1 class="mb-5 text-light">COMERCIO</h1>
            <p class="mb-5 text-center text-light">
            Busca la combinacion de los 2 candados en los diferentes juegos para asi poder desbloquear el cofre. Cada juego te dara una letra la cual  <br>
            sera una parte de la combinacion del candado. Cuando tengas los dos candados abiertos podras abrir el cofre.
            </p>
            <button onclick="location.href='#juegos'" class="btn btn-primary">ABRIR COFRE</button>
        </section>
        <p class="my-3 text-light text-center" id="juegos">Txurdinaga</p>

        {{-- LOS JUEGOS --}}
        <section class="container" id="candado">
            {{-- CANDADO 1 --}}
            <a class="text-decoration-none" href="{{ route('Comercio.juego', 1)  }}"> {{-- nºcandado--}}
                <article class="my-5 text-light d-flex align-items-center justify-content-center">
                    <h1>* * *</h1>
                    <div>
                        <h3 class="mx-5 my-4">CANDADO Nº1</h3>
                    </div>
                </article>
            </a>

            {{-- CANDADO 2 --}}
            <a class="text-decoration-none" href="{{ route('Comercio.juego', 2)  }}">
                <article class="mb-5 text-light d-flex align-items-center justify-content-center">
                    <h1>* * *</h1>
                    <div>
                        <h3 class="mx-5 my-4">CANDADO Nº2</h3>
                    </div>
                </article>
            </a>
        </section>
    </main>

    @include('layouts.footer')

</body>
</html>