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