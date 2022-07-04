@extends("app")
@section("content")
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done !!! </strong>{{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <div class="col-md-12">
            <h1>Add Task</h1>
            <form method="POST" action={{url('/task')}}>
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" name="task" placeholder="Enter Task">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
            
            <hr>

            <h4 class="my-3">Todo List</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="20%">Name</th>
                        <th width="20%">Date</th>
                        <th width="20%">Status</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->task }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>{{ $task->iscompleted }}</td>
                            <td>
                                <button class="btn btn-primary">Mark Incomplete</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <ol>
                @foreach($tasks as $task)
                    <li>
                        <span>{{ $task->task }}</span>
                        <a class="float-right" href={{url('/'.$task->id.'/delete')}}>
                            Delete
                        </a>
                        <a class="float-right" style="margin-right: 10px;" href ={{url('/'.$task->id.'/complete')}}>Mark Complete</a>
                    </li>
                @endforeach
            </ol>

            <hr>

            <h4 class="my-3">Completed</h4>
            <ol>
                @foreach($completed_tasks as $c_task)
                    <li>
                        <span>{{ $c_task->task }}</span>
                        <a class="float-right" href={{url('/'.$c_task->id.'/delete')}}>
                            Delete
                        </a>
                        <a class="float-right" style="margin-right: 10px;" href={{url('/'.$c_task->id.'/in-complete')}}>Mark In-Complete</a>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection