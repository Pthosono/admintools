<div class="maintenances form">
<?php echo $this->Form->create('maintenances'); ?>
	<fieldset>
		<legend><?php echo __(Configure::read("PageTitle.maintenances")); ?></legend>
	<dl>
        <dt><?php echo Configure::read("MaintenancesText.start_at"); ?></dt>
        <dd>
        <?php
        	$date_option = array(
			    'minYear' => date('Y'),
			    'separator' => '/',
			    'value' => array('year' => date('Y'),'month' => date('m'),'day' => date('d')),
			    'monthNames' => false
			);
      		echo $this->Form->dateTime('start_at','YMD','24',$date_option);
      		echo "～";
      		$date_option = array(
			    'minYear' => date('Y'),
			    'separator' => '/',
			    'value' => array('year' => date('Y'),'month' => date('m'),'day' => date('d')),
			    'monthNames' => false
			);
      		echo $this->Form->dateTime('end_at','YMD','24',$date_option);
	        /*echo $this->Form->input('start_at', array(
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
						'minYear' => date('Y')));*/
        ?>
        </dd>
    </dl>
	</fieldset>
<?php 
	$str = sprintf(Configure::read('ConfirmMsg.update'), Configure::read('InfoName.eventAnnouncements'));
	echo $this->Form->submit(__(Configure::read("CommonText.confirm"), true), array('name'=>'update','div'=>false,'onClick'=>"return confirm('$str')"));
?>
<?php echo $this->Form->end(); ?>
</div>
