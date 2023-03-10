<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERKATARITZA</title>

    {{-- CSS --}}
    <link href="{{asset('CSS/log-reg.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

    @include('layouts.header')

    <main>
        <section>
            {{-- MENU DE CAMBIO --}}
            <ul id="menu" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center menu-obj rounded" role="presentation">
                    <button class="menu-btn nav-link active w-100" id="pills-login-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login"
                        aria-selected="true">{{__("log-reg.sesion")}} {{-- !idioma --}}</button>
                </li>
                <li class="nav-item text-center menu-obj rounded" role="presentation">
                    <button class="menu-btn nav-link w-100" id="pills-register-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-register" type="button" role="tab" aria-controls="pills-register"
                        aria-selected="false">{{__("log-reg.ini")}} {{-- !idioma --}}</button>
                </li>
            </ul>

            {{-- FORMULARIOS --}}
            <section class="tab-content" id="pills-tabContent">
                {{-- LOGIN --}}
                <article class="tab-pane fade show active" id="pills-login" role="tabpanel"
                    aria-labelledby="pills-login-tab">

                    {{-- FORM LOGGIN --}}
                    <form class="form px-4 pt-5 formulario" action="{{ route('Comercio.logSes') }}" method="POST">
                        @csrf

                        <input type="text" name="usuario" class="form-control" placeholder="{{__("log-reg.usuario")}} {{-- !idioma --}}">
                        <input type="password" name="pass" class="form-control" placeholder="{{__("log-reg.pass1")}} {{-- !idioma --}}">
                        <button class="btn btn-block">{{__("log-reg.sesion")}} {{-- !idioma --}}</button>
                    </form>

                    <p class="text-center text-success">{{Session::get('bien')}}</p>
                    <p class="text-center text-danger">{{Session::get('error')}}</p>
                    @isset($error)
                    <br>
                    <p class="text-center text-danger">*{{$error}}*</p>
                    @endisset

                    @foreach ($errors->all() as $error)
                    <p class="text-danger text-center">{{__("log-reg.error")}} {{-- !idioma --}}</p>
                    @break
                    @endforeach

                </article>

                {{-- SING-UP --}}
                <article class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">

                    {{-- FORM SING-UP --}}
                    <form class="form px-4 formulario" action="{{ route('Comercio.usuNuevo') }}" method="POST">
                        @csrf

                        <input type="text" name="nombre" class="form-control" placeholder="{{__("log-reg.nombre")}} {{-- !idioma --}}"
                            value="{{ old('nombre')}}" required>
                        <input type="text" name="apellido" class="form-control" placeholder="{{__("log-reg.apellido")}} {{-- !idioma --}}"
                            value="{{ old('apellido')}}" required>
                        <input type="text" name="usuario" class="form-control" placeholder="{{__("log-reg.usuario")}} {{-- !idioma --}}"
                            value="{{ old('usuario')}}" required>
                        <input type="password" name="pass" class="form-control" placeholder="{{__("log-reg.pass1")}} {{-- !idioma --}}"
                            value="{{ old('pass')}}" required>
                        <input type="password" name="passB" class="form-control" placeholder="{{__("log-reg.pass2")}} {{-- !idioma --}}"
                            value="{{ old('passB')}}" required>

                        <label>{{__("log-reg.dif")}} {{-- !idioma --}}</label>
                        <select name="dificultad" class="form-control">
                            <option value="0">{{__("log-reg.d1")}} {{-- !idioma --}}</option>
                            <option value="1">{{__("log-reg.d2")}} {{-- !idioma --}}</option>
                            <option value="2">{{__("log-reg.d3")}} {{-- !idioma --}}</option>
                        </select>
                        <button class="btn btn-block">Erregistratu</button>
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
        </section>
    </main>

    @include('layouts.footer')

</body>

</html>
