
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->Html->css('font-awesome.min') ?>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600' rel='stylesheet' type='text/css'>

	<?= $this->Less->less('less/styles.less'); ?>
	<?= $this->fetch('cssTop'); ?>
</head>
<body>
<div id="wrapper">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'home']); ?>" class="navbar-brand">
				<?= $this->Html->image('logo-navbar.png'); ?>
				<span><?= __('ML2') ?></span>
			</a>
			<ul class="nav navbar-right top-nav">
				<?php
				$user = $this->request->session()->read('Auth.User');
				if ($user) :
				?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?= $this->Html->image('http://www.gravatar.com/avatar/' . (!empty($user['email']) ? md5($user['email']) : md5('no@email.com')) . '?s=24', ['class' => 'img-circle']); ?>
							<?php
							$fn = (!empty($user['firstName']) ? $user['firstName'] . ' ' . $user['lastName'] : $user['username']);
							echo strlen($fn) > 25 ? substr($fn, 0, 25) . "..." : $fn;
							?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><?= $this->Html->link(__('My profile'), ['controller' => 'Users', 'action' => 'view', $user['id']]) ?></li>
							<li><?= $this->Html->link(__('My projects'), ['controller' => 'Projects', 'action' => 'myProjects']) ?></li>
							<li><?= $this->Html->link(__('My Organizations'), ['controller' => 'Organizations', 'action' => 'myOrganizations']); ?></li>
							<li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']);?></li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
	<?= $this->cell('Sidebar::all'); ?>
	<div id="page-content-wrapper">
		<div class="container-fluid xyz">
			<?= $this->fetch('content'); ?>
		</div>
	</div>
</div>
<?= $this->Html->script(
	[
		'jquery-2.1.4.min',
		'bootstrap.min',
		'googleAnalytics',
		'main'
	]
); ?>

<!-- WARNING :  Do not move this line before a manual import of script! -->
<?=$this->fetch('scriptBottom'); ?>
</body>
</html>