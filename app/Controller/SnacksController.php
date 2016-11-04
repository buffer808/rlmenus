<?php
App::uses('AppController', 'Controller');
/**
 * Snacks Controller
 *
 * @property Snack $Snack
 * @property PaginatorComponent $Paginator
 */
class SnacksController extends AppController {

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
		$this->Snack->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('Snack.status' => 1)
		);
		$this->set('snacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Snack->exists($id)) {
			throw new NotFoundException(__('Invalid snack'));
		}
		$options = array('conditions' => array('Snack.' . $this->Snack->primaryKey => $id));
		$this->set('snack', $this->Snack->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Snack->create();
			if ($this->Snack->save($this->request->data)) {
				$this->Session->setFlash(__('The snack has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'today','controller' =>'menus'));
			} else {
				$this->Session->setFlash(__('The snack could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$menus = $this->Snack->Menu->find('list',array('conditions'=>array('Menu.status'=>1)));
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
		if (!$this->Snack->exists($id)) {
			throw new NotFoundException(__('Invalid snack'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Snack->save($this->request->data)) {
				$this->Session->setFlash(__('The snack has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The snack could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Snack.' . $this->Snack->primaryKey => $id));
			$this->request->data = $this->Snack->find('first', $options);
		}
		$menus = $this->Snack->Menu->find('list');
		$this->set(compact('menus'));
	}


	public function delete($id = null) {
		if (!$this->Snack->exists($id)) {
			throw new NotFoundException(__('Invalid snack'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Snack->id = $id;
		

		if ($this->Snack->saveField('status',0)) {
			$this->Session->setFlash(__('The snack has been deleted.'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('controller'=>'menus', 'action' => 'today'));
		} else {
			$this->Session->setFlash(__('The snack could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}

	}		
}
