<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnInAss extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'username_turnIn',
        'id_Ass',
        'link',
    ];

    public function getPath($name)
    {
        $path = storage_path('app/turnInAss/' . $name);
        return $path;
    }

    public function getNameFile($path)
    {
        $name = basename($path, '.txt');
        return $name;
    }
}
