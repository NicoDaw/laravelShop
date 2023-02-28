@extends('navBar')
@section('content')
    <div style="width: 100vw">
        @yield('nav')
        <div style="width: 100%; display: flex; flex-wrap: wrap; justify-content: space-around">
            @foreach ($objetoProducto as $producto)
                <div style="margin: 30px">
                    <div
                        style="height: 300px; width: 200px; border: 1px solid black; border-radius: 12px; display: flex; justify-content: center; align-items: center; flex-direction: column">

                        <img src="{{ $producto->image }}" width="100" style="border: 1px solid rgb(202, 202, 202)" />
                        <div>
                            <p
                                style="font-weight: bold; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin: 8px">
                                {{ $producto->nombreProducto }}
                            </p>
                        </div>
                        <div style="width: 160px">
                            <p style="font-size: 10px; text-align: justify; gap: 2px">{{ $producto->descripcion }}</p>
                        </div>
                        <div><span style="font-size: 15px">{{ $producto->precio }} €</span></div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection()
