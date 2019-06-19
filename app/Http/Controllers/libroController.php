<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;

class libroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros=libro::orderBy('nombre','DESC')->paginate(5);
        return view('libro.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('libro.create');

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
        $this->validate($request,['nombre'=>'required','resumen'=>'required','npagina'=>'required','edicion'=>'required','autor'=>'required','precio'=>'required']);
        libro::create($request->all());
        return redirect()->route('libro.index')->with('success','Registro Creado Exitosamente');
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
        $libros=libro::find($id);
        return view('libro.show',compact('libros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $libro=libro::find($id);
        return view('libro.edit',compact('libro'));
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
        //
        $this->validate($request,['nombre'=>'required',
            'resumen'=>'required',
            'npagina'=>'required',
            'edicion'=>'required',
            'autor'=>'required',
            'precio'=>'required']);

        libro::find($id)->update($request->all());
        return redirect()->route('libro.index')->with('success','Registro Actualizado Exitosamente');
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
        libro::find($id)->delete();
        return redirect()->route('libro.index')->with('success','Registro Eliminado Exitosamente');
    }
}
