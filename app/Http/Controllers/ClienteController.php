<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::query()->paginate(9);

        return view('cliente.clienteIndex', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.clienteCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validar($request);

        Cliente::create($request->all());

        return redirect()->route('cliente.index')->with('success', 'Se creo el cliente exitosamente!');
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
        $cliente = Cliente::find($id);

        return view('cliente.clienteEdit', ['cliente' => $cliente]);
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
        $this->validar($request);

        $cliente = Cliente::find($id);

        $cliente->update($request->all());

        return redirect()->route('cliente.index')->with('success', 'Se actualizo con exito el cliente: ' . $cliente->nombre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        $cliente->delete();

        return response()->json(['message' => 'Se elimino con exito el cliente: ' . $id]);
    }

    public function validar(Request $request)
    {
        $valid = $request->validate([
            'documento_id' => 'required|min:5',
            'nombre' => 'required',
            'tipo_doc' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|min:7'
        ]);

        return $valid;
    }
}
