<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'description',
        'link',
        'created_by',
        'due',
    ];

    public function getNameUserCreateAss($account_id)
    {
        $account = Account::query()->where('id', '=', $account_id)->first();
        return $account->name;
    }

    public function getAssignment($id)
    {
        $assignment = Assignment::query()->where('id', '=', $id)->first();
        return $assignment;
    }

    public function getNameFile($id)
    {
        $path = Assignment::query()->where('id', '=', $id)->first()->link;
        $name = basename($path, '.txt');
        return $name;
    }

    public function getPath($name)
    {
        $path = storage_path('app/assignments/' . $name);
        return $path;
    }

    public function getDate()
    {
        $date = explode(' ', $this->due);
        return $date[0];
    }
}
