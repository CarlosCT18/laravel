<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\estudiante_detalle;
use App\Models\Seguimiento;


class PagesController extends Controller
{
       
    public function fnIndex () {
        return view('welcome');
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id); //datos de BD po id
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){

        $xUpdateAlumnos = Estudiante::findOrFail($id);
        
        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnEst = $request -> fnEst;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();   // Guardando en BD

        return back()->with('msj', 'Se actualizo con éxito...');

    }

    public function fnRegistrar(Request $request){
              
        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required',
        ]);

        $nuevoEstudiante = new Estudiante;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnEst = $request->fnEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save(); //guardar en BD

        return back()->with('msj', 'Se registro con éxito...');
    }
    
    
    public function fnEstDetalle($id){
        $xDetAlumnos = estudiante_detalle::findOrFail($id); //Datos de BD por id
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj', 'Se elimino con éxito...');
    }

    public function fnLista(){
        //$xAlumnos = Estudiante::all(); //Datos de BD
        $xAlumnos = Estudiante::paginate(4);   //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnSeguimiento(){
        $xAluSeg = Seguimiento::all(); //Datos de BD
        return view('pagSeguimiento', compact('xAluSeg'));
    }

    public function fnGaleria ($numero=0){
        $valor = $numero;
        $otro = 25;
        return view('pagGaleria', compact('valor', 'otro'));
    }
    
}
