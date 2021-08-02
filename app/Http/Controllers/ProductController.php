<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Jobs\ProcessProduct;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $payload = [
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description', ''),
        ];

        ProcessProduct::dispatch($payload);

        return response('Request to add product is sent successfully.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validateRequest($request);

        $payload = [
            'product_id' => $request->input('product_id'),
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description', ''),
        ];

        ProcessProduct::dispatch($payload);

        return response('Request to update product is sent successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'product_name' => 'required|unique:products|max:100',
            'product_description' => 'string|max:2000|nullable',
        ]);
    }
}
