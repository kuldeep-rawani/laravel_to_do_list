
<html>
<head>
      <title>Registration Page</title>
</head>
<body>
	<form action="registration" method="POST">
	<fieldset>
		<legend>Login Here</legend>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		First Name:<input type="text" name ="First_Name" size="20"><br>
		Last Name:<input type="text" name ="Last_Name" size="20"><br>
		Username:<input type="text" name ="Username" size="20"><br>
		E-mail:<input type="email" name ="email" size="20"><br>
		Password:<input type="password" name="Password" size="20"><br>
		Confirm Password:<input type="password" name="ConfirmPassword" size="20"><br>
		<input type="submit" name="submit" value="Register">
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
