<?php

namespace App\Http\Controllers;

//importamos los modelos que vamos a usar en este controlador
use Illuminate\Http\Request;//Request funciona para recibir los datos del formulario
use App\Models\Compra;
use App\Models\Persona;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;//este se usa para autenticar los usuarios
use DB;//para manejar las bases de datos

use Barryvdh\DomPDF\Facade as PDF;//Facade para usar los pdf usamos
use Carbon\Carbon;//Carbon es una libreria para traer las fechas

class CompraController extends Controller
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
        $proveedores = Proveedor::all();// llama al modelo proveedor
        $productos = Producto::all();   // llama al modelo producto

        return view('admin.compras.index')
            ->with(['isGuardado'=>$isGuardado, 'proveedores'=>$proveedores, 'productos'=>$productos]);//retorna la vista de compras
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //trae la vista de lista compras
    public function create()
    {
        $this->myShare(Auth::id());//guardo el objeto de usuario en memoria
        $compras = Compra::orderBy('created_at','DESC')->get();//obtiene los datos de compras y los ordena los datos de las compras
        return view('admin.compras.lista')->with(['compras'=>$compras]);//retorna la vista de lista de compras con los datos de las compras
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //funcion para guardar las compras
    public function store(Request $request)
    {
        $compra = new Compra;//llama al modelo
        $compra->fecha = $request->input('fecha');              //obtiene los
        $compra->total = $request->input('total');              //datos del
        $compra->proveedor_id = $request->input('proveedor');   //formulario
        $compra->save();//guarda la compra

        if($compra){//condicional para guardar el detalle de la compra
            $productos = $request->input('producto_id');
            $cantidades = $request->input('producto_cantidad');
            $total = $request->input('producto_subtotal');

            for($i = 0; $i < count($productos); $i++){//ciclo para la cantidad de productos
                $compra->productos()->attach($productos[$i],['cantidad'=>$cantidades[$i],'total'=>$total[$i]]);
            }
            return redirect()->route('admin.compra.index',['isGuardado'=>'1']);//retorna la vista de compras
        }
    }
    //reporte de compras
    public function report($id)
    {
        $datos = Compra::where('id', $id)->first();//recibe el id de la compra
        //consulta en la bd con un join para obtener los datos de las compras y mostrando en las facturas
        $detalle = DB::select("SELECT  
        p.nombre, p.marca, p.precioventa, cp.cantidad, cp.total
        FROM compra_producto cp
        INNER JOIN productos p ON p.id = cp.producto_id
        INNER JOIN compras c ON c.id = cp.compra_id
        WHERE c.id = ?", array($id));

        return view('reportes.reportecompra', compact('datos'), compact('detalle'));//retorna la vista de factura de compras con los datos recogidos en el join
    }
    //funcion para imprimir las facturas de compras
    public function imprimir($id){
        $datos = Compra::where('id', $id)->first();//recibe el id de la compra
        //consulta en la bd con un join para obtener los datos de las compras y mostrando en las facturas
        $detalle = DB::select("SELECT 
        p.nombre, p.marca, p.precioventa, cp.cantidad, cp.total
        FROM compra_producto cp
        INNER JOIN productos p ON p.id = cp.producto_id
        INNER JOIN compras c ON c.id = cp.compra_id
        WHERE c.id = ?", array($id));

        $pdf = \PDF::loadView('reportes.reportecompra', compact('datos'), compact('detalle'));//retorna la vista de factura de compras con los datos recogidos en el join
        return $pdf->download('report.pdf');//lo guar en un archivo .pdf
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
