<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $amigos=Amigo::orderBy('id','DESC')->paginate(3);
        return view('Amigo.index',compact('amigos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Amigo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['usu un nick name'=>'required', ' un nick name'=>'required', 'fecha amistad' =>'required']);
        Amigo::create($request->all());
        return redirect()->route('amigo.index')->with('success','Registro creado satisfactoriamente');
    
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
        $amigos=Amigo::find($id);
        return  view('amigo.show',compact('amigos'));
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
        $amigo=Amigo::find($id);
        return view('amigo.edit',compact('amigo'));
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
        $this->validate($request,['usu_un_nick_name'=>'required', 'un_nick_name'=>'required', 'fecha_amistad' =>'required']);
        amigo::find($id)->update($request->all());
        return redirect()->route('amigo.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        Amigo::find($id)->delete();
        return redirect()->route('amigo.index')->with('success','Registro eliminado satisfactoriamente');
    
    }
}
