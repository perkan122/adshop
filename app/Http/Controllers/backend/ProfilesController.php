<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\User;
use Hash;
use Session;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //show profile informations
    public function show(){
      return view('backend.profile');
    }

    //update informations
    public function updateprofile(Request $request){
      //validacija
      $this->validate($request, [
              'name' => 'required',
              'surname' => 'required',
              'telephone' => 'required',
              'email' => 'required',
              'address' => 'required',
              'floor' => 'required',
              'apartment_number' => 'required'
          ]);
      $user = User::find($request->id);
      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->email = $request->email;
      $user->telephone = $request->telephone;
      $user->address = $request->address;
      $user->floor = $request->floor;
      $user->apartment_number = $request->apartment_number;
      $user->save();
      Session::flash('success_user', 'aжуриран профил корисника!');
    return redirect()->route('profile');
    }

    //update password
    public function updatepassword(Request $request){
      //validacija
      $this->validate($request, [
              'oldpassword' => 'required',
              'againpassword' => 'required',
              'newpassword' => 'required'
          ]);
      $user = User::find($request->id);

      if (Hash::check($request->oldpassword, $user->password))
      {
          if ($request->againpassword == $request->newpassword) {
            $user->password = bcrypt($request->newpassword);
            $user->save();
            Session::flash('success_password', ' ажурирана корисничка лозинка!');
            return redirect()->route('profile');
          }
      }else {
        Session::flash('error_password', 'Тренутна лозинка није валидна!');
        return redirect()->route('profile');
      }

    }
}
