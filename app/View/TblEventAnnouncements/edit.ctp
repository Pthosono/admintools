<div class="tblEventAnnouncements form">
<?php echo $this->Form->create('TblEventAnnouncement'); ?>
	<fieldset>
		<legend><?php echo __(Configure::read("PageTitle.eventAnnouncements")); ?></legend>
	<dl>
        <dt><?php echo Configure::read("EventAnnouncementsText.title"); ?></dt>
        <dd><?php echo $this->Form->input('title',array('label' => false)); ?></dd>
        <dt><?php echo Configure::read("EventAnnouncementsText.start_at"); ?></dt>
        <dd>
        <?php
	        echo $this->Form->input('start_at', array(
						'label' => false,
						'div' => false,
						'default' => date('Y-m-d H:i'),
						'timeFormat' => '24',
						'dateFormat' => 'YMD',
						'monthNames' => false,
						'empty' => false,
						'separator' => '/',
						'minuteInterval' => '60',
						'minYear' => date('Y')));
			echo "～";
			echo $this->Form->input('end_at', array(
						'label' => false,
						'div' => false,
						'default' => date('Y-m-d H:i'),
						'timeFormat' => '24',
						'dateFormat' => 'YMD',
						'monthNames' => false,
						'empty' => false,
						'separator' => '/',
						'minuteInterval' => '60',
						'minYear' => date('Y')));
        ?>
        </dd>
        <dt><?php echo Configure::read("EventAnnouncementsText.scenario_title") ?></dt>
        <dd><?php echo $this->Form->input('TblEventAnnouncement.scenarios_id', array(
					'type'=>'select','label' => false,  'div' => false,
			  		'options'=>array($scenarioArray)
				)
			) ?></dd>
    </dl>
	</fieldset>
<?php 
	$str = sprintf(Configure::read('ConfirmMsg.update'), Configure::read('InfoName.eventAnnouncements'));
	echo $this->Form->submit(__(Configure::read("CommonText.confirm"), true), array('name'=>'update','div'=>false,'onClick'=>"return confirm('$str')"));
?>
<?php echo $this->Form->end(); ?>
</div>
