<?php if ($myUsername != 'Guest'): ?>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#"><img height="26px"
												  src="http://www.redlanchbusinesspark.com/wp-content/themes/247-theme/html5-boilerplate/img/logo_redlanch.png"/></a>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">

					<?php if ($myRole == 'admin'): ?>
						<li <?= $currentController == "users" ? "class='active'" : "" ?>><?= $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) ?></li>
					<?php endif; ?>
					<?php if ($myRole != 'companyadmin'): ?>
						<li <?= $currentController == "menus" && $currentAction != 'today' ? "class='active'" : "" ?>><?= $this->Html->link('Menus', array('controller' => 'menus', 'action' => 'index')) ?></a></li>
					<?php endif ?>


					<li <?= $currentAction == "today" ? "class='active'" : "" ?>><?= $this->Html->link('Next Meal', array('controller' => 'menus', 'action' => 'today')) ?></a></li>

					<li <?= $currentController == "orders" && $currentAction != 'today' ? "class='active'" : "" ?>><?= $this->Html->link('Orders', array('controller' => 'orders', 'action' => 'index')) ?></a></li>
					<?php if ($myRole != 'companyadmin'): ?>
						<li> <?= $this->Html->link('Settings', array('controller' => 'settings', 'action' => 'index')); ?></li>
					<?php endif ?>
					<?php if ($myUsername != 'Guest'): ?>
						<li> <?= $this->Html->link('Edit Password', array('controller' => 'users', 'action' => 'editpassword')); ?></li>
						<li> <?= $this->Html->link('Logout   ' . $myTitle, array('controller' => 'users', 'action' => 'logout')); ?></li>
					<?php endif ?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>

<?php else: ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img height="26px"
					 src="http://www.redlanchbusinesspark.com/wp-content/themes/247-theme/html5-boilerplate/img/logo_redlanch.png"/></a>
		</div>

	</div>

<?php endif ?>