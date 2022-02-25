<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function showAddform(){
        return view('addUser');
    }
    public function adduser(Request $request){
        $storeData = $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|string',
            'mobile' => 'required|numeric|digits:10'
        ]);
        User::create($storeData);
        echo  '200';
    }
    public function usersList(Request $request){
        $data = User::paginate(1);
        return view('users',compact('data'));
    }

}
