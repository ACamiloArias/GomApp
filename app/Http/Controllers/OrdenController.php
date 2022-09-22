<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;
use Dompdf\Options;
use Illuminate\Pagination\Paginator;


use App\Models\Orden;
use App\Models\Tecnico;
use App\Models\Equipo;
use App\Models\Repuesto;
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
        //
        $datos['ordens']= Orden::paginate(5);
        return view('orden.index',$datos);
    }

    public function pdf()
    
    {
        //
        $datos = Orden::paginate();
        return view('orden.pdf');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $orden = new Orden();
        
        $equipos = Equipo::all();
        $tecnicos = Tecnico::all();
        $repuestos = Repuesto::all();

        return view('orden.create',compact('orden','equipos', 'tecnicos', 'repuestos'));
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
        $datosOrden = request()->except('_token');
        Orden::insert($datosOrden);
        return redirect('orden')->with('mensaje', 'Orden Insertada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $equipos = Equipo::all();
        $tecnicos = Tecnico::all();
        $repuestos = Repuesto::all();
        $orden = Orden::findOrFail($id);
        return view('orden.show', compact('orden','equipos', 'tecnicos', 'repuestos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $orden = Orden::findOrFail($id);
        $equipos = Equipo::all();
        $tecnicos = Tecnico::all();
        $repuestos = Repuesto::all();

        return view('orden.edit',compact ('orden','equipos', 'tecnicos', 'repuestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
        return redirect('orden')->with('mensaje','orden Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Orden::destroy($id);
        return redirect('orden');
        //Orden::destroy($id);
        //return redirect('orden')->with('mensaje','Equipo Borrado');
    }

    public function download($id)
    {
        $data = [
            'titulo' => 'Styde.net'
        ];
        $pdf = app('dompdf.wrapper');
        $equipos = Equipo::all();
        $tecnicos = Tecnico::all();
        $repuestos = Repuesto::all();
        $orden = Orden::findOrFail($id);

        $pdf->loadview('orden.show', compact('orden','equipos', 'tecnicos', 'repuestos'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('archivo.pdf');
    }
}