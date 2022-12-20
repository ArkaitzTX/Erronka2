<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('CSS/styles.css')}}" rel="stylesheet" type="text/css">
    <title>Admin</title>
</head>
<body>
@include('comercio.header')
    <section class="container">
        <form action="" enctype="multipart/form-data" method="post">
            @csrf
            {{ method_field('PUT') }}
            <main class="usu">
                <div class="usu-edit">
                    <input type="text" name="nombre" class="usu-inp text-center" placeholder="nombrephp">
                    <input type="text" name="apellido" class="usu-inp text-center" placeholder="apellidophp">
                </div>
                <div class="usu-edit">
                    <input type="text" name="usuario" class="usu-inp text-center" placeholder="usuariophp">
                    <input type="password" name="pass" class="usu-inp text-center" placeholder="psswdphp">
                </div>
                <button type="submit" class="usu-btn" value="editar">edit</button>
                <div class="usu-img">
                    <button type="file" class="rounded-circle" name="img">
                        <img src="img/profile/default.png" alt="img">
                    </button>
                </div>
            </main>
         </form>
    </section>
    <hr>
    <section class="container">
        <form action="" method="post">
        @csrf
            <main class="d-flex justify-content-center">
                <input type="text" placeholder="Introduce cod." class="adm-inp text-center" name="rol">
                <button type="submit" class="adm-btn text-center" value="enviar">+</button>
            </main>
        </form>
        <div class="">
            <!-- Posible table -->
        </div>
    </section>
    <hr>
    <section class="container text-center">
        <form action="" method="POST">  
            @csrf
            @method('DELETE')      
            <input type="text" placeholder="USUARIO" name="usuario" class="del-inp text-center"><button type="submit" class="del-btn" value="borrar">Ezabatu</button>
        </form>
    </section>
@include('comercio.footer')
</body>
</html>