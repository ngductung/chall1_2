<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Models\TurnInAss;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::query()->get();
        return view('assignment', [
            'assignments' => $assignments,
        ]);
    }

    public function create()
    {
        return view('teacher.createAssignment');
    }

    public function store(StoreAssignmentRequest $request)
    {
        $file = $request->file('file');
        $name = $file->getClientOriginalName();

        // $extension = $file->extension();
        // $extension = strtolower($extension);

        // if (strcmp($extension, 'txt')  !== 0) {
        //     return view('teacher.createAssignment', [
        //         'er' => 0,
        //     ]);
        // }
        Storage::putFileAs('assignments', $file, $name);
        $assignment = new Assignment();
        $assignment->description = $request->get('description');
        $assignment->link = $assignment->getPath($name);
        $assignment->due = $request->get('due');
        $assignment->created_by = session()->get('username');
        $assignment->save();

        return redirect()->route('assignment');
    }

    public function show(Assignment $Assignment, $id)
    {
        $assignment = Assignment::query()->where('id', '=', $id)->first();
        $student = TurnInAss::query()->where('id_Ass', '=', $id)->get();

        return view('detailAss', [
            'assignment' => $assignment,
            'studentSubmit' => $student,
        ]);
    }

    public function edit($IDAss)
    {
        $data = (new Assignment())->getAssignment($IDAss);

        return view('teacher.updateAssignment', [
            'assignment' => $data,
        ]);
    }

    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        $file = $request->file('file');
        $old = Assignment::query()->find($request->id);

        if ($file) {
            $name = $file->getClientOriginalName();
            // $extension = $file->extension();
            // $extension = strtolower($extension);

            // if (strcmp($extension, 'txt')  !== 0) {
            //     $data = (new Assignment())->getAssignment($request->id);
            //     return view('teacher.updateAssignment', [
            //         'assignment' => $data,
            //     ]);
            // }
            Storage::putFileAs('assignments', $file, $name);
            unlink($old->link);
        } else {
            $name = '';
        }

        if ($name !== '') {
            $path = $assignment->getPath($name);
        } else {
            $path = $old->link;
        }
        $old->description = $request->get('description');
        $old->due = $request->get('due');
        $old->link = $path;
        $old->update();
        return redirect()->route('assignment');
    }

    public function destroy(Assignment $assignment, $IdAssignment)
    {
        $assignment = Assignment::query()->where('id', '=', $IdAssignment)->first();
        $assignmentTurnIns = TurnInAss::query()->where('id_Ass', '=', $IdAssignment)->get();
        // dd($assignmentTurnIns);
        foreach ($assignmentTurnIns as $assignmentTurnIn) {
            unlink($assignmentTurnIn->link);
            $assignmentTurnIn->delete();
        }
        unlink($assignment->link);
        $assignment->delete();
        return redirect()->route('assignment');
    }

    public function download($IDAss)
    {
        $path = Assignment::query()->where('id', '=', $IDAss)->first()->link;

        return response()->download($path);
    }
}
