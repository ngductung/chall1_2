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
            <h4 class="panel-title">Thêm tài khoản</h4>
        </div>
        <div class="panel-body">
            <form action="{{ route('teacher.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Mã sinh viên</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Mã sinh viên"
                        name="username" required value="{{ old('maSV') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input required type="text" name="name" required value="{{ old('name') }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <label>
                        <div class="radio">
                            <span class="">
                                <input type="radio" name="role" value="1" checked="">
                            </span>
                        </div> Giáo viên
                    </label>
                    <label>
                        <div class="radio">
                            <span class="">
                                <input type="radio" name="role" value="0" checked="">
                            </span>
                        </div> Học sinh
                    </label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
@endsection
