<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cuadro;
use Illuminate\Http\Request;
use App\Http\Resources\V1\CuadroResource;
use Illuminate\Support\Facades\Validator;

class CuadroController extends Controller
{
    public $filters, $fields;

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $query = '';

        $this->filters = $request->filters;
        $this->fields  = $request->fields;

        if( !empty( $this->filters ) ){

            foreach ($this->filters as $key => $value) {

                $key = str_replace("'", '' , $key);

                if($query == ''){

                    $query = Cuadro::where($key ,'like' , $value .'%');

                }else{

                    $query = $query->where($key ,'like' , $value .'%');

                }
            
            }
        }

        if(!empty( $this->fields )) {

            $fields = explode(',',$this->fields);
            

            if($query){

                $query = $query->get($fields);
    
            }else{
    
                $query = Cuadro::get($fields);
    
            }
        }else if($query){

            $query = $query->get();
            
        }else{

            $query = Cuadro::get();

        }

        return CuadroResource::collection($query);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'max:70',
            'painter' => 'max:70',
            'country' => 'max:3',
            'description' => 'max:2000',
        ])->validate();

        $cuadro = new Cuadro;

        if (!empty($request->input('name'))) {

            $cuadro->name = $request->input('name');

        }

        if (!empty($request->input('painter'))) {

            $cuadro->painter = $request->input('painter');

        }

        if (!empty($request->input('country'))) {

            $cuadro->country = $request->input('country');

        }

        if (!empty($request->input('description'))) {

            $cuadro->description = $request->input('description');

        }

        $res = $cuadro->save();

        if ($res) {
            return response()->json(['message' => 'Creado exitosamente']);
        }

        return response()->json(['message' => 'Error al crear el recurso'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuadro  $cuadro
     * @return \Illuminate\Http\Response
     */
    public function show(Cuadro $cuadro)
    {
        return new CuadroResource($cuadro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuadro  $cuadro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuadro $cuadro)
    {
        Validator::make($request->all(), [
            'name' => 'max:70',
            'painter' => 'max:70',
            'country' => 'max:3',
            'description' => 'max:2000',
        ])->validate();

        if (!empty($request->input('name'))) {

            $cuadro->name = $request->input('name');

        }

        if (!empty($request->input('painter'))) {

            $cuadro->painter = $request->input('painter');

        }

        if (!empty($request->input('country'))) {

            $cuadro->painter = $request->input('country');

        }

        if (!empty($request->input('country'))) {

            $cuadro->painter = $request->input('country');

        }

        $res = $cuadro->save();

        if ($res) {
            return response()->json(['message' => 'Actualizado exitosamente']);
        }

        return response()->json(['message' => 'Error al actualizar el recurso'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuadro  $cuadro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuadro $cuadro)
    {
        $res = $cuadro->delete();
    
        if ($res) {
            return response()->json(['message' => 'Eliminado Exitosamente']);
        }
    
        return response()->json(['message' => 'Error al eliminar el recurso'], 500);
        
    }
}
