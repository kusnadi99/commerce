<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->get();

        return view('pages.products', [
            'products' => $products
        ]);
    }

    public function detail($id)
    {
        $product = $this->product->findOrFail($id);

        return view('pages.products_details', [
            'product' => $product
        ]);
    }
}
