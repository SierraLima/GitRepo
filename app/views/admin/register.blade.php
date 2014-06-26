<div class="container" style="padding-top:48px;">

	<legend>Inscription of your golf club</legend>

	{{ Form::open(array('url'=>'golfclubs/create')) }}
	 
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		
		<h2>1. Infomations of the golf club</h2>
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
		
	
		<h2>2. General</h2>
		<div class="form-group form-inline">
			<h5>Number of holes:
			{{ Form::select('parcours', array(9, 18), null, array('class'=>'form-control')) }} </h5> 
			
		</div>
		
		<div class="form-group form-inline">
			{{ Form::text('interval', null, array('class'=>'form-control', 'placeholder'=>'teetime interval (minutes)')) }}
		</div>
		
		<div class="form-group form-inline">
			<h5> Opening time:
			{ Form::selectRange('hour', 00, 24, null, array('class'=>'form-control')) }}
			{{ Form::selectRange('minute', 00, 59, null, array('class'=>'form-control')) }} </h5>
		</div>
		
		<div class="form-group">
			{{ Form::text('website', null, array('class'=>'form-control', 'placeholder'=>'Website')) }}
		</div>
				
		<div class="form-group">
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

		
		<h1>3. Conditions</h1>
		
		
		<h1>4. Services</h1>
		<div class="form-group">
			{{ Form::textarea('services', null, array('class'=>'form-control', 'placeholder'=>'Please enter services offer by your club')) }}
		</div>

		
		{{ Form::submit('Register', array('class'=>'btn btn-block btn-primary btn-default'))}}

	{{ Form::close() }}
