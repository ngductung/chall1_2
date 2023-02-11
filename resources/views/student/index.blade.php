@extends('layout.master')

@section('content')
    <div class="" id="main-wrapper">

        <div class="page-title">
            <h3 class="breadcrumb-header">Users</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white" style="padding-bottom: 0;">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="example3_wrapper" class="dataTables_wrapper">
                                <table id="example3" class="display table dataTable" style="width: 100%; cellspacing: 0;"
                                    role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                                style="width: 119px;" aria-sort="ascending">
                                                Mã sinh viên
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 150.5px;">
                                                Họ tên
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 87.5312px;">
                                                Email
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 178.062px;">
                                                Số điện thoại
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 124.906px;">
                                                Role
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 124.906px;">
                                                #
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->username }}</td>
                                                <td>{{ $account->name }}</td>
                                                <td>{{ $account->email }}</td>
                                                <td>{{ $account->phone }}</td>
                                                <td>{{ $account->getRole() }}</td>
                                                <td>
                                                    <a class="btn btn-info btn-rounded"
                                                        href="{{ route('detail', $account->username) }}">
                                                        Chi tiết
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        {{ $accounts->links() }}
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
