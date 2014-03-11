<div class="container" style="padding-top:48px;">
<legend>Gallerie</legend>

<style type="text/css">
img { max-width: 200px; height: auto; }
</style>

<table class="table">
	<thead>
		<tr>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td><img src="http://liguesud.federationdefense.fr/wp-content/uploads/2014/02/Golf-ligue.jpg"/></td>
			<td><a href="#">Effacer</a></td>
		</tr>
		<tr>
			<td><img src="http://liguesud.federationdefense.fr/wp-content/uploads/2014/02/Golf-ligue.jpg"/></td>
			<td><a href="#">Effacer</a></td>
		</tr>
		<tr>
			<td><img src="http://liguesud.federationdefense.fr/wp-content/uploads/2014/02/Golf-ligue.jpg"/></td>
			<td><a href="#">Effacer</a></td>
		</tr>
		<tr>
			<td><img src="http://liguesud.federationdefense.fr/wp-content/uploads/2014/02/Golf-ligue.jpg"/></td>
			<td><a href="#">Effacer</a></td>
		</tr>
		<tr>
			<td><img src="http://liguesud.federationdefense.fr/wp-content/uploads/2014/02/Golf-ligue.jpg"/></td>
			<td><a href="#">Effacer</a></td>
		</tr>
	</tbody>
</table>

{{ Form::open(array('url'=>'golfclubs/upload', 'files'=>'true')) }}
	<p>Ajouter une image : <input type="file" name="image" ></p>
	{{ Form::submit('Envoyer', array('class'=>'btn btn-primary btn-default'))}}
{{ Form::close() }}
