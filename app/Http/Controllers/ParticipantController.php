<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Visit;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::orderBy('id','desc')->paginate(15);
        return view('participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('participants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'paterno' => 'required|string|max:100',
            'materno' => 'nullable|string|max:100',
            'ciudad' => 'nullable|string|max:100',
            'municipio' => 'nullable|string|max:100',
            'sexo' => 'required|in:M,F,O',
            'correo' => 'required|email|unique:participants,correo',
        ]);

        $participant = Participant::create($data);
        $participant->qr_code = 'FRANCO-' . str_pad($participant->id, 6, '0', STR_PAD_LEFT);
        $participant->save();

        return redirect()->route('participants.show', $participant);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $participant = Participant::findOrFail($id);
        return view('participants.show', compact('participant'));
    }

    /**
     * Log a visit when QR is scanned (code + stand query params)
     */
    public function visit(Request $request)
    {
        $code = $request->query('code');
        $stand_id = $request->query('stand');
        if (!$code || !$stand_id) {
            return response('Faltan parámetros', 400);
        }
        $participant = Participant::where('qr_code', $code)->first();
        if (!$participant) {
            return response('Participante no encontrado', 404);
        }
        Visit::create([
            'participant_id' => $participant->id,
            'stand_id' => $stand_id,
        ]);
        return response('Visita registrada');
    }

    public function edit(string $id)
    {
        $participant = Participant::findOrFail($id);
        return view('participants.edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $participant = Participant::findOrFail($id);
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'paterno' => 'required|string|max:100',
            'materno' => 'nullable|string|max:100',
            'ciudad' => 'nullable|string|max:100',
            'municipio' => 'nullable|string|max:100',
            'sexo' => 'required|in:M,F,O',
            'correo' => 'required|email|unique:participants,correo,' . $participant->id,
        ]);
        $participant->update($data);
        return redirect()->route('participants.show', $participant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
        return redirect()->route('participants.index');
    }
}
