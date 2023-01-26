<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Users_examination;

class Employee extends Model
{


 
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'work_hours',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id');
    }
    public function users_examinations()
    {
        return $this->hasMany(Users_examination::class);
    }
}
