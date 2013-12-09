<div class="tblItemSends form">
	<fieldset>
		<legend><?php echo __(Configure::read("PageTitle.itemSends")); ?></legend>
	<?php echo $this->Form->create('TblItemSend', array('enctype' => 'multipart/form-data')) ?>
	<?php echo $this->Form->input('id') ?>
	<dl>
        <dt>対象ユーザーCSVアップロード</dt>
        <dd><?php echo $this->Form->file('file_name',array('label'=> false)) ?></dd>
    </dl>
    <br>
	<hr>
	付与対象ユーザー数　<?php echo $userCount ?>人
	<hr>
	<br>
	<table>
		<tr>
	        <td><?php echo Configure::read("ItemSendsText.notice_at") ?></td>
	        <td><?php echo $this->Form->input('notice_at', array(
	       			'label' => false,
					'default' => date('Y-m-d H:i'),
					'timeFormat' => '24',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'empty' => false,
					'separator' => '/',
					'minuteInterval' => '60',
					'minYear' => date('Y'))) ?></td>
	        <td></td>
	        <td></td>
        </tr>
        <tr>
	        <td><?php echo Configure::read("ItemSendsText.start_at") ?></td>
	        <td><?php echo $this->Form->input('start_at', array(
					'label' => false,
					'default' => date('Y-m-d H:i'),
					'timeFormat' => '24',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'empty' => false,
					'separator' => '/',
					'minuteInterval' => '60',
					'minYear' => date('Y'))) ?></td>
	        <td>～</td>
	        <td><?php echo $this->Form->input('end_at', array(
	        		'label' => false,
					'default' => date('Y-m-d  H:i'),
					'timeFormat' => '24',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'empty' => false,
					'separator' => '/',
					'minuteInterval' => '60',
					'minYear' => date('Y'))) ?></td>
        </tr>
    </table>
    <dl>
        <dt><?php echo Configure::read("ItemSendsText.comment") ?></dt>
        <dd><?php echo $this->Form->input('TblGiftClass.0.comment',array('label'=>false)) ?></dd>
    </dl>
    <table>
    	<tr>
	        <td></td>
   	        <td><?php echo Configure::read("ItemSendsText.item_id") ?></td>
	        <td><?php echo Configure::read("ItemSendsText.item_amount") ?></td>
	    </tr>
		<tr>
	        <td>1</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.0.item_id', array(
					'type'=>'select','label' => false, 'div' => false, 'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.0.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
	    	<tr>
	        <td>2</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.1.item_id', array(
					'type'=>'select','label' => false, 'div' => false, 'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.1.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
		<tr>
	        <td>3</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.2.item_id', array(
					'type'=>'select','label' => false,  'div' => false,'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.2.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
		<tr>
	        <td>4</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.3.item_id', array(
					'type'=>'select','label' => false,  'div' => false,'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.3.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
		<tr>
	        <td>5</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.4.item_id', array(
					'type'=>'select','label' => false,  'div' => false,'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.4.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
		<tr>
	        <td>6</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.5.item_id', array(
					'type'=>'select','label' => false,  'div' => false,'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.5.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
		<tr>
	        <td>7</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.6.item_id', array(
					'type'=>'select','label' => false,  'div' => false,'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.6.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
		<tr>
	        <td>8</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.7.item_id', array(
					'type'=>'select','label' => false,  'div' => false,'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.7.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
		<tr>
	        <td>9</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.8.item_id', array(
					'type'=>'select','label' => false,  'div' => false,'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.8.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
		<tr>
	        <td>10</td>
   	        <td><?php echo $this->Form->input('TblGiftClass.9.item_id', array(
					'type'=>'select','label' => false,  'div' => false,'empty'=>'',
			  		'options'=>array($itemArray)
				)
			) ?></td>
	        <td><?php echo $this->Form->input('TblGiftClass.9.item_amount',array('label'=>false, 'div' => false)) ?></td>
	    </tr>
	</table>
	</fieldset>
<?php 
	$str = sprintf(Configure::read('ConfirmMsg.update'), Configure::read('InfoName.itemSends'));
	echo $this->Form->submit(__(Configure::read("CommonText.confirm"), true), array('name'=>'update','div'=>false,'onClick'=>"return confirm('$str')"));
?>
<?php echo $this->Form->end(); ?>
</div>
