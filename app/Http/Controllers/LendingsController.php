<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;

class LendingsController extends Controller
{
    //
   
    public function store(Request $request, $productId)
    {
        $userId = auth()->user()->id;
        $lending = Lending::where('borrower_id', $userId)
            ->where('product_id', $productId)
            ->where('returned', true)
            ->first();


        if (!$lending) {
            return redirect()->back()->withErrors(['Je hebt dit product nooit geleend']);
        }
       
}
