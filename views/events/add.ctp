<div id="breadCrumb">Settings &rsaquo;&rsaquo; <?php echo $html->link(__('Events', true), array('action'=>'index'));?> &rsaquo;&rsaquo; Add</div>
<div class="events form">
<?php echo $form->create('Event');?>

	<?php
		echo $form->input('user_id');
		echo $form->input('title');
		echo $form->input('description');
		echo $form->input('startdate');
		echo $form->input('enddate');
		echo $form->input('status');
	?>
 <div class="btns">
  <?php echo $form->submit('Submit', array('div' => false));?>
	<?php echo $html->link(__('Cancel', true), array('action'=>'index'), array('class' => 'cancel'));?>
  </div>
  
  <?php echo $form->end();?>
</div>