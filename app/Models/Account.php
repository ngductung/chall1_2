<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'phone',
        'role',
    ];

    public function getRole()
    {
        if ($this->role === 1) {
            return 'Teacher';
        } else {
            return 'Student';
        }
    }

    public function getName($username)
    {
        return $this->query()->where('username', '=', $username)->get('name');
    }
}
