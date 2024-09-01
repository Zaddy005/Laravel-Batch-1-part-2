<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Str;

class TagsController extends Controller
{

    public function index(){
        $tags = Tag::all();
        $statuses = Status::whereIn('id',[3,4])->get();
        return view("tags.index")->with('tags',$tags)->with("statuses",$statuses);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:40|unique:tags,name',
            'status_id'=>'required'
        ]);

        $user = Auth::user();
        $usre_id = $user->id;

        Tag::create([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name']),
            'status_id'=>$request['status_id'],
            'user_id'=>$usre_id
        ]);

        return redirect(route('tags.index'));
    }

    public function update(Request $request,string $id){
        $this->validate($request,[
            'name'=>'required|max:40|unique:tags,name,'.$id,
            'status_id'=>'required'
        ]);

        $user = Auth::user();
        $usre_id = $user->id;

        Tag::findOrFail($id)->update([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name']),
            'status_id'=>$request['status_id'],
            'user_id'=>$usre_id
        ]);

        return redirect(route('tags.index'));
    }

    public function destroy(string $id){
        Tag::findOrFail($id)->delete();
        return redirect(route('tags.index'));
    }

}
