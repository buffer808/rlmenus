<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Export.Export');
	
	public function deleteAll(){
		foreach($this->Order->find('list',array('conditions' => array('status' => 1))) as $id){
			$this->Order->id = $id;
			$this->Order->saveField('status',0);
		}
		$this->redirect(array('action' => 'index','controller' => 'orders'));
		
	}

	public function _getMealsIds($model,$showAlsoDeletedModel = false){
		$menus = $this->Order->$model->find('list' ,array(
			'fields' => array('id', 'menu_id'),
			'conditions' => $showAlsoDeletedModel? array($model.'.status' => 1, $model.'.add_on'=>0): ""
		
		));

		$meals = array(0=>"N/A");
        foreach($menus as $id => $menu_id){
            foreach($this->Menu->find('list',array('fields' => array('id','title'),'conditions' => array('id' => $menu_id))) as $menu){
				$meals[$id] = $menu;
			}
		}

        $addon_ids = $this->Order->$model->find('list' ,array(
            'fields' => array('id', 'addon_id'),
            'conditions' => $showAlsoDeletedModel? array($model.'.status' => 1, $model.'.add_on'=>1): ""

        ));
        $addons = array();
        foreach($addon_ids as $id => $addon_id){
            foreach($this->AddOn->find('list',array('fields' => array('id','title'),'conditions' => array('id' => $addon_id))) as $addon){
                $addons[$addon_id] = $addon;
            }
        }

		return array($meals,$addons);
	}

	public function _loadAllMealsIds($showAlsoDeletedModel = false){
		$this->loadModel("Menu");
		$this->loadModel("AddOn");

		$bf_meal = $this->_getMealsIds("Breakfast",$showAlsoDeletedModel);
        $breakfasts = $bf_meal[0];
        $addons['Breakfast'] =  $bf_meal[1];

		$l_meal = $this->_getMealsIds("Lunch",$showAlsoDeletedModel);
        $lunches = $l_meal[0];
        $addons['Lunch'] =  $l_meal[1];

        $s_meal = $this->_getMealsIds("Snack",$showAlsoDeletedModel);
        $snacks = $s_meal[0];
        $addons['Snack'] =  $s_meal[1];

		$d_meal = $this->_getMealsIds("Dinner",$showAlsoDeletedModel);
        $dinners = $d_meal[0];
        $addons['Dinner'] =  $d_meal[1];

		$md_meal = $this->_getMealsIds("MidnightSnack",$showAlsoDeletedModel);
        $midnightsnacks = $md_meal[0];
        $addons['MidnightSnack'] =  $md_meal[1];


		$this->set(compact('breakfasts', 'lunches', 'snacks', 'dinners','midnightsnacks', 'addons'));
	}	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->_loadAllMealsIds();
	}

	private function _getAddOn($id, $fields = array()){
	    $this->loadModel('AddOn');

        array_merge($fields, array('id','title'), $fields);

        $qry = $this->AddOn->find('first',
            array('fields'=>$fields,'conditions'=>array('id'=>$id)));
        return $qry ? $qry['AddOn']['title'] : array();
    }

	private function _loadAddOn($addons){
        $add_ons = array();
	    foreach ($addons as $meal=>$addon){
	        $_model = '';

            switch ($meal){
                case 'breakfast': $_model = "Breakfast"; break;
                case 'lunch': $_model = "Lunch"; break;
                case 'snack': $_model = "Snack"; break;
                case 'dinner': $_model = "Dinner"; break;
                case 'msnack': $_model = "MidnightSnack"; break;
            }

            if(!is_array($addon)) continue;

            $this->loadModel($_model);

	        foreach ($addon as $k=>$id){
                $addOn = $this->_getAddOn($id);
                $add_ons[$meal][$id] = $addOn;
            }
        }
        return $add_ons;
    }

    private function _getAddOnPrice($id){

    }

/**
 * index method
 *
 * @return void
 * 
 * 
 */
 	public function _getTotalPrice($data){
	    
	    
	    $totalAll = 0;
	    foreach($data as $d){
	    	
	    	$total = 0;
	    	foreach(array("Breakfast","Lunch","Snack","Dinner", "MidnightSnack") as $meal){
		    
		    		$total += $meal['Menu']['price'];
		    	
	    	}
	    	$totalAll += $total;
	    	
	    }
	    
	    
	    return $totalAll;
 	}
	public function index() {
		$settings =  array(
//		        'limit' => 20,
		        'order' => array('Order.created' => 'desc')
	    );
		
		if(in_array($this->Auth->user('role'), array('companyadmin','customer'))){
			$settings['conditions'] = array( 'Order.user_id' => $this->Auth->user('id'));
		}

		if(isset($settings['conditions'])){
			$settings['conditions']['Order.status'] = 1;
		}else{
			$settings['conditions'] = array( 'Order.status' =>1);
		}

//		$this->Paginator->settings = $settings;
		$this->Order->recursive = 2;
//		$o = $this->Paginator->paginate();

        if($this->myRole == 'customer')
            $this->layout = 'homepage';
		
//		$this->set('orders', $o);
		$this->set('orders', $this->Order->find('all',array('conditions' => array( 'Order.status' =>1))));
	}


	
	public function _exportCsv($data){
	    $this->loadModel('AddOn');

	    $result = array();
	    
	    $totalAll = 0;
	    $totalMeals = array();

        $addOns = array();

	    foreach($data as $d){
            $addon_id = array();
            $addons = array();
            if (isset($d['Order']['addon_id'])) {
                $addon_id = unserialize($d['Order']['addon_id']);
            }

	    	$tmp = array('Employee' => $d['Order']['employee'],'Company' => $d['User']['text']);
	    	$aotmp = array('Employee' => '','Company' => '');
	    	$total = 0;
            $addon_total = 0;

	    	foreach(array("Breakfast","Lunch","Snack","Dinner","MidnightSnack") as $meal){
		    	if(isset($d[$meal]['menu_id'])){
		    		$menu = $this->Order->$meal->Menu->findById($d[$meal]['menu_id']);
		    		$tmp[$meal] = $menu['Menu']['title'];
		    		$total += $menu['Menu']['price'];

		    		if(isset($totalMeals[$menu['Menu']['title']])){
		    			$totalMeals[$menu['Menu']['title']] += 1;
		    		}else{
		    			$totalMeals[$menu['Menu']['title']] = 1;
		    		}
		    	}else{
		    		$tmp[$meal] = "";
		    	}

		    	if(array_key_exists(strtolower($meal), $addon_id)){
		    	    $c = 0;
                    $aotmp[$meal] = '';
		    	    foreach ($addon_id[strtolower($meal)] as $k => $v){
                        $addOn = $this->AddOn->findById($k);
                        $aotmp[$meal] = $aotmp[$meal] . (($c == 1) ? ', ' : '') . $addOn['AddOn']['title'];
                        $addon_total += $addOn['AddOn']['price'];

                        if(isset($totalMeals[$addOn['AddOn']['title']])){
                            $totalMeals[$addOn['AddOn']['title']] += 1;
                        }else{
                            $totalMeals[$addOn['AddOn']['title']] = 1;
                        }
                        $c = 1;
                    }
                }
            }

            $tmp['Total'] = $total ." PHP";
			$tmp['Ordered'] = $d['Order']['created'];
			$tmp['Signature'] = "";
			$totalAll += $total;
	    	$result[] = $tmp;

            if(isset($d['Order']['addon_id'])){
                $aotmp['Total'] = $addon_total ." PHP";
                $aotmp['Ordered'] = '';
                $aotmp['Signature'] = "";
                $totalAll += $addon_total;
                $result[] = $aotmp;
            }
	    }

        $result[] =array();

        $result[] =array();


        //Just to match the column, we needed to use the column names of the existing titles
        foreach($totalMeals as $title => $numOrders){
            $result[] =array('Employee' => $title .":",'Company'=> $numOrders);
        }
        $result[] = array('Employee' => 'Total:','Company' => $totalAll,'Breakfast' => 'PHP');

//        echo "<pre>".print_r(array($result), true)."</pre>"; exit;

        $this->Export->exportCsv($result);
	}

	public function _listCompanies(){
		$companies = $this->Order->User->find('list',array(
			'conditions' => array(
				'User.role' => 'companyadmin'
			),
			'fields' => array('text')
		));
		$companies[0] = 'All';
		$companies = array_reverse($companies,true);
		return $companies;
	}

	public function exportbydate() {
		
		if($this->request->is('post')){
			
			
			$date = $this->request->data['Order']['date'];
			
			$datestr = $date['year'] .'-'. $date['month'] . '-' . $date['day'];
	
			$cond = array(
				'conditions' => array(
				'Order.created >=' => $datestr. ' 00:00:00',
				'Order.created <=' => $datestr. ' 23:59:59',
				'Order.status' => 1
				)
			);
			
			if($this->Auth->user('role') == 'companyadmin'){
				$cond['conditions']['Order.user_id'] = $this->Auth->user('id');
			}elseif($this->request->data['Order']['company']!=0){
				$cond['conditions']['user_id'] = $this->request->data['Order']['company'];
			}
			
			$data = $this->Order->find('all',$cond);
			
			$this->_exportCsv($data);
			
		}
		
		$companies = $this->_listCompanies();
		$this->set('companies',$companies);		
		
	}
	public function exportbydaterange() {
		
		if($this->request->is('post')){
			$from = $this->request->data['Order']['from'];
			$to = $this->request->data['Order']['to'];
			
			$fromstr = $from['year'] .'-'. $from['month'] . '-' . $from['day'];
			$tostr = $to['year'] .'-'. $to['month'] . '-' . $to['day'];

			$cond = array(
				'conditions' => array(
					'Order.created <=' => $tostr . ' 23:59:59',
					'Order.created >=' => $fromstr . ' 00:00:00',
					'Order.status' => 1
				)	
			);
			
			
			
			if($this->Auth->user('role') == 'companyadmin'){
				$cond['conditions']['Order.user_id'] = $this->Auth->user('id');
			}elseif($this->request->data['Order']['company']!=0){
				$cond['conditions']['Order.user_id'] = $this->request->data['Order']['company'];
			}
			
			
			
			$data = $this->Order->find('all', $cond);
			
			$this->_exportCsv($data);
			
		}
		$companies = $this->_listCompanies();
		$this->set('companies',$companies);		
		
	}
	public function exportall() {

			$data = $this->Order->find('all');
			
			$this->_exportCsv($data);
			
		echo 'test';exit;
	}
		

		
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->Order->create();
			if($this->myRole == 'companyadmin')
				$this->request->data['Order']['user_id'] = $this->Auth->user('id');
			
			//this code below is to fix the problem of menu under midnight_snacks. But works with midnight_snack
			$this->request->data['Order']['midnight_snack_id'] = $this->request->data['Order']['midnightsnack_id'];

			$this->request->data['Order']['addon_id'] = serialize($this->_loadAddOn($this->request->data['Order']['addon_id']));

			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->_loadAllMealsIds(true);
		$users = $this->Order->User->find('list', array('conditions' => array('User.role !=' => 'customer')));
		$this->set('users',$users);
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$breakfasts = $this->Order->Breakfast->find('list');
		$lunches = $this->Order->Lunch->find('list');
		$snacks = $this->Order->Snack->find('list');
		$dinners = $this->Order->Dinner->find('list');
		$midnight_snacks = $this->Order->MidnightSnack->find('list');
		
		$this->set(compact('breakfasts', 'lunches', 'snacks', 'dinners','midnight_snacks'));
	}

	public function delete($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid ordert'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Order->id = $id;
		

		if ($this->Order->saveField('status',0)) {
			$this->Session->setFlash(__('The order has been deleted.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}
}
