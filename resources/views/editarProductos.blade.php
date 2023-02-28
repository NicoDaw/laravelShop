@extends('navBar')
@section('content')
    <div>
        <div
            style="display: flex; height: 100px; width: 1000px; background-color: rgb(255, 236, 208); padding: 10px; align-items: center; margin: 10px; border: 1px solid black">
            <div style="margin-right: 10px">Id:{{ $objetoProducto[0]->id }}</div>
            <img src="{{ $objetoProducto[0]->image }}" width="100" style="border: 1px solid black" />
            <div style="margin: 5px">{{ $objetoProducto[0]->nombreProducto }}</div>
            <div style="margin: 5px; width: 700px">{{ $objetoProducto[0]->descripcion }}</div>
            <div style="margin: 5px">{{ $objetoProducto[0]->precio }}€</div>
        </div>
        <div>
            <form action="/actualizarProducto/{{ $objetoProducto[0]->id }}" method="POST">
                <p>Editar Producto</p>
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
                        <p>Image: </p><input placeholder="{{ $objetoProducto[0]->image }}" type="text"
                            value="{{ $objetoProducto[0]->image }}" name="image"
                            style="height: 20px; margin-left: 6px" />
                    </div>
                </div>
                <div style="display: flex;">
                    <p>Descripcion: </p>
                    <textarea placeholder="{{ $objetoProducto[0]->descripcion }}" rows="3" name="descripcion"
                        style="height: 200px; width: 800px; margin-left: 6px">{{ $objetoProducto[0]->descripcion }}</textarea>
                </div>
                <input type="hidden" name="id" id="" value="{{ $objetoProducto[0]->id }}">
                @csrf
                <input type="submit" value="Enviar" name="submit" />
            </form>
        </div>
    </div>
@endsection
