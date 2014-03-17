<div class="container" style="padding-top:48px;">
<legend>Golf Club de Sierre</legend>

<style type="text/css">
img { max-width: 200px; height: auto; }
</style>

@foreach ($media as $picture)
	<img src="<?php echo URL::to('/').'/'.$picture->url ?>"/>
@endforeach

<hr />

name : {{{ $name }}} <br />
address : {{{ $address }}} <br />
email : {{{ $email }}} <br />
description : {{{ $description }}} <br />
place : {{{ $place }}} <br />
phonenumber : {{{ $phonenumber }}} <br />
