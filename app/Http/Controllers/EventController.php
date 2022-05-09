<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('dashboard.agenda-harian.index');
    }

    public function storeEvent(Request $request)
    {
        $event = new Event;
        $event->title = $request->namaAgenda;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect()->back()->with('success', 'Berhasil menambahkan agenda baru');
    }
}