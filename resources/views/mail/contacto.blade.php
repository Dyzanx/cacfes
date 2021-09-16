<style>
    *{
    padding: 0;
    margin: 0;
    font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
    body{
        background-color: #E5E7EB;
    }
    h1{
        padding: 0.375rem;
        background-color: #1F2937;
        color: white;
        font-size: 27px;
        text-align: center;
        border-bottom: 2px solid;
        --tw-border-opacity: 1;
        border-color: rgba(156, 163, 175, var(--tw-border-opacity));
    }
    h2{
        padding: 0.375rem;
        background-color: #374151;
        color: white;
        font-size: 23px;
        border-bottom: 2px solid;
        --tw-border-opacity: 1;
        border-color: rgba(0, 0, 0, var(--tw-border-opacity));
    }
    h3{
        padding: 0.375rem;
        color: black;
        font-size: 17px;
        border-bottom: 2px solid;
        --tw-border-opacity: 1;
        border-color: rgba(0, 0, 0, var(--tw-border-opacity));
    }
    span{
        font-weight: bolder;
    }
    .border-top{
        border-top: 2px solid;
        --tw-border-opacity: 1;
        border-color: rgba(0, 0, 0, var(--tw-border-opacity));
    }
    ul{
        padding: 0.375rem;
        color: black;
        font-size: 15px;
        margin-top: 5%;
        margin-bottom: 5%;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion de contacto</title>
</head>
<body>
    <h1>hola!, el usuario {{$nombre}}, quiere ponerse en contacto contigo</h1>
    <h2>para: {{$asunto}}</h2>

    <h3>Información del usuario:</h3>
    <ul>
        <li><span>Correo: </span>{{$correo}}</li>
        <li><span>Telefono:</span>{{$telefono}}</li>
    </ul>

    <h3 class="border-top">Mensaje que dejó el usuario {{$nombre}}:</h3>
    <ul>
        <li><span>Mensaje: </span>{{$mensaje}}</li>
    </ul>
</body>
</html>