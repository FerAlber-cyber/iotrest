<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actuator;


class ActuatorsController extends Controller
{
    public function index()
    {
        // Obtener todos los actuadores
        return response()->json(Actuator::all());
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $this->validate($request, [
            'value' => 'required|numeric', // Cambié de integer a numeric para que coincida con la definición decimal en la migración
        ]);

        // Crear un nuevo actuador
        $actuator = Actuator::create($request->all());

        // Devolver la respuesta con el actuador creado
        return response()->json($actuator, 201);
    }

    public function show($id)
    {
        // Encontrar el actuador por su ID
        $actuator = Actuator::findOrFail($id);

        // Devolver la respuesta con el actuador encontrado
        return response()->json($actuator);
    }

    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $this->validate($request, [
            'value' => 'numeric', // Cambié de integer a numeric para que coincida con la definición decimal en la migración
        ]);

        // Encontrar el actuador por su ID
        $actuator = Actuator::findOrFail($id);

        // Actualizar el actuador con los datos proporcionados
        $actuator->update($request->all());

        // Devolver la respuesta con el actuador actualizado
        return response()->json($actuator);
    }

    public function destroy($id)
    {
        // Eliminar el actuador por su ID
        Actuator::destroy($id);

        // Devolver una respuesta de éxito
        return response()->json(['message' => 'Actuator deleted successfully']);
    }
}
/*class ActuatorsController extends Controller
{
    //consultar todos
    public function index(){
        return Actuator::paginate();
    }

//consultar un usuario
    public function show($id){
        return Actuator::find($id);
    }

//crear un actuadores
    public function store(Request $request){
        $this->validate($request, [
            //'name' => 'required|unique:sensors',
            //'type' => 'required',
            'value' => 'required'
            //'date' => 'required',
            //'user_id' => 'required',
        ]);
        $actuator = new Actuator;
        $actuator->fill($request->all());
        //$actuator->user_id = 1;
        //$actuator->date = date('Y-m-d H:i:s');
        $actuator->save();
        return $actuator;
    }

    //actualizar un actuador
    public function update(Request $request, $id){
        $this->validate($request, [
            'value' => 'filled|unique:actuators',
        ]);
        $actuator = Actuator::find($id);
        if(!$actuator)return response('', 404);
        $actuator->update($request->all());
        $actuator->save();
        return $actuator;
    }

     //borrar un actuador
     public function destroy($id){
        $actuator = Actuator::find($id);
        if(!$actuator)return response('', 404);
        $actuator->delete();
        return $actuator;
    }
}*/
