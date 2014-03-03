<?php include("header.php"); ?>
<?php include("menu.php"); ?>

<style type="text/css">
input[type=text], input[type=password] { width: 200px; }
</style>

<div class="container" style="padding-top:48px;">
	<form class="form-horizontal" id="registration" method='post' action='register.php'>
		<fieldset>
			<legend>Connexion</legend>
			<div class="control-group">
				<label class="control-label">E-mail :</label>
				<div class="controls">
					<input type="text" id="username" name="user_name">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mot de passe :</label>
				<div class="controls">
					<input type="password" id="email" name="email">
				</div>
			</div>
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Remember me
			</label>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" >Sauvegarder</button>
				</div>
			</div>
			<p><a href="#">Mot de passe oublié ?</a></p>
		</fieldset>
	</form>

<?php include("copyright.php"); ?>
<?php include("footer.php"); ?>
