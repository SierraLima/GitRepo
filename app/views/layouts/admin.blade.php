<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Teezy.co | Accueil</title>

{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/jumbotron.css') }}
{{ HTML::style('css/style.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::action('GolfClubsController@getIndex') }}">Teezy Administration</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

            <li class="@if(Request::path() == 'golfclubs' || Request::path() == 'golfclubs/index') active @endif">{{ HTML::link('golfclubs/', 'Accueil') }}</li>
		@if(!Auth::golfclub()->check())
		    <li class="{{Request::path() == 'golfclubs/register' ? 'active' : '';}}">{{ HTML::link('golfclubs/register', 'Inscription') }}</li>   
		    <li class="{{Request::path() == 'golfclubs/login' ? 'active' : '';}}">{{ HTML::link('golfclubs/login', 'Connexion') }}</li>   
		@else
		    <li>{{ HTML::link('golfclubs/logout', 'Déconnexion') }}</li>
            	<li class="{{Request::path() == 'golfclubs/profile' ? 'active' : '';}}">{{ HTML::link('golfclubs/profile', 'Profil') }}</li>
		@endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

        @if(Session::has('message'))
	<div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif

	{{ $content }}

      <hr>

      <footer>
        <p>&copy; Teezy 2014</p>
      </footer>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>
