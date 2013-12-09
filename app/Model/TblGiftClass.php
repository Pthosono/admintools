<?php
App::uses('AppModel', 'Model');
/**
 * TblGiftClass Model
 *
 */
class TblGiftClass extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'tbl_gift_class';

	public $validate = array(
			'comment' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => "メッセージを入力してください。"
				),
			),
			'item_id' => array(
				//アイテムが選択されている場合はアイテム数が入力されていることをチェック
				'rule' =>  array('checkInputItemAmount'),
				'message' => "付与するアイテムの数を入力してください。"
			),
			'item_amount' => array(
				//アイテム数に1以上の数字が入力されているかのチェック
				'rule' =>  array('checkItemAmountValue'),
				'required' => true,
				'allowEmpty' => true,
				'message' => "1以上の値を入れてください。"
			),
		);

/**
 * アイテム数が入力されているかのチェックメソッド
 *
 * @param $check 「入力項目名=>入力値」形式の配列
 * @return boolean true:チェックOK、false:チェックNG
 */
	public function checkInputItemAmount($check) {
		
		$key = key($check);
		$val = array_shift($check);
		
		if ($val != null) {
			if ($this->data['TblGiftClass']['item_amount'] != '') {
				return true;
			} else {
				return false;
			}
		}
		
		return true;
	}
/**
 * アイテム数チェックメソッド
 * アイテム数は1以上の数値が入力されている必要がある
 *
 * @param $check 「入力項目名=>入力値」形式の配列
 * @return boolean true:チェックOK、false:チェックNG
 */
	public function checkItemAmountValue($check) {
		$key = key($check);
		$val = array_shift($check);
		
		if ($this->data['TblGiftClass']['item_id'] != null) {
			if ($val >= 1) {
				return true;
			} else {
				return false;
			}
		}
		
		return true;
	}
}
