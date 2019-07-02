<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biblioteca;

class bibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bibliotecas=Biblioteca::orderBy('nombreBiblioteca','DESC')->paginate(5);
        return view('bibliotecas.index', compact('bibliotecas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bibliotecas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,['nombreBiblioteca'=>'required','ciudad'=>'required','numeroTelefonico'=>'required']);
        Biblioteca::create($request->all());
        return redirect()->route('bibliotecas.index')->with('success','Registro Creado Exitosamente');
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
        $bibliotecas=Biblioteca::find($id);
        return view('Biblioteca.show',compact('bibliotecas'));
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
        $libro=Biblioteca::find($id);
        return view('Biblioteca.edit',compact('bibliotecas'));
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
        $this->validate($request,['nombreBiblioteca'=>'required',
            'ciudad'=>'required',
            'numeroTelefonico'=>'required']);

        Biblioteca::find($id)->update($request->all());
        return redirect()->route('Biblioteca.index')->with('success','Registro Actualizado Exitosamente');
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
        Biblioteca::find($id)->delete();
        return redirect()->route('Biblioteca.index')->with('success','Registro Eliminado Exitosamente');
    }
}
