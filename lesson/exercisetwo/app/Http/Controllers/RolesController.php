<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
        $statuses = Status::whereIn('id',[3,4])->get();
        return view('roles.create',compact('statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50|unique:roles,name',
            "image"=>"image|mimes:jpg,jpeg,png",
            "status_id"=>"required|in:3,4"
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $role = new Role();
        $role->name = $request['name'];
        $role->slug = Str::slug($request['name']);
        $role->status_id = $request['status_id'];
        $role->user_id = $user_id;

        // Single Image Upload
        if(file_exists($request['image'])){
            $file = $request['image'];
            $filename = $file->getClientOriginalName();
            $imagenewname = uniqid($user_id).$role['id'].$filename;
            $file->move(public_path('assets/img/role'),$imagenewname);

            $role->image = 'assets/img/role/'.$imagenewname;
        }

        $role->save();
        return redirect(route('roles.index'));
    }

    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        return view("roles.show",["role"=>$role]);
    }

    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $statuses = Status::whereIn('id',[3,4])->get();
        return view('roles.edit')->with('statuses',$statuses)->with('role',$role);
    }
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>['required',"max:50","unique:roles,name,".$id],
            "image"=>["image","mimes:jpg,jpeg,png","max:1024"],
            "status_id"=>["required","in:3,4"]
        ]);

        $user = Auth::user();
        $user_id = $user['id'];

        $role = Role::findOrFail($id);
        $role->name = $request['name'];
        $role->slug = Str::slug($request['name']);
        $role->status_id = $request['status_id'];
        $role->user_id = $user_id;

        // Remove Old Image
        if($request->hasFile('image')){
            $path = $role->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }

        // Single Image Upload
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $imagenewname = uniqid($user_id).$role['id'].$filename;
            $file->move(public_path('assets/img/role'),$imagenewname);

            $role->image = 'assets/img/role/'.$imagenewname;
        }

        $role->save();
        return redirect(route('roles.index'));
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        $path = $role->image;
        // Remove Image
        if(File::exists($path)){
            File::delete($path);
        }

        $role->delete();
        return redirect()->back();

    }
}
