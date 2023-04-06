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
    public function availible()
    {
        return Product::where('rentable', 1)->get();
    }

    public function index()
    {
        $user =  Auth::user();
        $products = $user->products;


        return view('pages.products.index', [
            "products" => $products,
            "user" => $user,

        ]);
    }

    public function home()
    {
        $user =  Auth::user();
        $products = $user->products;
        $availible = ProductController::availible();
        return view('home', [
            "available" => $availible,
            "products" => $products,
            "user" => $user
        ]);
    }
    public function borrowed()
    {
        $user =  Auth::user();
        $products = $user->products;


        return view('pages.products.borrowed', [
            "products" => $products,
            "user" => $user
        ]);
    }
    public function borrowing()
    {
        $user =  Auth::user();
        $products = $user->rentedProducts;


        return view('pages.products.borrowing', [
            "products" => $products,
            "user" => $user
        ]);
    }

    public function create()
    {
        return view('pages.products.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png, jpg' // Only allow .jpg, .bmp and .png file types.
            ]);
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $product->image = $path;
        }
        $product->rentable = true;
        $product->rented_by = 0;
        $product->save();

        return redirect('/');
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
