<html>
<head>
      <title>Login Page</title>
</head>
<body>
	<form action="login" method="POST">
	<fieldset>
		<legend>Login Here</legend>
		Username:<input type="text" name ="name" size="20"><br>
		Password:<input type="password" name="password" size="20"><br>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" name="submit" value="Log-In">
	</fieldset>
	</form>
	@if(count($errors))
	   <ul>
	   @foreach($errors->all() as $error)
	     <li>{{$error}}</li>
	   @endforeach
	   </ul>
	 @endif  
	       

</body>
</html>

