<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $userInfo = User::select('id','name','email','phone','address','gender')->where('id',$id)->first();
        return view('admin.profile.index',compact('userInfo'));
    }

    public function updateAdminAccount(Request $request)
    {
        $userData = $this->getUserInfo($request);
        User::where('id',Auth::user()->id)->update($userData);
        return back();
    }

    private function getUserInfo($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'updated_at' => Carbon::now()
        ];
    }
}
