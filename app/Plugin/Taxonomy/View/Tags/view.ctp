<div class="terms view">
<h2><?php echo __('Term'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($term['Term']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($term['Term']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($term['Term']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Term'); ?></dt>
		<dd>
			<?php echo $this->Html->link($term['ParentTerm']['name'], array('controller' => 'terms', 'action' => 'view', $term['ParentTerm']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($term['Term']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxonomy'); ?></dt>
		<dd>
			<?php echo h($term['Term']['taxonomy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post Count'); ?></dt>
		<dd>
			<?php echo h($term['Term']['post_count']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Term'), array('action' => 'edit', $term['Term']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Term'), array('action' => 'delete', $term['Term']['id']), array(), __('Are you sure you want to delete # %s?', $term['Term']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Terms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Term'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terms'), array('controller' => 'terms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Term'), array('controller' => 'terms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Terms'); ?></h3>
	<?php if (!empty($term['ChildTerm'])): ?>
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
	<?php foreach ($term['ChildTerm'] as $childTerm): ?>
		<tr>
			<td><?php echo $childTerm['id']; ?></td>
			<td><?php echo $childTerm['name']; ?></td>
			<td><?php echo $childTerm['slug']; ?></td>
			<td><?php echo $childTerm['parent_id']; ?></td>
			<td><?php echo $childTerm['description']; ?></td>
			<td><?php echo $childTerm['taxonomy']; ?></td>
			<td><?php echo $childTerm['post_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'terms', 'action' => 'view', $childTerm['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'terms', 'action' => 'edit', $childTerm['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'terms', 'action' => 'delete', $childTerm['id']), array(), __('Are you sure you want to delete # %s?', $childTerm['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Term'), array('controller' => 'terms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Posts'); ?></h3>
	<?php if (!empty($term['Post'])): ?>
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
	<?php foreach ($term['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['parent_id']; ?></td>
			<td><?php echo $post['user_id']; ?></td>
			<td><?php echo $post['title']; ?></td>
			<td><?php echo $post['slug']; ?></td>
			<td><?php echo $post['excerpt']; ?></td>
			<td><?php echo $post['content']; ?></td>
			<td><?php echo $post['type']; ?></td>
			<td><?php echo $post['menu_order']; ?></td>
			<td><?php echo $post['created']; ?></td>
			<td><?php echo $post['modified']; ?></td>
			<td><?php echo $post['status']; ?></td>
			<td><?php echo $post['comment_status']; ?></td>
			<td><?php echo $post['comment_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array(), __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
