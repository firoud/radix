<div class="posts view">
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terms'), array('controller' => 'terms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Term'), array('controller' => 'terms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($post['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Post Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($post['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['parent_id']; ?></td>
			<td><?php echo $comment['post_id']; ?></td>
			<td><?php echo $comment['user_id']; ?></td>
			<td><?php echo $comment['name']; ?></td>
			<td><?php echo $comment['url']; ?></td>
			<td><?php echo $comment['email']; ?></td>
			<td><?php echo $comment['comment']; ?></td>
			<td><?php echo $comment['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array(), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Posts'); ?></h3>
	<?php if (!empty($post['ChildPost'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Excerpt'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Menu Order'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Comment Status'); ?></th>
		<th><?php echo __('Comment Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($post['ChildPost'] as $childPost): ?>
		<tr>
			<td><?php echo $childPost['id']; ?></td>
			<td><?php echo $childPost['parent_id']; ?></td>
			<td><?php echo $childPost['user_id']; ?></td>
			<td><?php echo $childPost['title']; ?></td>
			<td><?php echo $childPost['slug']; ?></td>
			<td><?php echo $childPost['excerpt']; ?></td>
			<td><?php echo $childPost['content']; ?></td>
			<td><?php echo $childPost['type']; ?></td>
			<td><?php echo $childPost['menu_order']; ?></td>
			<td><?php echo $childPost['created']; ?></td>
			<td><?php echo $childPost['modified']; ?></td>
			<td><?php echo $childPost['status']; ?></td>
			<td><?php echo $childPost['comment_status']; ?></td>
			<td><?php echo $childPost['comment_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $childPost['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $childPost['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $childPost['id']), array(), __('Are you sure you want to delete # %s?', $childPost['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Terms'); ?></h3>
	<?php if (!empty($post['Term'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Taxonomy'); ?></th>
		<th><?php echo __('Post Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($post['Term'] as $term): ?>
		<tr>
			<td><?php echo $term['id']; ?></td>
			<td><?php echo $term['name']; ?></td>
			<td><?php echo $term['slug']; ?></td>
			<td><?php echo $term['parent_id']; ?></td>
			<td><?php echo $term['description']; ?></td>
			<td><?php echo $term['taxonomy']; ?></td>
			<td><?php echo $term['post_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'terms', 'action' => 'view', $term['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'terms', 'action' => 'edit', $term['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'terms', 'action' => 'delete', $term['id']), array(), __('Are you sure you want to delete # %s?', $term['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Term'), array('controller' => 'terms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
