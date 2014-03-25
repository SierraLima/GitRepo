<style type="text/css">
.left-table {
	border: 1px solid #ddd;
	margin-bottom:10px;
	padding:10px;
}
</style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    
	function checkclick($datum){
        
         
        alert($datum);  
        
        /*
        <ul>
        @foreach($teetimes as $teetime)
        <li> {{ $teetime->date }}</li>
        @endforeach
        </ul>
        */
        
    }
    
    function myfunction(){   
                
        
        var dt = new Date($.now());
        var year = dt.getFullYear();
        var month = dt.getMonth() + 1;
        var day = dt.getDate();
        
        var selector = document.getElementById("navigation");
        var months = new Array("Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
        
        var anzahltage;
        
        switch(month){
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                anzahltage = 31;
            break;
            case 4:
            case 6:
            case 9:
            case 11:
                anzahltage = 30;
            break;
            case 2:
                anzahltage = 28;
            break;
        }
        
        
        for(var i = 0; i < 5; i++){
            
            switch(anzahltage){
                case 31:
                    if(day > 31){
                        day = 1;
                        month++;
                    }
                break;
                case 30:
                    if(day > 30){
                        day = 1;
                        month++;
                    }
                break;
                case 28:
                    if(day > 28){
                        day = 1;
                        month++;
                    }
                break; 
            }
            
            var li = document.createElement("li");
            var a = document.createElement("a");
            
            if(month < 10 && day < 10){
                a.setAttribute("id", year + "-0" + month + "-0" + day);
            }  
            else if(mont < 10){
                a.setAttribute("id", year + "-0" + month + "-" + day);
                }
                else if(day < 10){
                a.setAttribute("id", year + "-" + month + "-0" + day);
                }
                else{
                a.setAttribute("id", year + "-" + month + "-" + day);
                }
            a.href = "#";
            a.setAttribute("onclick","javascript:checkclick(this.id);");
            
            a.appendChild(document.createTextNode(day + " " + months[month-1] + " " + year));
            li.appendChild(a);
            
            selector.appendChild(li);
            day++;
        }        
        
        
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
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="left-table">
				<h4>Sierre</h4>
				<p>
					<img src="http://www.hotel-cabecinho.com/CLIENTES/www.hotel-cabecinho.com/imagenes/galeria/golf2.jpg" height="56" width="56" style="float:left;margin:0 5px 0 0;" />
					Duis aute irure dolor sed do eiusmod tempor incididunt in reprehenderit in voluptate. Cupidatat non proident, ut labore et dolore magna aliqua. Sunt in culpa quis nostrud exercitation excepteur sint occaecat. Mollit anim id est laborum.
				</p>
			</div>

			<div class="left-table">

				TODO

				<label class="control-label input-label" for="disabledInput">Start :</label>
				<input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled>

				<select class="form-control">
					<option>CHF</option>
					<option>EUR</option>
				</select>
			</div>

			<div class="left-table">
				<h4>Sous-total</h4>
				<h5>par personne : 100 CHF</h5>
				<h5>pour 3 participants : 300 CHF</h5>
				<p>3 tee-times<br />
				Golf Club de Sierre<br />
				30.03.2014</p>

				<button type="submit" class="btn btn-primary">Continuer</button>
			</div>
			
		</div>

	</div>
 <script>myfunction()</script>