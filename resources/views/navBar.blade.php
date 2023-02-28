<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @embedstyles('C:\xampp\htdocs\laravel\proyecto1\resources\css\navBar.css')
</head>

<body>
    <div>
        <ul class="container">
            <li><a href="/productos">Home</a></li>
            <li><a href="/añadirProductoPage">Añadir Productos</a></li>
            <li><a href="/eliminarProductos">Gestión de Productos</a></li>
            <li><a href="/añadirCategoriaPage">Gestión de Categorías</a></li>
            {{-- <li><a href="#">Perfil</a></li> --}}
        </ul>
    </div>
    <div>
        @yield('content')
    </div>

</body>

</html>
