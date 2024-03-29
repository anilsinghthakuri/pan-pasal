<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        return view('adduser');
    }

    public function adduser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $hashedpassword = Hash::make($request->password);
        $user->password = $hashedpassword;
        $user->save();

        $user_id = User::max('id');
        $user = User::findorfail($user_id);


        $user->assignRole('user');

        return redirect('/adduser')->with('message', 'User Added');
    }

    public function userlist()
    {   $userlist = $this->userlistfetch();
        return view('userlist',[
            'userlist'=>$userlist,
        ]);
    }
    protected function userlistfetch(){
        $userlist = User::all();
        return $userlist;
    }

    public function userdelete($id)
    {
        User::where('id',$id)->delete();
        return redirect('/userlist')->with('message', 'User deleted');
    }
}
