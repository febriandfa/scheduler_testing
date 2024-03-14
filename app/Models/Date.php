<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $table = 'dates';

    protected $fillable = [
        'date',
        'employee_id',
        'shift_id'
    ];

    public function employees() {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function shifts() {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }
}
