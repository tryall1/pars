<div class="well">
	<h4><?= $h1 ?></h4>

	<form role="form" action="" method="post">
		<input type="hidden" name="action" value="edit"/>

		<div class="form-group">
			<label for="postTitle">Заголовок</label>
			<input type="text" class="form-control" id="postTitle" name="title" value="<?= htmlspecialchars($post->title) ?>"/>
		</div>
		<div class="form-group">
			<label for="postLead">Лид текст</label>
			<textarea class="form-control" id="postLead" rows="5" name="lead"><?= htmlspecialchars($post->lead) ?></textarea>
		</div>
		<div class="form-group">
			<label for="postBody">Основной текст блога</label>
			<textarea class="form-control" id="postBody" rows="10" name="body"><?= htmlspecialchars($post->body) ?></textarea>
		</div>
		<button type="submit" class="btn btn-default">Сохранить</button>
	</form>
</div>