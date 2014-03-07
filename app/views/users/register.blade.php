<div class="container" style="padding-top:48px;">

	<legend>Inscription</legend>

	{{ Form::open(array('url'=>'users/create')) }}
	 
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		 
		<div class="form-group">
			{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
		</div>
		<div class="form-group">
			{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
		</div>
		<div class="form-group">
			{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
		</div>
		<div class="form-group form-inline">
			{{ Form::selectRange('day', 1, 31, null, array('class'=>'form-control')) }}
			{{ Form::selectRange('month', 1, 12, null, array('class'=>'form-control')) }}
			{{ Form::selectRange('year', 1900, 2014, null, array('class'=>'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::select('country', array('CH'=>'Switzerland', 'FR'=>'France'), null, array('class'=>'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::text('licence', null, array('class'=>'form-control', 'placeholder'=>'Licence')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
		</div>

		{{ Form::submit('Register', array('class'=>'btn btn-block btn-primary btn-default'))}}

	{{ Form::close() }}
