@extends('dashboard')
@section('content')
    <div style="width: 100vw; display: flex; justify-content: center; margin-top: 10px; ">
        <div style="width: 60%; background-color: rgb(255, 121, 121); border-radius: 12px; padding: 10px">
            <form action="/añadirCategoria" method="POST">
                @auth
                    @if (Auth::user()->role == 'admin')
                        <p
                            style="font-weight: bold; font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin: 1em">
                            Añadir Categorías</p>
                        <div style="display: flex; align-items: center">
                            <p
                                style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin: 1em">
                                Nombre: </p><input type="text" name="nombre" style=" height: 20px; margin: 1em;" />
                        </div>

                        <input type="submit" value="Añadir"
                            style="margin: 1em; background-color: rgb(243, 243, 243); padding: 5px; border-radius: 4px; border: 1px solid black " />
                    @endif
                @endauth
                <p
                    style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin: 1em">
                    Listado de categorías</p>

                <div style="display: flex; flex-wrap: wrap">
                    @foreach ($categorias as $categoria)
                        <div
                            style="border: 1px solid black;  border-radius: 12px; height: 20px; margin: 5px; background-color: rgb(51, 50, 56); display: flex; align-items: center ">
                            <span
                                style="padding: 8px; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin: 1em; padding: 10px; align-self:center">{{ $categoria->nombreCategoria }}
                            </span>
                            @auth
                                @if (Auth::user()->role == 'admin')
                                    <a style="padding: 4px; color: white; text-decoration: none "
                                        href="/eliminarCategoria/{{ $categoria->id }}">
                                        x
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endforeach
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
