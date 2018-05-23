<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<div>
	<center>
	<form action="{{route('insert')}}" method="post">
		@csrf
		<h2>กรอกข้อมูลสมาชิก</h2>
		<br><br>
		fisrtname:<br>
		<input type="text" name="firstname">
		<br><br>
		lastname:<br>
		<input type="text" name="lastname">
		<br><br>
		Email:<br>
		<input type="text" name="Email">
		<br><br>
		Phone:<br>
		<input type="text" name="phone">
		<br><br>
		<input type="submit" value="SAVE">
	</form>
	</center>
</div>
</body>
</html>