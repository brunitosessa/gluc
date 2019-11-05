<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Bar</title>
	<style>
	.errors{
		background-color: #fcc;
		border: 1px solid #966;
	}
	form{
		margin-top: 20px;
		line-height: 1.5em;
	}
	label{
		display: inline-block;
		width: 120px;
	}
	</style>
</head>
<body>
	<h1>Nuevo Bar</h1>
	@if(count($errors) > 0)
		<div class="errors">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<form action="../guardarBar" method="post">
		@csrf
		<label for="nombre">Nombre:</label> <input type="text" name="nombre" value="{{old('nombre')}}">
		<br />
		<input type="submit" value="Crear">
		<button class="btn btn-danger">Prueba</button>
	</form>
</body>
</html>