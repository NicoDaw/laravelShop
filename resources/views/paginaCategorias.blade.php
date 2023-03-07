@extends('navBar')
@section('content')
    <div style="width: 100vw; display: flex; justify-content: center">
        <div style="width: 60%; background-color: rgb(237, 248, 197)">
            <form action="/añadirCategoria" method="POST">
                <p
                    style="font-weight: bold; font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Añadir Categorías</p>
                <div style="display: flex; align-items: center">
                    <p
                        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Nombre: </p><input type="text" name="nombre" style=" height: 20px; margin-left: 6px" />
                </div>
                <input type="submit" value="Añadir" style="margin-top: 15px; " />
                <p
                    style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Listado de categorías</p>

                <div style="display: flex; flex-wrap: wrap">
                    @foreach ($categorias as $categoria)
                        <div
                            style="border: 1px solid black;  border-radius: 12px; height: 20px; margin: 5px; background-color: rgb(51, 50, 56) ">
                            <span
                                style="padding: 8px; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">{{ $categoria->nombreCategoria }}</span><a
                                style="padding: 4px; color: white; text-decoration: none "
                                href="/eliminarCategoria/{{ $categoria->id }}">
                                x</a>
                        </div>
                    @endforeach
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
