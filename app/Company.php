<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'phone', 'website'
    ];

    public function employee(){
        return $this->hasMany(\App\Employee::class);
    }
}
