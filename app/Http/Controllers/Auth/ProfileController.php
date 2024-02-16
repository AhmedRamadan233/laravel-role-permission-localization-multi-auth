<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile; 
        return view('dashboard.pages.profile.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before:today'],
            'gender' => ['in:male,female'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg']
        ]);

        $user = $request->user();
        $profile = $user->profile;


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($profile->image) {
                Storage::delete('public/' . $profile->image);
                $oldImagePath = public_path($profile->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $imagePath = $request->file('image')->store('images', 'public'); 
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imagePath);
            $profile->image = $imagePath;
        }

        $profile->fill($request->except('image'));
        $profile->save();
    

        return redirect()->route('profile.edit')
            ->with('success', 'Profile updated!');
    }
}

