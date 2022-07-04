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
                            <td>
                                {{ $task->iscompleted ? 'Completed' : 'In-complete' }}
                            </td>
                            <td>
                                <button class="btn btn-primary">
                                    <a class="float-right text-white" style="margin-right: 10px;" href ={{url('/'.$task->id.'/complete')}}>Mark Complete</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="float-right text-white" href={{url('/'.$task->id.'/delete')}}>Delete</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <h4 class="my-3">Completed</h4>
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
                    @foreach($completed_tasks as $c_task)
                        <tr>
                            <td width="10%">{{ $c_task->id }}</td>
                            <td width="20%">{{ $c_task->task }}</td>
                            <td width="20%">{{ $c_task->created_at }}</td>
                            <td width="20%">
                                {{ $c_task->iscompleted ? 'Completed' : 'In-complete' }}
                            </td>
                            <td width="30%">
                                <button class="btn btn-primary">
                                    <a class="float-right text-white" style="margin-right: 10px;" href ={{url('/'.$c_task->id.'/in-complete')}}>Mark In-Complete</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="float-right text-white" href={{url('/'.$c_task->id.'/delete')}}>Delete</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection