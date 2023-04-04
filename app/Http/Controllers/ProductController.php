<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =  Auth::user();
        $products = $user->products;

        return view('home', [
            "products" => $products
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated($request->all());
        $product = Product::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'product_image' => $request->product_image,
            'rentable' => $request->rentable,
            'rental_started' => $request->rental_started,
            'return_date' => $request->return_date,
            'rented_by' => $request->rented_by
        ]);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->isNotAuthorised($product) ? $this->isNotAuthorised($product) :  new ProductResource($product);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {


        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        return $this->isNotAuthorised($product) ? $this->isNotAuthorised($product) :
            $product->delete();
    }

    private function isNotAuthorised($product)
    {
        if (Auth::user()->id !== $product->user_id) {
            return $this->error('', 'You are not authorised', 401);
        }
    }
}
