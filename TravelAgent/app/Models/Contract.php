<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory, Uuids;

    protected $fillable = ['name', 'rates', 'agent_id', 'start_date', 'end_date', 'accommodation_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
