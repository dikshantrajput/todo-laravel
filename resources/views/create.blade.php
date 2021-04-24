@extends('layout')
@section('title','Create a ToDo')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto my-5 bg-white rounded p-4">
            <div class="form-group">
                <h1 class="text-center">Add a ToDo</h1>
            </div>
            @if($errors->any())
                <div class="form-group text-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <form action="{{ route('todos.store') }}" autocomplete="off" method="post">
                @csrf
                <div class="form-group">
                    <label for="created_by" class="form-label">Your name:</label>
                    <input type="text" id="created_by" name="created_by" class="form-control" value="{{ old('created_by') }}" />
                </div>
                <div class="form-group">
                    <label for="end_at" class="form-label">Deadline:</label>
                    <input type="date" id="end_at" min="{{ date('Y-m-d') }}" name="end_at" class="form-control" value="{{ old('end_at') }}" />
                </div>
                <div class="form-group">
                    <label for="todo_text" class="form-label">Text:</label>
                    <textarea id="todo_text" rows="4" name="todo_text" class="form-control" >{{ old('todo_text') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="ADD" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection