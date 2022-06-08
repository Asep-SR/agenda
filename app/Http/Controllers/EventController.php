<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $event->file = $request->file('file')->store('files', 'public');
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

    public function getNamaSkpd(Request $request)
    {
        $event = Event::find($request->eventId)->user->skpd->nama;
        return response()->json($event);
    }

    public function getUrlFile(Request $request)
    {
        $file = Event::find($request->eventId)->file;

        if ($file != null)
        {
            $url = Storage::url($file);
            return response()->json($url);
        } else {
            return response()->json($file);
        }
    }
}
