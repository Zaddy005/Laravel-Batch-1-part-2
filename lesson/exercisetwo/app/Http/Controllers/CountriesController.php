<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Country;
use Illuminate\Http\Request;


class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('countries.index',['countries'=>$countries]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:countries,name'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $country = new Country([
           'name'=>$request['name'],
           'slug'=>Str::slug($request['name']),
           'user_id'=>$user_id
        ]);

        $country->save();
        return redirect(route('countries.index'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required|unique:countries,name,'.$id
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        Country::findOrFail($id)->update([
            'name'=>$request['name'],
            'slug'=>Str::slug($request['name']),
            'user_id'=>$user_id
        ]);

        return redirect(route('countries.index'));
    }

    public function destroy(string $id)
    {
        Country::findOrFail($id)->delete();
        return redirect()->back();
    }
}
