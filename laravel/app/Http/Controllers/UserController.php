<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();

        return view('dashboard.user.user', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.user-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required|not_in:0',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        $validated['password'] = Hash::make($request['password']);

        $user = User::create($validated);

        Alert::success('Success', 'User has been saved !');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);

        return view('dashboard.user.user-edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user_id . ',id_user',
            'role' => 'required|not_in:0',
            'password' => 'nullable',
            'passwordConfirm' => 'nullable|same:password'
        ]);

        if($request->password != ''){
            $user = User::findOrFail($user_id);
            $user->update($validated);
        } else{
            $user = User::findOrFail($user_id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();
        }

        Alert::info('Success', 'Barang has been updated !');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        try {
            $deleteduser = User::findOrFail($user_id);

            $deleteduser->delete();

            Alert::error('Success', 'User has been deleted !');
            return redirect('/users');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, User already used !');
            return redirect('/users');
        }
    }
}
