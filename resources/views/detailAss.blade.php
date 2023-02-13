@extends('layout.master')

@section('content')
    <div class="">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail assignment</h4>
            </div>
            <div class="modal-body">
                <h4>Description</h4>
                {{ $assignment->description }}
                <br><br>
                <hr>
                <h4>Due</h4>
                {{ $assignment->due }}
                <br><br>
                <hr>
                <h4>File</h4>
                <div class="fa-hover col-md-3 col-sm-4">
                    <a href="{{ route('downloadAssignment', $assignment->id) }}">
                        <i class="fa fa-file-word-o" aria-hidden="true"></i>
                        {{ $assignment->getNameFile($assignment->id) }}
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('assignment') }}" class="btn btn-info" data-dismiss="modal">Back</a>
                @if (session()->get('role') === 0)
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Turn in</button>
                @endif
            </div>
        </div>

        @if (session()->get('role') === 1)
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Danh sách sinh viên đã làm bài {{ $assignment->description }}</h4>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Time submit</th>
                                    <th>File</th>
                                    <th>Student</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentSubmit as $student)
                                    <tr>
                                        <td>{{ $student->created_at }}</td>
                                        <td>
                                            <a href="{{ route('teacher.downloadAss', $student->id) }} ">
                                                {{ $student->getNameFile($student->link) }}
                                            </a>
                                        </td>
                                        <td>{{ $student->getNameUserbyID($student->userID_turnIn) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        @endif
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Assignment: {{ $assignment->description }}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student.turnInAss') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" name="id_Ass" value="{{ $assignment->id }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Turn in</label>
                            <input type="file" name="file" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Due</label>
                            <input type="date" name="due" value="{{ $assignment->getDate() }}" class="form-control"
                                id="exampleInputEmail1" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Turn in</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
