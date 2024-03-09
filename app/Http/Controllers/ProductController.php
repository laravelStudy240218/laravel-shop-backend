<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'body' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);

    $product = new Product();
    $product->body = $request->body;
    $product->image = $imageName;
    $product->save();

    return redirect('/')->with('success','상품이 성공적으로 등록되었습니다.');
}

}


