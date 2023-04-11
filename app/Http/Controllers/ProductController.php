<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $products = Product::all();


        return view('pages.products.index', [
            "products" => $products,
            

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
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->description = $request->description;
        $photo = $request->file('photo');
        $path = $photo->store('public/products');
        $product->product_image = Storage::url($path);
        $product->rentable = true;
        $product->rented_by = null;
        $product->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $productId = $request->route('id');
        $product = Product::find($productId);
        $owner = User::find($product->user_id);
        $rentee = User::find($product->rented_by);
        return view('pages.products.show', [
            'product' => $product,
            'eigenaar' => $owner,
            'lener' => $rentee
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {


        $product->update($request->all());
        return new ProductResource($product);
    }
    // public function allProducts(Request $request)
    // {
    //    $products = Product::all()

    //     return 

    // }
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
