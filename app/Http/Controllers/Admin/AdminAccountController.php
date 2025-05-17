<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAccountController extends Controller
{
    public function general(){
        return view('admin.account', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request){
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'size:10',
            'intro' => 'max:255',
        ]);

        $user = User::find(Auth::user()->id);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];

        $request->whenHas('mobile', function ($input) use ($user){
            $user->mobile = $input;
        });
        $request->whenHas('intro', function ($input) use ($user){
            $user->intro = $input;
        });
       
        $user->save();

        return redirect()->route('admin.account')->with('status', 'Đã thay đổi hồ sơ');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'], // `confirmed` sẽ tự so với `password_confirmation`
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'pwdError');
        }

        $user = Auth::user();

        if (!Hash::check($request->input('old'), $user->password)) {
            return back()->withErrors(['old' => 'Mật khẩu cũ không đúng'], 'pwdError');
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return back()->with('pwdStatus', 'Mật khẩu đã được cập nhật thành công.');
    }
}
