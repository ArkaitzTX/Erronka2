<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
    <link href="{{asset('CSS/Header,Footer.css')}}" rel="stylesheet" type="text/css">
=======
    <link href="{{asset('CSS/header_footer.css')}}" rel="stylesheet" type="text/css">
>>>>>>> origin/development

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<<<<<<< HEAD
</head>

<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
=======

    {{-- JQUERY  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    {{-- Temas --}}
    <script src="{{asset('JS/color.js')}}"></script>
</head>

<body>
<<<<<<< HEAD
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <img class="navbar-brand" src="{{asset('IMG/Logo.png')}}" height="36">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link">Hasiera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Jokoak</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <form class="form-inline my-2 my-lg-0 ml-auto">
                            <button class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">Saioa Hasi</button>
                        </form>
                    </ul>
                    </div>
                </div>
            </nav>
    </header>



 

</body>

</html>
=======
    <header id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                
                <button class="navbar-toggler nocolor" type="button" data-bs-toggle="collapse"
>>>>>>> origin/development
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                

<<<<<<< HEAD
                <img class="navbar-brand" src="{{asset('IMG/Logo.png')}}" height="36">
=======
                <img class="navbar-brand" src="{{asset('IMG/Logo.png')}}" alt="logo" height="36">
>>>>>>> origin/development
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto my-2 my-lg-0">
                        <li class="nav-item active">
                            {{-- Comercio.cofre --> BUEG EN LOGIN [CAMBIAR EL SISTEMA DE LOS #] --}}
<<<<<<< HEAD
                            <a href=' {{ route('Comercio.index') }}' class="nav-link">Hasiera</a>
                        </li>
                        <li class="nav-item">
                            <a href=' {{ route('Comercio.juegos') }}' class="nav-link">Jokoak</a>
                        </li>
=======
                            <a href=' {{ route('Comercio.index') }}' class="nav-link">{{__("header.l1")}} {{-- !idioma --}}</a>
                        </li>
                        <li class="nav-item">
                            <a href=' {{ route('Comercio.juegos') }}' class="nav-link">{{__("header.l2")}} {{-- !idioma --}}</a>
                        </li>
                        <li class="nav-item">
                            <a id="col" class="nav-link">{{__("header.l3")}} {{-- !idioma --}}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href=' {{ route('Comercio.idioma') }}' class="nav-link">{{__("header.l4")}}</a>
                        </li> --}}
>>>>>>> origin/development
                    </ul>

                    <ul class="navbar-nav">
                        <div class="form-inline my-2 my-lg-0 ml-auto">
                            @if(null !== session()->get('usuario'))
                                <a href=' {{ route('Comercio.admin') }} ' class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">
                                    {{ session()->get('usuario')->usuario }}
                                </a>
<<<<<<< HEAD
                            @else
                                <a href=' {{ route('Comercio.login') }} ' class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">
                                    Saioa Hasi
=======
                                {{-- ! --}}
                                <img id="perfil" src="IMG/profile/{{ session()->get('usuario')->foto }}" alt="">
                                {{-- ! --}}
                            @else
                                <a href=' {{ route('Comercio.login') }} ' class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">
                                    {{__("header.f2")}} {{-- !idioma --}}
>>>>>>> origin/development
                                </a>
                            @endif

                        </div>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    
</body>
</html>
<<<<<<< HEAD
=======
>>>>>>> development
>>>>>>> origin/development
