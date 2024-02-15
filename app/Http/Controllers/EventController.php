<?php

namespace App\Http\Controllers;

use App\Events\TestEvents;
use App\Models\Employee;
use App\Models\EventMessage;
use App\Models\Comment;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        return view('frontdesk-user.index');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData_comment = $request->validate([
            'unique_id' => 'string|max:255',
            'sender_name' => 'string|max:255',
            'socket_id' => 'string|max:255',
            'comment' => 'string|max:255',
        ]);

        $validatedData_employee = $request->validate([
            'receiver_name' => 'string|max:255',
            'sender_name' => 'string|max:255',
            'unique_id' => 'string|max:255',
            'device_id' => 'string|max:255',
            'likes' => 'string|max:255',
        ]);

        // if (isset($request->event_like)) {
        //     $validatedData['event_like'] = true;
        // }
        
        Comment::create($validatedData_comment);
        Employee::create($validatedData_employee);

        event(new TestEvents($request->toArray()));
        // TestEvents::broadcast($request->all());

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
