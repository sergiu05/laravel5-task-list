@extends('layouts.app')

{{-- resources/views/tasks/index.blade.php --}}

@section('title', 'Create Task | All Tasks')

@section('content')

<div class="panel-body">

	@include('common.errors')

	<form action="{{ url('task') }}" method="POST" class="form-horizontal">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="task-name" class="col-sm-3 control-label">Task</label>
			<div class="col-sm-6">
				<input type="text" name="name" id="task-name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default"><i class="fa fa-plus"></i> Create Task</button>
			</div>
		</div>
	</form>

	@if (count($tasks))
	<div class="panel panel-default">
		<div class="panel-heading">
			Current Tasks
		</div>

		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Task</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tasks as $task)
					<tr>
						<td>
							{{ $task->name }}
						</td>
						<td>
							<form action="{{ url('task/'.$task->id) }}" method="post">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}								

								<button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
									<i class="fa fa-btn fa-trash"></i> Delete
								</button>
							</form>
						</td>
					</tr>					
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@endif
</div>

@endsection