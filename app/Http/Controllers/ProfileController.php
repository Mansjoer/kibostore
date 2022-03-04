<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Rules\OldPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.my-profile.index');
    }

    public function changeInfo(Request $request, $id)
    {
        $this->validate($request,[
            'avatar' => 'mimes:png,jpg,jpeg'
        ]);

        $data = User::find($id);
        $data->update($request->all());
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $name = Str::replace(' ', Str::random(3),$image->getClientOriginalName());
            $request->file('avatar')->move('public/storage/images/avatar/', $name);
            $data->avatar = $name;
            $data->save();
        }
        notify("Data has been updated!", "", "success");
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'min:4', new OldPassword()],
            'password' => 'required', 'min:6',
            'password_confirmation' => 'required|same:password', 'min:6'
        ],[
            'password_confirmation.same' => 'Your current password is wrong!'
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        notify("Password has been changed!", "", "success");
        return redirect()->back();

    }

    public function userBalance()
    {
        return view('');
    }
}
