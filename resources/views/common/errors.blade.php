{{-- resources/views/common/errors.blade.php --}}

@if (count($errors) > 0)

	<div class="alert alert-danger">
		<strong>Error!</strong>
		<br>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>

@endif