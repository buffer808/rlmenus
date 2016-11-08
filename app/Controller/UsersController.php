<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController
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
    public function index($view = 0)
    {
        if ($this->Auth->user('role') != 'admin') {
            $this->redirect('/');
        }
//		$this->User->recursive = 0;
//        $arg = $this->Paginator->paginate();
        if($view == 0){
		    $this->set('users', $this->User->find('all'));
        } elseif($view == 2) {
            $this->set('users', $this->User->find('all', array('conditions' => array(
                'User.role' => 'customer'))));
            $this->set('c_only', true);
        } elseif($view == 1) {
            $this->set('users', $this->User->find('all', array('conditions' => array(
                'User.role' => array(
                    'admin', 'canteenadmin', 'companyadmin'
                )))));
        }

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

        if (!in_array($this->myRole, array('admin', 'companyadmin', 'canteenadmin'))) {
            $this->layout = 'homepage';
        }

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            if ($this->request->data['User']['role'] == 'admin') {
                if ($this->Auth->user('role') != 'admin') {
                    echo "You cannot do that";
                    exit;
                }
            }

            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }

        $roles = array();
        if ($this->Auth->user('role') == 'admin')
            $roles = array('admin' => 'Super Admin', 'canteenadmin' => 'Canteen Admin', 'companyadmin' => 'Company Admin');
        elseif ($this->Auth->user('role') == 'canteenadmin')
            $roles = array('canteenadmin' => 'Canteen Admin');
        elseif ($this->Auth->user('role') == 'companyadmin')
            $roles = array('companyadmin' => 'Company Admin');
        else
            $roles = array('customer' => 'Customer');

        $this->set('roles', $roles);
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->request->data['User']['role'] == 'admin') {
                if ($this->Auth->user('role') != 'admin') {
                    $this->Session->setFlash("You cannot edit that user");
                    $this->redirect(array('controller' => 'users'));
                }
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'orders', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        if (!in_array($this->myRole, array('admin', 'companyadmin', 'canteenadmin'))) {
            $this->layout = 'homepage';
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function login()
    {
        $this->layout = 'adminlte-login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if (!in_array($this->Auth->user('role'), array('Guest', 'customer'))) {

                    if(in_array($this->Auth->user('role'), array('admin', 'canteenadmin')))
                        return $this->redirect('/dashboard');

                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    return $this->redirect('/');
                }
            }
            $this->Session->setFlash(__('Invalid username or password, try again'), 'flash-error');
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function editpassword()
    {

        if ($this->request->is(array('post', 'put'))) {

            $this->User->id = $this->Auth->user('id');

            if ($this->User->saveField('password', $this->request->data['User']['password'])) {
                $this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

}
