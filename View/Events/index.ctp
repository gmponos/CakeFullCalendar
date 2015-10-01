<?php
/*
 * View/Events/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<div class="toolbar toolbar-default">
	<?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-success btn-sm'))?>
	<?php echo $this->Html->link(__('Calendar'), array('plugin' => 'calendar', 'controller' => 'calendar', 'action' => 'index'), array('class' => 'btn btn-primary btn-sm', 'icon' => array('class' => 'icon icon-calendar icon-fw')))?>
	<div class="btn-group">
		<?php echo $this->Html->button('', array('class' => 'btn btn-primary btn-sm dropdown-toggle', 'data-toggle' => 'dropdown', 'icon' => array('class' => array('icon icon-cog icon-fw'))));?>
		<ul class="dropdown-menu">
			<li><?php echo $this->Html->link(__('Types'), array('plugin' => 'calendar', 'controller' => 'event_types', 'action' => 'index'), array('icon' => array('class' => 'icon icon-list icon-fw')))?></li>
			<li><?php echo $this->Html->link(__('Status'), array('plugin' => 'calendar', 'controller' => 'event_statuses', 'action' => 'index'), array('icon' => array('class' => 'icon icon-list icon-fw')))?></li>
		</ul>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped small">
		<tr>
			<th><?php echo $this->Paginator->sort('type_id');?></th>
			<th><?php echo $this->Paginator->sort('status_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('start');?></th>
            <th><?php echo $this->Paginator->sort('end');?></th>
            <th><?php echo $this->Paginator->sort('all_day');?></th>
			<th></th>
		</tr>
		<?php foreach ($events as $event):?>
			<tr>
				<td><?php echo $event['EventType']['type'];?></td>
				<td><?php echo $event['EventStatus']['status'];?></td>
				<td><?php echo $event['Event']['title'];?></td>
				<td><?php echo $event['Event']['start'];?></td>
				<td>
					<?php
					if ($event['Event']['all_day'] == 0) {
						echo $event['Event']['end'];
					} else {
						echo 'N/A';
					}
					?>
				</td>
				<td>
					<?php echo $this->Html->status($event['Event']['all_day']);?>
				</td>
				<td class="nowrap">
					<?php echo $this->Element->btnLinkView($event['Event']['id']);?>
					<?php echo $this->Element->btnLinkEdit($event['Event']['id']);?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
	<?php
	echo $this->element('pagination/paging');
	echo $this->element('pagination/pagination');
	?>
</div>