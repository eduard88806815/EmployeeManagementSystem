<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    protected $table = 'employees';

    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'home_address',
        'phone',
        'email',
        'position',
        'date_hired',
        'avatar'
    ];
}
