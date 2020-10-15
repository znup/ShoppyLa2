<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            //$products = Product::where('name', 'LIKE', $request->searchText . '%')->take(10)->get();
            $sql = trim($request->get('searchText'));
            $products = DB::table('products as product')
                ->join('categories as category', 'product.category_id', '=', 'category.id')
                ->select(
                    'product.id',
                    'product.category_id',
                    'product.name',
                    'product.sale_price',
                    'product.code',
                    'product.stock',
                    'product.image',
                    'product.condition_state',
                    'category.name as category'
                )
                ->where('product.name', 'LIKE', '%' . $sql . '%')
                ->orwhere('product.code', 'LIKE', '%' . $sql . '%')
                ->orderBy('product.id', 'desc')
                ->paginate(5);

            $categories = DB::table('categories')
                ->select('id', 'name', 'description')
                ->where('conditionState', '=', '1')->get();
            return view('product.index', ["products" => $products, "categories" => $categories, "searchText" => $sql]);
        }
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->category_id = $request->id;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->sale_price = $request->sale_price;
        $product->stock = '0';
        $product->condition_state = '1';
        if ($request->hasFile('image')) {
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->guessClientExtension();
            $fileNameToStore = time() . '.' . $extension;
            $path = $request->file('image')->storeAs('/public/img/product', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $product->image = $fileNameToStore;
        $product->save();
        return Redirect::to("product");
    }
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id_product);
        $product->category_id = $request->id;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->sale_price = $request->sale_price;
        $product->stock = '0';
        $product->condition_state = '1';
        if ($request->hasFile('image')) {
            if ($product->image != 'noimage.jpg') {
                Storage::delete('public/img/product/' . $product->image);
            }
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->guessClientExtension();
            $fileNameToStore = time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/img/product', $fileNameToStore);
        } else {
            $fileNameToStore = $product->image;
        }
        $product->image = $fileNameToStore;
        $product->save();
        return Redirect::to("product");
    }
    public function destroy(Request $request)
    {
        $product =  Product::findOrFail($request->id_product);
        if ($product->condition_state == "1") {
            $product->condition_state  = '0';
            $product->save();
            return Redirect::to("product");
        } else {
            $product->condition_state = '1';
            $product->save();
            return Redirect::to("product");
        }
    }
}
