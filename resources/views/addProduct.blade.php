@extends('dashboard')
@section('content')
    <div style="width: 100vw; display: flex; justify-content: center; margin-top: 5vh">
        <div style="width: 60%; background-color: rgb(237, 248, 197); padding: 20px">
            <form action="/añadirProducto" method="POST">
                <p
                    style="font-weight: bold; font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Añadir Productos</p>
                <div style="display: flex; align-items: center">
                    <p
                        style="font-weight: bold; font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Nombre: </p><input type="text" name="nombre" style=" height: 20px; margin-left: 6px" />
                </div>
                <div style="display: flex;">
                    <p
                        style="font-weight: bold; font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Descripción:
                    </p>
                    <textarea type="text" name="descripcion" style="height: 200px; width: 60%; margin-left: 6px"></textarea>
                </div>
                <div style="display: flex; align-items: center">
                    <p
                        style="font-weight: bold; font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Precio: </p><input type="number" name="precio" style="height: 20px; margin-left: 6px" />
                </div>
                <div style="display: flex; align-items: center">
                    <p
                        style="font-weight: bold; font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Imagen: </p><input type="text" name="image" style="height: 20px; margin-left: 6px" />
                </div>

                <select name="categoria" id="categoria">
                    <option></option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombreCategoria }}</option>
                    @endforeach
                </select>
                @csrf
                <input type="submit" value="submit" />
            </form>
        </div>
    </div>
@endsection
