<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = $this->userValidationCheck($request);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        User::where('id',Auth::user()->id)->update($userData);
        return back()->with(['updateSuccess' => 'Admin account updated!' ]);
    }

    public function directChangePassword()
    {
        return view('admin.profile.changePassword');
    }

    public function changePassword(Request $request)
    {
        $validator = $this->changePasswordValidationCheck($request);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
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

    private function userValidationCheck($request)
    {
        return Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required'
        ],[
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!'
        ]);
    }

    private function changePasswordValidationCheck(Request $request)
    {
        return Validator::make($request->all(),[
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required'
        ]);
    }
}
