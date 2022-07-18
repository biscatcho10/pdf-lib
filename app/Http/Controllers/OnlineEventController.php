<?php

namespace App\Http\Controllers;

use App\Http\Traits\MeetingZoomTrait;
use App\Models\OnlineEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineEventController extends Controller
{
    use MeetingZoomTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = OnlineEvent::all();
        return view('online-events.index', compact('events'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('online-events.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'host_name' => 'required',
        ]);

        try {
            // create a new online event
            $meeting = $this->createMeeting($request);

            $data = [
                'host_id' => $request->host_id,
                'host_name' => $request->host_name,
                'meeting_id' => $meeting->id,
                'title' => $request->title,
                'description' => $request->description,
                'start_time' => Carbon::parse($request->start_date . ' ' . $request->start_time)->format('Y-m-d H:i:s'),
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ];

            $event = OnlineEvent::create($data);
            return redirect()->route('online-events.index')->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy(Request $request)
    {
        try {
            // delete the meeting from zoom
            $meeting = Zoom::meeting()->find($request->meeting_id);
            $meeting->delete();

            // delete the event from the database
            $event = OnlineEvent::where('meeting_id', $request->meeting_id)->first();
            $event->delete();
            return redirect()->route('online-events.index')->with('success', 'Event deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
