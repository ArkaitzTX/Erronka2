<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERKATARITZA</title>

    {{-- CSS --}}
    <link href="{{asset('CSS/admin.css')}}" rel="stylesheet" type="text/css">

    {{-- JS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('JS/admin.js')}}"></script>

    <title>Admin</title>
</head>

<body>

    @include('layouts.header')

    <main>
        <article class="container my-5">
            {{-- EDITAR --}}
            <form id="editar" class="row" action="{{ route('Comercio.usuUpdate', $miUsu->id) }}"
                enctype="multipart/form-data" method="post">
                @csrf {{ method_field('PUT') }}
                {{-- IMAGEN --}}
                <section class="row col-lg-3 col-md-6 editimagen">
                    <img id="imagenUsu" src="IMG/profile/{{ $miUsu->foto }}" alt="Perfil" class="col-12">
                    <label class="imagen col-12 text-center btn btn-dark my-2">
                        <input type="file" name="img" class="cambios imagen col-12 text-center btn btn-dark my-2">
                        IRUDIA
                    </label>
                </section>
                {{-- EDITAR FORM --}}
                <section class="row col-lg-9 col-md-9 col-sm-9 mt-5 erabiltzailea">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <label class="etiquetas">Izena</label>
                        <input type="text" name="nombre" class="cambios" value="{{$miUsu->nombre}}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <label class="etiquetas">Abizena</label>
                        <input type="text" name="apellido" class="cambios" value="{{$miUsu->apellido}}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <label class="etiquetas">Erabiltzailea</label>
                        <input type="text" name="usuario" class="cambios" value="{{$miUsu->usuario}}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <label class="etiquetas">Pasaitza</label>
                        <input readonly type="password" name="pass" class="cambios" value="{{$miUsu->pass}}">
                    </div>
                    <button id="validar" type="submit" class="btn btn-dark text-center col-6 mx-3" value="editar"
                        data-bs-toggle="tooltip" data-bs-placement="down" title="Datuak gorde egiten du">GORDE</button>
                </section>
                <p id="editando" class="d-none text-danger text-center">Datuak ez dira gorde...</p>
                {{-- HACER CON JS QUE ESTE PUESTO CUANDO ESTEMOS EDITANDO  --}}

                <br>
                @foreach ($errors->all() as $error)
                <p class="text-danger text-center">{{ $error }}</p>
                @endforeach

            </form>

            <hr>

            <form class=" my-5 text-center" id="rol" action="{{ route('Comercio.rol', $miUsu->id) }}" method="post">
                @csrf
                <article class="d-flex justify-content-center align-items-center">
                    <input type="text" placeholder="Admin kodea" class="text-center" name="rol">
                    <button type="submit" class="btn btn-dark" value="enviar">+</button>
                </article>
            </form>


            {{-- ELIMINAR --}}

            @if($miUsu->rol == 1)
            <form class=" my-5 text-center" id="eliminar" action="{{ route('Comercio.usuEliminar') }}" method="POST">
                @csrf @method('DELETE')
                <article class="d-flex justify-content-center align-items-center">
                    <select name="usuario" class="text-center">
                        @foreach($usu as $usus)
                        @if($usus->id != $miUsu->id && $usus->id != 1)
                        <option value="{{ $usus->id }}">{{ $usus->usuario }}</option>
                        @endif
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-dark" value="borrar">-</button>
                </article>
                <p class="text-center text-success">{{Session::get('mensaje')}}</p>
            </form>
            @endif


        </article>
    </main>

    {{-- CERRAR --}}
    <a href="{{ route('Comercio.cerrarSes') }}" type="button" class="btn btn-dark" id="cerrar">
        Saioa itxi
    </a>

    {{-- @include('layouts.footer') --}}

</body>

</html>
