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
                          Hola Administrador
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Informe de usuarios registrados</h5>
                            <ol class="list-group list-group-numbered">
                                @foreach ($adminModel->report as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{ $item['country'] }}</div>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">{{ $item['count'] }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </body>
</html>