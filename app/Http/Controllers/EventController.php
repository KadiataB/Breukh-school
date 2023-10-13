<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreEventRequest;
// use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Event::create([
            "libelle"=>$request->libelle,
            "description"=>$request->description,
            "date"=>$request->date,
            "user_id"=>$request->user_id

        ]);
    }

    public function getParticipant($classeId, $eventId)
    {
        return Participant::where('classes_id', $classeId)
            ->where('event_id', $eventId)
            ->first();

    }

    public function addParticipants(Request $request, $idEvent)
    {

        $participant = $this->getParticipant($request->classes_id, $idEvent);

        if ($participant) {
            echo "id Participant : " . $participant->id. "  "."déjà ajouté.";
        } else {
            return Participant::create([
                "event_id"=>$idEvent,
                "classes_id"=>$request->classes_id

            ]);

        }


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
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
