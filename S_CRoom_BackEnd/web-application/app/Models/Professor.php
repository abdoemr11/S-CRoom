<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Professor extends Authenticatable
{

    use HasFactory;
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
