<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
	private $categoryModel;
	private $productModel;

    public function __construct(Category $category, Product $product)
    {
    	$this->categoryModel = $category;
    	$this->productModel = $product;
    }

    public function index()
    {
    	$pFeatured = $this->productModel->featured()->get();
    	$pRecommend = $this->productModel->recommend()->get();
    	$categories = $this->categoryModel->all();
    	return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
    	$categories = $this->categoryModel->all();
    	$category = $this->categoryModel->find($id);
    	$products = $this->productModel->findCategory($id)->get();
    	return view('store.findCategory', compact('categories','category', 'products'));
    }
}
