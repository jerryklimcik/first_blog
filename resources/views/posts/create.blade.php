@extends('layouts.app')

@section('title', 'Nový článek')

@section('content')
	<div class="container mx-auto px-4">
		<h1 class="text-2xl font-bold mb-4">Vytvořit nový článek</h1>

		<form action="{{ route('posts.store') }}" method="POST">
			@csrf

			<div class="mb-4">
				<label for="author" class="block text-sm font-bold mb-2">Autor:</label>
				<select name="author" id="author" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
					@foreach ($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
				</select>
				@error('author')
				<span class="text-red-500 text-xs italic">{{ $message }}</span>
				@enderror
			</div>

			<div class="mb-4">
				<label for="category" class="block text-sm font-bold mb-2">Kategorie:</label>
				<select name="category" id="category" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
				@error('category')
				<span class="text-red-500 text-xs italic">{{ $message }}</span>
				@enderror
			</div>


			<div class="mb-4">
				<label for="title" class="block text-sm font-bold mb-2">Název článku:</label>
				<input type="text" name="title" id="title" value="{{ old('title') }}" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				@error('title')
				<span class="text-red-500 text-xs italic">{{ $message }}</span>
				@enderror
			</div>

			<div class="mb-4">
				<label for="content" class="block text-sm font-bold mb-2">Obsah článku:</label>
				<textarea name="content" id="content" rows="10" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
				@error('content')
				<span class="text-red-500 text-xs italic">{{ $message }}</span>
				@enderror
			</div>

			<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
				Vytvořit článek
			</button>
		</form>
	</div>
@endsection
