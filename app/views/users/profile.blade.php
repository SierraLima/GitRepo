<div class="container" style="padding-top:48px;">
<legend>Profil</legend>
<p>Bienvenue dans votre profil.</p>

{{ Form::model($user, array('url' => array('users/update', $user->id))) }}
    
    <ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
    </ul>
    
		<div class="form-group">
			{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'Firstname')) }}
		</div>
        <div class="form-group">
            {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Lastname')) }}
        </div>
		<div class="form-group">
			{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
		</div>
		<div class="form-group">
			{{ Form::text('birthday', null, array('class'=>'form-control', 'placeholder'=>'Birthday')) }}
		</div>
		<div class="form-group">
			{{ Form::text('country', null, array('class'=>'form-control', 'placeholder'=>'Phone number')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		</div>
        <div class="form-group">
			{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
		</div>
    
    {{ Form::submit('Update', array('class'=>'btn btn-block btn-primary btn-default'))}}
    
	{{ Form::close() }}