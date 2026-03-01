<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'title',
        'amount',
        'colocation_id',
        'categorie_id',
        'payer_colocationuser_id'
    ];
    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }
    public function payer()
    {
        return $this->belongsTo(ColocationUser::class, 'payer_colocationuser_id');
    }
}
