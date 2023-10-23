<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class AccountController extends Controller
{
    public function my_account() {
        return view('layouts.admin.accounts.my_account');
    }

    public function index() {
        $users = User::all();
        return view('layouts.admin.accounts.users', compact('users'));
    }

    public function create() {
        return view('layouts.admin.accounts.create_account');
    }

    public function store(UserRequest $userRequest): RedirectResponse {
        $request = json_decode(json_encode($userRequest->validated()));
        $address = Address::create([
            'country' => $request->country ?? null,
            'region' => $request->region ?? null,
            'district' => $request->district ?? null,
            'province_state' => $request->province_state ?? null,
            'municipality_city' => $request->municipality_city ?? null,
            'barangay' => $request->barangay ?? null,
            'street_name' => $request->street_name ?? null,
            'building_no' => $request->building_no ?? null,
            'postal_code' => $request->postal_code ?? null,
            'plot_identification' => $request->plot_identification ?? null,
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'password' => $request->password,
            'active' => $request->active ?? 'inactive' ,
            'role' => $request->role,
            'address_id' => $address->id,
        ]);

        return Redirect::route('admin.accounts.users.index')->with('success','New User successfully added!');
    }

    public function update(UserRequest $userRequest, User $user) {
        $request = json_decode(json_encode($userRequest->validated()));
        // updating address
        $address = Address::findOrfail($user->address->id);
        $address->country  = $request->country ?? null;
        $address->region  = $request->region ?? null;
        $address->district  = $request->district ?? null;
        $address->province_state  = $request->province_state ?? null;
        $address->municipality_city  = $request->municipality_city ?? null;
        $address->barangay  = $request->barangay ?? null;
        $address->street_name  = $request->street_name ?? null;
        $address->building_no  = $request->building_no ?? null;
        $address->postal_code  = $request->postal_code ?? null;
        $address->plot_identification  = $request->plot_identification ?? null;
        $address->save();

        // update user information
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->password = $request->password;
        $user->active = $request->active ?? 'inactive';
        $user->role = $request->role;
        $user->address_id = $address->id;
        $user->save();

        return Redirect::route('admin.accounts.users.index')->with('success','User successfully updated!');
    }

    public function edit(User $user): View {
        return view('layouts.admin.accounts.edit_account', ['user' => $user]);
    }

    public function destroy(User $user): RedirectResponse {
        $user->delete();
        return Redirect::route('admin.accounts.users.index')->with('success','User successfully deleted!');
    }

    // admin module
    public function update_profile(Request $request) {
        $this->validate($request, [
            'file' => ['required','mimes:png,jpg']
        ], [
            'file.required' => 'Opps! Something went wrong in your request. Kindly check your file then try again.'
        ]);

        $path = $request->file('file')->store('public/profiles');
        


        $user = User::findOrFail(auth()->user()->id);
        // delete file in local disk
        if($user->profile) {
            Storage::delete($user->profile);
        }
        $user->profile = $path;
        $user->save();

        return Redirect::route('admin.accounts.my-account')->with('success','Profile successfully updated!');
    }

    public function edit_personal() {

        return view('layouts.admin.accounts.edit_admin_info', ['user' => auth()->user()]);
    }

    public function update_personal(UserRequest $request) {

        $validated = json_decode(json_encode($request->validated()));
        $user = User::findOrFail(auth()->user()->id);
        $user->firstname = $validated->firstname;
        $user->lastname = $validated->lastname;
        $user->email = $validated->email;
        $user->mobile_no = $validated->mobile_no;
        $user->save();
        return Redirect::route('admin.accounts.my-account')->with('success','Personal information successfully updated!');

    }

    public function edit_address() {

        return view('layouts.admin.accounts.edit_admin_address', ['user' => auth()->user()]);
    }

    public function update_address(UserRequest $request) {

        $validated = json_decode(json_encode($request->validated()));
        // updating address
        $address = Address::findOrfail(auth()->user()->address->id);
        $address->country  = $validated->country ?? null;
        $address->region  = $validated->region ?? null;
        $address->district  = $validated->district ?? null;
        $address->province_state  = $validated->province_state ?? null;
        $address->municipality_city  = $validated->municipality_city ?? null;
        $address->barangay  = $validated->barangay ?? null;
        $address->street_name  = $validated->street_name ?? null;
        $address->building_no  = $validated->building_no ?? null;
        $address->postal_code  = $validated->postal_code ?? null;
        $address->plot_identification  = $validated->plot_identification ?? null;
        $address->save();
        
        return Redirect::route('admin.accounts.my-account')->with('success','Address successfully updated!');

    }
    
}

