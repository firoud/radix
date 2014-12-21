<div class="comments index">

	<div class="table-responsive">
    
	<table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
    		<th><?php echo $this->Paginator->sort('author'); ?></th>
			<th><?php echo __('Comment'); ?></th>
			<th><?php echo __('In Response To'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($comments as $comment): ?>
	<tr>
    
    		<td>
			
			<strong><?php echo h($comment['Comment']['author']); ?></strong>
            <br /><?php echo h($comment['Comment']['author_email']); ?>
			<br /><?php echo h($comment['Comment']['author_url']); ?>

            
            </td>

		<td>
        <div class="submitted-on">
	<?php echo __('Submitted on') . ' '; echo h($comment['Comment']['created']); ?>
    </div>
    <p><?php echo h($comment['Comment']['content']); ?></p>
		</td>
		<td>
			<?php echo $this->Html->link($comment['Post']['title'], array('controller' => 'posts', 'action' => 'edit', $comment['Post']['id'])); ?>
            <br />
          <?php echo $this->Html->link(__('View Post'), array('controller' => 'posts', 'action' => 'view', $comment['Post']['id'])); ?>
		</td>

		
        
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comment['Comment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comment['Comment']['id']), array(), __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
 </div>   
    
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>


