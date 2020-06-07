<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Persona;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function myShare($id){
        $user = Persona::where('user_id', $id)->first();
        \View::share('user_auth', $user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isGuardado)
    {
        $this->myShare(Auth::id());//guardo el objeto de usuario en memoria
        $proveedores = Proveedor::all();
        $productos = Producto::all();

        return view('admin.compras.index')
            ->with(['isGuardado'=>$isGuardado, 'proveedores'=>$proveedores, 'productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //guardar la compra
        $compra = new Compra;
        $compra->fecha = $request->input('fecha');
        $compra->total = $request->input('total');
        $compra->proveedor_id = $request->input('proveedor');
        $compra->save();

        if($compra){
            //guardo el detalle de la compra
            $productos = $request->input('producto_id');
            $cantidades = $request->input('producto_cantidad');
            $total = $request->input('producto_subtotal');

            for($i = 0; $i < count($productos); $i++){
                $compra->productos()->attach($productos[$i],['cantidad'=>$cantidades[$i],'total'=>$total[$i]]);
            }

            return redirect()->route('admin.compra.index',['isGuardado'=>'1']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
