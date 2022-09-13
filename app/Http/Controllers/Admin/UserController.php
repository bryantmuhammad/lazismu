<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::with('roles')->get();
        $roles  = Role::get();
        if (session()->has('success')) {
            Alert::success('Berhasil', session('success'));
        }
        return view('admin.admin.index', compact('admins', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::get();

        return view('admin.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $user =  User::create($request->all());
        $user->assignRole($request->role);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $role = $user->getRoleNames()[0];

        return response()->json([
            'name'  => $user->name,
            'email' => $user->email,
            'role'  => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, user $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) $user->password = Hash::make($request->password);
        $user->save();
        $user->syncRoles($request->role);

        return redirect()->route('user.index')->with('success', 'User berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        User::destroy($user->id_user);

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
