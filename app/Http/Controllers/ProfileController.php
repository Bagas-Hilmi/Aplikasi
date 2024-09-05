<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function create()
    {
        return view('pages.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not authenticated.');
        }

        $attributes = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required',
            'phone' => 'required|max:14',
            'about' => 'required|max:150',
            'location' => 'required'
        ]);
            DB::table('users')
                ->where('id', $user->id)
                ->update($attributes);

                $user = User::find($user->id);
            Auth::setUser($user);

            return back()->with('status', 'Profile successfully updated.');        
    }
}