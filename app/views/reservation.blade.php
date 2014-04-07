<link href="{{ URL::asset('js/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ URL::asset('js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js') }}"></script>

<script>
	$('#date').datepicker(); 
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
                            <div style="background:#D8D8D8; border-style:solid; border-width:1px;">
							<h4 >Golf Club Sierre, 30.03.14, matin, 3 participants</h4>
                            </div>
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
                <input type="textfield" style="width:300px">
                </p>
                <p>
                                        &nbsp;&nbsp;&nbsp;
                <b>Card number</b>
                <small style="color:grey">(no dashes or spaces)</small>
                </p>
                <p>
                                        &nbsp;&nbsp;&nbsp;
                <input type="textfield" style="width:300px" placeholder="xxxx-xxxxx-xxxxx-xxxx">
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
                Golf ist eine Ballsportart mit jahrhundertealter Tradition. Es gilt, einen Ball mit möglichst wenigen Schlägen in ein Loch zu spielen, wobei verschiedene Golfschläger zum Einsatz kommen. Eine Golfrunde besteht in der Regel aus 9 oder 18 Spielbahnen, die nacheinander auf einem Golfplatz absolviert werden.f
				</p>
			</div>
            <br />

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