<?php
App::uses('AppController', 'Controller');
/**
 * Lunches Controller
 *
 * @property Lunch $Lunch
 * @property PaginatorComponent $Paginator
 */
class CompaniesController extends AppController {

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
		$this->loadModel('Company');
		$this->set('companies',$this->Company->find('all', array('conditions' => array('Company.status' => 1))));
	}

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Company->exists($id)) {
            throw new NotFoundException(__('Invalid Company'));
        }
        $options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
        $this->set('company', $this->Company->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Company->create();
            if ($this->Company->save($this->request->data)) {
                $this->Session->setFlash(__('The Company has been saved.'), 'flash-success', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Company could not be saved. Please, try again.'), 'flash-', array('class' => 'alert alert-danger'));
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
        if (!$this->Company->exists($id)) {
            throw new NotFoundException(__('Invalid Company'));
        }

        $data = array();

        if ($this->request->is(array('post', 'put'))) {
            if ($this->Company->save($this->request->data)) {
                $this->Session->setFlash(__('The Company has been saved.'), 'flash-success', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Company could not be saved. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
            $data = $this->Company->find('first', $options);
            $this->request->data = $data;
        }
//        $options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
        $this->set('company', $data);
    }

    public function delete($id = null) {
        if (!$this->Company->exists($id)) {
            throw new NotFoundException(__('Invalid Company'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->Company->id = $id;

        if ($this->Company->saveField('status',0)) {
            $this->Session->setFlash(__('The Company has been deleted.'), 'flash-success', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The Company could not be deleted. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
        }

    }
}
 