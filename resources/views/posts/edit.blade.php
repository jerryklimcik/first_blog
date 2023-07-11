@extends('layouts.app')

@section('title', 'Editace článku')

@section('content')
	<div class="container mx-auto px-4">
		<h1 class="text-2xl font-bold mb-4">Editovat článek</h1>

		<form action="{{ route('posts.update', $post->id) }}" method="POST">
			@csrf
			@method('PUT')

			<div class="mb-4">
				<label for="author" class="block text-sm font-bold mb-2">Autor:</label>
				<select name="author_id" id="author" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
					@foreach($users as $user)
						<option value="{{ $user->id }}" {{ $post->user_id === $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
					@endforeach
				</select>
				@error('author_id')
				<span class="text-red-500 text-xs italic">{{ $message }}</span>
				@enderror
			</div>

			<div class="mb-4">
				<label for="category" class="block text-sm font-bold mb-2">Kategorie:</label>
				<select name="category_id" id="category" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
					@foreach($categories as $category)
						<option value="{{ $category->id }}" {{ $post->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
					@endforeach
				</select>
				@error('category_id')
				<span class="text-red-500 text-xs italic">{{ $message }}</span>
				@enderror
			</div>

			<div class="mb-4">
				<label for="title" class="block text-sm font-bold mb-2">Název článku:</label>
				<input type="text" name="title" id="title" value="{{ $post->title }}" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				@error('title')
				<span class="text-red-500 text-xs italic">{{ $message }}</span>
				@enderror
			</div>

			<div class="mb-4">
				<label for="content" class="block text-sm font-bold mb-2">Obsah článku:</label>
				<textarea name="content" id="content" rows="10" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $post->content }}</textarea>
				@error('content')
				<span class="text-red-500 text-xs italic">{{ $message }}</span>
				@enderror
			</div>

			<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
				Upravit článek
			</button>
		</form>
	</div>
@endsection
