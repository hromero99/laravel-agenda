<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CalendarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $events = CalendarEvent::where('user_id', $userId)->get();
        return view('events', [
            'events' => $events,
            'user' => $userId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        \Log::info('Datos del request:', $request->all());

          // Validar los datos del formulario
          $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'description' => 'nullable|string',
            "end_date" => "required|date",
        ]);


        // Agregar el ID del usuario autenticado
        $validated['user_id'] = auth()->id();
        \Log::info('Datos del request:', $validated);
        // Crear el evento
        $event = CalendarEvent::create($validated);
        \Log::info('Evento creado:',['id' => $event->id]);
        $userId = Auth::user()->id;
        $events = CalendarEvent::where('user_id', $userId)->get();
        return view('events', [
            'events' => $events,
            'user' => $userId,
        ]);
    }

    /**
     * Store a new event.
     */
    public function store(Request $request)
    {
        \Log::info('Datos del request:', $request->all());

        // Validar los datos del formulario
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'description' => 'nullable|string',
            "end_date" => "required|date",
        ]);

        // Agregar el ID del usuario autenticado
        $validated['user_id'] = auth()->id();

        try {
            // Crear el evento
            $event = CalendarEvent::create($validated);
            
            return redirect()->route('events.index')
                ->with('success', 'Evento creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al crear el evento')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalendarEvent $calendarEvent)
    {
        //
    }
}
