<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
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

    /**
     * Calculate the price of a product
     */
    public function calculatePrice(Request $request)
    {
        $product = Product::find($request->product_id);

        $country_code = mb_substr($request->tax_number, 0, 2);

        $country = Country::where("code", $country_code)->first();
        $status = 200;

        if ($country) {
            $data = [
                "product" => $product,
                "tax_percent" => $country->tax_percent,
                "country" => $country,
                'price' => $product->price * $country->tax_percent / 100,
                'price_with_tax' => $product->price * ($country->tax_percent + 100) / 100,
            ];
        } else {
            $data = [
                "message" => "Country not found",
            ];
            $status = 404;
        }

        return response()->json($data)->setStatusCode($status);
    }
}
