<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use App\Models\User;
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
        return view('dashboard.manajemen-user.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skpd = Skpd::select('id', 'nama')->get();

        return view('dashboard.manajemen-user.create', [
            'skpd' => $skpd,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $validated['password'] = bcrypt($request->password);

        $validated['skpd_id'] = $request->skpd;

        User::create($validated);

        return redirect('/dashboard/manajemen-user')->with('success', 'Berhasil menambahkan user baru');
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
        $skpd = Skpd::select('id', 'nama')->get();

        return view('dashboard.manajemen-user.edit', [
            'user' => $user,
            'skpd' => $skpd
        ]);
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
        $rules = [
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
        ];

        if($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validated = $request->validate($rules);

        $validated['password'] = bcrypt($request->password);

        $validated['skpd_id'] = $request->skpd;

        User::where('id', $user->id)
            ->update($validated);

        return redirect('/dashboard/manajemen-user')->with('success', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/manajemen-user')->with('success', 'Berhasil menghapus user');
    }

    public function setting()
    {
        return view('dashboard.setting.index', [
            'user' => auth()->user()
        ]);
    }

    public function settingStore(Request $request)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
        ];

        if($request->email != auth()->user()->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validated = $request->validate($rules);

        $validated['password'] = bcrypt($request->password);

        User::where('id', auth()->user()->id)
            ->update($validated);

        return redirect('/dashboard/setting')->with('success', 'Berhasil mengubah user');
    }
}
