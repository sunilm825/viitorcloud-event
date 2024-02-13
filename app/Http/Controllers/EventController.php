<?php

namespace App\Http\Controllers;

use App\Events\TestEvents;
use App\Models\EventMessage;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        return view('frontdesk-user.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_username' => 'required|string|max:255',
            'event_name' => 'required|string|max:255',
            'event_message' => 'required|string|max:255',
            // 'event_like' => ''
        ]);

        if (isset($request->event_like)) {
            $validatedData['event_like'] = true;
        }
        
        $eventMessage = EventMessage::create($validatedData);

        TestEvents::broadcast($eventMessage);

        return redirect()->route('index')->with('success', 'Data store successfully!');

    }

    /**
     *  Socket Test
     */
    public function socketTest(Request $request)
    {
        return view('frontdesk-user.socket');
    }
}
