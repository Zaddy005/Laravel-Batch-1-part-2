<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CitiesController extends Controller
{

    public function index()
    {
        $cities = City::all();
        return view('cities.index',compact('cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|unique:cities,name"
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        City::create([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name']),
            'user_id'=>$user_id
        ]);

        return redirect(route('cities.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>"required|unique:cities,name,".$id
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        City::where("id",$id)->update([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name']),
            'user_id'=>$user_id
        ]);

        return redirect(route('cities.index'));
    }

    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect(route('cities.destroy'));
    }
}
