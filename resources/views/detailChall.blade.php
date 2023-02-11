@extends('layout.master')

@section('content')
    <div class="">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel">{{ $data->challName }}</h1>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Show hint</button>
                <br><br>
                <hr>
                <form action="{{ route('submitFlag', $data->id) }}" method="post">
                    @csrf
                    <input type="text" class="form-control" name="answer" id="recipient-name" required
                        placeholder="Type your anwser">
                    <br>
                    <button class="btn btn-info">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <a href="{{ route('challenge') }}" class="btn btn-info" data-dismiss="modal">Back</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ $data->challName }}</h4>
                </div>
                <div class="modal-body">
                    <h2 class="modal-title" id="myModalLabel">{{ $data->hint }}</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
