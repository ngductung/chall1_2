<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    public function getPath($name)
    {
        $path = storage_path('app/challenges/' . $name);
        return $path;
    }

    public function getNameFile($id)
    {
        $path = Challenge::query()->where('id', '=', $id)->first()->link;
        $name = basename($path, '.txt');
        return $name;
    }
}
