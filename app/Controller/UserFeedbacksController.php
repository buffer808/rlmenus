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
	public $components = array('Paginator', 'Export.Export');

/**
 * index method
 *
 * @return void
 */
	public function index() {

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


            if(empty($this->request->data['UserFeedback']['rate_quantity']) ||
               empty($this->request->data['UserFeedback']['rate_quality']) ||
               empty($this->request->data['UserFeedback']['rate_variety'])){
                $this->Session->setFlash(__('Please feel out all fields of the form.'), 'flash-error');
                return $this->redirect( Router::url( $this->referer() ) );
            }

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

    public function _prepareExportData($data){
        function countRating($rateCat, $rate, $totals){
            if(isset($totals[$rateCat][$rate])){
                $totals[$rateCat][$rate] += 1;
            }else{
                $totals[$rateCat][$rate] = 1;
            }
            return $totals;
        }

        $print = [];
        $totalrate = [];

        foreach($data as $key => $val){
            extract($val);

            $print[] = [
                "Name"                      => $User['display_name'],
                "Meal"                      => $UserFeedback['meal'],
                "Menu"                      => $Menu['title'],
                "Company"                   => $Company['name'],
                "Rate for Quantity"         => $Rating['rate_quantity'],
                "Rate Message for Quantity" => $Rating['msg_rate_quantity'],
                "Rate for Quality"          => $Rating['rate_quality'],
                "Rate Message for Quality"  => $Rating['msg_rate_quality'],
                "Rate for Variety"          => $Rating['rate_variety'],
                "Rate Message for Variety"  => $Rating['msg_rate_variety'],
                "Date Created"              => $UserFeedback['created']
            ];

            $totalrate = countRating("Quantity",$Rating['rate_quantity'],$totalrate);
            $totalrate = countRating("Quality",$Rating['rate_quality'],$totalrate);
            $totalrate = countRating("Variety",$Rating['rate_variety'],$totalrate);

        }

        $print[] = [];
        $print[] = ["Name"  =>  'Total Ratings'];

        foreach($totalrate as $key => $val){
            $t1 = 0; $t2 = 0;
            foreach($val as $k => $v){
                $t1 += $v * $k;
                $t2 += $v;
            }

            $avg = round($t1 / $t2, 2);

            $print[] = [
                "Name"  =>  $key . " :",    // cell column Name
                "Meal"  =>  $avg,           // cel column Meal
            ];
        }
        return $print;
    }

    public function exportbydaterange(){
        if ($this->request->is('post')) {

            $from = $this->request->data['UserFeedback']['from'];
            $to = $this->request->data['UserFeedback']['to'];

            $time_from = $this->request->data['UserFeedback']['time_from'];
            $time_to = $this->request->data['UserFeedback']['time_to'];

            $fromstr = date('Y-m-d H:i:s', strtotime($from['year'] . '-' . $from['month'] . '-' . $from['day'].
                ' ' . $time_from['hour'] . ':' . $time_from['min'] . ' ' . $time_from['meridian']));
            $tostr = date('Y-m-d H:i:s', strtotime($to['year'] . '-' . $to['month'] . '-' . $to['day'].
                ' ' . $time_to['hour'] . ':' . $time_to['min'] . ' ' . $time_to['meridian']));

            $cond = array(
                'conditions' => array(
                    'UserFeedback.created <=' => $tostr,
                    'UserFeedback.created >=' => $fromstr,
                    'UserFeedback.status' => 1
                ),
                'order' => array('UserFeedback.created ASC'),
            );

            if($toCsvData = $this->_prepareExportData($this->UserFeedback->find('all', $cond))){
                $this->Export->exportCsv($toCsvData);
            }else{
                $this->Session->setFlash(__('No data to export.'), 'default', array('class' => 'alert alert-danger'));
                $this->redirect(Router::url($this->referer()));
            }
        }
    }
}
 