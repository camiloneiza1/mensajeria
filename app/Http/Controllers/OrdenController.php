<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mensajero;
use App\Models\Orden;
use App\Models\RangoTarifa;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Orden::query()->with(['mensajero', 'cliente'])->paginate(9);

        return view('orden.ordenIndex', ['ordenes' => $ordenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::select('id', 'nombre')->pluck('nombre', 'id');

        return view('orden.ordenCreate', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orden = Orden::create($request->all());

        return redirect()->route('orden.index')->with('success', 'Se creo exitosamente la Orden de envio!');
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
        $clientes = Cliente::select('id', 'nombre')->pluck('nombre', 'id');

        $mensajeros = Mensajero::select('id', 'nombre')->pluck('nombre', 'id');

        $orden = Orden::find($id);

        return view('orden.ordenEdit', [
            'clientes' => $clientes,
            'mensajeros' => $mensajeros,
            'orden' => $orden
        ]);
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
        $orden = Orden::find($id);
        $orden->update($request->all());

        return redirect()->route('orden.index')->with('success', 'Se modifico correctamente la orden No. ' . $id);
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

    public function validar(Request $request)
    {
        //
    }

    public function calculaCosto(Request $request)
    {
        $tarifa = RangoTarifa::where('km_ini', '<', $request->km)
            ->where('km_fin', '>=', $request->km)
            ->get()->toArray();
        
        return response()->json($tarifa);
    }
}
