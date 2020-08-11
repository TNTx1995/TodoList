@extends('todos.layout')

@section('content')

    @if ($message = Session::get('message'))
        <div class="alert alert-success bg-green" role="alert">
            {{ $message }}
        </div>
    @endif
    <div>
        <h1>Update Your Todo List </h1>
        <b>{{$todo->title}}</b>
        <form action="{{route('todo.update',$todo->id)}}"  class="py-5">

            <input type="text" name="title" value="{{$todo->title}}" class="py-3 px-2 border rounded">
            <input type ="submit" value="Update" class="p-2 border rounded-lg">
            <div class="text-center">
                @error('title')
                <div class="alert alert-success bg-green" role="alert">{{ $message }}</div>
                @enderror
            </div>


        </form>
        <div>
            <a class="mx-5  btn btn-danger py-2 px-1 bg-blue-300 cursor-pointer border text-white rounded"  href="{{url('/todos')}}">
                Back To View All Todo List
            </a>
        </div>
    </div>


@endsection
