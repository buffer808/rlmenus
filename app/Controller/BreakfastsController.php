<?php
App::uses('AppController', 'Controller');
/**
 * Breakfasts Controller
 *
 * @property Breakfast $Breakfast
 * @property PaginatorComponent $Paginator
 */
class BreakfastsController extends AppController {

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
	public function index($addon = 0) {
        $this->set('breakfasts', $this->Breakfast->find('all',array(
            'conditions' => array('Breakfast.status' => 1, 'Breakfast.add_on'=>$addon)
        )));
        $this->set('is_addon', $addon);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Breakfast->exists($id)) {
			throw new NotFoundException(__('Invalid breakfast'));
		}
		$options = array('conditions' => array('Breakfast.' . $this->Breakfast->primaryKey => $id));
		$this->set('breakfast', $this->Breakfast->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Breakfast->create();
			if ($this->Breakfast->save($this->request->data)) {
				$this->Session->setFlash(__('The breakfast has been saved.'), 'flash-success', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller'=>'menus', 'action' => 'today'));
			} else {
				$this->Session->setFlash(__('The breakfast could not be saved. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
			}
		}
		$menus = $this->Breakfast->Menu->find('list',array('conditions'=>array('Menu.status'=>1)));
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
		if (!$this->Breakfast->exists($id)) {
			throw new NotFoundException(__('Invalid breakfast'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Breakfast->save($this->request->data)) {
				$this->Session->setFlash(__('The breakfast has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The breakfast could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Breakfast.' . $this->Breakfast->primaryKey => $id));
			$this->request->data = $this->Breakfast->find('first', $options);
		}
		$menus = $this->Breakfast->Menu->find('list');
		$this->set(compact('menus'));
	}

	public function delete($id = null) {
		if (!$this->Breakfast->exists($id)) {
			throw new NotFoundException(__('Invalid breakfast'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Breakfast->id = $id;
		

		if ($this->Breakfast->saveField('status',0)) {
			$this->Session->setFlash(__('The breakfast has been deleted.'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('controller'=>'menus', 'action' => 'today'));
        } else {
            $this->Session->setFlash(__('The breakfast could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}

	}	
}
