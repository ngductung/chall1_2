@extends('layout.master')

@section('content')
    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Thông tin sinh viên</h4>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã sinh viên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mã sinh viên" name="maSV"
                    required value="{{ $account->username }}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Họ và tên</label>
                <input type="text" name="name" required value="{{ $account->name }}" class="form-control"
                    id="exampleInputEmail1" placeholder="Họ và tên" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" required value="{{ $account->email }}" class="form-control"
                    id="exampleInputEmail1" placeholder="Email" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" name="phone" required value="{{ $account->phone }}" class="form-control"
                    id="exampleInputEmail1" placeholder="Số điện thoại" readonly>
            </div>
            <a href="{{ route('index') }}" class="btn btn-primary">Home</a>
        </div>
    </div>

    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Message</h4>
        </div>
        <div class="panel-body">
            <form class="form-group" action="{{ route('saveMessage', $account->id) }}" method="post">
                @csrf
                <label for="exampleInputEmail1">Message</label>
                <input required type="text" class="form-control" id="exampleInputEmail1" name="message">
                <br>
                <button type="submit" class="btn btn-primary btn-rounded">Send</button>
            </form>
        </div>
    </div>

    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">List message from {{ session()->get('username') }} to {{ $account->username }}</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div id="example3_wrapper" class="dataTables_wrapper">
                    <table id="example3" class="display table dataTable" style="width: 100%; cellspacing: 0;"
                        role="grid" aria-describedby="example3_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 119px;"
                                    aria-sort="ascending">
                                    Content
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 124.906px;">
                                    #
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->content }}</td>
                                    <td>
                                        <a class="btn btn-info btn-rounded" href="{{ route('editMess', $message->id) }}">
                                            Sửa
                                        </a>
                                        <form action="{{ route('deleteMess', $message->id) }}" method="post"
                                            style="margin: 0;display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-rounded">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
