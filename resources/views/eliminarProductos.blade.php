<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @embedstyles('C:\xampp\htdocs\laravel\proyecto1\resources\css\gestionProductos.css')

</head>

<body>
    @extends('dashboard')
    @section('content')
        <div>
            <div style="width: 80vw; align-self:center; margin: 20px">
                <a href="/añadirProductoPage" class="añadirProductoBtn">Añadir Producto +</a>
            </div>
            <div style="display: flex; flex-direction: column; align-items: center;">
                @foreach ($objetoProducto as $producto)
                    <div
                        style="display: flex; height: 150px; width: 80vw; background-color: rgb(255, 121, 121); padding: 10px; align-items: center; margin: 10px; border: 1px solid black; border-radius: 4px">
                        <div style="margin-right: 10px">Id:{{ $producto->id }}</div>
                        <img src="{{ $producto->image }}" width="100"
                            style="border: 1px solid black; background-color: white; border-radius: 4px" />
                        <div>
                            <div style="margin: 5px; color: black; font-weight: bold">
                                {{ $producto->nombreProducto }}
                            </div>
                            <div style="margin: 5px; width: 50vw; font-size: 14px; color:rgb(67, 67, 67)">
                                {{ $producto->descripcion }}</div>
                        </div>
                        <div style="margin: 5px">{{ $producto->precio }}€</div>

                        <a href="/eliminarProducto/{{ $producto->id }}"
                            style=" display: flex; justify-content: center; width: 150px; text-decoration: none">
                            <p
                                style="padding: 10px; border-radius: 10px; background-color: rgb(183, 183, 183); border: 1px solid black">
                                Eliminar</p>
                        </a>
                        <a href="/editarProductosPage/{{ $producto->id }}"
                            style=" display: flex; justify-content: center; width: 150px; text-decoration: none">
                            <p
                                style="padding: 10px; border-radius: 10px; background-color: rgb(183, 183, 183); border: 1px solid black; color: blue;">
                                Editar</p>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    @endsection

</body>

</html>
