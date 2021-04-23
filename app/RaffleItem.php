<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaffleItem extends Model
{
    protected $fillable = ['item', 'sponsor', 'value'];

    public function participant() {
        return $this->belongsTo('App\Participant');
    }

}
