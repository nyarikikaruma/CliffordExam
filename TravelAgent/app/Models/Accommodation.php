<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory, Uuids;

    protected $fillable = ['name', 'description', 'rates'];

    public function contract() {

        return $this->belongsTo(Contract::class);
    }
}
