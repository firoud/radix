<div class="posts">
<h2><?php echo __('Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['ParentPost']['title'], array('controller' => 'posts', 'action' => 'view', $post['ParentPost']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($post['Post']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Excerpt'); ?></dt>
		<dd>
			<?php echo h($post['Post']['excerpt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($post['Post']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($post['Post']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu Order'); ?></dt>
		<dd>
			<?php echo h($post['Post']['menu_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($post['Post']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment Status'); ?></dt>
		<dd>
			<?php echo h($post['Post']['comment_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment Count'); ?></dt>
		<dd>
			<?php echo h($post['Post']['comment_count']); ?>
			&nbsp;
		</dd>
	</dl>
</div>


<?php 

if ($post['Post']['comment_status'] == 1){
	echo $this->element('Comments.form' , array( 'post_id' => $post['Post']['id'] ) );
}

?>