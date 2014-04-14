<script>

    function buttonclicked(){
    var url = "{{ URL::action('UsersController@getProfile') }}";

    window.location = url;

    }
    
</script>


<div class="col-md-8">
	<h1>Congratulations</h1>
	<h3>Your Teetime was booked succesfully</h3>

	<div align="right" margin-right="70px">
		<button class='btn btn-block btn-primary btn-default' onClick=buttonclicked()>Return to my page</button>
	</div>
</div>

<div class="left-table"></div>