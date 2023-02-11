<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'send_user',
        'receive_user',
        'content',
    ];

    public function getNameUserSender($send_user)
    {
        $account = new Account();
        $name = $account->query()->where('username', '=', $send_user)->first();
        // dd($name->name);
        return $name->name;
    }
}
