@embedstyles('C:\xampp\htdocs\laravel\proyecto1\resources\css\gestionProductos.css')
@extends('dashboard')
@section('content')
    <div style="width: 100vw; display: flex; flex-direction: column; align-items: center">
        {{-- <div>{{ $objetoProducto }}</div> --}}
        <div
            style="display: flex; height: 150px; width: 80vw; background-color: rgb(255, 121, 121); padding: 10px; align-items: center; margin: 10px; border: 1px solid black; border-radius: 4px">
            <div style="margin-right: 10px">Id:{{ $objetoProducto[0]->id }}</div>
            <img src="{{ asset('storage/' . $objetoProducto[0]->image) }}" width="100"
                style="border: 1px solid black; background-color: white; border-radius: 4px" />
            <div>
                <div style="margin: 5px; color: black; font-weight: bold">
                    {{ $objetoProducto[0]->nombreProducto }}
                </div>
                <div style="margin: 5px; width: 50vw; font-size: 14px; color:rgb(67, 67, 67)">
                    {{ $objetoProducto[0]->descripcion }}</div>
            </div>
            <div style="margin: 5px">{{ $objetoProducto[0]->precio }}€</div>

            <a href="/eliminarProducto/{{ $objetoProducto[0]->id }}"
                style=" display: flex; justify-content: center; width: 150px; text-decoration: none">
                <p
                    style="padding: 10px; border-radius: 10px; background-color: rgb(183, 183, 183); border: 1px solid black">
                    Eliminar</p>
            </a>
            <a href="/editarProductosPage/{{ $objetoProducto[0]->id }}"
                style=" display: flex; justify-content: center; width: 150px; text-decoration: none">
                <p
                    style="padding: 10px; border-radius: 10px; background-color: rgb(183, 183, 183); border: 1px solid black; color: blue;">
                    Editar</p>
            </a>

        </div>
        <div>
            <form action="/actualizarProducto/{{ $objetoProducto[0]->id }}" method="POST" enctype="multipart/form-data">
                <p style="font-weight: bold; font-size: 25px">Editar Producto</p>
                <div style="display: flex">
                    <div style="display: flex; align-items: center; margin-left: 25px">
                        <p>Nombre: </p><input placeholder="{{ $objetoProducto[0]->nombreProducto }}"
                            value="{{ $objetoProducto[0]->nombreProducto }}" type="text" name="nombre"
                            style=" height: 20px; margin-left: 6px" />
                    </div>
                    <div style="display: flex; align-items: center; margin-left: 25px">
                        <p>Precio: </p><input placeholder="{{ $objetoProducto[0]->precio }}€" type="number"
                            value="{{ $objetoProducto[0]->precio }}" name="precio"
                            style="height: 20px; margin-left: 6px" />
                    </div>
                    <div style="display: flex; align-items: center; margin-left: 25px">
                        <p>Imagen: </p>
                        <input type="file" name="image" placeholder="{{ $objetoProducto[0]->image }}" type="text"
                            value="{{ $objetoProducto[0]->image }}" name="image" style="height: 20px; margin-left: 6px"
                            id="image" />
                    </div>
                    <select name="categorias_id" class="editarSelector">
                        <option value=""></option>
                        @foreach ($objetoCategorias as $categoria)
                            <option value="{{ $categoria->id }}" name="categoriaId">
                                {{ $categoria->nombreCategoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="display: flex;">
                    <p>Descripcion: </p>
                    <textarea placeholder="{{ $objetoProducto[0]->descripcion }}" rows="3" name="descripcion"
                        style="height: 200px; width: 800px; margin-left: 6px">{{ $objetoProducto[0]->descripcion }}</textarea>
                </div>
                <input type="hidden" name="id" id="" value="{{ $objetoProducto[0]->id }}">
                @csrf
                <input type="submit" value="Enviar" name="submit" class="añadirProductoBtn" />
            </form>
        </div>
    </div>

    {{-- <div>{{ $objetoProducto[1]}}</div> --}}
@endsection
