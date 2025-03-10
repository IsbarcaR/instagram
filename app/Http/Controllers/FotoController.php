<?php

namespace App\Http\Controllers;

use App\Models\Foto;

use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos= Foto::all();
        return view('fotos.index',compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('fotos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $foto= new Foto();
       $path= $request->file('imagen')->store('archivos', 'public');
       $foto->path= $path;
       $foto->nombre= $request->nombre;
       $foto->user_id=$request->user_id;
       $foto->save();
       return redirect()->route('fotos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $foto= Foto::find($id);
        return view('fotos.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {   $foto=Foto::find($id);
        if($request->user()->cannot('esSuya',$foto)){
            abort(403);
        }
        
        return view('fotos.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,   $id)
    {
         $foto= Foto::find($id); 
        if($request->file('imagen')){
        $path= $request->file('imagen')->store('archivos', 'public');
        $foto->path= $path;}
        $foto->path= $foto->path;
        $foto->nombre= $request->nombre;
        $foto->user_id=$request->user_id;
        $foto->save();
        return redirect()->route('fotos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $fotos)
    {
        //
    }
}
