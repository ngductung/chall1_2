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

    public function show($username)
    {
        $dataAccount =  Account::query()->where('username', $username)->first();
        $dataMessage = Message::query()
            ->where('send_user', '=', session()->get('username'))
            ->where('receive_user', '=', $username)
            ->get();

        return view('detail', [
            'account' => $dataAccount,
            'messages' => $dataMessage,
        ]);
    }

    public function edit($username)
    {
        $data =  Account::query()->where('username', $username)->first();
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
            ])
        );
        return redirect()->route('index');
    }

    public function destroy($username)
    {
        $account = Account::query()->where('username', '=', $username)->first();

        // delete message when delete user
        $datas = Message::query()->where('receive_user', '=', $username)->get();
        foreach ($datas as $data) {
            $data->delete();
        }
        $datas = Message::query()->where('send_user', '=', $username)->get();
        foreach ($datas as $data) {
            $data->delete();
        }



        // dd($account);

        //delete assignment submit when delete teacher
        if ($account->role === 1) {
            //get assignment
            $assignments = Assignment::query()->where('created_by', '=', $username)->get();

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
            $turnIns = TurnInAss::query()->where('username_turnIn', '=', $username)->first();
            // dd($turnIns);
            if ($turnIns) {
                unlink($turnIns->link);
                $turnIns->delete();
            }
        }

        //delete user
        Account::query()->where('username', '=', $account->username)->delete();


        return redirect()->route('index');
    }
}
