<?php

namespace Modules\Widgets\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Widgets\Entities\Corona;

class WidgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   
        $id ='1';
        $editCorona = Corona::findOrFail($id);
        return view('widgets::index')->with('editCorona', $editCorona);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('widgets::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('widgets::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('widgets::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateCorona(Request $request, $id)
    {   
    
        $updateCorona = Corona::findOrFail($id);
        $updateCorona->cas_preleves = $request->cas_preleves;
        $updateCorona->resultats = $request->resultats;
        $updateCorona->cas_negatifs = $request->cas_negatifs;
        $updateCorona->cas_confirmes = $request->cas_confirmes;
        $updateCorona->date = $request->date;
        $updateCorona->update();
        return redirect('widgets');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
