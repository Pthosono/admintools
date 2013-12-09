<?php
App::uses('AppController', 'Controller');
/**
 * TblItemSends Controller
 *
 * @property TblItemSend $TblItemSend
 * @property PaginatorComponent $Paginator
 */
class TblItemSendsController extends AppController {

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
		/*$this->TblItemSend->recursive = 0;
		$this->set('tblItemSends', $this->Paginator->paginate());*/
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function view($id = null) {
		if (!$this->TblItemSend->exists($id)) {
			throw new NotFoundException(__('Invalid tbl item send'));
		}
		$options = array('conditions' => array('TblItemSend.' . $this->TblItemSend->primaryKey => $id));
		$this->set('tblItemSend', $this->TblItemSend->find('first', $options));
	}
	*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->TblItemSend->create();
			if ($this->TblItemSend->save($this->request->data)) {
				$this->Session->setFlash(__('The tbl item send has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tbl item send could not be saved. Please, try again.'));
			}
		}
	}
	*/

/**
 * edit method
 *
 * @return void
 */
	public function edit() {
		
		App::import('Model', 'TblGiftClass');
		$this->TblGiftClass = new TblGiftClass();
		
		if ($this->request->is('post') || $this->request->is('put')) {
			//1つ以上アイテムが選択されているかどうかのチェック
			$errFlg = false;
			for ($i = 0; $i < 10; $i++) { //付与アイテムは固定で最大10個
				if ($this->request->data['TblGiftClass'][$i]['item_id'] != null)
						break;
			}
			if ($i == 10) {
				$this->Session->setFlash('付与アイテムを最低1つ以上選択してください。');
				$errFlg = true;
			}
			
			if (!$errFlg) {
				//ファイルアップロードが正常に行えたかのチェック
				$errFlg = false;
				//phpinfo();
				//debug($this->data);
				if (is_uploaded_file($this->data['TblItemSend']['file_name']['tmp_name'])) {
					$userIds = file_get_contents ($this->data['TblItemSend']['file_name']['tmp_name']);
					$userIds = split(",",$userIds);
					//ファイル形式チェック（数値かどうか、1つ以上値があるか）
					if (count($userIds) <= 0)
						$errFlg = true;
					else {
						for ($i = 0; $i < count($userIds); $i++) {
							if (strlen($userIds[$i] <= 0)) {
								$errFlg = true;
								break;
							}
							if (!ctype_digit($userIds[$i])) {
								$errFlg = true;
								break;
							}
						}
					}
					
					if ($errFlg) {
						$this->Session->setFlash(Configure::read('ErrorMsg.fileTypeWrong'));
					}
				} else {
					$this->Session->setFlash(Configure::read('ErrorMsg.fileUpdateFail'));
					$errFlg = true;
				}
			}
			
			if (!$errFlg) {
				$itemSentId = $this->TblItemSend->find('first', array('fields' => 'MAX(item_sent_id)'));
				if ($itemSentId[0]['MAX(item_sent_id)'] == null)
					$itemSentId = 0;
				else
					$itemSentId = $itemSentId[0]['MAX(item_sent_id)'] + 1;
				
				$giftClassId = $this->TblGiftClass->find('first', array('fields' => 'MAX(gift_class_id)'));
				if ($giftClassId[0]['MAX(gift_class_id)'] == null)
					$giftClassId = 0;
				else
					$giftClassId = $giftClassId[0]['MAX(gift_class_id)'] + 1;
				
				//トランザクション開始
				$this->TblItemSend->begin();
				
				$saveData = array('TblItemSend' => array());
				$errFlg = false;
				for ($i = 0; $i < count($userIds); $i++) {
					$saveData['TblItemSend']['item_sent_id'] = $itemSentId;
					$saveData['TblItemSend']['user_id'] = $userIds[$i];
					$saveData['TblItemSend']['gift_class_id'] = $giftClassId;
					$saveData['TblItemSend']['notice_at'] = $this->request->data['TblItemSend']['notice_at'];
					$saveData['TblItemSend']['start_at'] = $this->request->data['TblItemSend']['start_at'];
					$saveData['TblItemSend']['end_at'] = $this->request->data['TblItemSend']['end_at'];
					
					$this->TblItemSend->create();
					if (!$this->TblItemSend->save($saveData)) {
						$errFlg = true;
						break;
					}
				}
							
				if (!$errFlg) {
					$saveData = array('TblGiftClass' => array());
					$validationErrors = array();
					$errFlg = false;
					for ($i = 0; $i < 10; $i++) { //付与アイテムは固定で最大10個
						//item_idがnullの場合はスキップ
						if ($this->request->data['TblGiftClass'][$i]['item_id'] == null)
						continue;
						
						$saveData['TblGiftClass'] = array(
							'gift_class_id' => $giftClassId,
							'item_id' => $this->request->data['TblGiftClass'][$i]['item_id'],
							'item_amount' => $this->request->data['TblGiftClass'][$i]['item_amount'],
							'comment' => $this->request->data['TblGiftClass'][0]['comment'],
							);
						$this->TblGiftClass->create();
						if (!$this->TblGiftClass->save($saveData)) {
							$errFlg = true;
							//validateの内容をFormHelperに表示させるためにvalidationErrorsの中身調整
							$key = key($this->TblGiftClass->validationErrors);
							$validationErrors[$i][$key] = $this->TblGiftClass->validationErrors[$key][0];
							$this->TblGiftClass->validationErrors = $validationErrors;
							//debug($this->TblGiftClass->validationErrors);
							break;
						}
					}
					
					if (!$errFlg) {
						$this->Session->setFlash(sprintf(Configure::read('ResultMsg.update'),Configure::read('InfoName.itemSends')));
						//コミット
						$this->TblItemSend->commit();
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(sprintf(Configure::read('ErrorMsg.updateFail'),Configure::read('InfoName.itemSends')));
						//ロールバック
						$this->TblItemSend->rollback();
					}
				} else {
					$this->Session->setFlash(sprintf(Configure::read('ErrorMsg.updateFail'),Configure::read('InfoName.itemSends')));
					//ロールバック
					$this->TblItemSend->rollback();
				}
			}
		} else {
			$options = array('order' => array('TblItemSend.item_sent_id' => 'desc'));
			$this->request->data = $this->TblItemSend->find('first', $options);
			if (isset($this->request->data['TblItemSend'])) {
				$options = array('conditions' => array('TblGiftClass.gift_class_id' => $this->request->data['TblItemSend']['gift_class_id']));
				$tblGiftClass = $this->TblGiftClass->find('all', $options);
				$this->request->data['TblGiftClass'] = array();
				for($i = 0; $i < count($tblGiftClass);$i++) {
					$this->request->data['TblGiftClass'][$i] = $tblGiftClass[$i
					]['TblGiftClass'];
				}
			}
			//debug($this->request->data);
		}
		//付与対象ユーザー数取得
		if (isset($this->request->data['TblItemSend']['item_sent_id'])) {
			$options = array('conditions' => array('TblItemSend.item_sent_id' => $this->request->data['TblItemSend']['item_sent_id']));
			$userCount = $this->TblItemSend->find('count', $options);
		} else {
			$userCount = 0;
		}
		$this->set('userCount', $userCount);
		
		//アイテムテーブルを持ってきてアイテムプルダウン用配列を生成
		App::import('Model', 'MstItem');
		$this->MstItem = new MstItem();
		$options = array('order' => array('MstItem.id' => 'asc'));
		$mstItem = $this->MstItem->find('all', $options);
		$itemArray = array();
		for ($i = 0; $i < count($mstItem); $i++) {
			$itemArray[$mstItem[$i]['MstItem']['id']] = $mstItem[$i]['MstItem']['name'];
		}
		$this->set('itemArray', $itemArray);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function delete($id = null) {
		$this->TblItemSend->id = $id;
		if (!$this->TblItemSend->exists()) {
			throw new NotFoundException(__('Invalid tbl item send'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TblItemSend->delete()) {
			$this->Session->setFlash(__('The tbl item send has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tbl item send could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	*/
}
