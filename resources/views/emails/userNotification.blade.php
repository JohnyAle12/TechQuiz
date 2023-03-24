<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <div class="card mt-5">
                        <div class="card-header">
                          Hola {{ $user->name }}
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Bienvenido</h5>
                          <p class="card-text">Para nosotros es magnífico darte la bienvenida y acompañarte en tu proceso de registro.</p>
                          <p class="card-text">Si tu no creaste una cuenta en nuestra plataforma, no es necesario que realices alguna acción.</p>
                          <p class="card-text">Saludos!</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </body>
</html>