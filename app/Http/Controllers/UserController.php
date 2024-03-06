<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public static function createUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'pass' => ['required', Rules\Password::defaults()],
        ]);
   
        
       $user = User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'surnames'=>$request->surnames,
            'password' => Hash::make($request->pass),
            'isAdmin'=>$request->isAdmin,
            'isManager'=>$request->isManager,
        ]);
return response()->json(['message' => 'User added successfully', 'user' => $request->all()], 201);


    }
 
    public static function editUser(Request $request)
    {     

        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $userModel=new User;
        $User=$userModel->find($request->id);  
        if($request->pass==null){

        }else{
            
            $request->validate([
                'pass' => ['', Rules\Password::defaults()],
                    ]);
            $User->password=Hash::make($request->pass);

        }
       
        $User->name=$request->name;
        $User->surnames=$request->surnames;
        $User->email=$request->email;
        $User->isAdmin=$request->isAdmin;
        $User->isManager=$request->isManager;
        $User->save();
        return response()->json([ 'user' => $request->all()]);
        

    }
    public static function deleteUser(Request $request)
    {
        
        $userModel=new User;
        $User=$userModel->find($request->id);
        $User->delete();  
    }
}
