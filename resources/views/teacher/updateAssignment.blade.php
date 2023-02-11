@extends('layout.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

    {{-- @if ($er === 0)
        <div class="alert alert-danger">
            <ul>
                The file must be a file of type: txt.
            </ul>
        </div>
    @endif --}}

    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Update assignment</h4>
        </div>
        <div class="panel-body">
            <form action="{{ route('teacher.updateAss') }}" method="post" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="id" value="{{ $assignment->id }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" name="description" required
                        value="{{ $assignment->description }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload file</label>
                    <input type="file" name="file" class="form-control" id="exampleInputEmail1"
                        value="{{ $assignment->link }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Due</label>
                    <input type="date" name="due" value="{{ $assignment->getDate() }}" class="form-control"
                        id="exampleInputEmail1">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
