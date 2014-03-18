<div class="container" style="padding-top:48px;">
<legend>Tee-times</legend>

<style type="text/css">

img { max-width: 200px; height: auto; }

.btn-circle {
line-height: 1.42857143;
border: 1px solid transparent;

width: 30px;
height: 30px;
padding: 6px 0;
font-size: 12px;
line-height: 1.42;
border-radius: 15px;
color: #000;

display: inline-block;
margin-bottom:2px;
text-align: center;
background-color: #839098;
}

.btn-selected {border: 2px solid #000000;}


.btn:hover { background-color:#FFFFFF;}


/* TODO

green : #98CB4A
gray : #839098
blue : #5481E6
orange : #F76D3C
*/

.btn-red {background-color: #F15F74; color: #FFFFFF}
.btn-green {background-color: #98CB4A}
.btn-blue {background-color: #5481E6; color: #FFFFFF}

</style>

<script type="text/javascript">


$(document).ready(function () {
	$("td a").click(function() {
		if($(this).hasClass("btn-selected"))
			$(this).removeClass("btn-selected");
		else
			$(this).addClass("btn-selected");
	});
});

</script>

<select class="form-control" style="width:250px; float: left;">
	<option value="volvo">Lundi 17 mars 2014</option>
	<option value="saab">Mardi 18 mars 2014</option>
	<option value="mercedes">Mercredi 19 mars 2014</option>
	<option value="audi">Vendredi 20 décembre 2014</option>
</select>

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
						<a href="#" class="btn-circle btn-red">&nbsp;</a>
						<a href="#" class="btn-circle">&nbsp;</a>
					</td>
				@endfor
			</tr>
		@endfor




	</tbody>
</table>

{{ Form::open(array('url'=>'golfclubs/upload')) }}
	{{ Form::submit('Envoyer', array('class'=>'btn btn-primary btn-default'))}}
{{ Form::close() }}
