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
		@foreach ($media as $picture)
			<tr>
				<td><img src="<?php echo URL::to('/').'/'.$picture->url ?>"/></td>
				<td><a href="<?php echo URL::to('golfclubs').'/delete/'.$picture->id ?>">Effacer</a></td>
			</tr>
		@endforeach

	</tbody>
</table>

{{ Form::open(array('url'=>'golfclubs/upload', 'files'=>'true')) }}
	<p>Ajouter une image : <input type="file" name="image" ></p>
	{{ Form::submit('Envoyer', array('class'=>'btn btn-primary btn-default'))}}
{{ Form::close() }}
