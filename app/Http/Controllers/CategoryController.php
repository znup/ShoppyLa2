<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Config;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        //$pages = Config::get('PAGINES');
        if ($request) {
            $sql = trim($request->get('searchText'));
            $categories = DB::table('categories')->where('name', 'LIKE', '%' . $sql . '%')
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('category.index', ["categories" => $categories, "searchText" => $sql]);
            }
    }
    public function searcher(Request $request)
    {
        $categories = Category::where('categories', 'LIKE', $request->searchText . '%')
            ->take(10)
            ->get();
        return view('category.index', ["categories" => $categories, "searchText" => $categories]);
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->conditionState = '1';
        $category->save();
        return Redirect::to("category");
    }
    public function update(Request $request)
    {
        $category = Category::findOrFail($request->id_category);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->conditionState = '1';
        $category->save();
        //return Redirect::to("category");
        return redirect()->route('category.index');
    }
    public function destroy(Request $request)
    {
        $category =  Category::findOrFail($request->id_category);
        if ($category->conditionState == "1") {
            $category->conditionState  = '0';
            $category->save();
            return Redirect::to("category");
        } else {
            $category->conditionState = '1';
            $category->save();
            return Redirect::to("category");
        }
    }
}
