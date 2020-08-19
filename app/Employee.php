<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'designation', 'adress', 'email', 'phone', 'company'
    ];

    public function company(){
        return $this->hasOne(\App\Company::class);
    }

}
