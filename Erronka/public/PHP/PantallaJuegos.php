<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('CSS/PantallaJuegos.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Comercio</title>
</head>

<body id="fondo">
    <div class="mt-5" id="tamaina">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item text-center">
                <strong class="vidas">Vidas: 3</strong>
            </li>
            <li class="nav-item text-center bg-danger" role="presentation">
                <button class="nav-link active w-100 text-light" id="pills-Juego1-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-Juego1" type="button" role="tab" aria-controls="pills-Juego1"
                    aria-selected="true">Juego 1</button>
            </li>
            <li class="nav-item text-center bg-danger" role="presentation">
                <button class="nav-link w-100 text-light" id="pills-Juego2-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-Juego2" type="button" role="tab" aria-controls="pills-Juego2"
                    aria-selected="false">Juego 2</button>
            </li>
            <li class="nav-item text-center bg-danger" role="presentation">
                <button class="nav-link w-100 text-light" id="pills-Juego3-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-Juego3" type="button" role="tab" aria-controls="pills-Juego3"
                    aria-selected="false">Juego 3</button>
            </li>
            <li class="nav-item text-center" role="presentation">
                <strong class="vidas">30:00</strong>
            </li>
            <li class="nav-item text-center" role="presentation">
                <button class="nav-link" type="submit">P</button>
            </li>
        </ul>
        <div class="text-center tab-content mt-5">
            <div class="tab-pane fade show active " id="pills-Juego1" role="tabpanel"
                aria-labelledby="pills-Juego1-tab">
                <div>
                    hola
                </div>
                <div>
                    hola2
                </div>
            </div>
            <div class=" tab-pane fade" id="pills-Juego2" role="tabpanel" aria-labelledby="pills-Juego2-tab">
                <div>
                    hola3
                </div>
                <div>
                    hola4
                </div>

            </div>
            <div class="tab-pane fade" id="pills-Juego3" role="tabpanel" aria-labelledby="pills-Juego3-tab">
                <div>
                    hola5
                </div>
                <div>
                    hola6
                </div>

            </div>
        </div>
    </div>
</body>

</html>