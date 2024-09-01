<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Status;


class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $statuses = Status::whereIn('id',[3,4])->get();
        return view('categories.index',compact('categories','statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50|unique:categories,name',
            "status_id"=>"required|in:3,4"
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $categories = new Category();
        $categories->name = $request['name'];
        $categories->slug = Str::slug($request['name']);
        $categories->status_id = $request['status_id'];
        $categories->user_id = $user_id;

        $categories->save();
        return redirect(route('categories.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>['required',"max:50","unique:categories,name,".$id],
            "status_id"=>["required","in:3,4"]
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $category = Category::findOrFail($id);
        $category->name = $request['name'];
        $category->slug = Str::slug($request['name']);
        $category->status_id = $request['status_id'];
        $category->user_id = $user_id;


        $category->save();
        return redirect(route('categories.index'));
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
        return redirect()->back();

    }
}
