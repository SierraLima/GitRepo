<div class="container" style="padding-top:48px;">

	<legend>Inscription of your golf club</legend>

	{{ Form::open(array('url'=>'golfclubs/create')) }}
	 
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		
		
		<h2>1. Login informations</h2>
		<div class="form-group">
			{{ Form::text('golfclubname', null, array('class'=>'form-control', 'placeholder'=>'Golf club name')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Lastname')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'Firstname')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
		</div>
		
		<div class="form-group">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		</div>
		
		<div class="form-group">
			{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
		</div>
		
		
		<br />
		<h2>2. General</h2>
		<div class="form-group form-inline">
			<h5>Number of holes:
			{{ Form::select('parcours', array(9, 18), null, array('class'=>'form-control')) }} </h5> 
			
		</div>
		
		<div class="form-group">
			{{ Form::text('interval', null, array('class'=>'form-control', 'placeholder'=>'Teetime interval (minutes)')) }}
		</div>
		
		<div class="form-group form-inline">
			<h5> Opening time:
			{{ Form::selectRange('hour', 00, 24, null, array('class'=>'form-control')) }} : 
			{{ Form::selectRange('minute', 00, 59, null, array('class'=>'form-control')) }} </h5>
		</div>
		
		<div class="form-group">
			{{ Form::text('website', null, array('class'=>'form-control', 'placeholder'=>'Website')) }}
		</div>
						
		<div class="form-group form-inline">
			<h5>Country:
			{{ Form::select('country', array('CH'=>'Switzerland', 'FR'=>'France'), null, array('class'=>'form-control')) }}</h5>
		</div>
		
		<div class="form-group">
			{{ Form::text('city', null, array('class'=>'form-control', 'placeholder'=>'City')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('region', null, array('class'=>'form-control', 'placeholder'=>'Region')) }}
		</div>

		<div class="form-group">
			{{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('zipcode', null, array('class'=>'form-control', 'placeholder'=>'ZIP Code')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('phonenumber', null, array('class'=>'form-control', 'placeholder'=>'Phone number')) }}
		</div>

		
		<br />
		<h2>3. Conditions</h2>
		<div class="form-group form-inline">
			<h5>I read and accept the conditionss of uses:</h5>
			{{ Form::radio('conditions', true, false, array('class'=>'form-control')) }} YES, I aggree ! <br />
			{{ Form::radio('conditions', false, true, array('class'=>'form-control')) }} NO, I don't agree...
		</div>
		
		
		<br />		
		<h2>4. Club</h2>
		<div class="form-group">
			{{ Form::text('par', null, array('class'=>'form-control', 'placeholder'=>'Par')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('drivingrange', null, array('class'=>'form-control', 'placeholder'=>'Driving range')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('sloperating', null, array('class'=>'form-control', 'placeholder'=>'Slope rating')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('courserating', null, array('class'=>'form-control', 'placeholder'=>'Course rating')) }}
		</div>
		
		<div class="form-group">
			{{ Form::textarea('equipment', null, array('class'=>'form-control', 'placeholder'=>'Please describe your equipment')) }}
		</div>
		
		<div class="form-group">
			{{ Form::textarea('services', null, array('class'=>'form-control', 'placeholder'=>'Please describe your services')) }}
		</div>
		
		
		<br />
		<h2>5. Photo </h2>
		<h5>Please enter a photo about your club (max. 2 Mo):</h5>
		<div class="form-group" >
		
			{{ Form::image('photo', null, array('class'=>'form-control')) }}
			{{ Form::file('photo', null, array('class'=>'form-control')) }}
			
		</div>
		
		
		
		<br />
		<br />
		{{ Form::submit('Register', array('class'=>'btn btn-block btn-primary btn-default'))}}

	{{ Form::close() }}
