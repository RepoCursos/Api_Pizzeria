<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::role('cliente')->get();
        return view('admin.user.index', compact("users"));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact("user"));
    }

    public function store(Request $request){
        $user = new User($request->all());
        $user->save();
        return redirect('admin/user');
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        return redirect('admin/user');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/user');
    }
}
