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

<body id="main" class="d-none">

    {{-- !CAMBIAR CANDADOS CON LA BD --}}

    @include('layouts.header')

    <main>

        {{-- COFRE --}}
        <section class="align-items-center justify-content-center" id="oro">
            
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset('IMG/victoria-fondo.png')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('IMG/oro1-fondo.png')}}" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="nocolor carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="nocolor carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

              <br>

            {{-- <img class="w-100" src="{{asset('IMG/oro.jpg')}}" alt=""> --}}

        </section>
        <section class="d-flex align-items-center justify-content-center flex-column" id="cofre">
            <article class="container text-center">
                <div class="row align-items-center">
                    <img class="col d-none d-xl-block candado" src="{{asset('IMG/candado.png')}}" alt="">
                    <div class="col">

                        <picture>
                            <source media="(max-width: 699.99px)" srcset="{{asset('IMG/fondo7.png')}}" type="image/png">
                            <source media="(max-width: 1000px)  AND (min-width: 700px)" srcset="{{asset('IMG/fondo6.png')}}" type="image/png">
                            <img id="fondo" src="{{asset('IMG/fondo5.png')}}" alt="fondo">
                        </picture>

                        <h1 id="titulo" class="mb-5 text-dark"> {{__("index.titulo")}} {{-- !idioma --}}</h1> 
                        <p class="mb-5 text-center text-dark">
                            {{__("index.texto")}} {{-- !idioma --}}
                        </p>
                        @isset($partidas)
                        @if($partidas->juego1 == 1 && $partidas->juego2 == 1)
                        <button id="animatu" class="btn">{{__("index.boton")}} {{-- !idioma --}}</button>
                        @else
                        <button onclick="location.href='#juegos'" class="btn">{{__("index.boton")}} {{-- !idioma --}}</button>
                        @endif
                        @endisset

                    </div>
                    <img class="col d-none d-xl-block candado" src="{{asset('IMG/candado.png')}}" alt="">
                </div>
            </article>
        </section>

        {{-- <p class="my-3 text-light text-center" id="juegos">Txurdinaga</p> --}}
        <section class="d-flex justify-content-center">
            <audio id="juegos" src="{{asset('AUDIO/loquendo.mp3')}}" controls></audio>
        </section>

        {{-- LOS JUEGOS --}}
        <section class="container" id="candado">
            {{-- CANDADO 1 --}}
            <a class="text-decoration-none" href="{{ route('Comercio.juego', 1)  }}"> {{-- n??candado--}}
                <article class="my-5 text-light d-flex align-items-center">
                    {{-- CANDADO --}}
                    @isset($partidas)
                    @if($partidas->juego1 == 1)
                    <h1 class="mx-5">J B G</h1> {{-- ! COGERLO DEL JSON --}}
                    @else
                    <h1 class="mx-5">* * *</h1>
                    @endif
                    @endisset

                    <img id="fondoCandado" src="{{asset('IMG/cerradura-r.png')}}" alt="fondo">
                    <div>
                        <h3 class="mx-5 my-4">{{__("index.candado")}} {{-- !idioma --}} 1</h3>
                    </div>
                </article>
            </a>

            {{-- CANDADO 2 --}}
            <a class="text-decoration-none" href="{{ route('Comercio.juego', 2)  }}">
                <article class="mb-5 text-light d-flex align-items-center">

                    {{-- CANDADO --}}
                    @isset($partidas)
                    @if($partidas->juego2 == 1)
                    <h1 class="mx-5">2 9 6</h1> {{-- ! COGERLO DEL JSON --}}
                    @else
                    <h1 class="mx-5">* * *</h1>
                    @endif
                    @endisset

                    <img id="fondoCandado" src="{{asset('IMG/cerradura-r.png')}}" alt="fondo">
                    <div>
                        <h3 class="mx-5 my-4">{{__("index.candado")}} {{-- !idioma --}} 2</h3>
                    </div>
                </article>
            </a>
        </section>
    </main>

    @include('layouts.footer')

</body>

</html>
