<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productos']=Producto::paginate(8);
            return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
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
        $campos=[
         'Nombre' => 'required|string|max:100',
        'Descripcion' => 'required|string|max:100',      
        'Stock' => 'required|integer',
        'Precio' => 'required|numeric',
        'Fecha_V' => 'required|date',
        'Proveedor_id' => 'required|integer',      
        'Foto' => 'required|max:10000|mimes:jpeg,png,jpg,webp',
        
        
        ];
        $mensaje=[
        'required'=>'El :attribute es requerido',
        'Foto.required' =>'La foto es requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        
                //introducir los datos a la basede datos
                //$datosProducto = request()->all();
                $datosProducto = request()->except('_token');
        //carpeta para subir archivos storage
                if ($request->hasFile('Foto')) {
                    $datosProducto['Foto']=$request->file('Foto')->store('uploads','public');
                }
                Producto::insert($datosProducto);
                //return response()->json($datosProducto);
                return redirect('producto')->with('mensaje', 'Producto Agregado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto=Producto::findOrfail($id);
return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:100',      
            'Stock' => 'required|integer',
            'Precio' => 'required|numeric',
            'Fecha_V' => 'required|date',
             'Proveedor_id' => 'required|integer',      
        
        
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            ];
            if ($request->hasFile('Foto')) {
                $campos=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg,webp',];
                $mensaje=['Foto.required' =>'La foto es requerida'];
    
            }
            $this->validate($request, $campos, $mensaje);

            $datosProducto = request()->except(['_token','_method']);
        // esta parte es la de la imagen
        if ($request->hasFile('Foto')) {
            $producto=Producto::findOrfail($id);
            Storage::delete('public/'.$producto->Foto);
            $datosProducto['Foto']=$request->file('Foto')->store('uploads','public');
        }
        //comparo los id
        Producto::where('id', '=',$id)->update($datosProducto);
//buelve a buscar la informacion de acuerdo al id 
         $producto=Producto::findOrfail($id);
         //retorna al mismo formulario pero ya actualizado
//return view('empleado.edit', compact('empleado'));
return redirect('producto')->with('mensaje','Producto Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto=Producto::findOrfail($id);
        //codigo si se tiene imagenes en el registro foto es el nombre de la base de datos
        if (Storage::delete('public/'.$producto->Foto)) {
            Producto::destroy($id);
        }
       
        return redirect('producto')->with('mensaje','Producto Eliminado');
    }
}