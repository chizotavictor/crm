<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'company_id', 'name',  'email',  'phone_number'
    ];

    public function company() {
        return $this->belongsTo(\App\Company::class, 'company_id');
    }
}
