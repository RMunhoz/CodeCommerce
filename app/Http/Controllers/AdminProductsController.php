<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $productsModel;

    public function __construct(Product $product)
    {
    	$this->productsModel = $product;
    }

    public function index()
    {
    	$products = $this->productsModel->all();

    	return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $input['recommend'] = $request->get('recommend') ? true : false;
        $input['featured'] = $request->get('featured') ? true : false;
        $product = $this->productsModel->fill($input);
        $product->save();
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = $this->productsModel->find($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $request['recommend'] = $request->get('recommend') ? true : false;
        $request['featured'] = $request->get('featured') ? true : false;
        $this->productsModel->find($id)->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->productsModel->find($id)->delete();
        return redirect()->route('admin.products.index');
    }
}
