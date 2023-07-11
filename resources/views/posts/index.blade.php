@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
	<h1 class="text-2xl font-semibold mb-4">Články</h1>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900">
					<table class="border-collapse table-auto w-full text-sm">
						<thead>
							<tr>
								<th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Název</th>
								<th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Vytvořeno</th>
								<th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Upraveno</th>
								<th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Akce</th>
							</tr>
						</thead>
						<tbody class="bg-white">
							@foreach ($posts as $post)
								<tr>
									<td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $post->title }}</td>
									<td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $post->created_at }}</td>
									<td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $post->updated_at }}</td>
									<td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
										<a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editovat</a>
										<form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
											@csrf
											@method('DELETE')
											<button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Smazat</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
@endsection
