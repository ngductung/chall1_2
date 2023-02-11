@extends('layout.master')

@section('content')
    <div class="" id="main-wrapper">
        <div class="page-title">
            <h3 class="breadcrumb-header">Assignment</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white" style="padding-bottom: 0;">
                    <div class="panel-body">
                        @if (session()->get('role') === 1)
                            <a href="{{ route('teacher.createAssignment') }}" class="btn btn-success">
                                Add Assignment
                            </a>
                        @endif
                        </button>
                        <div class="table-responsive">
                            <div id="example3_wrapper" class="dataTables_wrapper">
                                <table id="example3" class="display table dataTable" style="width: 100%; cellspacing: 0;"
                                    role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                                style="width: 119px;" aria-sort="ascending">
                                                Due
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 150.5px;">
                                                Description
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 150.5px;">
                                                Create by
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 124.906px;">
                                                #
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assignments as $assignment)
                                            <tr>
                                                <td>{{ $assignment->due }}</td>
                                                <td>{{ $assignment->description }}</td>
                                                <td>{{ $assignment->created_by }}</td>
                                                <td>
                                                    <a href="{{ route('detailAss', $assignment->id) }}"
                                                        class="btn btn-info">
                                                        Detail
                                                    </a>
                                                    @if (session()->get('role') === 1)
                                                        <a class="btn btn-warning"
                                                            href="{{ route('teacher.editAss', $assignment->id) }}">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('teacher.deleteAss', $assignment->id) }}"
                                                            method="post" style="margin: 0;display: inline-block;">
                                                            @csrf
                                                            @method('delete')
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
