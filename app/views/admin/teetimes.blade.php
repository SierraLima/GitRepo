<div class="container" style="padding-top:48px;">
<legend>Tee-times</legend>

<style type="text/css">

img { max-width: 200px; height: auto; }

</style>

<script type="text/javascript">

$(document).ready(function () {

	// getting the date from laravel
	var requestedDate = '{{ $date }}';

	// splitting
	var parts = requestedDate.split('-');
	var year = parts[0];
	var month = parts[1];
	var day = parts[2];

	// creating an actual date
	var requestedDate = new Date(year, month - 1, day);

	// generating dates around the requested date
	for(var i=-5; i<=5; i++) {
		var d = new Date();
		d.setDate(requestedDate.getDate() + i);

		var month = d.getMonth() + 1;
		var day = d.getDate();
		var year = d.getFullYear();

		var outputDate = year+"-"+month+"-"+day;

		$("#date").append(new Option(outputDate, outputDate));
		// default value
		if(i==0)
			$('#date option[value="'+outputDate+'"]').attr("selected",true);
	
	}
		
	var myJSONObject = 
		{
		    "date": "2012-03-03",
		    "updates": [
			// {
			//     "hour": "07",
			//     "minutes": "10",
			//     "action": "liberate",
			//     "price": "120"
			// }
			{
			    "hour": "07",
			    "minutes": "20",
			    "action": "delete"
			}
		    ]
		};
	$("#json").val(JSON.stringify(myJSONObject));

	$("td a").click(function(e) {
		e.preventDefault();
		if($(this).hasClass("btn-selected"))
			$(this).removeClass("btn-selected");
		else
			$(this).addClass("btn-selected");

	});
	

});

</script>

<div style="float: left;" class="form-inline">
	<select id="date" class="form-control" style="width:250px;">
	</select>

	<select id="date" class="form-control" style="width:250px;">
		<option>Parcours 1</option>
	</select>
</div>

<p style="text-align:right; float:right;">
	<a href="#" class="btn-circle btn-green">&nbsp;</a> libre
	<a href="#" class="btn-circle btn-blue">&nbsp;</a> réservé
	<a href="#" class="btn-circle btn-red">&nbsp;</a> bloqué
</p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th></th>
			@for ($i = 7; $i <= 22; $i++)
				<th>{{ str_pad($i, 2, "0", STR_PAD_LEFT); }}:00</th>
			@endfor
		</tr>
	</thead>

	<tbody>

		@for ($i = 0; $i <= 5; $i++)
			<tr>
				<th>{{ str_pad($i, 2, "0"); }}</th>
				@for ($j = 7; $j <= 22; $j++)
					<td>
						<a href="#" class="btn-circle btn-green">120.-</a>
						<a href="#" class="btn-circle btn-blue">&nbsp;</a>
						<a href="#" class="btn-circle">&nbsp;</a>
						<a href="#" class="btn-circle">&nbsp;</a>
					</td>
				@endfor
			</tr>
		@endfor




	</tbody>
</table>

{{ Form::open(array('url'=>'golfclubs/teetimes')) }}
	<input type="hidden" id="json" name="json" value="" />
	{{ Form::submit('Envoyer', array('class'=>'btn btn-primary btn-default'))}}
{{ Form::close() }}
