<link href="{{ URL::asset('js/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ URL::asset('js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js') }}"></script>

<script>
	$('#date').datepicker(); 
    
    var teetimedata;
    var golfclubdata;
    var mediadata;
    
    //Variables retrieved from the submit form
    var id;
    var numberofplayers;
    var golfclubid;
    var date;
    
    function showvalues(){
        id = '{{ $id }}';
        numberofplayers = '{{ $numberofplayers }}';
        golfclubid = '{{ $golfclubid }}';
        date = '{{ $date }}';
        
        readdata();
        createpage();
    }
    
    function readdata(){
        
        
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
        descriptionimage.setAttribute("src", mediadata.url);
        descriptionp.innerHTML += golfclubdata.description;
        
        //Create the sous total section
        var totalperson = document.getElementById("totalperson");
        var totalall = document.getElementById("totalall");
        var totalp = document.getElementById("totalp");
        
        totalperson.innerHTML = "Par personne : " + teetimedata.price + " CHF";
        totalall.innerHTML = "Pour " + numberofplayers + " participants: " + (parseInt(numberofplayers) * parseInt(teetimedata.price)) + " CHF"; 
        totalp.innerHTML = numberofplayers + " tee-times <br />" + golfclubdata.name + "<br />" + date;    
    }
    
    function buttonclicked(){
        
        //Get the fields from the credit card
        var name = document.getElementById("name");
        var cardnumber = document.getElementById("cardnumber");
        //var date = document.getElementById("date");
        
        //To do - read the input fields 
        
        var url = "{{ URL::action('TeetimesController@getReservation2') }}";
        
        window.location = url + "/" + golfclubid + "/" + id + "/" + numberofplayers + "/" + date;

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
							<h4 id="overviewtitle">Oberwald Sierre, 30.03.14, matin, 3 participants</h4>
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
            <div style="border-style:solid; border-width:1px;">
                <h4>                    &nbsp;&nbsp;&nbsp;
                    Sélection de la carte de crédit</h4>
                <br />
                <p>
                <fieldset>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="feeling" id="feelingSad" value="sad" />
                    <label for="feelingSad">
                    <img src="http://icons.iconarchive.com/icons/designbolts/credit-card-payment/64/Master-Card-Blue-icon.png" /></label>
                    <label for="feelingHappy">
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="feeling" id="feelingHappy" value="happy" />
                    <img src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-3/64/payment-card-icon.png" /> 
                    </label>
                </fieldset>
                </p>
                <p>
                &nbsp;&nbsp;&nbsp;
                <b>Name</b>
                <small style="color:grey">(as it appears on your card)</small>
                </p>
                <p>
                                    &nbsp;&nbsp;&nbsp;
                <input id="name" type="textfield" style="width:300px">
                </p>
                <p>
                                        &nbsp;&nbsp;&nbsp;
                <b>Card number</b>
                <small style="color:grey">(no dashes or spaces)</small>
                </p>
                <p>
                                        &nbsp;&nbsp;&nbsp;
                <input id="cardnumber" type="textfield" style="width:300px" placeholder="xxxx-xxxxx-xxxxx-xxxx">
                </p>
                <p>
                                        &nbsp;&nbsp;&nbsp;
                <b>Expiration date</b>
                </p>
                <p>
                                        &nbsp;&nbsp;&nbsp;
                <input type="date" name="date" id="date" value="" />
                </p>
                <p>
                                        &nbsp;&nbsp;&nbsp;
                    <b>Security code</b>
                    <small style="color:grey">(3 on back, Amex; 4 on front)</small>
                </p>
                <p>
                                        &nbsp;&nbsp;&nbsp;
                    <input type="textfield" style="width:300px">
                </p>
            </div>
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
				<h4 >Sous-total</h4>
				<h5 id="totalperson">par personne : 100 CHF</h5>
				<h5 id="totalall">pour 3 participants : 300 CHF</h5>
				<p id="totalp">3 tee-times<br />
				Golf Club de Sierre<br />
				30.03.2014</p>                
				<button type="submit" class="btn btn-primary" onClick="buttonclicked()">Continuer</button>
			</div>
		</div>
	</div>
<script>showvalues();</script>