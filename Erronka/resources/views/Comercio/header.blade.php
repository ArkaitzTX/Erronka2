<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('CSS/Header,Footer.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Comercio</title>
</head>

<body>
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

                    <ul class="navbar-nav me-auto my-2 my-lg-0">
                        <li class="nav-item active">
                            <a href=' {{ route('Comercio.index') }}' class="nav-link">Hasiera</a>
                        </li>
                        <li class="nav-item">
                            <a href=' {{ route('Comercio.index') }}' class="nav-link">Jokoak</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <form class="form-inline my-2 my-lg-0 ml-auto">
                            <a href=' {{ route('Comercio.login') }} ' class="btn btn-outline-danger my-2 my-sm-0 " id="color" type="submit">Saioa
                                Hasi
                            </a>
                        </form>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
</body>
</html>
