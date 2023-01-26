<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('CSS/Login,Register.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Comercio</title>
</head>

<body>
    <div class="justify-content-center align-items-center mt-5" id="tamaina">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item text-center" role="presentation">
                <button class="nav-link active " id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login"
                    type="button"  role="tab" aria-controls="pills-login" aria-selected="true">Saioa Hasi</button>
            </li>
            <li class="nav-item text-center" role="presentation">
                <button class="nav-link" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register"
                    type="button"  role="tab" aria-controls="pills-register" aria-selected="false">Erregistratu</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">

                <div class="form px-4 pt-5">

                    <input type="text" name="" class="form-control" placeholder="Erabiltzaile">

                    <input type="text" name="" class="form-control" placeholder="Pasahitza">
                    <button class="btn btn-dark btn-block">Saioa Hasi</button>

                </div>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">

                <div class="form px-4">

                    <input type="text" name="" class="form-control" placeholder="Izena">

                    <input type="text" name="" class="form-control" placeholder="Abizena">

                    <input type="text" name="" class="form-control" placeholder="Erabiltzaile">

                    <input type="text" name="" class="form-control" placeholder="Pasahitza">

                    <button class="btn btn-dark btn-block">Erregistratu</button>

                </div>
            </div>
        </div>
    </div>
</body>

</html>