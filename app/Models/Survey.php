<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['participant_id','q1','q2','q3','q4','q5'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
