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
            <h4 class="panel-title">Chỉnh sửa thông tin cá nhân</h4>
        </div>
        <div class="panel-body">
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Mã sinh viên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mã sinh viên"
                    name="username" required value="{{ $account->username }}" disabled>
            </div> --}}
            <form action="{{ route('updateMyI4', $account) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $account->id }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mã sinh viên"
                        name="username" value="{{ $account->username }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" name="name" value="{{ $account->name }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="{{ $account->email }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" name="phone" value="{{ $account->phone }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Số điện thoại">
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
@endsection
