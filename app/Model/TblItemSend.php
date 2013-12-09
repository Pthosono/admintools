<?php
App::uses('AppModel', 'Model');
/**
 * TblItemSend Model
 *
 */
class TblItemSend extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'tbl_item_send';

	//入力チェック
	public $validate = array(
			//開始日時が終了日時より前であるかのチェック
			'start_at' => array(
				'rule' => array('isStartDateBeforeEndDate'),
				'message' => "開始日時は終了日時より前にしてください。"
			),
		);
	
/**
 * 開始日時が終了日時より前であるかのチェックメソッド
 *
 * @param $check 「入力項目名=>入力値」形式の配列
 * @return boolean true:チェックOK、false:チェックNG
 */
	public function isStartDateBeforeEndDate($check) {
		$key = key($check);
		$val = array_shift($check);
		$end_at = $this->data['TblItemSend']['end_at'];
		
		if ($val >= $end_at) return false;
		
		return true;
	}
}
