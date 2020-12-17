<?php

namespace App\Http\Controllers;

use App\Models\Mensajero;
use Illuminate\Http\Request;

class MensajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mensajeros = Mensajero::query()->paginate(8);

        return view('mensajero.mensajeroIndex', ['mensajeros' => $mensajeros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mensajero.mensajeroCreate');
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

        Mensajero::create($request->all());

        return redirect()->route('mensajero.index')->with('success', 'Se creo correctamente el Mensajero');
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
        $mensajero = Mensajero::find($id);

        return view('mensajero.mensajeroEdit', [
            'mensajero' => $mensajero
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
        $this->validar($request);

        $mensajero = Mensajero::find($id);
        $mensajero->update($request->all());

        return redirect(route('mensajero.index'))->with('success', 'Se actualizo correctamente el Mensajero: '.$mensajero->nombre. ' '.$mensajero->apellido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensajero = Mensajero::find($id);
        $mensajero->delete();

        return response()->json(['message' => 'Se elimino con exito.']);
    }

    public function validar(Request $request)
    {
        $valid = $request->validate([
            'documento_id' => 'required|min:5',
            'nombre' => 'required',
            'nombre' => 'required',
            'email' => 'required|email',
            'fecha_nacimiento' => 'date'
        ]);

        return $valid;
    }
}
