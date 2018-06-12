<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PBLead Management </title>
<link type="text/css" rel="stylesheet" href="{{url('stylesheets/bootstrap.min.css')}}"> 
<link type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<script type="text/javascript" src="{{url('javascripts/jquery.min.js')}}"></script>
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="bg">
<div class="continer">
</br></br></br></br>
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="login">
<div class="logo-bg"><img src="images/logo.png" class="img-responsive img-center"/></div>
<div class="login-bdy">
<h2 class="text-center">SIGN IN</h2>
<br>
 <form action="{{url('login')}}" method="post" >
 {{ csrf_field() }}
 <div class="form-group">
 <div class="form-group">
<input type="number" name="MobileNo" class="form-control input-cs"  placeholder=" MobileNo"   required="" maxlength="10"  pattern="[0-9]{5}[-][0-9]{7}[-][0-9]{1}" />
 @if ($errors->has('MobileNo'))<label class="control-label" for="inputError"> {{ $errors->first('MobileNo') }}</label>  @endif
</div>
<div class="form-group">
<input type="password" name="Password" class="form-control input-cs"  placeholder="Password" required=""  />
 @if ($errors->has('Password')) <label class="control-label" for="inputError">{{ $errors->first('Password') }} </label> @endif
 </div>
 <div class="form-group has-error">
 @if (Session::has('msg')) <label class="control-label" for="inputError">{{ Session::get('msg') }} </label>@endif
 </div>
 <input type="Submit" class="btn btn-default submit-btn" value="Submit"/>
 <a href="" class="forgot-pass pull-right">Forgot Password</a>
</form>
</div>
</div>
</div>
<div class="col-md-4"></div>
</div> 
</body>
</html>
