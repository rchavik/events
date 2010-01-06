<div class="events index">
<h2><?php __('Events');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>

<table class="pagination">
	<tr>
    	<td width="60%">&nbsp;</td>
        <td align="right">
          <div class="paging">
          	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
           | 	<?php echo $paginator->numbers();?>
          	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
          </div>
        </td>
    </tr>
</table>

<table class="listing">
<tr class="headings">
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('startdate');?></th>
	<th><?php echo $paginator->sort('enddate');?></th>
	<th><?php echo $paginator->sort('status');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($events as $event):
?>
	<tr class='autoWidth'>
		<td>
			<?php echo $event['Event']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($event['User']['id'], array('controller'=> 'users', 'action'=>'view', $event['User']['id'])); ?>
		</td>
		<td>
			<?php echo $event['Event']['title']; ?>
		</td>
		<td>
			<?php echo $event['Event']['description']; ?>
		</td>
		<td>
			<?php echo $event['Event']['startdate']; ?>
		</td>
		<td>
			<?php echo $event['Event']['enddate']; ?>
		</td>
		<td>
			<?php echo $event['Event']['status']; ?>
		</td>
		<td>
			<?php echo $event['Event']['created']; ?>
		</td>
		<td>
			<?php echo $event['Event']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $event['Event']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $event['Event']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $event['Event']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $event['Event']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<table class="pagination">
	<tr>
    	<td width="60%">&nbsp;</td>
        <td align="right">
          <div class="paging">
          	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
           | 	<?php echo $paginator->numbers();?>
          	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
          </div>
        </td>
    </tr>
</table>