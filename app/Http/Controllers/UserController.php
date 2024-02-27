<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public static function createUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'pass' => ['required', 'confirmed', Rules\Password::defaults()],
           'isAdmin'=> ['required', 'integer', 'in:0,1'],
           'isManager'=> ['required', 'integer', 'in:0,1'],
        ]);
   

        $user = User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->pass),
            'isAdmin'=>$request->isAdmin,
            'isManager'=>$request->isManager,
        ]);


    }
    
    public static function editUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $userModel=new User;
        $User=$userModel->find($request->id);  
        $User->name=$request->name;
        $User->email=$request->email;
        $User->password=Hash::make($request->pass);
        $User->save();


    }
    public static function deleteUser(Request $request)
    {
        
        $userModel=new User;
        $User=$userModel->find($request->id);
        $User->delete();  
    }
}
