<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['participant_id','stand_id','visit_time'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }
}
