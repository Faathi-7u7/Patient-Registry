<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street', 'city', 'state', 'island_id']; // Allow mass assignment for these fields

    public function island()
    {
        return $this->belongsTo(Island::class); // Each address belongs to one island
    }

    public function patients()
    {
        return $this->hasMany(Patient::class); // One address can have many patients
    }
}