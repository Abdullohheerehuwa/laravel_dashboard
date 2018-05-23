<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<div>
	<center>
	<form action="{{route('update', $customer->id)}}" method="post">
		@csrf
		{{method_field('PATCH')}}
		<h2>กรอกข้อมูลสมาชิก</h2>
		<br><br>
		fisrtname:<br>
		<input type="text" name="firstname" value="{{$customer->firstname}}">
		<br><br>
		lastname:<br>
		<input type="text" name="lastname" value="{{$customer->lastname}}">
		<br><br>
		Email:<br>
		<input type="text" name="Email" value="{{$customer->Email}}">
		<br><br>
		Phone:<br>
		<input type="text" name="phone" value="{{$customer->phone}}">
		<br><br>
		<input type="submit" value="SAVE">
	</form>
	</center>
</div>
</body>
</html>