<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'colocation_id',
        'from_colocationUser_id',
        'to_colocationUser_id',
        'amount',
        'paid_at'
    ];
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
    public function fromMember()
    {
        return $this->belongsTo(ColocationUser::class, 'from_colocationUser_id');
    }
    public function toMember()
    {
        return $this->belongsTo(ColocationUser::class, 'to_colocationUser_id');
    }
}
