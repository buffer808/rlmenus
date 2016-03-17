<div class="menus view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Menu For (' . $settings['Next Date']. ')'); ?></h1>
			</div>
		</div>
	</div>
<?php if($myRole == 'admin' || $myRole == 'canteenadmin') : ?>
	<div class="row">

		<div class="col-md-4">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Add Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
		                    
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Breakfast'), array('controller' => 'breakfasts','action' => 'add'), array('escape' => false)); ?> </li>
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Lunch'), array('controller' => 'lunches','action' => 'add'), array('escape' => false)); ?> </li>
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Snack'), array('controller' => 'snacks','action' => 'add'), array('escape' => false)); ?> </li>
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Dinner'), array('controller' => 'dinners','action' => 'add'), array('escape' => false)); ?> </li>
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Midnight Snack'), array('controller' => 'midnight_snacks','action' => 'add'), array('escape' => false)); ?> </li>
		          
							</ul>
						</div>						<!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 --> 

		<div class="col-md-4">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Delete Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
		                    
		              
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Remove Breakfast'), array('controller' => 'breakfasts','action' => 'index'), array('escape' => false)); ?> </li>
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Remove Lunch'), array('controller' => 'lunches','action' => 'index'), array('escape' => false)); ?> </li>
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Remove Snack'), array('controller' => 'snacks','action' => 'index'), array('escape' => false)); ?> </li>
		                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Remove Dinner'), array('controller' => 'dinners','action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Remove Midnight Snack'), array('controller' => 'midnight_snacks','action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Remove All'), array('controller' => 'menus','action' => 'deleteAllMenus'), array('escape' => false)); ?> </li>
                            
							</ul>
						</div>						<!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->		
			<div class="row">


<?php endif ; ?>
		<div class="col-md-9">		
<?php foreach($meals as $title => $meal) : ?>	
<?php if(count($meal[1]) >0):?>
<table cellpadding="0" cellspacing="0" class="table table-striped">
<tbody>

<tr>


<th><h3><?php echo __($title ); ?>&nbsp;<?php echo ' ('.$settings[$title].')'; ?></h3></th><th></th>
					
</tr>

<?php foreach($meal[1] as $m): ?>

<tr>
<?php if($m['Menu']['price'] == 0): ?>
  <th><?php echo __($m['Menu']['title']); ?> &nbsp;&nbsp;</th>
<?php else: ?>
  <th><?php echo __($m['Menu']['title']); ?> &nbsp;&nbsp;(Price: <?php echo __($m['Menu']['price'] . ' PHP' ); ?>)</th>
<?php endif; ?>
		<td>
			<?php echo nl2br($m['Menu']['description']); ?>
			&nbsp;
		</td>
		
</tr>
<tr></tr>
<?php endforeach ?>

				</tbody>
			</table>
<?php endif ?>
<?php endforeach ?>


		</div><!-- end col md 9 -->

	</div>
</div>
