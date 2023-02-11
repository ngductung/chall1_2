<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenge = Challenge::query()->get();
        // dd($challenge);
        return view('challenge', [
            'challenges' => $challenge,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.createChall', [
            'er' => 1,
        ]);
    }

    public function store(StoreChallengeRequest $request)
    {

        $file = $request->file('file');
        $name = $file->getClientOriginalName();

        $extension = $file->extension();
        $extension = strtolower($extension);
        if (strcmp($extension, 'txt')  !== 0) {
            return view('teacher.createChall', [
                'er' => 0,
            ]);
        }

        Storage::putFileAs('challenges', $file, $name);
        $challenge = new Challenge();
        $challenge->challName = $request->get('name');
        $challenge->link = $challenge->getPath($name);
        $challenge->hint = $request->get('hint');
        $challenge->save();

        return redirect()->route('challenge');
    }

    public function show($IdChallenge)
    {
        $data = Challenge::query()->where('id', '=', $IdChallenge)->first();
        return view('detailChall', [
            'data' => $data,
        ]);
    }

    public function edit(Challenge $challenge)
    {
        //
    }

    public function update(UpdateChallengeRequest $request, Challenge $challenge)
    {
        //
    }

    public function destroy(Request $request)
    {
        $idChall = $request->get('idChall');
        $challenge = Challenge::query()->where('id', '=', $idChall)->first();
        unlink($challenge->link);
        $challenge->delete();
        return redirect()->back();
    }

    public function processFlag(Request $request, $idChall)
    {
        $chall = Challenge::query()->where('id', '=', $idChall)->first();
        $answer = strtolower($request->get('answer'));

        $flag = strtolower((new Challenge())->getNameFile($chall->id));

        if (strcmp($flag, $answer) === 0) {
            $file = fopen($chall->link, 'r');
            $content = fread($file, filesize($chall->link));
            return view('showStatus', [
                'status' => 1,
                'linkFile' => $chall->link,
                'content' => $content,
            ]);
        } else {
            return view('showStatus', [
                'status' => 0,
                'id' => $idChall,
            ]);
        }
    }
}
