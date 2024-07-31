<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GendersController extends Controller
{

    public function index()
    {
        $genders = Gender::all();
        return view("genders.index")->with('genders',$genders);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|unique:genders,name"
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        Gender::create([
           'name'=>$request['name'],
           'slug'=>Str::slug($request['name']),
           'user_id'=>$user_id
        ]);

        return redirect(route('genders.store'));
    }

    public function update(Request $request, string $id)
    {

        $this->validate($request,[
            "name"=>"required|unique:genders,name,".$id
        ]);

        $user = Auth::user();
        $user_id = $user->id;

//        $gender = Gender::findOrFail($id);
//        $gender->update([
//            'name'=>$request['editname'],
//            'slug'=>Str::slug($request['editname']),
//            'user_id'=>$user_id
//        ]);

        Gender::where('id',"=",$id)->update([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name']),
            'user_id'=>$user_id
        ]);

        return redirect(route('genders.store'));
    }

    public function destroy(string $id)
    {
        Gender::findOrFail($id)->delete();
        return redirect()->back();
    }
}
