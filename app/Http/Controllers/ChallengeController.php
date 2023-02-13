<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function create()
    {
        return view('teacher.createChall', [
            'er' => 1,
        ]);
    }

    public function store(StoreChallengeRequest $request)
    {

        $file = $request->file('file');
        $name = strtolower($file->getClientOriginalName());

        $extension = $file->extension();
        $extension = strtolower($extension);
        if (strcmp($extension, 'txt')  !== 0) {
            return view('teacher.createChall', [
                'er' => 0,
            ]);
        }

        $challenge = new Challenge();
        $challenge->challName = $request->get('name');
        $challenge->hint = $request->get('hint');
        $challenge->save();

        $challID = $challenge->id;
        $name = $challID . '_' . $name;
        $challenge->link = $challenge->getPath($name);
        $challenge->update();

        Storage::putFileAs('challenges', $file, $name);
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
        $answer = strtolower($request->get('answer'));

        $fileName = $idChall . '_' . $answer . '.txt';
        $path = storage_path('app/challenges/' . $fileName);

        if (!File::exists($path)) {
            return view('showStatus', [
                'status' => 0,
                'id' => $idChall,
            ]);
        } else {
            $content = file_get_contents($path);
            return view('showStatus', [
                'status' => 1,
                'content' => $content,
            ]);
        }
    }
}
