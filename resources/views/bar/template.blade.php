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
	@if(count($errors) > 0)
		<div class="errors">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	@yield('title')

	@yield('content')

</body>
</html>