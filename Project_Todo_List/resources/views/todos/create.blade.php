@extends('todos.layout')

@section('content')
    <h1 class="text-2xl">What next you Need To-do!</h1>
    @if ($message = Session::get('message'))
        <div class="alert alert-success bg-green" role="alert">
            {{ $message }}
        </div>
    @endif

    <form action="{{url('/todos/create')}}" method="post" class="py-5">
        @csrf
        <input type="text" name="title" class="py-3 px-2 border rounded">
        <input type ="submit" value="create" class="p-2 border rounded-lg">
        <div class="text-center">
            @error('title')
            <div class="alert alert-success bg-green" role="alert">{{ $message }}</div>
            @enderror
        </div>


    </form>
    <a class="mx-5  btn btn-danger py-2 px-1 bg-blue-300 cursor-pointer border text-white rounded"  href="{{url('/todos')}}">
        Back To View All Todo List
    </a>

@endsection
