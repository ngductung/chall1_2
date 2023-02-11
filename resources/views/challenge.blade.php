@extends('layout.master')

@section('content')
    <div class="" id="main-wrapper">



        <div class="page-title">
            <h3 class="breadcrumb-header">Challenge</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white" style="padding-bottom: 0;">
                    <div class="panel-body">
                        @if (session()->get('role') === 1)
                            <a class="btn btn-primary" href="{{ route('teacher.createChall') }}">Add Challenge</a>
                        @endif
                        <div class="table-responsive">
                            <div id="example3_wrapper" class="dataTables_wrapper">
                                <table id="example3" class="display table dataTable" style="width: 100%; cellspacing: 0;"
                                    role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                                style="width: 119px;" aria-sort="ascending">
                                                Challenge name
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 124.906px;">
                                                #
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($challenges as $challenge)
                                            <tr>
                                                <td>{{ $challenge->challName }}</td>
                                                <td>
                                                    <a class="btn btn-info"
                                                        href="{{ route('detailChall', $challenge->id) }}">
                                                        Detail
                                                    </a>
                                                    @if (session()->get('role') === 1)
                                                        <form action="{{ route('teacher.destroyChall') }}" method="post"
                                                            style="margin: 0;display: inline-block;">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="idChall"
                                                                value="{{ $challenge->id }}">
                                                            <button class="btn btn-danger">Xóa</button>
                                                        </form>
                                                    @endif

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
