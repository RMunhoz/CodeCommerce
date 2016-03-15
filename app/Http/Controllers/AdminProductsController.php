<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $productsModel;

    public function __construct(Product $product)
    {
    	$this->productModel = $product;
    }

    public function index()
    {
    	$products = $this->productModel->paginate(10);

    	return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $input['recommend'] = $request->get('recommend') ? true : false;
        $input['featured'] = $request->get('featured') ? true : false;
        $product = $this->productModel->fill($input);
        $product->save();
        return redirect()->route('products.index');
    }

    public function edit(Category $category, $id)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);
        return view('products.edit', compact('categories', 'product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $request['recommend'] = $request->get('recommend') ? true : false;
        $request['featured'] = $request->get('featured') ? true : false;
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('products.index'); 
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);
        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);
        return view('products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        return redirect()->route('products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        if (file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)) {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }        
        $product = $image->product;
        $image->delete();
        return redirect()->route('products.images', ['id'=>$image->id]);
    }
}
