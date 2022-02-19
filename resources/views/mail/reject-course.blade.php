<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Este es un correo de prueba</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis ducimus doloribus dolore ut, iste obcaecati quisquam repellat officia itaque aut atque dolores, similique ad pariatur amet quos beatae totam fugiat.</p>
    <p>El curso: <strong>{{$course->title}}</strong> ha sido rechazado</p>
    <h2>Observaciones</h2>
    {!!$course->observations->body!!}
</body>
</html>