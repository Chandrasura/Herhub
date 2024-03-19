<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        $profit = Profit::where('user_id', $user->id)->where('status', 'completed')->sum('amount');
        return view('user.profile', compact(['user', 'profit']));
    }

    public function personalInfo(){
        $user = Auth::user();
        return view('user.info', compact(['user']));
    }

    public function updatePersonalInfo(Request $request){
        $user = Auth::user();
        $rules = [
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female,others',
        ];

        if($request->old_password){
            $rules['old_password'] = [
                'string', function($attribute, $value, $fail) use($request, $user) {
                    if (!Hash::check($request->old_password, $user->password)) {
                        $fail("Incorrect old password");
                    }
                }
            ];
            $rules['new_password'] = 'required|string|min:6|confirmed';
        }

        if($request->new_password || $request->new_password_confirmation){
            $rules['old_password'] = 'required|string';
        }

        $request->validate($rules);

        $user->update([
            'name' => ucwords($request->full_name),
            'gender' => $request->gender,
        ]);

        if($request->old_password && $request->new_password){
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);    
        }

        return redirect()->back()->with('success', 'Profile updated successfully!!!');
    }

}
