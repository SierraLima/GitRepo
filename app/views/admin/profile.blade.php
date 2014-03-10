<div class="container" style="padding-top:48px;">

	<legend>Profil</legend>

	{{ Form::model($golfclub, array('route' => array('golfclubs/update', $golfclub->id))) }}
	 
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		<div class="form-group">
			{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name')) }}
		</div>
		<div class="form-group">
			{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
		</div>
		<div class="form-group">
			{{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
		</div>
		<div class="form-group">
			{{ Form::text('place', null, array('class'=>'form-control', 'placeholder'=>'Place')) }}
		</div>
		<div class="form-group">
			{{ Form::text('phonenumber', null, array('class'=>'form-control', 'placeholder'=>'Phone number')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
		</div>
		<div class="form-group">
			{{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Description')) }}
		</div>

		{{ Form::submit('Register', array('class'=>'btn btn-block btn-primary btn-default'))}}

	{{ Form::close() }}
