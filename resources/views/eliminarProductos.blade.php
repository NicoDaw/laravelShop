@extends('navBar')
@section('content')
    <div>
        @foreach ($objetoProducto as $producto)
            <div
                style="display: flex; height: 100px; width: 800px; background-color: rgb(255, 236, 208); padding: 10px; align-items: center; margin: 10px; border: 1px solid black">
                <div style="margin-right: 10px">Id:{{ $producto->id }}</div>
                <img src="{{ $producto->image }}" width="100" style="border: 1px solid black; background-color: white" />
                <div style="margin: 5px">{{ $producto->nombre }}</div>
                <div style="margin: 5px; width: 800px; font-size: 14px">{{ $producto->descripcion }}</div>
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
@endsection
