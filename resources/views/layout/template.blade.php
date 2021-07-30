<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('titulo') | Teste_PHP</title>

		<link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{asset('asset/css/font-awesome.min.css')}}" type="text/css">
		<link rel="stylesheet" href="{{asset('asset/css/custom.css')}}" type="text/css">
		@yield('add-css')
	</head>
	<body>
		<!--Conteudo--> 
		@yield('conteudo')

		<script src="{{asset('asset/js/jquery.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('asset/js/bootstrap.min.js')}}" type="text/javascript"></script>

		@yield('add-js')

	</body>
</html>