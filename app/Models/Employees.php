<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'willing_to_work',
        'languages_known',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    // public function getKnownLanguagesAttribute()
    // {
    //     return $this->hasMany(KnownLanguages::class, 'employee_id', 'id');
    // }
    public function knownLanguages()
    {
        return $this->hasMany(KnownLanguages::class, 'employee_id', 'id');
    }
}
