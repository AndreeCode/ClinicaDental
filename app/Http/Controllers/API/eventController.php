<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::create([
            'title' => $request->title ?? 'Sin título', // Opcional
            'description' => $request->description ?? 'Sin descripción', // Opcional
            'start' => $request->start,
            'end' => $request->end,
            'user_id' => $request->user_id, // Tomar el usuario autenticado
        ]);
        
        return response()->json([
            'message'=>'hola mundo perfectt',
            'id'=>$event->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event=Event::all();
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);
        $event->update([
            'title' => $validatedData['title'] ?? 'Sin título',
            'description' => $validatedData['description'] ?? 'Sin descripción',
            'start' => $validatedData['start'],
            'end' => $validatedData['end'],
        ]);
    
        return response()->json([
            'message' => 'Evento actualizado correctamente',
            'event' => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        if(!$event){
            return response()->json([
                'error'=>"Evento no encontrado"
            ,404]);
        }
        $event->delete();
        return response()->json([
            'messaje'=>'Evento eliminado correctamente',
        ]);
    }
}
