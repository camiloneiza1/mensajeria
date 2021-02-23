<?php

namespace App\Http\Controllers;

use App\Models\Mensajero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        return response()->json($mensajeros);

        //return view('mensajero.mensajeroIndex', ['mensajeros' => $mensajeros]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $this->validar($request);
        if (!$valid->fails()) {
            Mensajero::create($request->all());

            return response()->json(["mensaje" => "Se creo con exito el mensajero"]);
        } else {
            return response()->json(['message' => "Error de validacion", "errors" => $valid->messages()], 400);
        }
        //return redirect()->route('mensajero.index')->with('success', 'Se creo correctamente el Mensajero');
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

        return response()->json($mensajero);

        /* return view('mensajero.mensajeroEdit', [
            'mensajero' => $mensajero
        ]); */
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
        $valid = $this->validar($request);
        if (!$valid->fails()) {

            $mensajero = Mensajero::find($id);
            $mensajero->update($request->all());

            return response()->json(["mensaje" => "Se actualizo con exito el mensajero...!"]);
        } else {
            return response()->json(['message' => "Error de validacion", "errors" => $valid->messages()], 400);
        }
        //return redirect(route('mensajero.index'))->with('success', 'Se actualizo correctamente el Mensajero: '.$mensajero->nombre. ' '.$mensajero->apellido);
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
        $valid = Validator::make($request->all(), [
            'documento_id' => 'required|min:5',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'fecha_nacimiento' => 'date'
        ]);

        return $valid;
    }
}
