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

	var url = "{{ URL::action('GolfClubsController@getTeetimes') }}";
	$("#date").change(function(e) {
		window.location = url+'/'+$(this).val();
	});
		
	var myJSONObject = 
		{
		    "date": "2012-03-03",
		    "updates": [
			{
			    "hour": "07",
			    "minutes": "10",
			    "course": "1",
			    "action": "liberate",
			    "price": "120"
			}
			// {
			//     "hour": "07",
			//     "minutes": "10",
			//     "action": "delete"
			// }
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
						<?php
							$treatedTeetimes = 0;

							// i = minutes && j = hour
							// we just need to format them correctly
							for ($k = 0; $k < count($teetimes); $k++) {
								// handling the date
								$dt = DateTime::CreateFromFormat("Y-m-d H:i:s", $teetimes[$k]->date);
								$hour = $dt->format('H');
								$minutes = $dt->format('i');
								$year = $dt->format('Y');
								// converting 03 to 3
								$month = ltrim($dt->format('m'), '0');
								$day = ltrim($dt->format('d'), '0');

								// reserved tee-time
								if($i*10==$minutes && str_pad($j, 2, "0", STR_PAD_LEFT)==$hour && $date==$year."-".$month."-".$day) {
									if(count($teetimes[$k]->reservation)==1) {
										$treatedTeetimes++;
										echo "<a href='#' class='btn-circle btn-blue'>&nbsp;</a>";
									}
									// available tee-time
									elseif(count($teetimes[$k]->reservation)==0) {
										$treatedTeetimes++;
										echo "<a href='#' class='btn-circle btn-green'>".round($teetimes[$k]->price).".-</a>";
									}
								}
							}

							// displaying the rest
							for($m = 0; $m<4-$treatedTeetimes; $m++)
								echo "<a href='#' class='btn-circle'>&nbsp;</a>";
						?>
					</td>
				@endfor
			</tr>
		@endfor

	</tbody>
</table>

<style type="text/css">
.content {float: right; width:80%; padding-left: 10px;}
#links {float: left; width:20%;margin-bottom:10px;}
.invisible{style:display:none;}
</style>

<ul id="links" class="nav nav-pills nav-stacked">
	<li class="active" id="manage"><a href="#">Manage price categories</a></li>
	<li id="liberate"><a href="#">Liberate tee-times</a></li>
	<li id="delete"><a href="#">Delete tee-times</a></li>
</ul>
<div id="content">
	<div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempus sem ac sem molestie fringilla. Donec interdum, sapien eget placerat viverra, magna dui molestie diam, sit amet vulputate metus mi vel dui. Nam vel luctus ipsum, at dictum nibh. Pellentesque tristique facilisis ornare. Praesent non magna eget mauris ultricies venenatis. In quis sodales mi. Integer in nulla dictum, ultricies nibh sed, suscipit odio. Integer non volutpat libero. Curabitur sed tellus non nunc eleifend varius at ac magna. Phasellus laoreet leo est, ac adipiscing augue ultricies nec. Morbi sed leo vitae felis euismod pellentesque et vel velit.</div>
	<div class="content">liberate</div>
	<div class="content">delete</div>
</div>

<script type="text/javascript">
$(document).ready(function () {
	// hiding non active panes
	$(".content").eq(1).hide();
	$(".content").eq(2).hide();

	$("#manage, #liberate, #delete").click(function(e) {
		e.preventDefault();

		// active class
		$("li.active").removeClass("active");
		if($(this).hasClass("active"))
			$(this).removeClass("active");
		else
			$(this).addClass("active");

		// hiding everything but the menu
		$(".content").not(this).hide();

		// showing the pane
		var index = $(this).index();
		$(".content").eq(index).show();

	});

});

</script>

<br style="clear:both;" />

{{ Form::open(array('url'=>'golfclubs/teetimes')) }}
	<input type="hidden" id="json" name="json" value="" />
	{{ Form::submit('Envoyer', array('class'=>'btn btn-primary btn-default'))}}
{{ Form::close() }}
