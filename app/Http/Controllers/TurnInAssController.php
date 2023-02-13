<?php

namespace App\Http\Controllers;

use App\Models\TurnInAss;
use App\Http\Requests\StoreTurnInAssRequest;
use App\Http\Requests\UpdateTurnInAssRequest;
use App\Models\Assignment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TurnInAssController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreTurnInAssRequest $request)
    {
        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();
        $assignment = new Assignment();
        $name = $assignment->getNameFile($request->get('id_Ass'));

        $name = session()->get('username') . '_' . $name . '.' . $extension;
        $turnInAss = new TurnInAss();
        $path = $turnInAss->getPath($name);
        if (!File::exists($path)) {
            $turnInAss->userID_turnIn = session()->get('id');
            $turnInAss->id_Ass = $request->get('id_Ass');
            $turnInAss->link = $path;
            Storage::putFileAs('turnInAss', $file, $name);
            $turnInAss->save();
        } else {
            $old = TurnInAss::query()->where('link', '=', $path)->first();
            $old->userID_turnIn = session()->get('id');
            $old->id_Ass = $request->get('id_Ass');
            $old->link = $path;
            Storage::putFileAs('turnInAss', $file, $name);
            $turnInAss->update();
        }
        return redirect()->route('assignment');
    }

    public function show($IdAss)
    {
        $data = TurnInAss::query()->where('id_Ass', '=', $IdAss);
        return $data;
    }

    public function edit(TurnInAss $turnInAss)
    {
        //
    }

    public function update(UpdateTurnInAssRequest $request, TurnInAss $turnInAss)
    {
        //
    }

    public function destroy(TurnInAss $turnInAss)
    {
        //
    }

    public function download($IdTurnIn)
    {
        // dd($IdTurnIn);
        $path = TurnInAss::query()->where('id', '=', $IdTurnIn)->first()->link;

        return response()->download($path);
    }
}
