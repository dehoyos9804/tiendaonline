<?php

namespace App\Http\Controllers;

//importamos los modelos que vamos a usar en este controlador
use App\Models\Persona;
use App\Models\Proveedor;
use App\Models\Seccion;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Venta;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\TipoUsuario;
use Illuminate\Http\Request;//Request funciona para recibir los datos del formulario
use Illuminate\Support\Facades\Auth;//este se usa para autenticar los usuarios

use Barryvdh\DomPDF\Facade as PDF;//Facade para usar los pdf usamos
use Illuminate\Support\Facades\Hash;//Hash es el cifrado de este proyecto
use Carbon\Carbon;//Carbon es una libreria para traer las fechas

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {   

    }

    public function index()
    {
        
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
    //objeto autenticado en memoria cache
    public function myShare($id){
        $user = Persona::where('user_id', $id)->first();
        \View::share('user_auth', $user);
    }
    //trae la lista de los proveedores
    public function listaproveedores()
    {
        $this->myShare(Auth::id());//guardo el objeto de usuario en memoria
        $proveedores = Proveedor::all();  //obtiene todos los proveedores de la base de datos
        return view('admin.proveedor.listaproveedores', ['proveedores' => $proveedores]);//Retorna la vista de listaproveedores con los datos de los proveedores de la BD
    }
    //funcion para borrar proveedores
    public function deleteproveedor($id)
    { 
      $proveedores = Proveedor::find($id);  //captura el id del proveedor que queremos borrar
      $proveedores->delete();//envia a eliminar dicho proveedor
      return redirect()->route('admin.proveedor.listaproveedores');//Retorna la vista de listaproveedores con los datos de los proveedores de la BD
    }
    //trae la vista para crear un proveedor
    public function createproveedor()
    {
        $this->myShare(Auth::id());//recibe la autenticacion
        return view('admin.proveedor.createproveedor');//Retorna la vista de crear proveedor
    }
    //funcion para guardar un proveedor en la BD
    public function storeproveedor(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear proveedor
        $proveedor = new Proveedor;//llama al modelo proveedor
        $proveedor->nit = $request->input('nit');                   //
        $proveedor->razonsocial = $request->input('razonsocial');   //recibe los datos
        $proveedor->telefono = $request->input('telefono');         //diligenciados en el
        $proveedor->direccion = $request->input('direccion');       //formulario
        $proveedor->save();//guarda los datos
            
        return redirect()->route('admin.proveedor.listaproveedores');//Retorna la vista de la lista de proveedores
        
    }
    //trae la vista de editar los proveedores
    public function editproveedor($id)
    {
      $this->myShare(Auth::id());//autentica el usuario
      $proveedor = Proveedor::find($id);//captura el id del proveedor que deseamos editar
      return view('admin.proveedor.editproveedor')->with(['proveedor'=>$proveedor]);//Retorna la vista de listaproveedores con los datos de los proveedores de la BD
    }

    //funcion para guardar los datos editados del proveedor en la vista editar 
    public function updateproveedor(Request $request, $id)
    {
        $proveedor = Proveedor::find($id); //recibe los datos del proveedor que enviamos a editar
        $datos = array();//array de datos
        
        $datos['nit']=$request->input('nit');                       //
        $datos['razonsocial']=$request->input('razonsocial');       //recibe los         
        $datos['telefono']=$request->input('telefono');             //datos que esten
        $datos['direccion']=$request->input('direccion');           //en el formulario
          
        $proveedor->update($datos); //actualiza los datos
        return redirect()->route('admin.proveedor.listaproveedores');//redirige a la vista lista de proveedores
    }
    //trae la vista de la lista de secciones
    public function listasecciones()
    {
        $this->myShare(Auth::id());//autentica al usuario
        $secciones = Seccion::all();  //obtiene todas los secciones de la base de datos
        return view('admin.seccion.listasecciones',['secciones' => $secciones]);//Retorna la vista de listasecciones con los datos de las secciones de la BD
    }
    //funcion para borrar los datos de una seccion
    public function deleteseccion($id)
    {
      $secciones = Seccion::find($id);  //captura el id de la seccion
      $secciones->delete();//envia a eliminar dicha seccion
      return redirect()->route('admin.seccion.listasecciones');//Retorna la vista de listasecciones con los datos de las secciones de la BD
    }
    //trae la vista de crear una seccion
    public function createseccion()
    {
        $this->myShare(Auth::id());//autentica el usuario
        return view('admin.seccion.createseccion');//retorna la vista de crear seccion
    }
    //funcion para guardar una nueva seccion
    public function storeseccion(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear seccion
        $seccion = new Seccion;//llama al modelo seccion
        $seccion->nombre = $request->input('nombre');          //recibe los datos
        $seccion->descripcion = $request->input('descripcion');//del formulario
        $seccion->save();//guarda los datos
            
        return redirect()->route('admin.seccion.listasecciones');//redirige a la vista lista de secciones
    }
    //trae la vista de editar seccion
    public function editseccion($id)
    {
        $this->myShare(Auth::id());//autentica el usuario
        $seccion = Seccion::find($id);//captura el id de la seccion que se quiere editar
        return view('admin.seccion.editseccion')->with(['seccion'=>$seccion]);//Retorna la vista de lista de secciones con los datos de las secciones de la BD
    }

    //funcion para guardar los nuevos datos de las secciones en la vista editar 
    public function updateseccion(Request $request, $id)
    {
        $this->myShare(Auth::id());//autentica el usuario

        $seccion = Seccion::find($id); //recibe el id de la seccion que se desea editar
        $datos = array();//array de datos
        $datos['nombre']=$request->input('nombre');             //recibe los datos del
        $datos['descripcion']=$request->input('descripcion');   //formulario
        $seccion->update($datos); //envia a actualizar
        return redirect()->route('admin.seccion.listasecciones');//redirige a la vista lista secciones
    }
    //trae la vista de lista de clientes
    public function listaclientes()
    {
        $this->myShare(Auth::id());//autentica el usuario
        $clientes = Cliente::all();  //obtiene todos los clientes de la base de datos
        return view('admin.cliente.listaclientes', ['clientes' => $clientes]);//Retorna la vista de lista clientes con los datos de los clientes de la BD
    }
    //funcion para borrar clientes
    public function deletecliente($id)
    { 
      $clientes = Cliente::find($id);  //captura el id del cliente
      $clientes->delete();//envia a eliminar dicho cliente
      return redirect()->route('admin.cliente.listaclientes');//redirige a la vista de lista de clientes
    }
    //trae la vista de crear clientes
    public function createcliente()
    {
        $this->myShare(Auth::id());//autentica el usuario
        return view('admin.cliente.createcliente');//redirige a la vista de crear cliente
    }
    //funcion para guardar un cliente
    public function storecliente(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear cliente
        $cliente = new Cliente;//llama al modelo cliente
        $cliente->identificacion = $request->input('identificacion'); //recibe los
        $cliente->nombre = $request->input('nombre');                 //datos
        $cliente->apellido = $request->input('apellido');             //diligenciados
        $cliente->telefono = $request->input('telefono');             //en el formulario
        $cliente->direccion = $request->input('direccion');           //
        $cliente->save();//guarda los datos
            
        return redirect()->route('admin.cliente.listaclientes');//redirige a la vista lista de clientes
    }
    //trae la vist de editar clientes
    public function editcliente($id)
    {
        $this->myShare(Auth::id());//autentica
        $cliente = Cliente::find($id);//llama al usuario respecto a su id
        return view('admin.cliente.editcliente')->with(['cliente'=>$cliente]);//Retorna la vista de listaclientes con los datos de los clientes de la BD
    }
    //funcion para guardar los nuevos datos del cliente en la vista editar 
    public function updatecliente(Request $request, $id)
    {
        $cliente = Cliente::find($id); //recibe los datos del formulario
        $datos = array();//array de datos
        
        $datos['identificacion']=$request->input('identificacion'); //
        $datos['nombre']=$request->input('nombre');                 //
        $datos['apellido']=$request->input('apellido');             //captura los 
        $datos['telefono']=$request->input('telefono');             //datos que esten
        $datos['direccion']=$request->input('direccion');           //en el formulario
        $cliente->update($datos); //envia a actualizar
        return redirect()->route('admin.cliente.listaclientes');//redirige a la vista lista clientes
    }
    //trae la vista de la lista de personas
//IMPORTANTE-->posdata: la tabla persona guarda los adminisradores y vendedores<---IMPORTANTE
    public function listapersonas()
    {
        $this->myShare(Auth::id());//autentica el usuario
        $personas = Persona::all();  //obtiene todos los datos de la base de datos
        return view('admin.persona.listapersonas', ['personas' => $personas]);//Retorna la vista de lista persona con los datos de las personas de la BD
    }
    //funcion para borrar una persona
    public function deletepersona($id)
    {
        $personas = Persona::find($id);  //captura el id de la persona
        $personas->delete();//envia a eliminar dicha persona
        return redirect()->route('admin.persona.listapersonas');//redirige a la vista de lista de personas
    }
    //trae la vista de crear persona
    public function createpersona()
    {
        $this->myShare(Auth::id());//autentica el usuario
        $vartipousuario = TipoUsuario::all();  //captura el id del tipo de usuario
        return view('admin.persona.createpersona')->with('vartipousuario',$vartipousuario);//Retorna la vista de lista de persona con los datos de las personas de la BD y los datos del tipo de usuario
    }
    //guarda los datos de las personas
    public function storepersona(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear persona
        $user = new User;//llama al modelo
        $user->name = $request->input('nombre');    //recibe los datos diligenciados
        $user->email = $request->input('email');    //en el formulario
        $user->password = Hash::make($request->input('password')); //hash es el cifrado
        $user->save();//guarda un nuevo user

        $coduser= User::all()->last();//recibe los datos que se acaban de crear y los almacena en la variable
            
        $persona = new Persona;//llama al modelo persona
        $persona->nombre = $request->input('nombre');       //
        $persona->apellido = $request->input('apellido');   //recibe los datos diligenciados
        $persona->telefono = $request->input('telefono');   //en el formulario
        $persona->direccion = $request->input('direccion'); //
        $persona->tipousuario_id = $request->input('tipousuario_id');
        $persona->user_id = $coduser->id;//captura el id del ultimo user que se registró
        $persona->save();//guarda los datos

        return redirect()->route('admin.persona.listapersonas');//redirige a la vista lista de persona
    }

    public function editpersona($id)
    {
        $this->myShare(Auth::id());//autentica el usuario
        $persona = Persona::find($id); //captura el id de la persona que se va a editar
        $vartipousuario = TipoUsuario::all(); //llamamos al tipo de usaurio
        return view('admin.persona.editpersona')->with(['persona'=>$persona])->with('vartipousuario',$vartipousuario);//retorna la vista de editar personas, con los datos de la persona respecto a su id y los tipos de usuario
    }

    //funcion para guardar los nuevos datos de la persona en la vista editar 
    public function updatepersona(Request $request, $id)
    {
        $persona = Persona::find($id);//llama a los datos de la persona respecto a su id
        $datos = array();//array de datos
        $datos['nombre']=$request->input('nombre');                 //
        $datos['apellido']=$request->input('apellido');             //captura los 
        $datos['telefono']=$request->input('telefono');             //datos que esten
        $datos['direccion']=$request->input('direccion');           //en el formulario
        $datos['tipousuario_id']=$request->input('tipousuario');    //
        $datos['user_id']=$request->input('user_id');

        $persona->update($datos); //envia a actualizar
        return redirect()->route('admin.persona.listapersonas');//redirige a la vista lista personas
    }
    //trae a la vista de la lista de productos
    public function listaproductos()
    {
        $this->myShare(Auth::id());     //autentica al usuario
        $productos = Producto::all();  //obtiene todos los productos de la base de datos
        return view('admin.producto.listaproductos', ['productos' => $productos]);//redirige a la vista de lista de productos con los datos de todos los productos
    }
    //funcion para borrar un producto
    public function deleteproducto($id)
    { 
      $producto = Producto::find($id);  //captura el id del producto
      $producto->delete();//envia a eliminar dicho producto
      return redirect()->route('admin.producto.listaproductos');//redirige a la vista de lista de productos
    }
    //trae a la vista de crear productos
    public function createproducto()
    {
        $this->myShare(Auth::id());//autentica al usuario
        $varseccion = Seccion::all();  //captura todos los datos de las secciones
        return view('admin.producto.createproducto')->with('varseccion',$varseccion);//retorna la vista de crear un producto con los datos de las secciones
    }
    //funcion para guardar los productos
    public function storeproducto(Request $request)
    {
        $datos=$request->all();//recibe los datos que diligencias en la vista crear productos
        if($request->hasFile('img')){//recibe la imagen del producto
            $datos['img']=$request->file('img')->store('uploads','public');//guarda la imagen en storage/app/public/uploads
        }
        $producto = new Producto;//llama al modelo producto
        $producto->img = $datos['img'];                             //captura
        $producto->nombre = $request->input('nombre');              //los
        $producto->marca = $request->input('marca');                //datos
        $producto->preciocompra = $request->input('preciocompra');  //diligenciados
        $producto->cantidad = 0; //se envia 0 por defecto           //en el
        $producto->precioventa = $request->input('precioventa');    //formulario
        $producto->estado = $request->input('estado');              //crear
        $producto->seccion_id = $request->input('secciones_id');    //producto
        //return response()->json($producto);
        // return response()->json($datos['img']);
        
        $producto->save();//guarda los datos
        return redirect()->route('admin.producto.listaproductos');//redirige a la vista lista de productos
    }
    //trae a la vista de editar producto
    public function editproducto($id)
    {
        $this->myShare(Auth::id());//autentica al usuario
        $producto = Producto::find($id);//captura el id del producto
        $varseccion = Seccion::all(); //captura el modelo de seccion
        return view('admin.producto.editproducto')->with(['producto'=>$producto,'varseccion'=>$varseccion]);//retorna la vista de editar producto con los datos del producto a editar y los datos de las secciones
    }
    //funcion para guardar los nuevos datos del producto en la vista editar 
    public function updateproducto(Request $request, $id)
    {
        $producto = Producto::find($id);//recibe el id del producto
        $datos = array();//array de datos
        $datos['nombre']=$request->input('nombre');                 //
        $datos['marca']=$request->input('marca');                   //captura los 
        $datos['preciocompra']=$request->input('preciocompra');    //datos que esten 
        $datos['precioventa']=$request->input('precioventa');       //diligenciados
        $datos['estado']=$request->input('estado');                 //en el formulario
        $datos['seccion_id']=$request->input('seccion_');            //
        
        $producto->update($datos); //envia a actualizar
        return redirect()->route('admin.producto.listaproductos');//redirige a la vista lista de productos
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
