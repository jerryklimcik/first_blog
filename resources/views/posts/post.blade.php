@extends('layouts.app')

@section('title', $post->title)

@section('content')
	<div class="py-12">
		<h1 class="text-2xl font-semibold mb-4">{{ $post->title }}</h1>
		<p>Autor: {{ $post->user->name }}</p>
		<p>Kategorie: {{ $post->category->name }}</p>
		<p>Vytvořeno: {{ $post->created_at->format('d.m.Y H:i') }}</p>
		<br>
		{{ $post->content }}
	</div>
@endsection
