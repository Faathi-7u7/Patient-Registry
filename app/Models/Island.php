<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    protected $fillable = ['atoll','name']; // Allow mass assignment for the 'name' field

    public function addresses()
    {
        return $this->hasMany(Address::class); // One island can have many addresses
    }
}
