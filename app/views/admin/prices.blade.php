<div class="container" style="padding-top:48px;">

<style type="text/css">
.form-group { width:250px; }
</style>

<legend>Prices</legend>

<table class="table">
	<thead>
		<tr>
			<th>Description</th>
			<th>Price</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($prices as $price)
			<tr>
				<td>{{ $price->description }}</td>
				<td>{{ $price->amount }}</td>
				<td><a href="<?php echo URL::to('golfclubs').'/deleteprice/'.$price->id ?>">Effacer</a></td>
			</tr>
		@endforeach

	</tbody>
</table>

{{ Form::open(array('url'=>'golfclubs/newprice')) }}
	<p>Ajouter un nouveau prix :</p>
	
	<div class="form-group">
		{{ Form::text('description', null, array('class'=>'form-control', 'placeholder'=>'Description')) }}
	</div>
	
	<div class="form-group">
		{{ Form::text('amount', null, array('class'=>'form-control', 'placeholder'=>'Prix')) }}
	</div>
	{{ Form::submit('Envoyer', array('class'=>'btn btn-primary btn-default'))}}
{{ Form::close() }}
