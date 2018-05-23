<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  href="css/style.css">

	<title>PDF</title>
</head>
<body>

	<table  align="center">
		<tr>
			<td>Firstname</td>
			<td>Lastname</td>
			<td>E-mail</td>
			<td>Phone</td>
		</tr>
		@foreach($customer as $customer)
		<tr>
			<td>{{$customer->firstname}}</td>
			<td>{{$customer->lastname}}</td>
			<td>{{$customer->Email}}</td>
			<td>{{$customer->phone}}</td>
		</tr>
		@endforeach
	</table>

</body>
</html>