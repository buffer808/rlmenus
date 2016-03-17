<?php
App::uses('AppController', 'Controller');
/**
 * MidnightSnacks Controller
 *
 * @property MidnightSnack $MidnightSnack
 * @property PaginatorComponent $Paginator
 */
class MidnightSnacksController extends AppController {

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
		$this->MidnightSnack->recursive = 0;
		$this->Paginator->settings = array('conditions' => array('MidnightSnack.status'=>1));
		$this->set('midnightSnacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MidnightSnack->exists($id)) {
			throw new NotFoundException(__('Invalid midnight snack'));
		}
		$options = array('conditions' => array('MidnightSnack.' . $this->MidnightSnack->primaryKey => $id));
		$this->set('midnightSnack', $this->MidnightSnack->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MidnightSnack->create();
			if ($this->MidnightSnack->save($this->request->data)) {
				$this->Session->setFlash(__('The midnight snack has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(  array('controller' =>'menus',  'action' => 'today'));
			} else {
				$this->Session->setFlash(__('The midnight snack could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$menus = $this->MidnightSnack->Menu->find('list');
		$this->set(compact('menus'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MidnightSnack->exists($id)) {
			throw new NotFoundException(__('Invalid midnight snack'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MidnightSnack->save($this->request->data)) {
				$this->Session->setFlash(__('The midnight snack has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The midnight snack could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('MidnightSnack.' . $this->MidnightSnack->primaryKey => $id));
			$this->request->data = $this->MidnightSnack->find('first', $options);
		}
		$menus = $this->MidnightSnack->Menu->find('list');
		$this->set(compact('menus'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->MidnightSnack->exists($id)) {
			throw new NotFoundException(__('Invalid midnight snack'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->MidnightSnack->id = $id;
		

		if ($this->MidnightSnack->saveField('status',0)) {
			$this->Session->setFlash(__('The midnight snack has been deleted.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The midnight snack could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}

	}			
}
