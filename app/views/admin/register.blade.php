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
			{{ Form::text('golfclubname', null, array('class'=>'form-control', 'placeholder'=>'Golfclub name')) }}
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
			Number of holes:
			{{ Form::select('parcours', array(9, 18), null, array('class'=>'form-control')) }} 
			
			&nbsp&nbsp&nbsp&nbsp&nbsp
			
			Teetime interval (minutes):
			{{ Form::selectRange('interval', 1, 20, null, array('class'=>'form-control')) }} 

			&nbsp&nbsp&nbsp&nbsp&nbsp
			
			Opening time:
			{{ Form::selectRange('hour', 00, 24, null, array('class'=>'form-control')) }} : 
			{{ Form::selectRange('minute', 00, 59, null, array('class'=>'form-control')) }} 
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
			{{ Form::text('sloperating', null, array('class'=>'form-control', 'placeholder'=>'Slope rating')) }}
		</div>
		
		<div class="form-group">
			{{ Form::text('courserating', null, array('class'=>'form-control', 'placeholder'=>'Course rating')) }}
		</div>
		
		<h4>A. Equipments</h4>
		<div class="form-group">
			1) Driving range {{ Form::checkbox('drivingrange', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			2) Caddies {{ Form::checkbox('caddie', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			3) Chariots {{ Form::checkbox('chariot', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			4) Chariots electrique {{ Form::checkbox('chariotelectrique', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			5) Voiturettes {{ Form::checkbox('voiturette', null, false, null, array('class'=>'form-control')) }}
		</div>
		
		<h4>B. Services</h4>
		<div class="form-group">
			1) Location of clubs {{ Form::checkbox('locationclubs', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			2) Lessons possible {{ Form::checkbox('lecon', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			3) Chambre {{ Form::checkbox('chambre', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			4) Piscine {{ Form::checkbox('piscine', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			5) Spa {{ Form::checkbox('spa', null, false, null, array('class'=>'form-control')) }}&nbsp&nbsp&nbsp
			6) Tennis {{ Form::checkbox('tennis', null, false, null, array('class'=>'form-control')) }}
		</div>
		
		
		<br />
		<h2>5. Images </h2>
		<div class="form-group">
			<h4>A. Please enter a logo of your club (max. 2 Mo):</h4>
			<img src="http://placehold.it/200" id="logo" />		
			<script type="text/javascript">
				function readURLL(input) {
    				if (input.files && input.files[0]) {
        				var reader = new FileReader();

        				reader.onload = function (e) {
            				$('#logo').attr('src', e.target.result).css(
            				{
                			 	'width': '200',
                				'height': '200'
            				});
        				};
        				reader.readAsDataURL(input.files[0]);
    				}
				}
			</script>
			{{Form::file('logo', array('onchange' => 'readURLL(this);'))}}
		</div>
		<br />
		<div class="form-group">		
			<h4>B. Please enter a photo of your club (max. 2 Mo):</h4>
			<img src="http://placehold.it/300X200" id="photo" />		
			<script type="text/javascript">
				function readURLP(input) {
    				if (input.files && input.files[0]) {
        				var reader = new FileReader();

        				reader.onload = function (e) {
            				$('#photo').attr('src', e.target.result).css(
            				{
                			 	'width': '300',
                				'height': '200'
            				});
        				};
        				reader.readAsDataURL(input.files[0]);
    				}
				}
			</script>
			{{Form::file('photo', array('onchange' => 'readURLP(this);'))}}
		</div>
		
		<br />
		<br />
		{{ Form::submit('Register', array('class'=>'btn btn-block btn-primary btn-default'))}}

	{{ Form::close() }}
