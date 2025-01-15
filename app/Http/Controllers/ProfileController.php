<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Contact;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(){
        $pets = Pet::where('user_id', Auth::id())->get();
        $contacts = Contact::where('user_id', Auth::id())->get();
        $user = User::where('id', Auth::id())->first();
        
        return view('profile', compact('pets', 'contacts', 'user'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Jika ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            // Simpan gambar baru
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
        }

        // Update data pengguna lainnya
        $user->name = $request->name;
        $user->email = $request->email;

        // Simpan perubahan ke database
        $user->save();

        // Response sukses
        return redirect()->route('profile')->with('status', 'Profile Updated');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed', // Validasi untuk password baru dan konfirmasi
            'current_password' => 'required|string', // Validasi untuk password lama
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah password lama yang dimasukkan sesuai
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Your current password is incorrect.']);
        }

        // Update password pengguna dengan password baru
        $user->password = Hash::make($request->new_password);

        // Simpan perubahan ke database
        $user->save();

        // Redirect ke halaman profile dengan status berhasil
        return redirect()->route('profile')->with('status', 'Password updated successfully.');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        DB::beginTransaction();

        try {
            $user->pets()->delete(); 
            $user->contacts()->delete(); 

            $user->delete();

            DB::commit();

            Auth::logout();

            return redirect()->route('/')->with('status', 'Your account has been deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('profile')->withErrors(['status' => 'An error occurred while deleting your account. Please try again.']);
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
