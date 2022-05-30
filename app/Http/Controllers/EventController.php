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

    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->namaAgenda;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect()->back()->with('success', 'Berhasil menambahkan agenda baru');
    }

    public function fetch()
    {
        $events = Event::all();

        return response()->json($events);
    }

    public function update(Request $request, Event $event)
    {
        Event::where('id', $event->id)
            ->update([
                'title' => $request->namaAgenda,
                'start' => $request->start,
                'end' => $request->end
            ]);

        return redirect('/dashboard/agenda-harian')->with('success', 'Berhasil mengubah data Agenda');
    }

    public function destroy(Event $event)
    {
        Event::destroy($event->id);

        return redirect('/dashboard/agenda-harian')->with('success', 'Berhasil menghapus data Agenda');
    }
}
