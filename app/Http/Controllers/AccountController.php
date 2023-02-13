<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Assignment;
use App\Models\Challenge;
use App\Models\Message;
use App\Models\TurnInAss;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('index', [
            'accounts' => Account::query()->paginate(10),
        ]);

        // if (session()->get('role') === 1) {
        //     return view('teacher.index', [
        //         'accounts' => Account::query()->paginate(10),
        //     ]);
        // } else {
        //     return view('student.index', [
        //         'accounts' => Account::query()->paginate(10),
        //     ]);
        // }
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(StoreAccountRequest $request)
    {
        $account = (new Account())->fill($request->except(
            '_method',
            '_token',
        ));
        $account->save();
        return redirect()->route('index');
    }

    public function show($username_id)
    {
        $dataAccount =  Account::query()->where('id', '=', $username_id)->first();
        $dataMessage = Message::query()
            ->where('send_user_id', '=', session()->get('id'))
            ->where('receive_user_id', '=', $username_id)
            ->get();

        return view('detail', [
            'account' => $dataAccount,
            'messages' => $dataMessage,
        ]);
    }

    public function edit($username_id)
    {
        $data =  Account::query()->where('id', '=', $username_id)->first();
        return view('teacher.update', [
            'account' => $data,
        ]);
    }

    public function editMyI4()
    {
        $data =  Account::query()->where('id', session()->get('id'))->first();
        return view('updateMyI4', [
            'account' => $data,
        ]);
    }

    public function updateMyI4(UpdateAccountRequest $request, Account $account)
    {
        if (session()->get('role') === 1) {
            // Account::query()->where('username', $request->get('username'))
            //     ->update($request->except([
            //         '_token',
            //         '_method',
            //     ]));
            $account =  Account::query()->where('id', '=', $request->get('id'))->first();
            $account->username = $request->get('username');
            $account->name = $request->get('name');
            $account->email = $request->get('email');
            $account->phone = $request->get('phone');
            $account->update();
        } else {
            $account =  Account::query()->where('id', '=', $request->get('id'))->first();
            $account->email = $request->get('email');
            $account->phone = $request->get('phone');
            $account->update();
        }
        return redirect()->back();
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account = Account::query()->where('id', '=', $request->get('id'))->first();
        $account->update(
            $request->except([
                '_token',
                '_method',
                'role',
            ])
        );
        return redirect()->route('index');
    }

    public function destroy($username_id)
    {
        $account = Account::query()->where('id', '=', $username_id)->first();

        // delete message when delete user
        $datas = Message::query()->where('receive_user_id', '=', $username_id)->get();
        foreach ($datas as $data) {
            $data->delete();
        }
        $datas = Message::query()->where('send_user_id', '=', $username_id)->get();
        foreach ($datas as $data) {
            $data->delete();
        }



        // dd($account);

        //delete assignment submit when delete teacher
        if ($account->role === 1) {
            //get assignment
            $assignments = Assignment::query()->where('created_by', '=', $account->id)->get();

            //delete assignment turn in by student by assignment->id
            foreach ($assignments as $assignment) {
                unlink($assignment->link);
                TurnInAss::query()->where('id_Ass', '=', $assignment->id)->delete();
            }

            foreach ($assignments as $assignment) {
                $assignment->delete();
            }
        }

        //delete assignment turnin when delete user
        if ($account->role === 0) {
            $turnIns = TurnInAss::query()->where('userID_turnIn', '=', $account->id)->first();
            // dd($turnIns);
            if ($turnIns) {
                unlink($turnIns->link);
                $turnIns->delete();
            }
        }

        //delete user
        Account::query()->where('id', '=', $username_id)->delete();


        return redirect()->route('index');
    }
}
