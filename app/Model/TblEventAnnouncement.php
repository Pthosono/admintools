<?php
App::uses('AppModel', 'Model');
/**
 * TblEventAnnouncement Model
 *
 */
class TblEventAnnouncement extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	
	//入力チェック
	public $validate = array(
			'title' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => "タイトル名を入力してください。"
				),
			),
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
		$end_at = $this->data['TblEventAnnouncement']['end_at'];
		
		if ($val >= $end_at) return false;
		
		return true;
	}
}
