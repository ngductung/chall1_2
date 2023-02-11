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

    @if ($er === 0)
        <div class="alert alert-danger">
            <ul>
                The file must be a file of type: txt.
            </ul>
        </div>
    @endif

    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Add new assignment</h4>
        </div>
        <div class="panel-body">
            <form action="{{ route('teacher.storeChall') }}" method="post" enctype='multipart/form-data'>
                <div class="modal-body">
                    @csrf
                    {{-- <input type="hidden" name="id_Ass" value="{{ $assignment->id }}"> --}}
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Challenge name</label>
                        <input type="text" class="form-control" name="name" id="recipient-name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Hint</label>
                        <textarea class="form-control" id="message-text" name="hint" value="{{ old('hint') }}" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Challenge file</label>
                        <input type="file" name="file" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
