<?php
App::uses('AppController', 'Controller');
/**
 * Dinners Controller
 *
 * @property Dinner $Dinner
 * @property PaginatorComponent $Paginator
 */
class DinnersController extends AppController {

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
		$this->Dinner->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('Dinner.status' => 1)
		);		
		$this->set('dinners', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dinner->exists($id)) {
			throw new NotFoundException(__('Invalid dinner'));
		}
		$options = array('conditions' => array('Dinner.' . $this->Dinner->primaryKey => $id));
		$this->set('dinner', $this->Dinner->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dinner->create();
			if ($this->Dinner->save($this->request->data)) {
				$this->Session->setFlash(__('The dinner has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'today','controller' => 'menus'));
			} else {
				$this->Session->setFlash(__('The dinner could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$menus = $this->Dinner->Menu->find('list',array('conditions'=>array('Menu.status'=>1)));
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
		if (!$this->Dinner->exists($id)) {
			throw new NotFoundException(__('Invalid dinner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dinner->save($this->request->data)) {
				$this->Session->setFlash(__('The dinner has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dinner could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Dinner.' . $this->Dinner->primaryKey => $id));
			$this->request->data = $this->Dinner->find('first', $options);
		}
		$menus = $this->Dinner->Menu->find('list');
		$this->set(compact('menus'));
	}


	public function delete($id = null) {
		if (!$this->Dinner->exists($id)) {
			throw new NotFoundException(__('Invalid Dinner'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Dinner->id = $id;
		

		if ($this->Dinner->saveField('status',0)) {
			$this->Session->setFlash(__('The Dinner has been deleted.'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('controller'=>'menus', 'action' => 'today'));
		} else {
			$this->Session->setFlash(__('The Dinner could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}

	}		
}
