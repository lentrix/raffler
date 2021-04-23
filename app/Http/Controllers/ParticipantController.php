<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;

class ParticipantController extends Controller
{
    public function index() {
        $participants = Participant::orderBy('full_name')->get();

        return view('participants.index', compact('participants'));
    }

    public function view(Participant $participant) {
        return view('participants.view', compact('participant'));
    }

    public function update(Participant $participant, Request $request) {
        $this->validate($request, [
            'full_name' => 'required',
            'other_info' => 'required',
        ]);

        $participant->update([
            'full_name' => $request['full_name'],
            'other_info' => $request['other_info'],
            'phone' => $request['phone']
        ]);

        return redirect('/participants');
    }

    public function loadForm() {
        return view('participants.load');
    }

    public function load(Request $request) {
        $file = $request->file('file');
        $data = file_get_contents($file);
        $data = json_decode($data);


        foreach($data as $d) {
            Participant::create([
                'full_name' => $d->full_name,
                'other_info' => $d->other_info
            ]);
        }

        return redirect('/participants');
    }

    /**
     * API Endpoints
     */

    public function getParticipants($exclusive) {

        if($exclusive=="false") $participants = Participant::get();
        else $participants = Participant::whereDoesntHave('raffleItems')->get();

        return $participants;
    }
}
