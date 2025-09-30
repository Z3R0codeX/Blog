<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function getUsers(){
        
        $data = User::all();

       // dd($data);

       return view("admin.users")
        ->with('usuarios',$data);

    }

    public function createUsers(request $request){

        //dd($request->all());

       $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'pass'=>'required|min:3',
            'pass2'=>'required|same:pass',
            'nickname'=>'required|unique:users,nickname'
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('pass'));
        $user->nickname = $request->input('nickname');
        $user->img = 'default.jpg';

        $user->save();

        return redirect('/dashboard/users')
        ->with('success','Usuario insertado correctamente');

        

    }

}
