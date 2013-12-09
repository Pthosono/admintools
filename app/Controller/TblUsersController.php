<?php
App::uses('AppController', 'Controller');
/**
 * TblUsers Controller
 *
 * @property TblUser $TblUser
 * @property PaginatorComponent $Paginator
 */
class TblUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TblUser->recursive = 0;
		
		$conditions = array('TblUser.del_flag' => '0');
		if (!empty($this->data['search'])) {
			if (!empty($this->data['TblUser']['id'])) {
				$conditions += array('TblUser.id' => "{$this->data['TblUser']['id']}");
			}
			if (!empty($this->data['TblUser']['user_name'])) {
				$conditions += array('TblUser.user_name' => "{$this->data['TblUser']['user_name']}");
			}
			if (!empty($this->data['TblUser']['created'])) {
				if (!empty($this->data['TblUser']['created']['year'])) {
					$conditions += array("date_format(TblUser.created,'%Y')" => "{$this->data['TblUser']['created']['year']}");
				}
				if (!empty($this->data['TblUser']['created']['month'])) {
					$conditions += array("date_format(TblUser.created,'%m')" => "{$this->data['TblUser']['created']['month']}");
				}
			}
        }
         
        $this->set('tblUsers', $this->Paginator->paginate(null,$conditions));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TblUser->exists($id)) {
			throw new NotFoundException(__('Invalid tbl user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if (!empty($this->data['update'])) {
				if ($this->TblUser->save($this->request->data)) {
					$this->Session->setFlash(sprintf(Configure::read('ResultMsg.update'),Configure::read('InfoName.users')));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(sprintf(Configure::read('ErrorMsg.updateFail'),Configure::read('InfoName.users')));
					$options = array('conditions' => array('TblUser.' . $this->TblUser->primaryKey => $id));
					$this->set('tblUser', $this->TblUser->find('first', $options));
				}
			} else if (!empty($this->data['delete'])) {
				//論理削除
				$this->TblUser->id = $id;  
				if ($this->TblUser->saveField('del_flag', 1)) {
					$this->Session->setFlash(sprintf(Configure::read('ResultMsg.delete'),Configure::read('InfoName.users')));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(sprintf(Configure::read('ErrorMsg.deleteFail'),Configure::read('InfoName.users')));
					$options = array('conditions' => array('TblUser.' . $this->TblUser->primaryKey => $id));
					$this->set('tblUser', $this->TblUser->find('first', $options));				} 
			}
		} else {
			$options = array('conditions' => array('TblUser.' . $this->TblUser->primaryKey => $id));
			$this->set('tblUser', $this->TblUser->find('first', $options));
			$this->request->data = $this->TblUser->find('first', $options);
		}
	}

}
