@extends('layouts.js')
@extends('layouts.css')
<!DOCTYPE HTML>
<html>
<head>
<title>Purple_loginform Website Template | Home :: w3layouts</title>
<!-- <link href="static/css/style.css" rel="stylesheet" type="text/css" media="all" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="background: #000;">
<canvas style="position: absolute;margin-top: -100px;"></canvas>
  <div class="message warning">
  <div class="inset" style="opacity: .6">
  	<div class="login-head">
  		<h1>Ama.Admin</h1>
  		 <div class="alert-close"> </div>
  	</div>
  		<form method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  			<li>
  				<input type="text" class="text" name="username"  onfocus="this.value = '';" ><a href="#" class=" icon user"  style="position: absolute;right:25px;top:150px;"></a>
  			</li>
  				<div class="clear"> </div>
  			<li>
  				<input type="password"  name="password" onfocus="this.value = '';"> <a href="#" class="icon lock" style="position: absolute;right:30px;top:215px;"></a>
  			</li>
  			<div class="clear" style="">
          @if(!empty($errors) && count($errors) > 0 )
             <div id="errors" style="color:red">
                 {{ $errors->all()[0]}}
             </div>
          @endif
        </div>
  			<div class="submit">
  				<input type="submit" value="Sign in" >
  				<h4><a href="#">Lost your password ?</a></h4>
  				 <div class="clear">
           </div>
  			</div>

  		</form>
  		</div>
  	</div>
  	</div>
  	<div class="clear"> </div>

  <div class="footer">
  	<p>Copyright &copy; 2014.</p>
  </div>

<!-- contact-form -->

</body>
</html>
