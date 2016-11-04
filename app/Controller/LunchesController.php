<?php
App::uses('AppController', 'Controller');
/**
 * Lunches Controller
 *
 * @property Lunch $Lunch
 * @property PaginatorComponent $Paginator
 */
class LunchesController extends AppController {

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
		$this->Lunch->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('Lunch.status' => 1)
		);
		$this->set('lunches', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Lunch->exists($id)) {
			throw new NotFoundException(__('Invalid lunch'));
		}
		$options = array('conditions' => array('Lunch.' . $this->Lunch->primaryKey => $id));
		$this->set('lunch', $this->Lunch->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Lunch->create();
			if ($this->Lunch->save($this->request->data)) {
				$this->Session->setFlash(__('The lunch has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' =>'menus', 'action' => 'today'));
			} else {
				$this->Session->setFlash(__('The lunch could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$menus = $this->Lunch->Menu->find('list',array('conditions'=>array('Menu.status'=>1)));
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
		if (!$this->Lunch->exists($id)) {
			throw new NotFoundException(__('Invalid lunch'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lunch->save($this->request->data)) {
				$this->Session->setFlash(__('The lunch has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lunch could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Lunch.' . $this->Lunch->primaryKey => $id));
			$this->request->data = $this->Lunch->find('first', $options);
		}
		$menus = $this->Lunch->Menu->find('list');
		$this->set(compact('menus'));
	}


	public function delete($id = null) {
		if (!$this->Lunch->exists($id)) {
			throw new NotFoundException(__('Invalid Lunch'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Lunch->id = $id;
		

		if ($this->Lunch->saveField('status',0)) {
			$this->Session->setFlash(__('The Lunch has been deleted.'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('controller'=>'menus', 'action' => 'today'));
		} else {
			$this->Session->setFlash(__('The Lunch could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}

	}	
}
