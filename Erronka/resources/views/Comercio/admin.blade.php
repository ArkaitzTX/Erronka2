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
<<<<<<< HEAD

    <title>Admin</title>
=======
>>>>>>> origin/development
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
                    <label class="imagen col-12 text-center btn btn-dark my-2 boton">
                        <input type="file" name="img" class="cambios imagen col-12 text-center btn btn-dark my-2">
                        {{__("admin.foto")}} {{-- !idioma --}}
                    </label>
                </section>
                {{-- EDITAR FORM --}}
                <section class="row col-lg-9 col-md-9 col-sm-9 mt-5 erabiltzailea">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <label class="etiquetas">{{__("admin.nombre")}} {{-- !idioma --}}</label>
                        <input type="text" name="nombre" class="cambios" value="{{$miUsu->nombre}}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <label class="etiquetas">{{__("admin.apellido")}} {{-- !idioma --}}</label>
                        <input type="text" name="apellido" class="cambios" value="{{$miUsu->apellido}}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <label class="etiquetas">{{__("admin.usuario")}} {{-- !idioma --}}</label>
                        <input type="text" name="usuario" class="cambios" value="{{$miUsu->usuario}}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <label class="etiquetas">{{__("admin.pass")}} {{-- !idioma --}}</label>
                        <input readonly type="password" name="pass" class="cambios" value="{{$miUsu->pass}}">
                    </div>
                    <button id="validar" type="submit" class="btn btn-dark text-center col-6 mx-3" value="editar"
                        data-bs-toggle="tooltip" data-bs-placement="down" title="Datuak gorde egiten du">{{__("admin.guarda")}} {{-- !idioma --}}</button>
                </section>
                <p id="editando" class="d-none text-danger text-center">{{__("admin.noGuarda")}} {{-- !idioma --}}</p>
                {{-- HACER CON JS QUE ESTE PUESTO CUANDO ESTEMOS EDITANDO  --}}

                <br>
                @foreach ($errors->all() as $error)
                <p class="text-danger text-center">{{ $error }}</p>
                @endforeach

            </form>

            <hr>
            {{-- CAMBIAR IDIOMA --}}
            <button class="btn nav-item">
                <a href=' {{ route('Comercio.idioma') }}' class="nav-link">{{__("header.l4")}}</a>
            </button>

            <br>

            <form class=" my-5 text-center" id="rol" action="{{ route('Comercio.rol', $miUsu->id) }}" method="post">
                @csrf
                <article class="d-flex justify-content-center align-items-center">
                    <input type="text" placeholder="{{__("admin.admin")}} {{-- !idioma --}}" class="text-center" name="rol">
                    <button type="submit" class="btn btn-dark" value="enviar">+</button>
                </article>
            </form>


            {{-- ELIMINAR --}}

            @if($miUsu->rol == 1)

            {{-- <form class=" my-5 text-center" id="eliminar" action="{{ route('Comercio.usuEliminar') }}" method="POST">
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
            </form> --}}

            <section class="usuarios my-5 d-flex justify-content-center align-items-center flex-column">
                <table>
                    <tr>
                        <th>{{__("admin.t1")}} {{-- !idioma --}}</th>
                        <th>{{__("admin.t2")}} {{-- !idioma --}}</th>
                        <th>{{__("admin.t3")}} {{-- !idioma --}}</th>
                        <th>{{__("admin.t4")}} {{-- !idioma --}}</th>
                        <th>{{__("admin.t5")}} {{-- !idioma --}}</th>
                        <th>{{__("admin.t6")}} {{-- !idioma --}}</th>
                    </tr>
                @foreach($usu as $usus)
                    <tr>

                        @if($usus->id != $miUsu->id && $usus->id != 1)
                            <td>
                                {{ $usus->usuario }}
                            </td>
                            <td>{{ $usus->nombre }}</td>
                            <td>{{ $usus->apellido }}</td>
                            @if($usus->rol == 1)
                                <td>ADMIN</td>
                            @else
                                <td>----</td>
                            @endif
                            <td>
                                @foreach($par as $pars)
                                    @if($usus->id == $pars->usuario)
                                        @if($pars->juego1 == 1 && $pars->juego2 == 1)
                                            <span class="text-success">{{__("admin.si")}} {{-- !idioma --}}</span>
                                        @else  
                                            <span class="text-danger">{{__("admin.no")}} {{-- !idioma --}}</span>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <form id="eliminar" action="{{ route('Comercio.usuEliminar') }}" method="POST">
                                    @csrf @method('DELETE')
                                    <input hidden name="usuario" value="{{ $usus->id }}">
                                    <input class="btn boton" type="submit" value="Eliminar">
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </table>

                <br>
                <p class="text-center text-success">{{Session::get('mensaje')}}</p>

            </section>

            @endif




        </article>
    </main>

    {{-- CERRAR --}}
    <a href="{{ route('Comercio.cerrarSes') }}" type="button" class="btn btn-dark boton" id="cerrar">
        {{__("header.f1")}} {{-- !idioma --}}
    </a>



    {{-- OTRA COSA --}}
    <img class="d-none" id="otracosa" src="{{asset('IMG/simio.png')}}" alt="">

</body>

</html>
