@extends('layout.master')

@section('content')

    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Edit message</h4>
        </div>
        <div class="panel-body">
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Mã sinh viên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mã sinh viên"
                    name="username" required value="{{ $account->username }}" disabled>
            </div> --}}
            <form action="{{ route('updateMess', $message) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleInputEmail1">Content</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        name="content" required value="{{ $message->content }}">
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
@endsection
