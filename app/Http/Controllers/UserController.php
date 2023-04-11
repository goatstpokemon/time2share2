<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //


    public function editUser(Request $request)
    {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $id = $request->route('id');
        $user = User::find($id);
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email;
        $photo = $request->file('photo');
        dd($photo);
        $path = $photo->store('public/users');
        $user->profile_image = Storage::url($path);
        $user->save();
        return redirect('/');
    }

    public function editProfile(Request $request)
    {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $photo = $request->file('photo');
        $path = $photo->store('public/users');
        $user->profile_image = Storage::url($path);
        $user->save();
        return redirect('/');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('pages.user.edit', [
            'user' => $user
        ]);
    }

    public function index()
    {

        $users = User::all();


        return view('pages.user.index', [
            "users" => $users,
        ]);
    }

    public function show(Request $request)
    {
        $userId = $request->route('id');
        $user = User::find($userId);
        $products = Product::where('user_id', $userId)->get();

        return view('pages.user.show', [
            'user' => $user,
            'products' => $products
        ]);
    }
}
