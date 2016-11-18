<?php
App::uses('AppController', 'Controller');
/**
 * Feedbacks Controller
 *
 * @property Feedback $Feedback
 * @property PaginatorComponent $Paginator
 */
class FeedbacksController extends AppController {

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
        $return = [];

        $option = array('Feedback.status' => 1);

        if($this->myRole != 'admin')
            $option['user_id'] = $this->myID;

        $qry_result = $this->Feedback->find('all', array(
            'conditions' => $option,
            'order' => array('Feedback.created DESC'),
        ));

        foreach($qry_result as $k => $data){
            $qry_result[$k]['Thread'] = $this->_getThread($data['Feedback']['id']);
        }

        $this->set('feedbacks', $qry_result);

    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Feedback->exists($id)) {
            throw new NotFoundException(__('Invalid dinner'));
        }
        $options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
        $qry_result = $this->Feedback->find('first', $options);
        $qry_result['Thread']= $this->_getThread($id);
        $this->set('feedback', $qry_result);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Feedback->create();

            if ($this->Feedback->save($this->request->data)) {
                $this->Session->setFlash(__('The feedback has been saved.'), 'flash-success');
                return $this->redirect(array('action' => 'index','controller' => 'feedbacks'));
            } else {
                $this->Session->setFlash(__('The dinner could not be saved. Please, try again.'), 'flash-error');
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
        if (!$this->Feedback->exists($id)) {
            throw new NotFoundException(__('Invalid dinner'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Feedback->save($this->request->data)) {
                $this->Session->setFlash(__('The dinner has been saved.'), 'flash-success', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The dinner could not be saved. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
            $this->request->data = $this->Feedback->find('first', $options);
        }
    }


    public function delete($id = null) {
        if (!$this->Feedback->exists($id)) {
            throw new NotFoundException(__('Invalid Feedback'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->Feedback->id = $id;


        if ($this->Feedback->saveField('status',0)) {
            $this->Session->setFlash(__('The Feedback has been deleted.'), 'flash-success', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The Feedback could not be deleted. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
        }
    }

    /**
     * @param $feedback_id
     * @return bool | Thread object
     */
    public function _getThread($feedback_id){
        if(empty($feedback_id)) return false;

        $this->loadModel('Thread');
        $threads = $this->Thread->find('all', array(
            'conditions' => array('Thread.status' => 1, 'Thread.feedback_id' => $feedback_id),
            'order' => array('Thread.created ASC')
        ));

        return $threads;
    }

    public function count_new(){
        return $this->Feedback->find('count', array(
            'fields' => 'DISTINCT Feedback.id',
            'conditions' => array("Feedback.has_comment" => 0, 'Feedback.status' => 1)
        ));
    }

    public function count_not_solved(){
        return $this->Feedback->find('count', array(
            'fields' => 'DISTINCT Feedback.id',
            'conditions' => array("Feedback.resolved" => 0, 'Feedback.status' => 1)
        ));
    }

    public function resolve($id = null){
        if (!$this->Feedback->exists($id)) {
            throw new NotFoundException(__('Invalid Feedback'));
        }

        $this->Feedback->updateAll(
            ['Feedback.resolved' => 1],
            ['Feedback.id' => $id]
        );

        return $this->redirect( Router::url( $this->referer(), true ) );
    }
}
