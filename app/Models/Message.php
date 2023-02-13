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

    public function getNameUserSender($send_user_id)
    {
        // $account = new Account();
        $account = (new Account())::query()->where('id', '=', $send_user_id)->first();
        // dd($name->name);
        return $account->name;
    }
}
