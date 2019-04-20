<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PhuController extends Controller
{
    //
    public function index(){
        return User::all();
    }

    public function show(User $user){
        return $user;
    }
    function login(Request $request){
        // dd( $request->all());
        $credentials = $request->only('email', 'password');

        // dd(Auth::attempt($request->all()));
        if (Auth::attempt($credentials)) {
           return response()->json([
               'result'=>true
           ]);
        }
        return response()->json([
            'result'=>false
        ],401);
    }
    // function store(Request $request){
    //     $data = [
    //         'email'=>$request->email,
    //         'name'=>$request->name,
    //         'password'=>bcrypt($request->password),
    //     ];
    //     $user = User::create($data);
    //     return response()->json($user,201);
    // }

    function update(Request $request,User $user){
        $data = [
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
        ];
        $user->update($data);
        // $user = User::create($data);
        return response()->json($user,200);
    }
    function delete(User $user){
        
        $user->delete();
        // $user = User::create($data);
        return response()->json(null,204);
    }

    function store(Request $request){
        $data = $request->only('name','email','password','image');
        // dd($data);
        $fileName = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move('uploads',$fileName);
        }
        $data['image'] = $fileName;
        $rs = User::insert($data);
        return response()->json(['rs'=>$rs],200);
    }
}
// ?email=nguyena@gmail.com&password=123456