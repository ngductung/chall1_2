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

    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Add new assignment</h4>
        </div>
        <div class="panel-body">
            <form action="{{ route('teacher.storeAssignment') }}" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" name="description"
                        value="{{ old('description') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload file</label>
                    <input required type="file" name="file" class="form-control" id="exampleInputEmail1"
                        value="{{ old('file') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hạn nộp</label>
                    <input type="date" name="due" class="form-control" id="exampleInputEmail1" required
                        value="{{ old('due') }}">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
@endsection
