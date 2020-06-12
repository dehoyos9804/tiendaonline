<?php

namespace App\Http\Controllers;

//importamos los modelos que vamos a usar en este controlador
use App\Models\Venta;
use Illuminate\Http\Request;//Request funciona para recibir los datos del formulario
use App\Models\Compra;
use App\Models\Persona;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;//este se usa para autenticar los usuarios
use DB;//para manejar las bases de datos

use Barryvdh\DomPDF\Facade as PDF;//Facade para usar los pdf usamos
use Carbon\Carbon;//Carbon es una libreria para traer las fechas

class VentaController extends Controller
{
    //objeto autenticado en memoria cache
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
        $auth = Auth::id();//autentico al usuario
        $productos = Producto::all();//recibe al modelo producto
        $vendedores = Persona::all();//recibe al modelo persona
        $clientes = Cliente::all();//recibe al modelo cliente

        return view('ventas.index')
            ->with(['isGuardado'=>$isGuardado,'auth'=>$auth,'productos'=>$productos, 'vendedores'=>$vendedores, 'clientes'=>$clientes]);//envia a la vista de ventas con los datos de los modelos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //trae la vista de lista ventas
    public function create()
    {
        $this->myShare(Auth::id());//guardo el objeto de usuario en memoria
        $ventas = Venta::orderBy('created_at','DESC')->get();//obtiene los datos de ventas y los ordena
        return view('ventas.lista')->with(['ventas'=>$ventas]);//retorna la vista de lista de ventas con los datos de las ventas
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //funcion para guardar las ventas
    public function store(Request $request)
    {
        $venta = new Venta;//llama al modelo
        $venta->fecha = $request->input('fecha');
        $venta->cliente_id = $request->input('cliente');
        $venta->user_id = $request->input('vendedor');
        $venta->total = $request->input('total');

        if($venta->save()){//condicional para guardar el detalle de la venta
            $productos = $request->input('producto_id');
            $cantidades = $request->input('producto_cantidad');
            $total = $request->input('producto_subtotal');

            for($i = 0; $i < count($productos); $i++){//ciclo para la cantidad de productos
                $venta->productos()->attach($productos[$i],['cantidad'=>$cantidades[$i],'total'=>$total[$i]]);
            }
            return redirect()->route('venta.index',['isGuardado'=>'1']);//retorna la vista de compras
        }
    }
    //reporte de ventas
    public function report($id)
    {
        $datos = Venta::where('id', $id)->first();//recibe el id de la venta
        //consulta en la bd con un join para obtener los datos de las venta y mostrando en las facturas
        $detalle = DB::select("SELECT p.nombre, p.marca, p.precioventa, pv.cantidad, pv.total
                    FROM producto_venta pv
                    INNER JOIN productos p ON p.id = pv.producto_id
                    INNER JOIN ventas v ON v.id = pv.venta_id
                    WHERE v.id = ?", array($id));
        
        return view('reportes.reporteventa', compact('datos'), compact('detalle'));//retorna la vista de factura de ventas con los datos recogidos en el join
    }
    //funcion para imprimir las facturas de ventas
    public function imprimir($id)
    {
        $datos = Venta::where('id', $id)->first();//recibe el id de la venta
        //consulta en la bd con un join para obtener los datos de las venta y mostrando en las facturas
        $detalle = DB::select("SELECT p.nombre, p.marca, p.precioventa, pv.cantidad, pv.total
                    FROM producto_venta pv
                    INNER JOIN productos p ON p.id = pv.producto_id
                    INNER JOIN ventas v ON v.id = pv.venta_id
                    WHERE v.id = ?", array($id));

        $pdf = \PDF::loadView('reportes.reporteventa', compact('datos'), compact('detalle'));//retorna la vista de factura de ventas con los datos recogidos en el join
        return $pdf->download('report.pdf');//lo guar en un archivo .pdf
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
