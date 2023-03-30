<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Stripe\Checkout\Session;
use Stripe\Stripe;


class productoController extends Controller
{
    public function pintaProductos()
    {
        $productos = Producto::orderBy('precio', 'asc')->get();
        $ratings = [];

        foreach ($productos as $producto) {
            $rating = $producto->ratings()->where('user_id', auth()->id())->first();
            if ($rating) {
                $ratings[$producto->id] = $producto->ratings()->avg('rating');
            } else {
                $ratings[$producto->id] = null;
            }
        }

        return view('index', compact('productos', 'ratings'));
    }

    public function eliminarProducto()
    {
        $objetoProducto = Producto::all();
        return view('eliminarProductos', ['objetoProducto' => $objetoProducto]);
    }
    public function editarProducto(Request $request)
    {
        $objetoProducto = Producto::join('categorias', 'categorias.id', '=', 'productos.id_categoria')
            ->select('productos.*', 'categorias.nombreCategoria')->where('productos.id', '=', $request->id)->get();
        $objetoCategorias = Categorias::all();
        // $objetoProducto = Producto::get('*', $id->id);
        if ($objetoProducto) {
            return view('editarProductos', ['objetoProducto' => $objetoProducto, 'objetoCategorias' => $objetoCategorias]);
        } else {
            return response('Product not found.', 404);
        }
    }
    public function addProduct(Request $request)
    {
        $producto = new Producto();
        $producto->nombreProducto = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->image = $request->file('image')->store('', 'public');
        $producto->id_categoria = $request->categoria;
        $producto->save();
        $objetoProducto = Producto::all();
        return redirect()->to('productos');
    }
    public function addCategory(Request $request)
    {
        $categoria = new Categorias();
        $categoria->nombreCategoria = $request->nombre;
        $categoria->save();
        $categorias = Categorias::all();
        return redirect()->to('añadirCategoriaPage');
    }
    public function añadirCategoria()
    {
        $categorias = Categorias::all();
        return view('paginaCategorias', ['categorias' => $categorias]);
    }
    public function deleteProduct(Request $id)
    {

        $producto = Producto::where('id', $id->id)->first();
        if (Storage::exists('/public//' . $producto->image)) {
            Storage::delete('/public//' . $producto->image);
        }
        $producto->delete();

        return redirect()->to('eliminarProductos');
    }
    public function updateProduct(Request $request)
    {
        $producto = Producto::where('id', $request->id)->first();
        $producto->nombreProducto = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        if (Storage::exists('/public//' . $producto->image)) {
            Storage::disk('public')->delete($producto->image);
        }
        $producto->image = $request->file('image')->store('', 'public');
        $producto->id_categoria = $request->categorias_id;
        $producto->save();
        return redirect()->to('eliminarProductos');
    }
    public function eliminarCat(Request $r)
    {
        $categoria = Categorias::where('id', $r->id);
        $categoria->delete();
        return redirect()->to('añadirCategoriaPage');
    }

    //CARRITO
    public function añadeProductoCarrito(Request $r)
    {
        $userId = auth()->user()->id;
        $producto = Producto::find($r->id);
        $carritoActual = Carrito::where('idUser', $userId)->get();

        if ($producto) {
            $cartItem = Carrito::where('idUser', $userId)->where('idProducto', $producto->id)->first();

            if ($cartItem) {
                // Product already exists in the cart
                $cartItem->cantidad += 1;
                $cartItem->save();
            } else {
                // Product does not exist in the cart
                $carrito = new Carrito;
                $carrito->idUser = $userId;
                $carrito->idProducto = $producto->id;
                $carrito->cantidad = 1;
                $carrito->save();
            }

            return redirect()->to('productos');
        } else {
            return 'There was an error on selecting the product';
        }
    }
    public function irCarritoPage()
    {
        $userId = auth()->user()->id;
        $carritoActual = Carrito::with('product')->where('idUser', $userId)->get();
        return view('carritoPage', ['carritoActual' => $carritoActual]);;
    }


    public function deleteItem($id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();
        return redirect()->route('iracarrito')->with('success', 'Item deleted successfully');
    }

    //Contar items del carrito
    public function getCartItemCount()
    {
        $cart = Carrito::where('idUser', auth()->user()->id)->get();
        return $cart->sum('cantidad');
    }

    //PAGO CON STRIPE
    public function initiateCheckout()
    {
        Stripe::setApiKey('sk_test_51Mqj0jFG5tbfcoHO4wNIwHLh95RbeBZwUYs8UHDjeWgWY1FAimNWZW2MZVyVfrX2KCxVonNZsm4zG9GwGifrM4Gn00MtDJjtiF');
        // Devuelvo todos los items carrito de la database
        $producto =  Carrito::with('product')->where('idUser', auth()->user()->id)->get();
        // Calculate the total amount of the cart
        $totalAmount = 0;
        foreach ($producto as $item) {
            $totalAmount += $item->product->precio * $item->cantidad;
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Compra en Tabletop Games',
                        ],
                        'unit_amount' => $totalAmount * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('succeedPayment'),
            'cancel_url' => route('deniedPayment'),
        ]);

        return redirect()->to($session->url);
    }

    public function succeedPayment()
    {
        $user = User::find(auth()->user()->id);
        $user->carritos()->delete();
        return view('succeedPayment');
    }

    public function deniedPayment()
    {
        return view('deniedPayment');
    }
    public function store(Request $request)
    {
        $rating = new Rating([
            'product_id' => $request->get('product_id'),
            'user_id' => $request->user()->id,
            'rating' => $request->get('rating', 0)
        ]);
        $rating->save();

        return redirect()->to('productos');
    }
}
