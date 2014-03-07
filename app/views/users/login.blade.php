<div class="container" style="padding-top:48px">

	<legend>Connexion</legend>

	{{ Form::open(array('url'=>'users/signin')) }}

		<div class="form-group">
			{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Adresse e-mail')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Mot de passe')) }}
		</div>
		
		{{ Form::submit('Login', array('class'=>'btn btn-block btn-primary btn-default'))}}
	{{ Form::close() }}
