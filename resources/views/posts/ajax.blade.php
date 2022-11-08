<div>
	<div>
		<h2>{{ $post->title }}</h2>
		<p>{{ $post->content }}</p>     
		<div>
			<a href="{{ route('posts.show', $post) }}">詳細</a>
			<a href="{{ route('posts.edit', $post) }}">編集</a>
			<form action="{{ route('posts.destroy', $post) }}" method="post">
			@csrf
			@method('delete')
			<button type="submit" onclick="return confirm('本当に削除しますか？');">削除</button>
			</form>
		</div>
	</div>
</div>
