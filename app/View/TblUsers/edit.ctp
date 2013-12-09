<div class="tblUsers form">
<?php echo $this->Form->create('TblUser'); ?>
	<fieldset>
		<legend><?php echo __(Configure::read("PageTitle.usersEdit")); ?></legend>
		<dl>
			<dt><?php echo __(Configure::read("UsersText.id")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['id']); ?>
				<?php echo $this->Form->input('id'); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.dmm_code")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['dmm_code']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.user_name")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['user_name']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.user_family_name")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['user_family_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __(Configure::read("UsersText.first_name")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['first_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __(Configure::read("UsersText.nick_name")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['nick_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __(Configure::read("UsersText.is_profile_finished")); ?></dt>
			<dd>
				<?php echo $this->Form->input('is_profile_finished',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.level")); ?></dt>
			<dd>
				<?php echo $this->Form->input('level',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.experience_point")); ?></dt>
			<dd>
				<?php echo $this->Form->input('experience_point',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.physical_time")); ?></dt>
			<dd>
				<?php echo $this->Form->input('physical_time',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.max_physical_point")); ?></dt>
			<dd>
				<?php echo $this->Form->input('max_physical_point',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.voice_volume")); ?></dt>
			<dd>
				<?php echo $this->Form->input('voice_volume',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.bgm_volume")); ?></dt>
			<dd>
				<?php echo $this->Form->input('bgm_volume',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.se_volume")); ?></dt>
			<dd>
				<?php echo $this->Form->input('se_volume',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.text_speed")); ?></dt>
			<dd>
				<?php echo $this->Form->input('text_speed',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.game_point")); ?></dt>
			<dd>
				<?php echo $this->Form->input('game_point',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.coin")); ?></dt>
			<dd>
				<?php echo $this->Form->input('coin',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.album_count")); ?></dt>
			<dd>
				<?php echo $this->Form->input('album_count',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.max_album_count")); ?></dt>
			<dd>
				<?php echo $this->Form->input('max_album_count',array('label'=>false)); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.last_tutorial_id")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['last_tutorial_id']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.is_tutorial_finished")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['is_tutorial_finished']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.stamp_card_count")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['stamp_card_count']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.last_login_bonus_at")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['last_login_bonus_at']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.last_clear_character_id")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['last_clear_character_id']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.pre_registration_at")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['pre_registration_at']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.last_access_at")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['last_access_at']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.created")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['created']); ?>
			</dd>
			<dt><?php echo __(Configure::read("UsersText.modified")); ?></dt>
			<dd>
				<?php echo h($tblUser['TblUser']['modified']); ?>
			</dd>
		</dl>
	</fieldset>
	<div align="right"> 
	<?php 
		$str = sprintf(Configure::read('ConfirmMsg.delete'), Configure::read('InfoName.users'));
		echo $this->Form->submit(__(Configure::read("CommonText.delete"), true), array('name'=>'delete','div'=>false,'onClick'=>"return confirm('$str')"));
		echo '　　　';
		$str = sprintf(Configure::read('ConfirmMsg.update'), Configure::read('InfoName.users'));
		echo $this->Form->submit(__(Configure::read("CommonText.confirm"), true), array('name'=>'update','div'=>false,'onClick'=>"return confirm('$str')"));
	?>
	<?php echo $this->Form->end(); ?>
	</div>
</div>

