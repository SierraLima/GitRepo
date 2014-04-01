<style type="text/css">
	.left-table {
		border: 1px solid #ddd;
		margin-bottom:10px;
		padding:10px;
	}
</style>

   	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   	<script type="text/javascript">
    
    var counter = 0;
    var day;
    var month;
    var year;
        
    // Global variables for the jsonData
    var jsonData;
    var jsonGolfclub;
    var jsonGolfcourse;
    var jsonMedia;
        
    // Variables used for the filter function
    var selecteddate;
    var ninefilter;
    var eighteenfilter;
    var minprice = 0.00;
    var maxprice = 1000.00;
        
    // Variables to display the teetimes
    var tr;
    var golfclub;
    var golfclublink;
    var timetd;
    var imagetd;
    var image;
    var price;
    var pricebold;
    var selecttd;
    var selector;
    var buttontd;
    var button;
    var tablebox;
        
    var clickeddate = "0000-00-00";
         
   /**
    * Set the filter of holes
    * 
    * @param number -> number of hols 
    */        
    function filter($number){
        if($number == 9){
            ninefilter = true; 
            eighteenfilter = false;
        }
        else if($number == 18){
            ninefilter = false;
            eighteenfilter = true;
        }
        else{
            ninefilter = false;
            eighteenfilter = false;
        }
        checkclick(selecteddate);
    }
        
   /**
    * Show the description about a club on right top 
    * 
    * @param name -> the name of the club
    * @param description -> the description of the club
    * @param imageurl -> the image of the club
    */ 
    function showdescription($name, $description, $imageurl){
        
        var div = document.getElementById("descriptiondiv");
        
        clearleftelement(div);
        
        var golfclubtitle = document.createElement("h4");
        var descriptionimage = document.createElement("img");
        var p = document.createElement("p");
        
        descriptionimage.setAttribute("height", "56");
        descriptionimage.setAttribute("width", "56");
        descriptionimage.setAttribute("style", "float:left;margin:0 5px 0 0;");
        descriptionimage.setAttribute("src", $imageurl);
        golfclubtitle.innerHTML = $name;
        p.appendChild(golfclubtitle);
        p.appendChild(descriptionimage);
        p.innerHTML += $description;
        div.appendChild(p);
    }
    
   /**
    * Clear elements on left
    * 
    * @param dic -> the div to clear 
    */     
    function clearleftelement($div){
        $($div).empty();
    }
    
   /**
    * Alert on click
    * 
    * @param id -> the id of the button 
    */    
    function buttonclick($id){
        alert("Teetime with id " + $id + " clicked");   
    }
    
   /**
    * Function to read data on the teezydb database 
    */      
    function readdata(){
        
        var teetimes = '{{ $teetimes }}';
        
        // Retrieving the data from the golfclubs
        var golfclubs = '{{ GolfClub::all() }}';   // SYNTAX MAJ
        var golfcurse = '{{ GolfCourse::all() }}'; // SYNTAX MAJ
        var media = '{{ Media::all() }}';
        
        jsonData = JSON.parse(teetimes);
        jsonGolfclub = JSON.parse(golfclubs);
        jsonGolfcourse = JSON.parse(golfcourses); // SYNTAX (o et s ?)
        jsonMedia = JSON.parse(media);
    } 
    
   /**
    * Function to create a table box on the view 
    */      
    function createtablebox(){
        tablebox = document.getElementById("tablebody"); 
    }
    
   /**
    * Function to create a the elements on the view
    */    
    function createelements(){
        tr = document.createElement("tr");
        golfclub = document.createElement("td");
        golfclublink = document.createElement("a");
        timetd = document.createElement("td");
        imagetd = document.createElement("td");
        image = document.createElement("img");
        price = document.createElement("td");
        pricebold = document.createElement("b");
        selecttd = document.createElement("td");
        selector = document.createElement("select");
        buttontd  = document.createElement("td");
        button = document.createElement("button");
    }
    
   /**
    * Function to add elements on the view 
    */  
    function addelements(){
        
        if(image.hasAttribute("src") == false){
            image.setAttribute("src", "http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg");
            golfclublink.setAttribute("imageurl", "http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg");
        }
                
        golfclublink.href = "#";        
        golfclublink.setAttribute("onclick", "javascript:showdescription($(this).attr('name'), $(this).attr('description'), $(this).attr('imageurl'));");
                
        image.setAttribute("height","28");
        image.setAttribute("width","28");
        button.setAttribute("type","submit");
        button.setAttribute("class","btn btn-success");
        button.innerHTML = "Reserver";
        // button.setAttribute("onclick", "javascript:buttonclick(this.id);");
        button.setAttribute("onclick", "window.open('http://localhost:8888/teezy-linux/public/teetimes/reservation')");

        imagetd.appendChild(image);
        price.appendChild(pricebold);
                
        for(var i = 0; i<4; i++){
        	var option = document.createElement("option");
            option.innerHTML = i+1;
            selector.appendChild(option); 
        }
                    
        selecttd.appendChild(selector);
        selecttd.innerHTML += "  joueur(s)";
        buttontd.appendChild(button);
                
        tr.appendChild(timetd);
        tr.appendChild(imagetd);
        tr.appendChild(golfclub);
        tr.appendChild(price);
        tr.appendChild(selecttd);
        tr.appendChild(buttontd);
                    
        tablebox.appendChild(tr);
    }
    
   /**
    * Action on clicked date  
    */    
	function checkclick($date){
        
        if($date != clickeddate){
            if(clickeddate == "0000-00-00"){
                clickeddate = $date;
            }
            else{
                var li = document.getElementById(clickeddate);
                
                if(li != null){
                	li.removeAttribute("style");
                }
                clickeddate = $date;
            }  
        }
        
        var li = document.getElementById(clickeddate);
        li.setAttribute("style", "background:#C1FFC1");
        
        // Set the actual date
        selecteddate = $date;
        
        createtablebox();
        // var tablebox = document.getElementById("tablebody"); 
       
        while ( tablebox.rows.length > 0 ){
            tablebox.deleteRow(0);
        }
                     
        for (var i in jsonData) {
            
        // alert("Teetimeprice " + jsonData[i].price + "Min: " + minprice + " Max: " + maxprice);
        // alert("JSon data " + jsonData[i].date + " /// $Datum = " + $datum);
        if(jsonData[i].date.substring(0,10) == $date && minprice <= jsonData[i].price && jsonData[i].price <= maxprice){
                    
        createelements();

        /*
        var tr = document.createElement("tr");
        var golfclub = document.createElement("td");
        var golfclublink = document.createElement("a");
        var timetd = document.createElement("td");
        var imagetd = document.createElement("td");
        var image = document.createElement("img");
        var price = document.createElement("td");
        var pricebold = document.createElement("b");
        var selecttd = document.createElement("td");
        var selector = document.createElement("select");
        var buttontd  = document.createElement("td");
        var button = document.createElement("button");
        */
  
        /**********************************************/
        
                
        timetd.innerHTML = "12:40";
        // golfclub.innerHTML = "GolfClub de Sierre";
                
        // Getting the right Golfclub
        for(var j in jsonGolfcourse){
            if(jsonGolfcourse[j].id == jsonData[i].golf_course_id){
                for(var k in jsonGolfclub){
                    if(jsonGolfclub[k].id == jsonGolfcourse[j].golf_club_id){
                        
                        if(ninefilter){
                        	if(jsonGolfcourse[j].holenumber == 9){
                 
                        		golfclublink.appendChild(document.createTextNode(jsonGolfclub[k].name));
                        		golfclublink.setAttribute("description", jsonGolfclub[k].description);
                        		golfclublink.setAttribute("name", jsonGolfclub[k].name);
                        		golfclub.appendChild(golfclublink);
                        
                        		for(var l in jsonMedia){
                        			if(jsonGolfclub[k].id == jsonMedia[l].golf_club_id){
                                    	image.setAttribute("src", jsonMedia[l].url);
                                    	golfclublink.setAttribute("imageurl", jsonMedia[k].url);
                                	}
                            	}	
                        		button.setAttribute("id", jsonData[i].id);
                        		pricebold.innerHTML = jsonData[i].price;
                        		addelements();
                        	}
                        }
                        else if(eighteenfilter){
                            if(jsonGolfcourse[j].holenumber == 18){
                                                
                        		golfclublink.appendChild(document.createTextNode(jsonGolfclub[k].name));
                        		golfclublink.setAttribute("description", jsonGolfclub[k].description);
                        		golfclublink.setAttribute("name", jsonGolfclub[k].name);
                        		golfclub.appendChild(golfclublink);
                        
                        		for(var l in jsonMedia){
                        			if(jsonGolfclub[k].id == jsonMedia[l].golf_club_id){
                                    	image.setAttribute("src", jsonMedia[l].url);
                                    	golfclublink.setAttribute("imageurl", jsonMedia[k].url);
                                    }      
                                }
                            	button.setAttribute("id", jsonData[i].id);
                            	pricebold.innerHTML = jsonData[i].price;
                            	addelements();
                            }
                        }
                        else{
                                                
                        	golfclublink.appendChild(document.createTextNode(jsonGolfclub[k].name));
                        	golfclublink.setAttribute("description", jsonGolfclub[k].description);
                        	golfclublink.setAttribute("name", jsonGolfclub[k].name);
                        	golfclub.appendChild(golfclublink);
                        
                        	for(var l in jsonMedia){
                        		if(jsonGolfclub[k].id == jsonMedia[l].golf_club_id){
                                    image.setAttribute("src", jsonMedia[l].url);
                                    golfclublink.setAttribute("imageurl", jsonMedia[k].url);
                            	}
                        	}
                        	button.setAttribute("id", jsonData[i].id);
                        	pricebold.innerHTML = jsonData[i].price;
                        	addelements();
                    	}
                	}
            	}
        	}
        } // End for var j
            
        /*
        if(image.hasAttribute("src") == false){
            image.setAttribute("src", "http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg");
            golfclublink.setAttribute("imageurl", "http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg");
        }
                
        golfclublink.href = "#";        
        golfclublink.setAttribute("onclick", "javascript:showdescription($(this).attr('name'), $(this).attr('description'), $(this).attr('imageurl'));");
                
        image.setAttribute("height","28");
        image.setAttribute("width","28");
        button.setAttribute("type","submit");
        button.setAttribute("class","btn btn-success");
        button.setAttribute("id", jsonData[i].id);
        button.innerHTML = "Reserver";
        button.setAttribute("onclick", "javascript:buttonclick(this.id);");
        
                    pricebold.innerHTML = jsonData[i].price;
                
                
                    imagetd.appendChild(image);
                    price.appendChild(pricebold);
                
                    for(var i = 0; i<4; i++){
                        var option = document.createElement("option");
                        option.innerHTML = i+1;
                        selector.appendChild(option); 
                    }
                    
                    selecttd.appendChild(selector);
                    selecttd.innerHTML += "  jouer(s)";
                    buttontd.appendChild(button);
                
                    tr.appendChild(timetd);
                    tr.appendChild(imagetd);
                    tr.appendChild(golfclub);
                    tr.appendChild(price);
                    tr.appendChild(selecttd);
                    tr.appendChild(buttontd);
                    
                
                    tablebox.appendChild(tr);
                    */
                }
        }
    } // End of the method checkclick
        
            /*
        <ul>
        @foreach($teetimes as $teetime)
        <li> {{ $teetime->date }}</li>
        @endforeach
        </ul>
        */
    
   /**
    * Function to initialise the day, month and year variable with today's date
    * 
    * @param year -> year of the date
    * @param month -> month of the date
    * @param day ->day of the date
    */      
    function initialisedate($year, $month, $day){
        this.day = $day;
        this.month = $month;
        this.year = $year;
    }
      
   /**
    * Functions to display the value of the Slider minimum price
    * 
    * @param newValue -> The present value on the filter
    */ 
    function showMinValue($newValue){
        document.getElementById("range1").innerHTML=$newValue;
        minprice = $newValue;
        checkclick(selecteddate);
    }
    
   /**
    * Functions to display the value of the Slider maximum price
    * 
    * @param newValue -> The present value on the filter
    */    
    function showMaxValue($newValue){
        document.getElementById("range2").innerHTML=$newValue;
        maxprice = $newValue;
        checkclick(selecteddate);
    }
    
   /**
    * Function to change the date of researchs about tee-times
    */     
    function changedate(){   
        
        var selector = document.getElementById("navigation");
        var months = new Array("Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
        var numberDay;
                
        switch(month){
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                numberDay = 31;
            break;
            case 4:
            case 6:
            case 9:
            case 11:
                numberDay = 30;
            break;
            case 2:
                numberDay = 28;
            break;
        }
        
        // Create the previews buttonclick
        var prevli = document.createElement("li");
        var prevlia = document.createElement("a");
        
        prevlia.href = "#";
        prevlia.appendChild(document.createTextNode("<<"));
        prevlia.setAttribute("onclick","javascript:prev();");
        prevli.appendChild(prevlia);
        selector.appendChild(prevli);
        
        for(var i = 0; i < 5; i++){
            
            // Previews function
            // Set the days of the previews months    
            switch(numberDay){
                case 31:
                    if(day > 31){
                        if(month == 12){
                            year++;
                            month = 1;
                        }
                        else{
                            month++;
                        }
                        day = day-31;                        
                    }
                break;
                case 30:
                    if(day > 30){
                        day = day-30;
                        month++;
                    }
                break;
                case 28:
                    if(day > 28){
                        day = day-28;
                        month++;
                    }
                break; 
            }
            
            var li = document.createElement("li");
            var a = document.createElement("a");
            
            if(month < 10 && day < 10){
                li.setAttribute("id", year + "-0" + month + "-0" + day);
                a.setAttribute("id", year + "-0" + month + "-0" + day);
            }  
            else if(month < 10){
                li.setAttribute("id", year + "-0" + month + "-0" + day);
                a.setAttribute("id", year + "-0" + month + "-" + day);
            }
            else if(day < 10){
                li.setAttribute("id", year + "-0" + month + "-0" + day);
                a.setAttribute("id", year + "-" + month + "-0" + day);
            }
            else{
                li.setAttribute("id", year + "-0" + month + "-0" + day);
                a.setAttribute("id", year + "-" + month + "-" + day);
            }
            a.href = "#";
            a.setAttribute("onclick","javascript:checkclick(this.id);");
            
            a.appendChild(document.createTextNode(day + " " + months[month-1] + " " + year));
            li.appendChild(a);
            
            selector.appendChild(li);
            day++;
        }        
        
        var nextli = document.createElement("li");
        var nextlia = document.createElement("a");
                    
        nextlia.href = "#";
        nextlia.appendChild(document.createTextNode(">>"));
        nextlia.setAttribute("onclick","javascript:next();");
        nextli.appendChild(nextlia);
        selector.appendChild(nextli);
    }
        
   /**
    * Function to pass on another date after
    */ 
    function next(){
        clearlist();
        changedate();
    }
   
   /**
    * Function to clear the list o date
    */     
    function clearlist(){
        var listitem = document.getElementById("navigation");
        $(listitem).empty();
    }
    
   /**
    * Function to pass on another date before
    */     
    function prev(){
         
         //Subtract twice the value of displayed tabs
         this.day = this.day - 10;
         
          if(day <= 0){
               switch(month){
                case 1:
                       day = 31 + day;
                       year--;
                       month = 12;
                break;
                case 3:
                       day = 28 + day;
                       month--;
                break;
                case 5:
                case 7:
                case 8:
                case 10:
                case 12:
                        day = 30 + day;
                        month--;        
                break;
                case 2:
                case 4:
                case 6:
                case 9:
                case 11:
                        day = 31 + day;
                        month--;
                break;
               }
          }         
          clearlist();
          changedate();
    }
    
    </script>

<!--
 <ul>
        @foreach($teetimes as $teetime)
        <li> {{ $teetime->date }}</li>
        @endforeach
     
</ul>
-->

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
							<h3>12:00 PM - 12:59 PM</h3>
                            <!--
							<tr>
								<td>12:40</td>
								<td><img src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="28" width="28" /> Golf Club de Sierre</td>
								<td><b>50 CHF</b></td>
								<td>
									<select>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
									 joueur(s)
								</td>
								<td>
									<button type="submit" class="btn btn-success">Réserver</button>
								</td>
							</tr>
							<tr>
								<td>12:40</td>
								<td><img src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="28" width="28" /> Golf Club de Sierre</td>
								<td><b>50 CHF</b></td>
								<td>
									<select>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
									 joueur(s)
								</td>
								<td>
									<button type="submit" class="btn btn-success">Réserver</button>
								</td>
							</tr>
							<tr>
								<td>12:40</td>
								<td><img src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="28" width="28" /> Golf Club de Sierre</td>
								<td><b>50 CHF</b></td>
								<td>
									<select>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
									 joueur(s)
								</td>
								<td>
									<button type="submit" class="btn btn-success">Réserver</button>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="table table-hover">
						<tbody>
							<h3>12:00 PM - 12:59 PM</h3>
							<tr>
								<td>12:40</td>
								<td><img src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="28" width="28" /> Golf Club de Sierre</td>
								<td><b>50 CHF</b></td>
								<td>
									<select>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
									 joueur(s)
								</td>
								<td>
									<button type="submit" class="btn btn-success">Réserver</button>
								</td>
							</tr>
							<tr>
								<td>12:40</td>
								<td><img src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="28" width="28" /> Golf Club de Sierre</td>
								<td><b>50 CHF</b></td>
								<td>
									<select>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
									 joueur(s)
								</td>
								<td>
									<button type="submit" class="btn btn-success">Réserver</button>
								</td>
							</tr>
							<tr>
								<td>12:40</td>
								<td><img src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="28" width="28" /> Golf Club de Sierre</td>
								<td><b>50 CHF</b></td>
								<td>
									<select>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
									 joueur(s)
								</td>
								<td>
									<button type="submit" class="btn btn-success">Réserver</button>
								</td>
							</tr>
                            -->
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div id="descriptiondiv" class="left-table">
				<h4 id="golfclubtitle"></h4>
				<p id="descriptionp">
                    <!--
					<img id="descriptionimage" src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="56" width="56" style="float:left;margin:0 5px 0 0;" />
                    -->
				</p>
			</div>

			<div class="left-table">

				<label class="control-label input-label" for="disabledInput">Filters :</label>
				<p>
                    Trous
                    <button number="9" style="width:50px;height:50px" onclick="filter( $(this).attr('number'))">9</button>
                    <button number="18" style="width:50px;height:50px" onclick="filter( $(this).attr('number'))">18</button>
                    <button number="0" style="width:50px;height:50px" onclick="filter( $(this).attr('number'))">-</button>
                </p>
                <br />
                <br />
                <p>
                    Prix minimum :
                    <input id="minslider" type="range" min="0" max="1000" value="0" onchange="showMinValue(this.value)">
                    <span id="range1">0</span>
                </p>
                <br />
                <p>
                    Prix maximum :
                    <input id="maxslider" type="range" min="0" max="1000" value="1000" onchange="showMaxValue(this.value)">
                    <span id="range2">1000</span>
                </p>
			</div>
			
			<!-- FIELDS ABOUT A CLUB ON DB ?-->
			<div class="left-table">
				<h4>Sous-total</h4>
				<h5>par personne : 100 CHF</h5>
				<h5>pour 3 participants : 300 CHF</h5>
				<p>3 tee-times<br />
				Golf Club de Sierre<br />
				30.03.2014</p>
				
				<!-- NO ACTION ?-->	
				<button type="submit" class="btn btn-primary">Continuer</button>
			</div>
		</div>
	</div>
	
 	<!-- Use JQuery to get the actual date and call the javascript funciton -->
 	<script>
        readdata();
     
        var dt = new Date($.now());
        var year = dt.getFullYear();
        var month = dt.getMonth() + 1;
        var day = dt.getDate();
     
        var passvalue;   
     
        if(month < 10 && day < 10){
        	passvalue = year + "-0" + month + "-0" + day;
        }  
        else if(month < 10){
        	passvalue = year + "-0" + month + "-" + day;
        }
        else if(day < 10){
            passvalue = year + "-" + month + "-0" + day;
        }
        else{
            passvalue = year + "-" + month + "-" + day;
        }
        
        initialisedate(year, month, day);
        changedate();
        checkclick(passvalue);
        
 	</script>