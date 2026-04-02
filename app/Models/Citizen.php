<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    public function passport()
    {
        return $this->hasOne(Passport::class, 'citizen_id', 'citizen_id');
    }
}
