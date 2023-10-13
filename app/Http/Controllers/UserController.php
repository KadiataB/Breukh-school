<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    //
    public function index()
    {
        return User::all();
    }


    public function show($id)
    {
        return User::find($id);
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();
        return $user;
    }
    public function delete($id){
        $user = User::find($id);
        $user->events()->delete();
        $user->delete();
        return $user;
    }

    public function store(UserRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role'=>'required|'
        ]);
        if ($validator->fails()) {
            return " baxoul";
        }

        return User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "role"=>$request->role

        ]);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' =>'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return " baxoul";
        }

        $user= User::where('email',$request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // return $user;
                return response()->json([
                    'token'=>$user->createToken('API TOKEN')->plainTextToken
                ]);
            } else {
                return "baxoul";
            }
        } else {
            return "baxoul";
        }
    }


    public function logout(): \Symfony\Component\HttpFoundation\Response
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();

        return Response(['data' => 'User Logout successfully.'],200);
    }

    public function getEvenementByUser($id){
        $user = User::find($id);
        return $user->events;

    }

   
}
