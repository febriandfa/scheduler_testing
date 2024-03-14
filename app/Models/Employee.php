<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'status'
    ];

    public function working_dates() {
        return $this->hasMany(Date::class, 'employee_id', 'id');
    }
}
