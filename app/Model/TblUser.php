<?php
App::uses('AppModel', 'Model');
/**
 * TblUser Model
 *
 */
class TblUser extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_name';
	
	//入力チェック
	public $validate = array(
			'level' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', 0, 1000),
					'message' => "1から999の値を入れてください。"
				),
			),
			'experience_point' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 1000000000),
					'message' => "0から999999999の値を入れてください。"
				),
			),
			'physical_time' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 10000),
					'message' => "0から9999の値を入れてください。"
				),
			),
			'max_physical_point' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 10000),
					'message' => "0から9999の値を入れてください。"
				),
			),
			'voice_volume' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 101),
					'message' => "0から100の値を入れてください。"
				),
			),
			'bgm_volume' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 101),
					'message' => "0から100の値を入れてください。"
				),
			),
			'se_volume' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 101),
					'message' => "0から100の値を入れてください。"
				),
			),
			'text_speed' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 101),
					'message' => "0から100の値を入れてください。"
				),
			),
			'game_point' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 1000000),
					'message' => "0から999999の値を入れてください。"
				),
			),
			'coin' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 1000000),
					'message' => "0から999999の値を入れてください。"
				),
			),
			'album_count' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 1000),
					'message' => "0から999の値を入れてください。"
				),
			),
			'max_album_count' => array(
				'notempty' => array(
					'rule' => array('notempty'),
				),
				'range' => array(
					'rule' =>  array('range', -1, 1000),
					'message' => "0から999の値を入れてください。"
				),
			),
		);
	
}
