<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user_profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // VALIDASI INPUT
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email,' . $user->id,
            'is_active'             => 'required|in:0,1',
            'profile_photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password'              => 'nullable|min:6|confirmed',
        ]);

        // UPDATE NAME + EMAIL + STATUS
        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->is_active = $request->is_active;

        // UPDATE FOTO PROFIL
        if ($request->hasFile('profile_photo')) {

            // Hapus foto lama kalau bukan default
            if ($user->profile_photo_path && Storage::exists('public/profile/' . $user->profile_photo_path)) {
                Storage::delete('public/profile/' . $user->profile_photo_path);
            }

            $newFile = $request->file('profile_photo');
            $fileName = time() . '-' . $newFile->getClientOriginalName();

            // simpan ke storage/app/public/profile
            $newFile->storeAs('public/profile', $fileName);

            // simpan nama file ke database
            $user->profile_photo_path = $fileName;
        }

        // UPDATE PASSWORD (JIKA DIISI)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
