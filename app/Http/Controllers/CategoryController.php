<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use \App\Utils\Constants;

class CategoryController extends Controller
{
    public function index(Request $request)
    {     
        if ($request) {
            $sql = trim($request->get('searchText'));
            $categories = DB::table('categories')
                ->where('name', 'LIKE', '%' . $sql . '%')
                ->orderBy('id', 'desc')
                ->paginate(Constants::PAGINES);
            $view = view('categories.index', ["categories" => $categories, "searchText" => $sql]);
            
            return $view;
        }
    }
    public function searcher(Request $request)
    {
        $data = [];
        if ($request -> has('q')) {
            $search = $request->q;
            $data = DB::table("categories")
                        ->select("id", "name")
                        ->where('name', 'LIKE', "%$search%")
                        ->get();
        }
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->conditionState = '1';
        $category->save();
        return Redirect::to("categories");
    }
    public function update(Request $request)
    {
        $category = Category::findOrFail($request->id_category);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->conditionState = '1';
        $category->save();
        //return Redirect::to("category");
        return redirect()->route('categories.index');
        //return response($category, 'category');
    }
    public function destroy(Request $request)
    {
        $category =  Category::findOrFail($request->id_category);
        if ($category->conditionState == "1") {
            $category->conditionState  = '0';
            $category->save();
            return Redirect::to("categories");
        } else {
            $category->conditionState = '1';
            $category->save();
            return Redirect::to("categories");
        }
    }
}
