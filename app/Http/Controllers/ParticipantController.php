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
}
