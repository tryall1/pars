<h1><?= $h1 ?></h1>
<hr>
<?php
foreach ($posts as $post) {
	?>
	<h2><a href="<?= $post->getUrl() ?>"><?= $post->title ?></a></h2>
	<p><span class="glyphicon glyphicon-time"></span> создан <?= $post->dat ?></p>
	<p><?= nl2br($post->lead) ?></p>
	<a class="btn btn-primary" href="<?= $post->getUrl() ?>">Читать далее <span class="glyphicon glyphicon-chevron-right"></span></a>
	<hr>
<? } ?>
<?= Helper::getPaginator($page, $npages, '/blog/page/') ?>