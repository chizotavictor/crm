<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'logo', 'name', 'address'  
    ];

    public function user() {
        return $this->hasMany(\App\Employee::class);
    }
}
