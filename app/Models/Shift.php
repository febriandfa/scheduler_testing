<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shifts';

    protected $fillable = [
        'name',
        'start_hour',
        'end_hour',
    ];

    public function working_dates() {
        return $this->hasMany(Date::class, 'shift_id', 'id');
    }
}
