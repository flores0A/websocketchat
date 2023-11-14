<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ClienteController extends Controller
{
    public function index()
    {
        //
        $datos['clientes']=Cliente::paginate(8);
            return view('cliente.index', $datos);
    }

    public function create()
    {
      
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $campos = [
        'Nombre' => 'required|string|max:100',
        'Apellido' => 'required|string|max:100',
        'Telefono' => 'required|string|max:100',
        'Direccion' => 'required|string|max:100',
        'Sexo' => 'required|string|max:100',
    ];

    $mensaje = [
        'required' => 'El :attribute es requerido',
    ];

    $this->validate($request, $campos, $mensaje);

    $datosCliente = $request->except('_token');

    Cliente::insert($datosCliente);

    return redirect('cliente')->with('mensaje', 'Cliente Agregado');
}
    public function show(Cliente $cliente)
    {
        //
    }

    public function edit($id)
    {
        //
        $cliente=Cliente::findOrfail($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        //
        $campos=[
    'Nombre' => 'required|string|max:100',
        'Apellido' => 'required|string|max:100',
        'Telefono' => 'required|string|max:100',
        'Direccion' => 'required|string|max:100',
        'Sexo' => 'required|string|max:100',
];
$mensaje = [
        'required' => 'El :attribute es requerido',
    ];
    $this->validate($request, $campos, $mensaje);
    $datosCliente = $request->except(['_token', '_method']);

    // Actualización de los campos sin la foto
    Cliente::where('id', '=', $id)->update($datosCliente);
    return redirect('cliente')->with('mensaje', 'Cliente Modificado');
}
    public function destroy( $id)
    {
          $cliente = Cliente::findOrFail($id);
    Cliente::destroy($id);
    return redirect('cliente')->with('mensaje', 'Cliente Eliminado');
}
}