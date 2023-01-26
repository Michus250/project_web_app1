<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Schedule_visit extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'employee_id',
        'date',
    ];
    protected $table = 'shedule_visits';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function employees()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}
