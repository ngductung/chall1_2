@extends('layout.master')

@section('content')
    <div class="" id="main-wrapper">

        @if ($status)
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Nội dung</h4>
                </div>
                <div class="panel-body">
                    <div role="tabpanel">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab1">
                                <p>
                                    {{ $content }} 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('challenge') }}" class="btn btn-success btn-addon">
                <i class="fa fa-spin fa-refresh"></i> Back to challenge home</a>
        @else
            <img src="{{ asset('false.gif') }}" style="display: flex;margin: auto;">
            <a href="{{ route('detailChall', $id) }}" class="btn btn-danger btn-addon">
                <i class="fa fa-spin fa-refresh"></i> Back to challenge home</a>
        @endif


    </div>
@endsection
