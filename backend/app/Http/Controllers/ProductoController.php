<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{

    public function productos(){
        $productos = Producto::all();
        return response()->json([
            'productos' => $productos
        ], 200);
    }

    public function agregarProducto(Request $request){
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'nombre'=>'required',
                'descripcion'=>'nullable',
                'precio'=>'nullable'
            ]);

            $producto=Producto::create([
                'nombre'=>$fields['nombre'],
                'descripcion'=>$fields['descripcion'],
                'precio'=>$fields['precio']
            ]);
            DB::commit();
            return response()->json($producto,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function actualizarProducto(Request $request, Producto $producto){
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'nombre'=>'required',
                'descripcion'=>'nullable',
                'precio'=>'nullable'
            ]);

            $producto=Producto::find($producto->id);
            $producto->nombre = $fields['nombre']??$producto->nombre;
            $producto->descripcion = $fields['descripcion']??$producto->descripcion;
            $producto->precio = $fields['precio']??$producto->precio;
            $producto->save();
            DB::commit();
            return response()->json($producto, 200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function eliminarProducto(Producto $producto){
        try{
            DB::beginTransaction();
            $producto->delete();
            DB::commit();
            return response()->json('Deleted success',200);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
