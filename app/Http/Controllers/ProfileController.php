<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ProfileController.php
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('profile', compact('users')); // Mengirim data ke view
    }


    public function update(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:255|unique:users,nik,' . Auth::user()->id,
            'nip' => 'required|string|max:255|unique:users,nip,' . Auth::user()->id,
            'name' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->nik = $request->input('nik');
        $user->nip = $request->input('nip');
        $user->jabatan = $request->input('jabatan');
        $user->email = $request->input('email');


        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return redirect()->back()->withErrors(['current_password' => 'Current password does not match.']);
            }
        }

        // Unggah dan simpan foto profil
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo_path && file_exists(public_path('storage/' . $user->profile_photo_path))) {
                unlink(public_path('storage/' . $user->profile_photo_path));
            }

            // Simpan foto baru
            $filePath = $request->file('photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $filePath;
        }

        $user->save();

        return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    }
}
