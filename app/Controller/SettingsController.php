<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Options');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 */
class SettingsController extends AppController {

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
		$this->Setting->recursive = 0;
		$this->set('settings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
		$this->set('setting', $this->Setting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		if ($this->request->is(array('post', 'put'))) {
            if($this->request->data['Setting']['name'] == "Next Date"){
                $date = $this->request->data['Setting']['value'];
                $this->request->data['Setting']['value'] = date('l, d F Y', strtotime($date['year'] . '-' . $date['month'] . '-' . $date['day']));
            }
            if ($this->Setting->save($this->request->data)) {
                if($this->request->data['Setting']['name'] == "Next Date"){
                    $option = new OptionsController;
                    $option->create_option('order_set', strtotime($this->request->data['Setting']['value']));
                }
                $this->Session->setFlash(__('The setting has been saved.'), 'flash-success', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
			$this->request->data = $this->Setting->find('first', $options);
            $this->set('id', $id);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Setting->delete()) {
			$this->Session->setFlash(__('The setting has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The setting could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function getSetting($id = ''){
        if (!$this->Setting->exists($id)) {
            throw new NotFoundException(__('Invalid setting'));
        }

        $options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
        $data = $this->Setting->find('first', $options);

        return $data['Setting'];

    }
}
