<div class="tblUsers index">
	<h2><?php echo __(Configure::read("PageTitle.users")); ?></h2>
	
	<?php echo $this->Form->create(null); ?>
	<dl>
			<dt><?php echo __(Configure::read("UsersText.id")); ?></dt>
			<dd>
				<?php echo $this->Form->text('id',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.user_name")); ?></dt>
			<dd>
				<?php echo $this->Form->input('user_name',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.created")); ?></dt>
			<dd>
				<?php echo $this->Form->dateTime('created','YM','NONE',array('monthNames' => false, 'selected' => ' ' , 'empty'=>' ', 'separator' => '年','maxYear' => date('Y'), 'div'=>false)); ?>月　　　<?php echo $this->Form->submit(Configure::read("CommonText.search"),array('name'=>'search', 'div'=>false)); ?>
			</dd>
	</dl>
	
	<?php echo $this->Form->end(); ?>

	<div class="paging">
	<?php
		echo $this->Paginator->prev(__(Configure::read("CommonText.prev")), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__(Configure::read("CommonText.next")), array(), null, array('class' => 'next disabled'));
	?>
	</div>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id', Configure::read("UsersText.id")); ?></th>
			<th><?php echo $this->Paginator->sort('dmm_code', Configure::read("UsersText.dmm_code")); ?></th>
			<th><?php echo $this->Paginator->sort('user_name', Configure::read("UsersText.user_name")); ?></th>
			<th><?php echo $this->Paginator->sort('level', Configure::read("UsersText.level")); ?></th>
			<th><?php echo $this->Paginator->sort('last_access_at', Configure::read("UsersText.last_access_at")); ?></th>
			<th><?php echo $this->Paginator->sort('created', Configure::read("UsersText.created")); ?></th>
			<th><?php echo $this->Paginator->sort('modified', Configure::read("UsersText.modified")); ?></th>
	</tr>
	<?php foreach ($tblUsers as $tblUser): ?>
	<tr>
		<td><?php echo $this->Html->link(__(h($tblUser['TblUser']['id'])), array('action' => 'edit', $tblUser['TblUser']['id'])); ?>&nbsp;</td>
		<td><?php echo h($tblUser['TblUser']['dmm_code']); ?>&nbsp;</td>
		<td><?php echo h($tblUser['TblUser']['user_name']); ?>&nbsp;</td>
		<td><?php echo h($tblUser['TblUser']['level']); ?>&nbsp;</td>
		<td><?php echo h($tblUser['TblUser']['last_access_at']); ?>&nbsp;</td>
		<td><?php echo h($tblUser['TblUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($tblUser['TblUser']['modified']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
