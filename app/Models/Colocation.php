<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];
    public function members()
    {
        return $this->belongsToMany(User::class, 'colocation_users')
            ->withPivot(['role', 'joined_at', 'left_at'])
            ->withTimestamps();
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
