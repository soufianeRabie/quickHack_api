<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atts = Event::all();
        return response()->json(['atts' => $atts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function validat(Event $event)
    {
        $event->isValid = true ;
        $event->save();
        return response()->json(['event'=>$event]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newAtts = Event::create($request->post());
        return response()->json(['event' => $newAtts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $fillable = $request->post();
        $event->fill($fillable);

        $event->save();

        return response()->json(['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(true);
    }
}
