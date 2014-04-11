<link href="{{ URL::asset('js/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ URL::asset('js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js') }}"></script>

<script>
    
    //Actual version
    
$('#date').datepicker(); 
    
 var teetimedata;
    var golfclubdata;
    var mediadata;
    
    //Variables retrieved from the submit form
    var teetimeid;
    var numberofplayers;
    var golfclubid;
    var date;
    
    function showvalues(){
        id = '{{ $teetimeid }}';
        numberofplayers = '{{ $numberofplayers }}';
        golfclubid = '{{ $golfclubid }}';
        date = '{{ $date }}';
                
        readdata();
        createpage();
    }
    
    function getnumberofplayers(){
        return numberofplayers;   
    }
    
    function readdata(){
        
        
        
        
        var userid = '{{ $userid }}';
        
        
        
        var teetimes = '{{ Teetime::all() }}';
        
        // Retrieving the data from the golfclubs
        var golfclubs = '{{ GolfClub::all() }}';
        var golfcourses = '{{ GolfCourse::all() }}';
        var media = '{{ Media::all() }}';
        
        var jsonDataTeetime = JSON.parse(teetimes);
        var jsonGolfclub = JSON.parse(golfclubs);
        var jsonMedia = JSON.parse(media);
        
        for(var i in jsonDataTeetime){
            if(jsonDataTeetime[i].id = golfclubid){
                teetimedata = jsonDataTeetime[i];
                break;
            }
        }
        
        for(var i in jsonGolfclub){
            if(jsonGolfclub[i].id = golfclubid){
                golfclubdata = jsonGolfclub[i];
                break;
            }
        }
        
        for(var i in jsonMedia){
            if(jsonMedia[i].fk_idgolfclub = golfclubid){
                mediadata = jsonMedia[i];
                break;
            }
        }
    }
    
    function createpage(){
        
        //Get the elements
        var overview = document.getElementById("overview");
        var h4 = document.getElementById("overviewtitle");
        var tablebody = document.getElementById("tablebody");
        
        
        h4.innerHTML = golfclubdata.name + ", " + date + " , " + numberofplayers + " participants";
        
        for (var i = 0; i < parseInt(numberofplayers); i++){
            var tr = document.createElement("tr");
            var tdplayer = document.createElement("td");
            var tdprice = document.createElement("td");
            
            tdplayer.innerHTML = "Joueur " + (i+1);
            tdprice.innerHTML = teetimedata.price;
            
            tr.appendChild(tdplayer);
            tr.appendChild(tdprice);
            
            tablebody.appendChild(tr);
        }
        
        
        //Create the golfclub description section
        var golfclubtitle = document.getElementById("golfclubtitle");
        var descriptionimage = document.getElementById("descriptionimage");
        var descriptionp = document.getElementById("descriptionp");
        
        golfclubtitle.innerHTML = golfclubdata.name;
        
        if(mediadata != null){
            descriptionimage.setAttribute("src", mediadata.url);
        }
        else
        {
            descriptionimage.setAttribute("src", "http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg");
        }
        
        descriptionp.innerHTML += golfclubdata.description;
        
        //Create the sous total section
        var totalperson = document.getElementById("totalperson");
        var totalall = document.getElementById("totalall");
        var totalp = document.getElementById("totalp");
        
        totalperson.innerHTML = "Par personne : " + teetimedata.price + " CHF";
        totalall.innerHTML = "Pour " + numberofplayers + " participants: " + (parseInt(numberofplayers) * parseInt(teetimedata.price)) + " CHF"; 
        totalp.innerHTML = numberofplayers + " tee-times <br />" + golfclubdata.name + "<br />" + date;    
        
        var hiddennumberofplayers = document.getElementById("hiddennumberofplayers");
        var hiddengolfer = document.getElementById("hiddengolfer");
        var hiddenteetime = document.getElementById("hiddenteetime");
        
        hiddennumberofplayers.value = numberofplayers;
        hiddengolfer.value = userid;
        hiddenteetime.value = teetimeid;
        
        
        /*
        hiddenform.appendChild( '{{ Form::hidden("numberplayer", ' + numberofplayers + ', array("class"=>"form-control")) }}' )
                    {{ Form::hidden('fk_idgolfer', 1, array('class'=>'form-control')) }}
                    {{ Form::hidden('fk_idteetime', 6, array('class'=>'form-control')) }}
          */      
        
    }
    
</script>

<div class="container" style="padding-top:48px;">
    
	<legend>Recherche d'un tee-time</legend>
	<div class="row">

		<div class="col-md-8">
			<ul id="navigation" class="nav nav-tabs">
				<!--
                <li><a href="#">« prev</a></li>
				<li><a href="#">26 mars</a></li>
				<li><a href="#">27 mars</a></li>
				<li class="active"><a href="#">28 mars</a></li>
				<li><a href="#">29 mars</a></li>
				<li><a href="#">30 mars</a></li>
				<li><a href="#">next »</a></li>
                -->
			</ul>
			<div class="tab-content">
				<div class="table-responsive">
					<table class="table table-hover">
						<tbody id="tablebody">
                            <div id="overview" style="background:#D8D8D8; border-style:solid; border-width:1px;">
							<h4 id="overviewtitle">Golf Club Sierre, 30.03.14, matin, 3 participants</h4>
                            </div>
                            <!--
                                    <tr>
                                        <td>Joueur 1</td>
                                        <td>100 CHF</td>
                                    </tr>
                                    <tr>
                                        <td>Joueur 2</td>
                                        <td>100 CHF</td>
                                    </tr>
                                    <tr>
                                        <td>Joueur 3</td>
                                        <td>100 CHF</td>
                                    </tr>
                            -->
						</tbody>
					</table>
				</div>
			</div>
                <br />
                <table style="width:350px;">
                    <tr>
                        <td style="background-color: #CEE3F6;">
                        <b>Credit Card information</b>
                        </td>
                        <td style="background-color: #CEE3F6"></td>
                    </tr>
                    <tr>
                        <td>Firstname</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <td>Lastname</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>Switzerland</td>
                    </tr>
                    <tr>
                        <td>Startdatum</td>
                        <td>21.04.2014</td>
                    </tr>
                    <tr>
                        <td>Enddatum</td>
                        <td>21.04.2015</td>
                    </tr>
                </table>
		</div>

		<div class="col-md-4">
			<div id="descriptiondiv" class="left-table">
				<h4 id="golfclubtitle">Golf Club de Sierre</h4>
				<p id="descriptionp">
					<img id="descriptionimage" src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="56" width="56" style="float:left;margin:0 5px 0 0;" />
               
				</p>
			</div>
            <br />

			<div class="left-table">
				<h4>Sous-total</h4>
				<h5 id="totalperson">par personne : 100 CHF</h5>
				<h5 id="totalall">pour 3 participants : 300 CHF</h5>
				<p id="totalp">3 tee-times<br />
				Golf Club de Sierre<br />
				30.03.2014</p>
                
                
	           {{ Form::open(array('url'=>'reservations/create', 'id' => 'hiddenform')) }}
                              
                    {{ Form::hidden('numberplayer', 1, array('class'=>'form-control', 'id' => 'hiddennumberofplayers')) }}
                    {{ Form::hidden('fk_idgolfer', 1, array('class'=>'form-control', 'id' => 'hiddengolfer')) }}
                    {{ Form::hidden('fk_idteetime', 6, array('class'=>'form-control', 'id' => 'hiddenteetime')) }}
                
                
                {{ Form::submit('Finish reservation', array('class'=>'btn btn-block btn-primary btn-default'))}}

	           {{ Form::close() }}
			</div>
			
		</div>

	</div>
    <script>showvalues()</script>