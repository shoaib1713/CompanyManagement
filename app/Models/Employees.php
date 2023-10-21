<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    protected $table = 'employees';
    protected $fillable = [
        'emp_name',
        'phone',
        'address',
        'dept_id'
    ];
}
