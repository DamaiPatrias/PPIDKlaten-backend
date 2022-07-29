<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/admin', [
            'title' => 'Admin',
            'active' => 'admin',
            'data_admin' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateAdmin = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required'
        ]);

        // return $validateAdmin;
        // $validateAdmin['level'] = $request->level;

        $validateAdmin['password'] = Hash::make($validateAdmin['password']);

        User::create($validateAdmin);

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateAdmin = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required'
        ]);

        $validateAdmin['password'] = Hash::make($validateAdmin['password']);

        User::where('id', $user->id)
            ->update($validateAdmin);

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy('id', $user->id);

        return redirect('/user');
    }
}
