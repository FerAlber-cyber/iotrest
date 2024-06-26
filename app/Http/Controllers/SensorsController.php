<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;


class SensorsController extends Controller
{
    public function index()
    {
        // Obtener todos los sensores
        return response()->json(Sensor::all());
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $this->validate($request, [
            'type' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        // Crear un nuevo sensor
        $sensor = Sensor::create($request->all());

        // Devolver la respuesta con el sensor creado
        return response()->json($sensor, 201);
    }

    public function show($id)
    {
        // Encontrar el sensor por su ID
        $sensor = Sensor::findOrFail($id);

        // Devolver la respuesta con el sensor encontrado
        return response()->json($sensor);
    }

    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $this->validate($request, [
            'type' => 'string|max:255',
            'value' => 'numeric',
        ]);

        // Encontrar el sensor por su ID
        $sensor = Sensor::findOrFail($id);

        // Actualizar el sensor con los datos proporcionados
        $sensor->update($request->all());

        // Devolver la respuesta con el sensor actualizado
        return response()->json($sensor);
    }

    public function destroy($id)
    {
        // Eliminar el sensor por su ID
        Sensor::destroy($id);

        // Devolver una respuesta de éxito
        return response()->json(['message' => 'Sensor deleted successfully']);
    }
}
/*class SensorsController extends Controller
{
    //consultar todos
    public function index(){
        return Sensor::paginate();
    }

//consultar un usuario
    public function show($id){
        return Sensor::find($id);
    }

//crear un sensor
    public function store(Request $request){
        $this->validate($request, [
            //'name' => 'required|unique:sensors',
            'type' => 'required',
            'value' => 'required',
            //'date' => 'required',
           // 'user_id' => 'required',
        ]);
        $sensor = new Sensor;
        $sensor->fill($request->all());
        $sensor->user_id = 1;
        $sensor->date = date('Y-m-d H:i:s');
        $sensor->save();
        //$sensor = Sensor::create($request->all());
        return $sensor;
    }

    //actualizar un usuario
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'filled|unique:sensors',
        ]);
        $sensor = Sensor::find($id);
        if(!$sensor)return response('', 404);
        $sensor->update($request->all());
        $sensor->save();
        return $sensor;
    }

     //borrar un usuario
     public function destroy($id){
        $sensor = Sensor::find($id);
        if(!$sensor)return response('', 404);
        $sensor->delete();
        return $sensor;
    }
}*/
