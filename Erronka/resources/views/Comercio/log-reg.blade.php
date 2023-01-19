<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERKATARITZA</title>

    {{-- CSS --}}
    <link href="{{asset('CSS/Login,Register.css')}}" rel="stylesheet" type="text/css">
 </head>

<body>

    @include('layouts.header')

    <main class="mt-5" id="tamaina">

        {{-- MENU DE CAMBIO --}}
        <ul id="menu" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item text-center menu-obj rounded" role="presentation">
                <button class="nav-link active w-100" id="pills-login-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login"
                    aria-selected="true">Saioa Hasi</button>
            </li>
            <li class="nav-item text-center menu-obj rounded" role="presentation">
                <button class="nav-link w-100" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register"
                    type="button" role="tab" aria-controls="pills-register" aria-selected="false">Erregistratu</button>
            </li>
        </ul>

        {{-- FORMULARIOS --}}
        <section class="tab-content" id="pills-tabContent">
            {{-- LOGIN --}}
            <article class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">

                {{-- FORM LOGGIN --}}
                <form class="form px-4 pt-5 formulario" action="{{ route('Comercio.logSes') }}" method ="POST">
                    @csrf

                    <input type="text" name="usuario" class="form-control" placeholder="Erabiltzaile">
                    <input type="password" name="pass" class="form-control" placeholder="Pasahitza">
                    <button class="btn btn-dark btn-block">Saioa Hasi</button>
                </form>

                <p class="text-center text-success">{{Session::get('bien')}}</p>
                <p class="text-center text-danger">{{Session::get('error')}}</p>
                @isset($error)
                <br>
                <p class="text-center text-danger">*{{$error}}*</p>
                @endisset

                @foreach ($errors->all() as $error)
                    <p class="text-danger text-center">Ez da Erabiltzaile sortu</p>
                    @break
                @endforeach 

            </article>

            {{-- SING-UP --}}
            <article class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">

                {{-- FORM SING-UP --}}
                <form class="form px-4 formulario" action="{{ route('Comercio.usuNuevo') }}" method ="POST">
                    @csrf

                    <input type="text" name="nombre" class="form-control" placeholder="Izena" value="{{ old('nombre')}}" required>
                    <input type="text" name="apellido" class="form-control" placeholder="Abizena" value="{{ old('apellido')}}" required>
                    <input type="text" name="usuario" class="form-control" placeholder="Erabiltzaile" value="{{ old('usuario')}}" required>
                    <input type="password" name="pass" class="form-control" placeholder="Pasahitza" value="{{ old('pass')}}" required>
                    <input type="password" name="passB" class="form-control" placeholder="Bersartu pasahitza" value="{{ old('passB')}}" required>
                    <button class="btn btn-dark btn-block">Erregistratu</button>
                </form>

                <br>
                @foreach ($errors->all() as $error)
                <ul>
                    <li class="text-danger text-center">{{ $error }}</li>
                </ul>
                @endforeach 
                <br>


            </article>



        </section>
    </main>

    @include('layouts.footer')

</body>

</html>
