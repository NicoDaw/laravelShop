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
    public function editarProducto(Request $id)
    {
        $objetoProducto = Producto::get('*', $id->id);
        return view('editarProductos', ['objetoProducto' => $objetoProducto]);
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
