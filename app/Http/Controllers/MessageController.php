<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{
    public function index()
    {
        $messages = (new Message())->query()
        ->where('receive_user_id','=',session()->get('id'))
        ->get();
        return view('messageIndex', [
            'messages' => $messages
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreMessageRequest $request, $receive_user_id)
    {
        $message = new Message();
        $message->receive_user_id = $receive_user_id;
        $message->send_user_id = session()->get('id');
        $message->content = $request->get('message');
        $message->save();

        return redirect()->back();
    }

    public function show($message)
    {

    }

    public function edit($messageID)
    {
        $message = Message::query()->where('id', $messageID)->first();
        return view('updateMess', [
            'message' => $message,
        ]);
    }

    public function update(UpdateMessageRequest $request, $messageID)
    {
        Message::query()
            ->where('id', '=', $messageID)
            ->update($request->except([
                '_token',
                '_method',
            ]));
        $username = Message::query()->where('id', '=', $messageID)->first();
        // dd($username->receive_user);
        return redirect()->route('detail', $username->receive_user_id);
    }

    public function destroy($messageID)
    {
        Message::query()
            ->where('id', '=', $messageID)
            ->delete();
        return redirect()->back();
    }
}
