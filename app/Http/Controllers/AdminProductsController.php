<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product)
    {
    	$this->products = $product;
    }

    public function index()
    {
    	$products = $this->products->all();

    	return view('products.index', compact('products'));
    }

    public function create()
    {
        return "Estamos em construção";
    }

    public function store()
    {
        return "Estamos em construção";
    }

    public function edit($id)
    {
        return "Estamos em construção";
    }

    public function update($id)
    {
        return "Estamos em construção";
    }

    public function destroy($id)
    {
        return "Estamos em construção";
    }
}
