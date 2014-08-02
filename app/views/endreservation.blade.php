<!--
<link href="{{ URL::asset('js/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ URL::asset('js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js') }}"></script>


<!-- <script>
    function buttonclicked(){
    	var url = "{{ URL::action('UsersController@getProfile') }}";
   	 	window.location = url;
    }
</script>

<script>
	var teetimedata;
    var id; // Variables retrieved from the submit form
    
   /**
    * Show the values of the reservation 
    */  
    function showvalues(){
        id = '{{ $teetimeid }}';
        readdata();
    }
    
   /**
    * Take data on DB
    */  
    function readdata(){
        var teetimes = '{{ Teetime::all() }}';
        var jsonDataTeetime = JSON.parse(teetimes);
             
        for (var i in jsonDataTeetime){
            if(jsonDataTeetime[i].id == id){
                teetimedata = jsonDataTeetime[i];
           }
        }
    } 
</script>

<div class="col-md-8">
	<h1>Congratulations</h1>
	<h3>Your Teetime was booked succesfully</h3>
	
	{{ Form::model($teetime, array('url' => array('teetimes/update', $teetime->id))) }}
    
    <ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
    </ul>

	<!-- <div align="right" margin-right="70px">
		<button class='btn btn-block btn-primary btn-default' onClick=buttonclicked()>Validate your reservation</button>
	</div> 


    {{ Form::submit('Validate reservation', array('class'=>'btn btn-block btn-primary btn-default'))}}
    
	{{ Form::close() }}
	
</div>

<div class="left-table"></div>
<script>showvalues();</script> -->