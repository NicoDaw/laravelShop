<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@extends('dashboard')
@section('content')
    @embedstyles('C:\xampp\htdocs\laravel\proyecto1\resources\css\productos.css')
    <div style="">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-around">
            @foreach ($productos as $producto)
                <div
                    style="margin: 10px; background-color: rgb(255, 121, 121); border-radius: 12px; border: 2px solid black;">
                    <div
                        style="padding-top: 20px;padding-bottom: 20px; width: 250px;  border-radius: 12px; display: flex; justify-content: center; align-items: center; flex-direction: column">

                        <img src="{{ asset('storage/' . $producto->image) }}" width="100"
                            style="border: 1px solid rgb(202, 202, 202); border-radius: 4px; background-color: white; height: 100px" />
                        <div>
                            <p
                                style="font-weight: bold; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin: 8px">
                                {{ $producto->nombreProducto }}
                            </p>
                        </div>
                        <div style="width: 160px; height: 150px;">
                            <p style="font-size: 10px; text-align: justify; gap: 2px">{{ $producto->descripcion }}</p>
                        </div>
                        <div><span style="font-size: 15px">{{ $producto->precio }} €</span></div>
                        @auth
                            <div class="btnAñadirContainer">
                                <a href="/añadirProductoCarrito/{{ $producto->id }}" class="btnAñadir">
                                    <p>Añadir</p>
                                </a>
                            </div>
                            {{-- Ratings --}}
                            <div class="ratingContainer">

                                @if ($ratings[$producto->id])
                                    {{-- <p class="m-0">Average rating: {{ round($ratings[$producto->id], 1) }}</p> --}}
                                    @for ($i = 1; $i <= round($ratings[$producto->id], 0); $i++)
                                        <i class="fa fa-star text-warning" style="color: rgb(255, 205, 80)"></i>
                                    @endfor
                                @else
                                    <form action="{{ route('ratings.store') }}" method="POST">
                                        <div style="display: flex; flex-direction: column; align-items: center;">
                                            @csrf
                                            <div
                                                style="display: flex; align-items: center; justify-content: space-around; width: 180px">
                                                <input type="hidden" name="product_id" value="{{ $producto->id }}">
                                                <label for="rating" class="valorame">Valórame</label>
                                                <select name="rating" id="rating">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <div class="rateBtn">
                                                <button type="submit" style="font-size: 8px">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif

                            </div>
                        @endauth

                    </div>
                </div>
            @endforeach
        </div>
    @endsection()
