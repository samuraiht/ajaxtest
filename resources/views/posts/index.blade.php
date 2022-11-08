<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>投稿一覧</title>
	<script src="{{ asset('/js/ajax.js') }}" defer></script>
</head>

<body>
	<header>
		<nav>
			<div>
				<a href="#">投稿アプリ</a>
			</div>
		</nav>
	</header>

	<main>
		<article>
			<div>
				<h1>投稿一覧</h1>
				@if (session('flash_message'))
					 <p>{{ session('flash_message') }}</p>
				 @endif
 
				<div>
					<?php //<a href="{{ route('posts.create') }}">新規投稿</a> ?>
					<form name="ajax" method="post">
						@csrf
						 <div>
							<label for="title">タイトル</label>
							<input type="text" name="title">
						</div>
						<div>
							<label for="content">本文</label>
							<textarea name="content"></textarea>
						</div>
					</form>
					<button id="ajaxbtn">投稿</button>

				</div>

				<div id="ajaxframe">
					@foreach($posts as $post)
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
					@endforeach
				</div>
			</div>
		</article>
	</main>

	<footer>
		<p>&copy; 投稿アプリ All rights reserved.</p>
	</footer>
</body>

</html>
