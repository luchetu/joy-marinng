<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Lib\Helper;


class CategoryController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->middleware('auth:api.admin')->only(['store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('all')) {
            $categories = Category::orderBy('id', 'DESC')->get();
        } else {
            $categories = Category::paginate(10);
        }
        return response()->json(['data' => $categories], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $category = new Category();
        $category->title = $request->input('title');
        $category->slug = $this->slugify($category->title);
        $category->save();
        return response()->json(['data' => $category, 'message' => 'Created successfully'], 201);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json(['data' => $category], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);
        $this->validate($request, [
            'title' => 'required'
        ]);
        $category->title = $request->input('title');
        $category->slug = $this->slugify($category->title);
        $category->save();
        return response()->json(['data' => $category, 'message' => 'Updated successfully'], 200);
    }

    public function destroy($id)
    {

        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
