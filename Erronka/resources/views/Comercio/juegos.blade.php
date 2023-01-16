<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERKATARITZA</title>

    {{-- CSS --}}
    <link href="{{asset('CSS/PantallaJuegos.css')}}" rel="stylesheet" type="text/css">

    {{-- JS --}}
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> {{-- VUE  --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> {{-- AXIOX  --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- ALERT  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>{{-- JQUERY  --}}

    <script src="{{asset('JS/juegos.js')}}"></script>

    {{-- @vite(['resources/js/app.js','resources/css/app.css']) --}}
</head>


<body id="fondo">

    @include('layouts.header')

    <main class="mt-5" id="tamaina">

        {{-- ************************************************ --}}
        {{-- <h1>{{$candado}}</h1> --}}
        {{-- <button onclick="Ganar('juego1', 22)">AAAAAAAAAAAAAAAA</button> --}}
        {{-- ************************************************ --}}

        {{-- MENU-PISTAS VUE --}}
        <article>
            {{-- Otros --}}
            <section class="mx-5 my-3 d-flex flex-nowrap">
                {{-- <div id="vidas">
                    <vidas></vidas>
                </div> --}}
                <div>
                    <strong class="otro">Bizitzak: <span id="vidas">3</span></strong>
                </div>
                <div id="reloj">
                    <reloj></reloj>
                </div> 
            </section>

            {{-- Menu --}}
            <ul class="nav nav-pills container" id="menu" role="tablist">

                <li class="objeto nav-item text-center rounded" role="presentation">
                    <button class="nav-link active w-100 text-light" id="pills-Juego1-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-Juego1" type="button" role="tab" aria-controls="pills-Juego1"
                        aria-selected="true">Jolasa 1</button>
                </li>
                <li class="objeto nav-item text-center rounded mx-3"
                    role="presentation">
                    <button class="nav-link w-100 text-light" id="pills-Juego2-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-Juego2" type="button" role="tab" aria-controls="pills-Juego2"
                        aria-selected="false">Jolasa 2</button>
                </li>
                <li class="objeto nav-item text-center rounded  mx-3"
                    role="presentation">
                    <button class="nav-link w-100 text-light" id="pills-Juego3-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-Juego3" type="button" role="tab" aria-controls="pills-Juego3"
                        aria-selected="false">Jolasa 3</button>
                </li>

            </ul>
        </article>
        {{-- Modulo de los Juegos --}}
        {{-- <section class="juegos container text-light text-center tab-content mt-5"> --}}

            {{-- TELEPORT --}}
            <div hidden id="pistas">
            <Teleport hidden to="#pistas1">
                <pista n="0" c="{{$candado}}"></pista>
            </Teleport>
            <Teleport hidden to="#pistas2">
                <pista n="1" c="{{$candado}}"></pista>
            </Teleport>
            <Teleport hidden to="#pistas3">
                <pista n="2" c="{{$candado}}"></pista>
            </Teleport>
            </div>

            <section class="corrector">
                <Teleport hidden to="#p1">
                    <corrector n="0" c="{{$candado}}" i="{{$usuario}}">
                </Teleport>
                <Teleport hidden to="#p2">
                    <corrector n="1" c="{{$candado}}" i="{{$usuario}}">
                </Teleport>
                <Teleport hidden to="#p3">
                    <corrector n="2" c="{{$candado}}" i="{{$usuario}}">
                </Teleport>
            </section>

            {{-- TELEPORT --}}

        <section class="juegos container mt-5">
            <div class="tab-pane fade show active" id="pills-Juego1" role="tabpanel" aria-labelledby="pills-Juego1-tab">
                                
            {{-- PISTA --}}
                <div id="pistas1">
                </div>

            {{-- JUEGO --}}
                @include($candado.'.juego1')

            </div>

            <div class="tab-pane fade  d-none" id="pills-Juego2" role="tabpanel" aria-labelledby="pills-Juego2-tab">
                
            {{-- PISTA --}}
                <div id="pistas2">
                </div>

            {{-- JUEGO --}}
                @include($candado.'.juego2')

            </div>

            <div class="tab-pane fade d-none" id="pills-Juego3" role="tabpanel" aria-labelledby="pills-Juego3-tab">
                                
            {{-- PISTA --}}
                <div id="pistas3">
                </div>

            {{-- JUEGO --}}
                @include($candado.'.juego3')

            </div>
            
        </section>
    </main>

    @include('layouts.footer')

</body>

</html>
