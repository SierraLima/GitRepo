<div class="container" style="padding-top:48px;">
<legend>Golf Club de Sierre</legend>

<style type="text/css">
img { max-width: 200px; height: auto; }
</style>

@if(count($media)==1)
	@foreach ($media as $picture)
		<img src="<?php echo URL::to('/').'/'.$picture->url ?>"/>
	@endforeach

<hr />
@endif

Name: {{{ $name }}} <br />
Address: {{{ $address }}} <br />
Email: {{{ $email }}} <br />
Description: {{{ $description }}} <br />
Place: {{{ $place }}} <br />
Phone number: {{{ $phonenumber }}} <br />
