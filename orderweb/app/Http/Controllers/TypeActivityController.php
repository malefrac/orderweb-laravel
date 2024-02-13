<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use Illuminate\Http\Request;

class TypeActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_activities = TypeActivity::all(); //select * from causal (Consulta todas las causales existentes)
        //dd($type_activities);
        return view('type_activity.index', compact('type_activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type_activity = TypeActivity::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('type_activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type_activity = TypeActivity::find($id);
        if($type_activity) //si la causal existe
        {
            return view('type_activity.edit', compact('type_activity'));
        }
        else //si la causal no existe
        {
            return redirect()->route('type_activity.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type_activity = TypeActivity::find($id);
        if($type_activity)
        {
            $type_activity->update($request->all()); //Delete from type_activity where id = x
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else
        {
            return redirect()->route('type_activity.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');

        }

        return redirect()->route('type_activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type_activity = TypeActivity::find($id);
        if($type_activity) //si la causal existe
        {
            $type_activity->delete(); //delete from causal where id = X
            session()->flash('message','Registro eliminado exitosamente');
        }
        else //si la causal no existe
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }

        return redirect()->route('causal.index');
    }
}
