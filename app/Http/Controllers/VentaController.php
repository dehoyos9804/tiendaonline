<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Persona;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
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
        $auth = Auth::id();
        $productos = Producto::all();
        //$vendedores = Persona::where('tipousuario_id', 2)->get();
        $vendedores = Persona::all();
        $clientes = Cliente::all();

        return view('ventas.index')
            ->with(['isGuardado'=>$isGuardado,'auth'=>$auth,'productos'=>$productos, 'vendedores'=>$vendedores, 'clientes'=>$clientes]);
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
        //guardar la venta
        $venta = new Venta;
        $venta->fecha = $request->input('fecha');
        $venta->cliente_id = $request->input('cliente');
        $venta->user_id = $request->input('vendedor');
        $venta->total = $request->input('total');

        if($venta->save()){
            //agrego el detalle
            $productos = $request->input('producto_id');
            $cantidades = $request->input('producto_cantidad');
            $total = $request->input('producto_subtotal');

            for($i = 0; $i < count($productos); $i++){
                $venta->productos()->attach($productos[$i],['cantidad'=>$cantidades[$i],'total'=>$total[$i]]);
            }

            return redirect()->route('venta.index',['isGuardado'=>'1']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
