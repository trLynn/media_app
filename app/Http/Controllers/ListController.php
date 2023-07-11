<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{

    //direct admin list page
    public function index()
    {
        $userData = User::select('id','name','email','phone','address','gender')->get()->toArray();
        return view('admin.list.index',compact('userData'));
    }

    //delete admin account
    public function deleteAccount($id)
    {
        User::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'User Account Deleted!']);
    }

    // search admin account
    public function adminListSearch(Request $request)
    {

    }
}
