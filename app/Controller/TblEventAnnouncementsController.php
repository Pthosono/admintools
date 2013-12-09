<?php
App::uses('AppController', 'Controller');
/**
 * TblEventAnnouncements Controller
 *
 * @property TblEventAnnouncement $TblEventAnnouncement
 * @property PaginatorComponent $Paginator
 */
class TblEventAnnouncementsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		return $this->redirect(array('action' => 'edit'));
		/*$this->TblEventAnnouncement->recursive = 0;
		$this->set('tblEventAnnouncements', $this->Paginator->paginate());*/
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function view($id = null) {
		if (!$this->TblEventAnnouncement->exists($id)) {
			throw new NotFoundException(__('Invalid tbl event announcement'));
		}
		$options = array('conditions' => array('TblEventAnnouncement.' . $this->TblEventAnnouncement->primaryKey => $id));
		$this->set('tblEventAnnouncement', $this->TblEventAnnouncement->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
/*	public function add() {
		if ($this->request->is('post')) {
			$this->TblEventAnnouncement->create();
			if ($this->TblEventAnnouncement->save($this->request->data)) {
				$this->Session->setFlash(__('The tbl event announcement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tbl event announcement could not be saved. Please, try again.'));
			}
		}
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @return void
 */
	public function edit() {
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->TblEventAnnouncement->create();
			if ($this->TblEventAnnouncement->save($this->request->data)) {
				$this->Session->setFlash(sprintf(Configure::read('ResultMsg.update'),Configure::read('InfoName.eventAnnouncements')));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(Configure::read('ErrorMsg.updateFail'),Configure::read('InfoName.eventAnnouncements')));
			}
		} else {
			$options = array('order' => array('TblEventAnnouncement.created' => 'desc'));
			$this->request->data = $this->TblEventAnnouncement->find('first', $options);
		}
		//シナリオテーブルを持ってきてアイテムプルダウン用配列を生成
		App::import('Model', 'MstScenario');
		$this->MstScenario = new MstScenario();
		$options = array('order' => array('MstScenario.id' => 'asc'));
		$mstScenario = $this->MstScenario->find('all', $options);
		$scenarioArray = array();
		for ($i = 0; $i < count($mstScenario); $i++) {
			$scenarioArray[$mstScenario[$i]['MstScenario']['id']] = $mstScenario[$i]['MstScenario']['scenario_title'];
		}
		$this->set('scenarioArray', $scenarioArray);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->TblEventAnnouncement->id = $id;
		if (!$this->TblEventAnnouncement->exists()) {
			throw new NotFoundException(__('Invalid tbl event announcement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TblEventAnnouncement->delete()) {
			$this->Session->setFlash(__('The tbl event announcement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tbl event announcement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
