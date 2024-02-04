<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pmodel;
use Illuminate\Http\Request;

class PmodelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pmodel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pmodel = Pmodel::create([
            'pmodel_name'=>$request->get('pmodel_name'),
        ]);
        return $pmodel;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
