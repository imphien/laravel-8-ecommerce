<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        return view('user.profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(int $id, Request $request)
    {
        $data = $request->only('first_name', 'last_name', 'email');
        $user = User::query()->where('id', $id)->firstOrFail();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->save();

        return redirect()->route('user.profile');
    }

    public function destroy(int $id)
    {
       User::query()->where('id', $id)->delete();

        return redirect()->route('admin.customers');
    }
}
