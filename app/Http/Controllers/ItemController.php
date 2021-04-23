<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RaffleItem;

class ItemController extends Controller
{
    public function index() {
        $items = RaffleItem::orderBy('item')->get();

        return view('items.index', compact('items'));
    }

    public function view(RaffleItem $item) {
        return view('items.view', compact('item'));
    }

    public function update(RaffleItem $item, Request $request) {
        $this->validate($request, [
            'item' => 'required',
            'sponsor' => 'required',
            'value' => 'required|numeric'
        ]);

        $item->update([
            'item' => $request['item'],
            'sponsor' => $request['sponsor'],
            'value' => $request['value'],
        ]);

        return redirect('/items');
    }

    /**
     * API endpoints
     */

    public function getAvailable() {
        return RaffleItem::where('participant_id',null)->orderBy('item')->get();
    }
}
