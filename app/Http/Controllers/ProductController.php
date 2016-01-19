<?php

namespace App\Http\Controllers;



use App\Product;

class ProductController extends Controller
{
    public function show_prod($prod)
    {
        $oneProduct = Product::findOrFail($prod);
        dump($oneProduct->title);

        return view('produits', ['bladeprod' => $oneProduct]);
    }
}