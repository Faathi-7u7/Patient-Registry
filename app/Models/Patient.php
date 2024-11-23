<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name', 'dob', 'national_id', 'address_id']; // Allow mass assignment for these fields

    public function address()
    {
        return $this->belongsTo(Address::class); // Each patient belongs to one address
    }
}
