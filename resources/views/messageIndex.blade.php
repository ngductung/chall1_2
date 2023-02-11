@extends('layout.master')

@section('content')
    <div class="" id="main-wrapper">

        <div class="page-title">
            <h3 class="breadcrumb-header">Message to me ({{ session()->get('name') }})</h3>
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
                                                The sender
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 150.5px;">
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
                                                <td>{{ $message->getNameUserSender($message->send_user) }}</td>
                                                <td>{{ $message->content }}</td>
                                                <td>
                                                    <form action="{{ route('deleteMess', $message->id) }}"
                                                        method="post" style="margin: 0;display: inline-block;">
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
                </div>
            </div>
        </div>

    </div>
@endsection
