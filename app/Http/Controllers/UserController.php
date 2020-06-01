<?php

namespace App\Http\Controllers;
use App\User;
use App\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('role');
        return view('users.index', ['users' => $users]);
    }

    public function validation()
    {
        $users = User::query()->where('role', '=', User::DEFAULT)->get();
        return view('users.validation', ['users' => $users]);
    }

    public function editRole(User $user)
    {
        $roles = User::ROLES;
        return view('users.editrole', ['user'=>$user], ['roles' => $roles]);
    }

    public function updateRole($id, Request $request)
    {
        $user = User::find($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('validation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = User::ROLES;
        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = User::ROLES;
        return view('users.edit', ['user'=>$user], ['roles' => $roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users/index');
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if(Hash::check($request->password, $user->password))
        {
            if($request->new_password === $request->password_confirmation)
            {
                $user->password = Hash::make($request->new_password);
                $user->save();
            }
        }

        return redirect()->back();
    }
}
