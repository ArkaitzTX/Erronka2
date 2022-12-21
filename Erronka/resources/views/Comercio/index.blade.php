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
    
    @include('Comercio.header')
   
    <main>
        {{-- COFRE --}}
        <section class="d-flex align-items-center flex-column" id="cofre">
            <h1 class="text-light my-5">COFRE</h1>
            <button onclick="location.href='#juegos'" class="btn btn-primary">ABRIR</button>
            <p id="juegos">---</p>
        </section>

        {{-- LOS JUEGOS --}}
        <section class="container" id="candado">
            {{-- CANDADO 1 --}}
            <a class="text-decoration-none" href="{{ route('Comercio.juego', [1, 1])  }}"> {{-- nºcandado, id --}}
                <article class="my-5 text-light d-flex align-items-center justify-content-center">
                    <h1>* * * *</h1>
                    <div>
                        <h3>CANDADO 1</h3>
                    </div>
                </article>
            </a>

            {{-- CANDADO 2 --}}
            <a class="text-decoration-none" href="{{ route('Comercio.juego', [2, 1])  }}">
                <article class="mb-5 text-light d-flex align-items-center justify-content-center">
                    <h1>* * * *</h1>
                    <div>
                        <h3>CANDADO 2</h3>
                    </div>
                </article>
            </a>
        </section>
    </main>

    @include('Comercio.footer')

</body>
</html>