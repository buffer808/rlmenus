<?php
App::uses('AppController', 'Controller');

/**
 * Options Controller
 *
 * @property Option $Option
 * @property PaginatorComponent $Paginator
 */
class OptionsController extends AppController
{

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
    public function index()
    {
        $this->Option->recursive = 0;
        $this->set('Options', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Option->exists($id)) {
            throw new NotFoundException(__('Invalid Option'));
        }
        $options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
        $this->set('Option', $this->Option->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Option->create();
            if ($this->Option->save($this->request->data)) {
                $this->Session->setFlash(__('The Option has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Option could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
    public function edit($id = null)
    {
        if (!$this->Option->exists($id)) {
            throw new NotFoundException(__('Invalid Option'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Option->save($this->request->data)) {
                if ($this->request->data['Option']['name'] == "Next Date") {
                    $this->loadModel('Option');
                    $this->Option->create_option('user_date_ordered', strtotime($this->request->data['Option']['value']));
                }
                $this->Session->setFlash(__('The Option has been saved.'), 'flash-success', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Option could not be saved. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Option.' . $this->Option->primaryKey => $id));
            $this->request->data = $this->Option->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Option->id = $id;
        if (!$this->Option->exists()) {
            throw new NotFoundException(__('Invalid Option'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Option->delete()) {
            $this->Session->setFlash(__('The Option has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The Option could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function create_option($key, $val)
    {
        if ($this->Option->find('count', array('conditions' => array('Option.option_value' => $val))) <= 0) {
            $this->Option->create();

            $data = array('Option' => array(
                'option_key' => $key,
                'option_value' => $val,
            ));

            if ($this->Option->save($data)) {
                return true;
            }
        }

        return false;
    }
}

