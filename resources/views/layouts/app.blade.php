<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>@yield('title', 'Můj blog')</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
		<script src="https://cdn.tailwindcss.com"></script>
	</head>
	<body class="bg-gray-100">
		<nav class="bg-white p-4 shadow-md">
			<div class="container mx-auto">
				<ul class="flex">
					<li class="mr-4">
						<a href="/" class="text-blue-500 hover:text-blue-800">Domů</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container mx-auto mt-8">
			@yield('content')
		</div>

		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
