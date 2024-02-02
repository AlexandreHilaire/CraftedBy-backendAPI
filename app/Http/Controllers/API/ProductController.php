<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
//* INFO  Il faut bien penser à nommer comme la route, id devient l'objet
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string'],
        //     'description' => ['required', 'string'],
        //     'unit_price' => ['required', 'numeric'],
        //     'status' => ['required', 'numeric'],
        //     'color' => ['required', 'string'],
        //     'costomizable' => ['required', 'numeric'],
        //     'is_active' => ['required', 'boolean'],
        // ]);

        $product = Product::create([
            'user_id' => $request->get('user_id'),
            'pmodel_id' => $request->get('pmodel_id'),
            'unit_price' => $request->get('unit_price'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'status' => $request->get('status'),
            'color'=> $request->get('color'),
            'customizable'=>$request->get('customizable'),
            'is_active'=>$request->get('is_active'),
        ]);
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
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
    public function destroy(Product $product)
    {
        //
    }
}