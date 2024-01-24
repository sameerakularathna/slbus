<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Session;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    public function storeRole(Request $request): RedirectResponse
    {
        $newRole=$request->role;
        //dd($newRole);
        $roleDetails = Role::where('name', $newRole)->first();
        if($roleDetails == null ){
            Role::create(['name' => $request->role]);
            Session::flash('RoleSuccess', 'New role has been successfully stored');
                //log
                //$log = new log();
                //$log->user= Auth::user()->name ."(". Auth::user()->email.")";
                //$log->description= Auth::user()->name ." ".'create role of'." ".$newRole;
                //$log->save();
                //log
            return redirect()->route('rolestore');
        } else{
            Session::flash('RoleUnsuccess', 'The new role is already exist');
            return redirect()->route('rolestore');
        }
    }
    public function storePer(Request $request): RedirectResponse
    {
        $newPer=$request->per;
        //dd($newPer);
        $roleDetails = Permission::where('name', $newPer)->first();
        if($roleDetails == null ){
            Permission::create(['name' => $request->per]);
            Session::flash('PerSuccess', 'New Permission has been successfully stored');
            //log
            //$log = new log();
            //$log->user= Auth::user()->name ."(". Auth::user()->email.")";
            //$log->description= Auth::user()->name ." ".'create permition of'." ".$newPer;
            //$log->save();
            //log
            return redirect()->route('access');
        } else{
            Session::flash('PerUnsuccess', 'The new Permission is already exist');
            return redirect()->route('perstore');
        }
    }
}
