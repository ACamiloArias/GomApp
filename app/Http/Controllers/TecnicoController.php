<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['tecnicos']=Tecnico::paginate(5);
        return view ('tecnico.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view ('tecnico.create');
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
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Telefono'=>'required|string|max:100',
            'Especialidad'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'la foto requireda'

        ];

        $this->validate($request, $campos, $mensaje);

        //$datosTecnico = $request->all();

        $datosTecnico =$request->except('_token');


        if($request->hasFile('Foto')){ 
            $datosTecnico['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Tecnico::insert($datosTecnico);
        //return response()->json($datosTecnico);
        return redirect ('tecnico')->with('mensaje','Agregado Exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnico $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tecnico=Tecnico::findOrFail($id);
        return view ('tecnico.edit',compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    { 
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Telefono'=>'required|string|max:10',
            'Especialidad'=>'required|string|max:100',
            
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            

        ];

        if($request->hasFile('Foto')){ 
        $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
        $mensaje=['Foto.required'=>'la foto requireda'];
        }
        //

        $datosTecnico =$request->except(['_token','_method']);


        if($request->hasFile('Foto')){
            $tecnico=Tecnico::findOrFail($id);

            Storage::delete('public/'.$tecnico->Foto);

            $datosTecnico['Foto']=$request->file('Foto')->store('uploads','public');

        }

        Tecnico::where('id','=',$id)->update($datosTecnico);
        $tecnico=Tecnico::findOrFail($id);
        //return view ('tecnico.edit',compact('tecnico'));
        return redirect('tecnico')->with('mensaje','Modificado Exitoso');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tecnico=Tecnico::findOrFail($id);

        if(Storage::delete('public/'.$tecnico->Foto)){
            Tecnico::destroy($id);

        }

        
        return redirect('tecnico')->with('mensaje','Borrado Exitoso');



    }
}
