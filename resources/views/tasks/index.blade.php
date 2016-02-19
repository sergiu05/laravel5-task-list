@extends('layouts.app')

{{-- resources/views/tasks/index.blade.php --}}

@section('title', 'Create Task | All Tasks')

@section('content')

<div class="panel-body">

	@include('common.errors')

	<form action="{{ url('task') }}" method="POST" class="form-horizontal">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="task-name" class="col-sm-3 control-label">{{ trans('messages.task') }}</label>
			<div class="col-sm-6">
				<input type="text" name="name" id="task-name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('messages.createTask') }}</button>
			</div>
		</div>
	</form>

	@if (count($tasks))
	<div class="panel panel-default">
		<div class="panel-heading">
			{{ trans('messages.myTasks') }}
		</div>

		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>{{ trans('messages.task') }}</th>
						<th>{{ trans('messages.action') }}</th>
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
									<i class="fa fa-btn fa-trash"></i> {{ trans('messages.action') }}
								</button>
							</form>
						</td>
					</tr>					
					@endforeach
				</tbody>
			</table>
			<div class="alert alert-info" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p>{{ trans('messages.status') }}: <strong>{{ trans_choice('messages.tasks', $count['tasks']) }}</strong> {{ trans('messages.addedBy') }} {{ trans_choice('messages.users', $count['users']) }}</p>
			</div>
			<p></p>
		</div>
	</div>
	@endif
</div>

@endsection