<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Proveedor;
use App\Models\Seccion;
use App\Models\Cliente;
use App\Models\User;
use Image;
use App\Models\Producto;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function report()
    {
        return view('report');
    }

    public function imprimir(){
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('report');
        return $pdf->download('report.pdf');
    }

    

    public function listaproveedores()
    {
        $proveedores = Proveedor::all();  //obtiene todos los usuarios de la base de datos
        return view('admin.proveedor.listaproveedores', ['proveedores' => $proveedores]);//
    }

    public function deleteproveedor($id)
    { 
      $proveedores = Proveedor::find($id);  //captura el id del usuario
      $proveedores->delete();//envia a eliminar dicho usuario
      return redirect()->route('admin.proveedor.listaproveedores');
    }

    public function createproveedor()
    {
        return view('admin.proveedor.createproveedor');
    }

    public function storeproveedor(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear usuarios
        $proveedor = new Proveedor;//llama al modelo usuario
            $proveedor->nit = $request->input('nit'); 
            $proveedor->razonsocial = $request->input('razonsocial');
            $proveedor->telefono = $request->input('telefono');
            $proveedor->direccion = $request->input('direccion');
            $proveedor->save();//guarda los datos
            
            return redirect()->route('admin.proveedor.listaproveedores');//redirige a la vista lista 
        
    }

    public function editproveedor($id)
    {
      $proveedor = Proveedor::find($id);  
      return view('admin.proveedor.editproveedor')->with(['proveedor'=>$proveedor]);
    }

    //funcion para guardar los nuevos datos del usuario en la vista editar 
    public function updateproveedor(Request $request, $id)
    {
        $proveedor = Proveedor::find($id); //recibe los datos
        $datos = array();//array de datos
        
          $datos['nit']=$request->input('nit'); //
          $datos['razonsocial']=$request->input('razonsocial');                 
          $datos['telefono']=$request->input('telefono');             //datos que esten
          $datos['direccion']=$request->input('direccion');           //en el formulario
          
          $proveedor->update($datos); //envia a actualizar
        return redirect()->route('admin.proveedor.listaproveedores');//redirige a la vista lista usuarios
    }

    public function listasecciones()
    {
        $secciones = Seccion::all();  //obtiene todos los usuarios de la base de datos
        return view('admin.seccion.listasecciones', ['secciones' => $secciones]);//
    }

    public function deleteseccion($id)
    { 
      $secciones = Seccion::find($id);  //captura el id del usuario
      $secciones->delete();//envia a eliminar dicho usuario
      return redirect()->route('admin.seccion.listasecciones');
    }

    public function createseccion()
    {
        return view('admin.seccion.createseccion');
    }

    public function storeseccion(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear usuarios
        $seccion = new Seccion;//llama al modelo usuario
            $seccion->nombre = $request->input('nombre');
            $seccion->descripcion = $request->input('descripcion');
            $seccion->save();//guarda los datos
            
            return redirect()->route('admin.seccion.listasecciones');//redirige a la vista lista 
        
    }

    public function editseccion($id)
    {
      $seccion = Seccion::find($id);  
      return view('admin.seccion.editseccion')->with(['seccion'=>$seccion]);
    }

    //funcion para guardar los nuevos datos del usuario en la vista editar 
    public function updateseccion(Request $request, $id)
    {
        $seccion = Seccion::find($id); //recibe los datos
        $datos = array();//array de datos
        
          $datos['nombre']=$request->input('nombre'); //
          $datos['descripcion']=$request->input('descripcion');                 
          
          $seccion->update($datos); //envia a actualizar
        return redirect()->route('admin.seccion.listasecciones');//redirige a la vista lista usuarios
    }

    public function listaclientes()
    {
        $clientes = Cliente::all();  //obtiene todos los usuarios de la base de datos
        return view('admin.cliente.listaclientes', ['clientes' => $clientes]);//
    }

    public function deletecliente($id)
    { 
      $clientes = Cliente::find($id);  //captura el id del usuario
      $clientes->delete();//envia a eliminar dicho usuario
      return redirect()->route('admin.cliente.listaclientes');
    }

    public function createcliente()
    {
        return view('admin.cliente.createcliente');
    }

    public function storecliente(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear usuarios
        $cliente = new Cliente;//llama al modelo usuario
        $cliente->identificacion = $request->input('identificacion'); 
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->save();//guarda los datos
            
        return redirect()->route('admin.cliente.listaclientes');//redirige a la vista lista 
        
    }

    public function editcliente($id)
    {
      $cliente = Cliente::find($id);  
      return view('admin.cliente.editcliente')->with(['cliente'=>$cliente]);
    }

    //funcion para guardar los nuevos datos del usuario en la vista editar 
    public function updatecliente(Request $request, $id)
    {
        $cliente = Cliente::find($id); //recibe los datos
        $datos = array();//array de datos
        
        $datos['identificacion']=$request->input('identificacion'); //
        $datos['nombre']=$request->input('nombre');                 //
        $datos['apellido']=$request->input('apellido');             //captura los 
        $datos['telefono']=$request->input('telefono');             //datos que esten
        $datos['direccion']=$request->input('direccion');           //en el formulario
        
        $cliente->update($datos); //envia a actualizar
        return redirect()->route('admin.cliente.listaclientes');//redirige a la vista lista usuarios
    }

    public function listapersonas()
    {
        $personas = Persona::all();  //obtiene todos los usuarios de la base de datos
        return view('admin.persona.listapersonas', ['personas' => $personas]);//
    }

    public function deletepersona($id)
    { 
      $personas = Persona::find($id);  //captura el id del usuario
      $personas->delete();//envia a eliminar dicho usuario
      return redirect()->route('admin.persona.listapersonas');
    }

    public function createpersona()
    {
        $vartipousuario = TipoUsuario::all();  //captura el id del usuario
        return view('admin.persona.createpersona')->with('vartipousuario',$vartipousuario);
    }

    public function storepersona(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear usuarios
        
        $user = new User;
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        $coduser= User::all()->last();//recibe los datos que se acaban de crear y crea una nueva cuenta para ese usuario
            
        $persona = new Persona;//llama al modelo usuario
        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->telefono = $request->input('telefono');
        $persona->direccion = $request->input('direccion');
        $persona->tipousuario_id = $request->input('tipousuario_id');
        $persona->users_id = $coduser->id;
        $persona->save();//guarda los datos

        return redirect()->route('admin.persona.listapersonas');//redirige a la vista lista    
    }

    public function editpersona($id)
    {
      $persona = Persona::find($id); 
      $vartipousuario = TipoUsuario::all(); 
      return view('admin.persona.editpersona')->with(['persona'=>$persona])->with('vartipousuario',$vartipousuario);;
    }

    //funcion para guardar los nuevos datos del usuario en la vista editar 
    public function updatepersona(Request $request, $id)
    {
        $persona = Persona::find($id);
        $datos = array();//array de datos
        $datos['nombre']=$request->input('nombre');                 //
        $datos['apellido']=$request->input('apellido');             //captura los 
        $datos['telefono']=$request->input('telefono');             //datos que esten
        $datos['direccion']=$request->input('direccion');           //en el formulario
        $datos['tipousuario_id']=$request->input('tipousuario_id');
        $datos['user_id']=$request->input('user_id');

        $persona->update($datos); //envia a actualizar
        return redirect()->route('admin.persona.listapersonas');//redirige a la vista lista usuarios
    }

    public function listaproductos()
    {
        $productos = Producto::all();  //obtiene todos los usuarios de la base de datos
        return view('admin.producto.listaproductos', ['productos' => $productos]);//
    }

    public function deleteproducto($id)
    { 
      $producto = Producto::find($id);  //captura el id del usuario
      $producto->delete();//envia a eliminar dicho usuario
      return redirect()->route('admin.producto.listaproductos');
    }

    public function createproducto()
    {
        $varseccion = Seccion::all();  //captura el id del usuario
        return view('admin.producto.createproducto')->with('varseccion',$varseccion);
    }

    public function storeproducto(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear usuarios
        
        if($request->hasFile('img')){
            $datos['img']=$request->file('img')->store('uploads','public');
        }
        $producto = new Producto;//llama al modelo usuario
        $producto->img = $datos['img'];
        $producto->nombre = $request->input('nombre');
        $producto->marca = $request->input('marca');
        $producto->preciocompra = $request->input('preciocompra');
        $producto->cantidad = $request->input('cantidad');
        $producto->precioventa = $request->input('precioventa');
        $producto->estado = $request->input('estado');
        $producto->secciones_id = $request->input('secciones_id');
        
        //return response()->json($producto);
        // return response()->json($datos['img']);
        
        $producto->save();//guarda los datos
        return redirect()->route('admin.producto.listaproductos');//redirige a la vista lista    
    }

    public function editproducto($id)
    {
      $producto = Producto::find($id); 
      $varseccion = Seccion::all(); 
      return view('admin.producto.editproducto')->with(['producto'=>$producto])->with('varseccion',$varseccion);;
    }

    //funcion para guardar los nuevos datos del usuario en la vista editar 
    public function updateproducto(Request $request, $id)
    {
        $producto = Producto::find($id);
        $datos = array();//array de datos
        $datos['nombre']=$request->input('nombre');                 //
        $datos['marca']=$request->input('marca');             //captura los 
        $datos['preciocompra']=$request->input('preciocompra');             //datos que esten
        $datos['cantidad']=$request->input('cantidad'); 
        $datos['precioventa']=$request->input('precioventa');
        $datos['estado']=$request->input('estado');          //en el formulario
        $datos['secciones_id']=$request->input('secciones_id');
        
        $producto->update($datos); //envia a actualizar
        return redirect()->route('admin.producto.listaproductos');//redirige a la vista lista usuarios
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
