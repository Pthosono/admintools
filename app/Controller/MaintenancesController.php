<?php
App::uses('AppController', 'Controller');
/**
 * Maintenances Controller
 *
 * @property PaginatorComponent $Paginator
 */
class MaintenancesController extends AppController {

/**
 * Components
 *
 * @var array
 */
 	//使用モデル無し
	 public $uses = null;

/**
 * index method
 *
 * @return void
 */
	public function index() {
		return $this->redirect(array('action' => 'edit'));
	}

/**
 * edit method
 *
 * @return void
 */
	public function edit() {
		
		if ($this->request->is('post') || $this->request->is('put')) {
			//メンテナンス情報jsonファイル生成
			$this->Session->setFlash('test');
			return $this->redirect(array('action' => 'index'));
		} else {
			//メンテナンス情報jsonファイル読み込み
		}
	}
}
