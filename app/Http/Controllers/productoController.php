<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use App\Models\Producto;

class productoController extends Controller
{
    public function pintaProductos()
    {
        $objetoProducto = Producto::orderBy('precio', 'asc')->get();
        // return view('index', ['objetoProducto' => $objetoProducto]);
        return view('index', ['objetoProducto' => $objetoProducto]);
        // response(['response' => $objetoProducto]);
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
        $producto->image = $request->image;
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
        $producto = Producto::where('id', $id->id);
        $producto->delete();

        return redirect()->to('eliminarProductos');
    }
    public function updateProduct(Request $request)
    {
        $producto = Producto::where('id', $request->id)->first();
        $producto->nombreProducto = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->image = $request->image;
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
}
