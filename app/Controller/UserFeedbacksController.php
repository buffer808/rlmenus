<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'UserOrders');
App::import('Controller', 'Pages');
/**
 * Lunches Controller
 *
 * @property Lunch $Lunch
 * @property PaginatorComponent $Paginator
 */
class UserFeedbacksController extends AppController {

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

        $this->loadModel('UserFeedback');

        $this->Paginator->settings = array(
            'conditions'    => array('UserFeedback.status'   => 1),
            'order'         => array('UserFeedback.created' => 'DESC'),
            'limit' => 5,
        );
        $userFeedback = $this->Paginator->paginate('UserFeedback');

        $this->set(compact('userFeedback'));
	}

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
//        if (!$this->UserFeedback->exists($id)) {
//            throw new NotFoundException(__('Invalid UserFeedback'));
//        }
//        $options = array('conditions' => array('UserFeedback.' . $this->UserFeedback->primaryKey => $id));
//        $this->set('company', $this->UserFeedback->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            $this->loadModel('Rating');

            $this->Rating->create();

            $rating['Rating']['rate_quantity'] = $this->request->data['UserFeedback']['rate_quantity'];
            $rating['Rating']['msg_rate_quantity'] = $this->request->data['UserFeedback']['msg_rate_quantity'];
            $rating['Rating']['rate_quality'] = $this->request->data['UserFeedback']['rate_quality'];
            $rating['Rating']['msg_rate_quality'] = $this->request->data['UserFeedback']['msg_rate_quality'];
            $rating['Rating']['rate_variety'] = $this->request->data['UserFeedback']['rate_variety'];
            $rating['Rating']['msg_rate_variety'] = $this->request->data['UserFeedback']['msg_rate_variety'];

            if($this->Rating->save($rating)){

                $this->UserFeedback->create();

                $this->request->data['UserFeedback']['rating_id'] = $this->Rating->id;
                $this->request->data['UserFeedback']['user_id'] = $this->myID;
                $this->request->data['UserFeedback']['meal'] = $this->request->data['UserFeedback']['cur_page'];

                if ($this->UserFeedback->save($this->request->data)) {

                    $this->Session->setFlash(
                        __('Your feedback has been saved.'),
                        'flash-success', array('class' => 'alert alert-success'));
                    return $this->redirect( Router::url( $this->referer(), true ) );
                } else {
                    $this->Session->setFlash(
                        __('The UserFeedback could not be saved. Please, try again.'),
                        'flash-', array('class' => 'alert alert-danger'));
                    return $this->redirect( Router::url( $this->referer(), true ) );
                }
            }else {
                $this->Session->setFlash(
                    __('Your Rating could not be saved. Please, try again.'),
                    'flash-', array('class' => 'alert alert-danger'));
                return $this->redirect( Router::url( $this->referer(), true ) );
            }


        }



//        $Pages = new PagesController();
//
//        $curMeal = $Pages->_loadMyCurMeal('Breakfast');
//        $this->set(compact('curMeal'));
//
//        $prevMeal = $Pages->_loadMyPrevMeal('Breakfast');
//        $this->set(compact('prevMeal'));
//
//        echo json_encode(array($curMeal, $prevMeal)); exit;

    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
//        if (!$this->UserFeedback->exists($id)) {
//            throw new NotFoundException(__('Invalid UserFeedback'));
//        }
//
//        $data = array();
//
//        if ($this->request->is(array('post', 'put'))) {
//            if ($this->UserFeedback->save($this->request->data)) {
//                $this->Session->setFlash(__('The UserFeedback has been saved.'), 'flash-success', array('class' => 'alert alert-success'));
//                return $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The UserFeedback could not be saved. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
//            }
//        } else {
//            $options = array('conditions' => array('UserFeedback.' . $this->UserFeedback->primaryKey => $id));
//            $data = $this->UserFeedback->find('first', $options);
//            $this->request->data = $data;
//        }
////        $options = array('conditions' => array('UserFeedback.' . $this->UserFeedback->primaryKey => $id));
//        $this->set('company', $data);
    }

    public function delete($id = null) {
        if (!$this->UserFeedback->exists($id)) {
            throw new NotFoundException(__('Invalid UserFeedback'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->UserFeedback->id = $id;

        if ($this->UserFeedback->saveField('status',0)) {
            $this->Session->setFlash(__('The UserFeedback has been deleted.'), 'flash-success', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The UserFeedback could not be deleted. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
        }

    }
}
 