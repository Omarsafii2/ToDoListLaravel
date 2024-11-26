<x-layout>
    <div class="container">
            <h1 class="text-center card bg-secondary mt-2 mb-2 p-3 text-light" >your tasks</h1>

            
            <div class="row">
            @foreach ($tasks as $task)
                @if (Auth::user()->id == $task->user_id)
                    @if($task->completed == 0)
                        <div class="col-sm-6">
                            <div class="card mb-2" >
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $task->title }}</h5>
                                    <p class="card-text">{{$task->description}}</p>
                                    <p class="card-text">{{$task->due_date}}</p>
                                    
                                    <div class="d-flex ">
                                        <form action="/tasks/{{$task->id}}" method="post"> 
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-secondary mb-2 me-2  ">complete</button>
                                        </form>
                                        <form action="/tasks/{{$task->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($task->completed == 1)
                        <div class="col-sm-6">
                                <div class="card mb-2" >
                                    <div class="card-body ">
                                        <h5 class="card-title">{{ $task->title }}</h5>
                                        <p class="card-text">{{$task->description}}</p>
                                        <p class="card-text">{{$task->due_date}}</p>
                                        <div class="btn btn-success">complete</div>
                                    </div>
                                </div>
                            </div>    
                    @endif
                @endif                
            @endforeach
            </div>
    </div>
</x-layout>