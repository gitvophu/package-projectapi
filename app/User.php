<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    protected $primarykey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public static function checkToken_P($request){
        $user = User::where('token', '=', $request['token'])->first();
        if ($user){
            return true;
        }
        return false;
    }

    public static function showAllUser(){
        return User::select('id', 'name', 'email')->get();
    }

    public static function pageUser(){
        return User::select('id', 'name', 'email')->paginate(5);
    }

    public static function logoutUser($request){
        User::where('token', '=', $request['token'])
            ->update([
                'token' => null,
                'token_expire' => null,
            ]);
    }

    public static function insertUser($data){
        User::insert([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
        ]);
    }
    
    public static function show($id)
    {
        $user = User::where('id', '=', $id)->select('id', 'name', 'email')->first();
        return $user;
    }

    public function create($user)
    {
        User::insert([
            'name' => $user['name'],
            'email' =>$user['email'],
            'password' => $user['password'],
        ]);
    }

    public static function createByToken($token)
    {
        return User::where('token', $token['token'])->first();
    }

    public function deleteuser($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
    }    
    
    public static function updateUserChangePassword($data, $id){
        User::where('id', $id)
        ->where('token', $data['token'])
        ->update([
            'password' => bcrypt($data['password']),
        ]);
    }

    public static function updateUserChangeName_Password($data, $id){
        User::where('id', $id)
        ->update([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public static function updateUserNoChangePassword($data, $id){
        User::where('id', $id)
        ->update([
            'name' => $data['name'],
        ]);
    }


    public function updateWithImage($request){
        // dd($request->all());
        
        $user = User::where('email',$request->email)->first();
        if ($user->token == $request->token) {
            if ($user) {
                // $user->phone = $request->phone;
                // $user->name = $request->name;
                
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $fileName = $file->getClientOriginalName();
                    $file->move('uploads',$fileName);
                    $user->image = $fileName;
                    // $file->
                   
                }
                $user->save();
                return true;
            }
            return false;
        }
        else{
            return response()->json(['error'=>'Loi xac thuc nguoi dung'],201);
        }
        
        

       
    }

    public function search($query)
    {
        $user = User::where('name','like',"%{$query}%")                      
                        ->orWhere('email','like',"%{$query}%")
                        ->Select('name','email');
        return $user;
    }

    public static function checkToken($request)
    {
        $obj = User::where('token','=',$request['token'])->first();
        return $obj;
    }

}
