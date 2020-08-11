@extends('todos.layout')

    @section('content')
        <div class="flex justify-center border-b pb-4">
            <h1 class="text-2xl">All My Work ToDo</h1>

        </div>
        <div>
            @if ($message = Session::get('message'))
                <div class="alert alert-success bg-green" role="alert">
                    {{ $message }}
                </div>
            @endif
        </div>
    <ul class="my-5">
        @if($todos ?? '' == null)
            <a class="mx-5  btn btn-success py-2 px-1 bg-blue-300 cursor-pointer text-white rounded"  href="{{url('/todos/create')}}">Create New</a>
        @elseif($todo!=null)
            @foreach ($todos ?? '' as $todo)
                <li class="flex justify-between py-2">
                    @if($todo->completed)
                        <p class="line-through">{{$todo->title}}</p>
                    @else
                        <p >{{$todo->title}}</p>
                    @endif
                    <div>
                        <a href="{{url('/todos/edit/'.$todo->id)}}" class="mx-5 py-1 px-1 bg-orange-400">
                            <span class="fas fa-edit  px-2"></span>
                        </a>
                        @if($todo->completed)
                            <form action="{{route('todo.undo',$todo->id)}}" method="post">
                                @csrf
                                <input type="submit" value ="undo The Task">
                            </form>


                        @else
                            <form  action="{{route('todo.complete',$todo->id)}}" method="post">
                                @csrf
                                <span>
                                    <input type="submit" rounded value=" Mark to Complete">
                             </span>
                            </form>
                        @endif
                        <form action="{{route('todo.delete',$todo->id)}}" method="post">
                            @csrf
                            <input type="submit" value="Delete">
                        </form>

                    </div>

                </li>
            @endforeach
    </ul>


        @endif

    @endsection


