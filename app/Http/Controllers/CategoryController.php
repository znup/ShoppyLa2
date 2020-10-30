<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use \App\Utils\Constants;
use \App\Http\Resources\Category as CategoryResources;
use \App\Http\Requests\Category as CategoryRequests;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {   
        return response()->json( 
            new CategoryCollection( 
                $this->category->orderBy('id', 'DESC')->get()
            )    
        );
    }
    
    public function store(CategoryRequests $request)
    {
        $category = \DB::table('categories')
            ->select('name', 'description', 'conditionState')
            ->orderBy('name', 'DESC')
            ->paginate(Constants::PAGINES)
            ->get()
            ->toJson();
            
        $category = $this->category->create($request->all());

        return response()->json(new CategoryResources($category), 201);
    }

    public function getCategoryById($id)
    {
        $category = DB::table('categories')
            ->select('id', '%'. $id . '%')
            ->tojson();

            return $category;
    }

    public function show(Category $category)
    {
        return response()->json(new CategoryResources ($category), 200);
    }

    public function update(CategoryRequests $request, Category $category)
    {
        $category = Category::findOrFail($request->id_category);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->conditionState = '1';
        $category->save();

        $category->update($request->all());

        return response()->json(new CategoryResources($category), 200);
    }

    public function destroy(Category $category, Request $request)
    {
        $category =  Category::findOrFail($request->id_category);
        if ($category->conditionState == "1") {
            $category->conditionState  = '0';
        } else {
            $category->conditionState = '1';
        }
        $category->save();
        return response()->json($category, 204);
    }
}
