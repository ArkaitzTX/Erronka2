<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{asset('CSS/header_footer.css')}}" rel="stylesheet" type="text/css">

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                

                <img class="navbar-brand" src="{{asset('IMG/Logo.png')}}" alt="logo" height="36">
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto my-2 my-lg-0">
                        <li class="nav-item active">
                            {{-- Comercio.cofre --> BUEG EN LOGIN [CAMBIAR EL SISTEMA DE LOS #] --}}
                            <a href=' {{ route('Comercio.index') }}' class="nav-link">Hasiera</a>
                        </li>
                        <li class="nav-item">
                            <a href=' {{ route('Comercio.juegos') }}' class="nav-link">Jokoak</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <div class="form-inline my-2 my-lg-0 ml-auto">
                            @if(null !== session()->get('usuario'))
                                <a href=' {{ route('Comercio.admin') }} ' class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">
                                    {{ session()->get('usuario')->usuario }}
                                </a>
                                {{-- ! --}}
                                <img id="perfil" src="IMG/profile/{{ session()->get('usuario')->foto }}" alt="">
                                {{-- ! --}}
                            @else
                                <a href=' {{ route('Comercio.login') }} ' class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">
                                    Saioa Hasi
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
