<?php echo $this->option->get('site_name'); ?>


<div class="options form">
<?php echo $this->Form->create('Option'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Option'); ?></legend>
	<?php
		echo $this->Form->input('site_name', array('label' => __('Site Name'), 'default' => $this->option->get('site_name')));
		echo $this->Form->input('site_slogan', array('label' => __('Site Slogan'), 'default' => $this->option->get('site_slogan')));
		echo $this->Form->input('site_mail', array('label' => __('E-mail Address'), 'default' => $this->option->get('site_mail')));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Options'), array('action' => 'index')); ?></li>
	</ul>
</div>
