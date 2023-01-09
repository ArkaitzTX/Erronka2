<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('CSS/PantallaJuegos.css')}}" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Comercio</title>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="{{asset('JS/reloj.js')}}"></script>
</head>


<body id="fondo">

    @include('layouts.header')

    <main class="mt-5" id="tamaina">

        {{-- ************************************************ --}}
        <h1>{{$partidas->$candado}}</h1>
        {{-- ************************************************ --}}


        {{-- Otros --}}
        <section class="mx-5 my-3 d-flex flex-nowrap align-items-center justify-content-between">
            <article class="">
                <strong class="text-light btn otro">Vidas: 3</strong>
                <strong id="reloj" class="text-light btn otro">Tiempo: {{ minutos }}:{{ segundos }} mins</strong>
            </article>

            <article class="">
                <button class="text-light" id="info" type="submit">i</button>
            </article>
        </section>

        {{-- Menu --}}
        <ul class="nav nav-pills container" id="menu" role="tablist">

            <li class="objeto nav-item text-center bg-danger rounded" role="presentation">
                <button class="nav-link active w-100 text-light" id="pills-Juego1-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-Juego1" type="button" role="tab" aria-controls="pills-Juego1"
                    aria-selected="true">Jolasa 1</button>
            </li>
            <li class="objeto nav-item text-center bg-danger rounded mx-3" role="presentation">
                <button class="nav-link w-100 text-light" id="pills-Juego2-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-Juego2" type="button" role="tab" aria-controls="pills-Juego2"
                    aria-selected="false">Jolasa 2</button>
            </li>
            <li class="objeto nav-item text-center bg-danger rounded  mx-3" role="presentation">
                <button class="nav-link w-100 text-light" id="pills-Juego3-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-Juego3" type="button" role="tab" aria-controls="pills-Juego3"
                    aria-selected="false">Jolasa 3</button>
            </li>

        </ul>

        {{-- Modulo de los Juegos --}}
        <section class="juegos container text-light text-center tab-content mt-5">
            <div class="tab-pane fade show active " id="pills-Juego1" role="tabpanel" aria-labelledby="pills-Juego1-tab">
                @include($candado.'.juego1')
            </div>
            <div class=" tab-pane fade" id="pills-Juego2" role="tabpanel" aria-labelledby="pills-Juego2-tab">
                JUEGO 2
            </div>
            <div class="tab-pane fade" id="pills-Juego3" role="tabpanel" aria-labelledby="pills-Juego3-tab">
                JUEGO 3
            </div>
        </section>
    </main>

    @include('layouts.footer')

</body>

</html>