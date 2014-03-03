<?php include("header.php"); ?>
<?php include("menu.php"); ?>

<style type="text/css">
input[type=text], input[type=password] { width: 200px; }
</style>

<div class="container" style="padding-top:48px;">
	<form class="form-horizontal" id="registration" method='post' action='register.php'>
		<fieldset>
			<legend>Rejoignez Teezy aujourd'hui</legend>
			<div class="control-group">
				<label class="control-label">Prénom :</label>
				<div class="controls">
					<input type="text" id="username" name="user_name">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Nom :</label>
				<div class="controls">
					<input type="text" id="password" name="password1">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Date de naissance :</label><br />

				<select class="form-control" style="width: 200px;">
					<option>1989</option>
					<option>1990</option>
				</select>
				<select class="form-control" style="width: 200px;">
					<option>3</option>
					<option>4</option>
				</select>
				<select class="form-control" style="width: 200px;">
					<option>1</option>
					<option>2</option>
				</select>
			</div>
			<div class="control-group">
				<label class="control-label">Email :</label>
				<div class="controls">
					<input type="text" id="email" name="email">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Pays :</label>
				<div class="controls">
					<input type="text" id="email" name="email">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Numéro de license :</label>
				<div class="controls">
					<input type="text" id="email" name="email">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mot de passe :</label>
				<div class="controls">
					<input type="password" id="email" name="email">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Confirmez le mot de passe :</label>
				<div class="controls">
					<input type="password" id="email" name="email">
				</div>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox"> J'accepte les <a href="#">termes et conditions d'utilisation</a>
				</label>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" >Créer mon compte</button>
				</div>
			</div>
		</fieldset>
	</form>

<?php include("copyright.php"); ?>
<?php include("footer.php"); ?>
