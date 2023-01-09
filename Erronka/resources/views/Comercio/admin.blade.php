
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('CSS/admin.css')}}" rel="stylesheet" type="text/css">
    <title>Admin</title>
</head>
<body>

@include('layouts.header')

<main>
    <article  class="container my-5">
        {{-- EDITAR --}}
    <p class="text-danger">Editando...</p>{{-- HACER CON JS QUE ESTE PUESTO CUANDO ESTEMOS EDITANDO  --}}
    <form id="editar" class="row" action="{{ route('Comercio.usuUpdate', $miUsu->id) }}" enctype="multipart/form-data" method="post">
        @csrf {{ method_field('PUT') }}
        {{-- IMAGEN --}}
        <section class="row col-lg-3 col-md-12">
            <img  name="" src="IMG/profile/{{ $miUsu->foto }}" alt="Perfil" class="col-12">
            <label class="imagen col-12 text-center btn btn-dark my-2">
                <input type="file" name="img">
                IRUDIA    
            </label>
        </section>
        {{-- EDITAR FORM --}}
        <section class="row col-lg-9 mt-5 col-md-12">
            <input type="text" name="nombre" class="text-center col-sm-12 col-md-12 col-lg-6 mx-3" value="{{$miUsu->nombre}}">
            <input type="text" name="apellido" class="text-center col-sm-12 col-md-12 col-lg-6 mx-3" value="{{$miUsu->apellido}}">
            <input type="text" name="usuario" class="text-center col-sm-12 col-md-12 col-lg-6 mx-3" value="{{$miUsu->usuario}}">
            <input type="password" name="pass" class="text-center col-sm-12 col-md-12 col-lg-6 mx-3" value="{{$miUsu->pass}}">

            <button type="submit" class="btn btn-dark text-center col-6 mx-3" value="editar">EDITATU</button>
        </section>

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