@extends('dashboard')
@section('content')
    @embedstyles('C:\xampp\htdocs\laravel\proyecto1\resources\css\carritoPage.css')
    <h1 style="margin: 40px; font-size: 40px">Carrito</h1>
    <div class="product-list">
        <?php foreach($carritoActual as $item): ?>
        <div class="product">
            <div style="imgContainer">
                <img style="width: 120px; border-radius: 4px" src="<?php echo $item['product']['image']; ?>" alt="<?php echo $item['product']['nombreProducto']; ?>">
                <h3 style="text-align: center; font-size: 12px"><?php echo $item['product']['nombreProducto']; ?></h3>
            </div>
            <div class="quantity">
                <label for="quantity-<?php echo $item['idProducto']; ?>">Cantidad:</label>
                <p class="pQuantity"><?php echo $item['cantidad']; ?>
                </p>
            </div>
            <p class="amount"><?php echo '€' . number_format($item['cantidad'] * $item['product']['precio'], 2); ?></p>
            <a href="/deleteCartItem/{{ $item->id }}" class="btn-delete" data-id="{{ $item->id }}">Eliminar</a>
        </div>

        <?php endforeach; ?>
        <?php
        $total = 0;
        foreach ($carritoActual as $item) {
            $total += $item['cantidad'] * $item['product']['precio'];
        }
        ?>

    </div>
    <div class="total">
        <span>Total:</span>
        <span>€<?php echo $total; ?></span>
    </div>
    <div class="checkoutContainer">
        <a class="checkoutBtn" href="{{ route('checkout') }}">Checkout</a>
    </div>

    @csrf
@endsection()
