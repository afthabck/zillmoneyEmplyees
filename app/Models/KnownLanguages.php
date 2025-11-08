<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnownLanguages extends Model
{
    protected $fillable = [
        'employee_id',
        'language_id',
    ];
    public function language()
    {
        return $this->belongsTo(Languages::class, 'language_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id', 'id');
    }
}
