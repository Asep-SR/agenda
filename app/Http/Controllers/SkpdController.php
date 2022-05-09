<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.daftar-skpd.index', [
            'skpd' => Skpd::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.daftar-skpd.create');
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
            'nama' => 'required',
            'alias' => 'required',
        ]);

        Skpd::create($validated);

        return redirect('/dashboard/daftar-skpd')->with('success', 'Berhasil menambahkan SKPD baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Skpd $skpd)
    {
        return view('dashboard.daftar-skpd.edit', [
            'skpd' => $skpd
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skpd $skpd)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alias' => 'required',
        ]);

        Skpd::where('id', $skpd->id)
            ->update($validated);

        return redirect('/dashboard/daftar-skpd')->with('success', 'Berhasil mengubah data SKPD');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skpd $skpd)
    {
        Skpd::destroy($skpd->id);

        return redirect('/dashboard/daftar-skpd')->with('success', 'Berhasil menghapus data SKPD');
    }
}
