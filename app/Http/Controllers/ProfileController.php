<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->all());
        $user->image = $this->updateUserImage($request, $user);
        $user->save();
    }

    /**
     * Delete the user's account.
     */
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

    public function updateUserImage($request, $user)
    {
        $imagePath = 'uploads/users-images/';
        if($request->avatar_remove == '1'){
            $path = $imagePath . $user->image;
            if(Storage::disk('public')->exists($path)){
                Storage::disk('public')->delete($path);
                return null;
            }
        }

        if (Arr::has($request->all(), 'image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = $imagePath. $fileName;
            Storage::disk('public')->put($path, file_get_contents($file));
            return $fileName;
        }
    }

    public function resetPassword(Request $request)
    {
        $newpassword = Hash::make($request->newpassword);
        $user = User::findOrFail($request->id);
        if(Hash::check($request->get('currentpassword'), $user->password)){
            $user->update(['password'=> $newpassword]);
            return redirect()->back()->with('message', [
                'type' => 'success',
                'text' => 'Password Updated Successfully',
            ]);
        }else{
            return redirect()->back()->with('message', [
                'type' => 'error',
                'text' => 'password is not correct',
            ]);
        }
    }
}
