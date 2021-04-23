<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['full_name', 'other_info', 'phone', 'participant_id'];

    public function raffleItems() {
        return $this->hasMany('App\RaffleItem');
    }
}
