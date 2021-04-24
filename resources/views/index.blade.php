@extends('layout')
@section('title','Home')
@section('content')
<div class="container-fluid">
    <div class="row m-5">
        <div class="col-md-8 p-3 mx-auto bg-white shadow-sm">
            <h1 class="text-center">TO DO APP</h1>
            <a href="{{ url('/todos/create') }}" class="btn btn-primary">Add a ToDo</a>
            @foreach($todos as $todo)
                <div class="row m-5 ">
                    <div class="col-md-10 col-lg-8 bg-gray mx-auto col-sm-12 p-3 pb-2">
                        <div class="d-flex justify-content-between">
                            <h3>{{ $todo->created_by }}</h3>
                            <div>
                                <a href="{{ route('todos.edit',$todo) }}" class="fa mx-1 fa-edit text-primary"></a>
                                <form action="{{ route('todos.destroy',$todo) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border:none;outline:none" class="fa mx-1 fa-trash text-danger"></button> 
                                </form>
                            </div>
                        </div>
                        <p>{{ $todo->todo_text }}</p>
                        <p class="d-flex justify-content-between mb-0">
                            <span class="text-primary">{{ $todo->created_date }}</span>
                            <span class="text-danger">{{ substr($todo->ending_date,0,-6) }}</span>
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="row text-center mx-auto d-flex justify-content-center align-item-center">
                {{ $todos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection