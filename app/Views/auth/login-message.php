<?php if (session()->has('message')) : ?>
    <?= session('message') ?>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <?= session('error') ?>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="alert alert-danger">
	<?php foreach (session('errors') as $error) : ?>
		<li><?= $error ?></li>
	<?php endforeach ?>
	</ul>
<?php endif ?>