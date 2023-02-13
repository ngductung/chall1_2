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

    public function getNameUserbyID($userID_turnIn)
    {
        $account = Account::query()->where('id', '=', $userID_turnIn)->first();
        return $account->name;
    }

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
