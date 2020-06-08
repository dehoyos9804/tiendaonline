<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Persona;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

use DB;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

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
        $this->myShare(Auth::id());//guardo el objeto de usuario en memoria
        
        $compras = Compra::orderBy('created_at','DESC')->get();

        return view('admin.compras.lista')->with(['compras'=>$compras]);
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

    public function report($id)
    {
        $datos = Compra::where('id', $id)->first();
        $detalle = DB::select("SELECT 
        p.nombre, p.marca, p.precioventa, cp.cantidad, cp.total
        FROM compra_producto cp
        INNER JOIN productos p ON p.id = cp.producto_id
        INNER JOIN compras c ON c.id = cp.compra_id
        WHERE c.id = ?", array($id));

        //return view('report', with(['factura'=>$factura, 'datos'=>$datos, 'detalle'=>$detalle]));
        return view('reportes.reportecompra', compact('datos'), compact('detalle'));
    }

    public function imprimir($id){
        //$today = Carbon::now()->format('d/m/Y');
        $datos = Compra::where('id', $id)->first();//obtengo las compras

        //obtengo todas el detalle de la compra
        $detalle = DB::select("SELECT 
        p.nombre, p.marca, p.precioventa, cp.cantidad, cp.total
        FROM compra_producto cp
        INNER JOIN productos p ON p.id = cp.producto_id
        INNER JOIN compras c ON c.id = cp.compra_id
        WHERE c.id = ?", array($id));

        $pdf = \PDF::loadView('reportes.reportecompra', compact('datos'), compact('detalle'));
        return $pdf->download('report.pdf');
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
