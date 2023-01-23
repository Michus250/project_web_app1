<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{


 
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'work_hours',
    ];

    public function user()
    {
        return $this->hasOne('App\Model\User');
    }
    public function users_examination()
    {
        return $this->hasMany(Users_examination::class);
    }
}
