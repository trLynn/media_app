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
        $userData = User::orWhere('name','LIKE', '%'.$request->admin_search. '%')
                    ->orWhere('email','LIKE', '%'.$request->admin_search. '%')
                    ->orWhere('phone','LIKE', '%'.$request->admin_search. '%')
                    ->orWhere('address','LIKE', '%'.$request->admin_search. '%')
                    ->orWhere('gender','LIKE', '%'.$request->admin_search. '%')
                    ->get();
        //return back()->with(['userData'=>$userData]);
        return view('admin.list.index',compact('userData'));
    }
}
