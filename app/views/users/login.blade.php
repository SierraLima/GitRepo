<div class="container" style="padding-top:48px">
<legend>Connexion</legend>
{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
 
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Adresse e-mail')) }}
    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Mot de passe')) }}
 
    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
