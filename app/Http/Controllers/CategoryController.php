<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request) {
            $sql = trim($request->get('searchText'));
            $categories = DB::table('categories')->where('name', 'LIKE', '%'.$sql.'%')
            ->orderBy('id', 'desc')
            ->paginate(3);
            return view('category.index',["categories"=>$categories,"searchText"=>$sql]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category-> name = $request-> name;
        $category-> description = $request-> description;
        $category-> condition = '1';
        $category-> save();
        return Redirect::to("category");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = Category::findOrFail($request-> id_category);
        $category-> name = $request-> name;
        $category-> description = $request-> description;
        $category-> condition = '1';
        $category-> save();
        return Redirect::to("category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category =  Category::findOrFail($request-> id_category);

        if($category-> condition=='1') {
            $category-> condition  = '0';
            $category-> save();
        } else {
            $category-> condition = '1';
            $category-> save();
            return Redirect::to("category");
        }
    }
}
