<?php
App::uses('AppController', 'Controller');
/**
 * Threads Controller
 *
 * @property Thread $Thread
 * @property PaginatorComponent $Paginator
 */
class ThreadsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array();

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->redirect(array('controller'=>'feedbacks','action'=>'index'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Thread->exists($id)) {
            throw new NotFoundException(__('Invalid Thread'));
        }
        $options = array('conditions' => array('Thread.' . $this->Thread->primaryKey => $id));
        $this->set('Thread', $this->Thread->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Thread->create();

            if(empty($this->request->data['Thread']['comment'])){
                $this->Session->setFlash(__('Please insert your comment.'), 'flash-error');
                return $this->redirect( Router::url( $this->referer(), true ) );
            }

            if ($this->Thread->save($this->request->data)) {
                $this->Session->setFlash(__('The comment has been saved.'), 'flash-success');

                $this->loadModel('Feedback');
                $this->Feedback->updateAll(
                    ['Feedback.has_comment' => 1],
                    ['Feedback.id' => $this->request->data['Thread']['feedback_id']]
                );

                return $this->redirect( Router::url( $this->referer(), true ) );
            } else {
                $this->Session->setFlash(__('The comment could not be saved. Please, try again.'), 'flash-error');
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
    public function edit($id=null) {
        if (!$this->Thread->exists($id)) {
            throw new NotFoundException(__('Invalid Thread'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Thread->save($this->request->data)) {
                $this->Session->setFlash(__('The Thread has been saved.'), 'flash-success', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller'=>'feedbacks','action' => 'view', $this->request->data['Thread']['feedback_id']));
            } else {
                $this->Session->setFlash(__('The Thread could not be saved. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Thread.' . $this->Thread->primaryKey => $id));
            $this->request->data = $this->Thread->find('first', $options);
        }
//        $threads = $this->Thread->find('list');
//        $this->set(compact('threads'));
    }


    public function delete($id = null) {
        if (!$this->Thread->exists($id)) {
            throw new NotFoundException(__('Invalid Thread'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->Thread->id = $id;


        if ($this->Thread->saveField('status',0)) {
            $this->Session->setFlash(__('The Thread has been deleted.'), 'flash-success', array('class' => 'alert alert-success'));
            return $this->redirect( Router::url( $this->referer(), true ) );
//            return $this->redirect(array('controller'=>'feedbacks', 'action' => 'veiw', ));
        } else {
            $this->Session->setFlash(__('The Thread could not be deleted. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
        }

    }
}
