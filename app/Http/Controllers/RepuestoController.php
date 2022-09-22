<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Storage;

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view ('repuesto.index');
        $datos['repuestos']=Repuesto::paginate(5);
        return view ('repuesto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('repuesto.create');
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
            'UM'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'la foto requireda'

        ];

        $this->validate($request, $campos, $mensaje);






        $datosRepuesto =$request->except('_token');


        if($request->hasFile('Foto')){ 
            $datosRepuesto['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Repuesto::insert($datosRepuesto);
        
        return redirect ('repuesto')->with('mensaje','Agregado Exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Repuesto $repuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $repuesto=Repuesto::findOrFail($id);
        return view ('repuesto.edit',compact('repuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'UM'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            

        ];
        if($request->hasFile('Foto')){
        $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
        $mensaje=['Foto.required'=>'la foto requireda' ];
        }

        $this->validate($request, $campos, $mensaje);





        //
        $datosRepuesto=$request->except(['_token','_method']);


        if($request->hasFile('Foto')){
            $repuesto=Repuesto::findOrFail($id);

            Storage::delete('public/'.$repuesto->Foto);

            $datosRepuesto['Foto']=$request->file('Foto')->store('uploads','public');

        }

        Repuesto::where('id','=',$id)->update($datosRepuesto);
        $repuesto=Repuesto::findOrFail($id);
        //return view ('repuesto.edit',compact('repuesto'));
        return redirect('repuesto')->with('mensaje','Repuesto Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $repuesto=Repuesto::findOrFail($id);

        if(Storage::delete('public/'.$repuesto->Foto)){
            Repuesto::destroy($id);

        }
        return redirect('repuesto')->with('mensaje','Borrado Exitoso');

    }
}
