<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property PaginatorComponent $Paginator
 */
class MenusController extends AppController {

/**
 * Components
 * some test
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Menu->recursive = 0;
//		$this->Paginator->settings = array('conditions'=>array('Menu.status'=>1));
//		$this->set('menus', $this->Paginator->paginate());
		$this->set('menus', $this->Menu->find('all',array('conditions'=>array('Menu.status'=>1))));
	}
	
	public function deleteAllMenus(){
		foreach(array("Breakfast","Lunch","Snack","Dinner","MidnightSnack") as $model){
			$this->loadModel($model);
			
			$this->$model->deleteAll(array('1 = 1'));
		}
		$this->Session->setFlash("Deleted all menus");
		$this->redirect(array('action' => 'today'));
		
	}

	public function today(){
		$this->loadModel('Breakfast');
		$breakfasts = $this->Breakfast->find('all',array('conditions'=>array('Breakfast.status' => 1)));

		$this->loadModel('Lunch');
		$lunches = $this->Lunch->find('all',array('conditions'=>array('Lunch.status' => 1)));

		$this->loadModel('Snack');
		$snacks = $this->Snack->find('all', array('conditions'=>array('Snack.status' => 1)));
		
		$this->loadModel('Dinner');
		$dinners = $this->Dinner->find('all', array('conditions'=>array('Dinner.status' => 1)));
		
		$this->loadModel('MidnightSnack');
		$midnightSnacks = $this->MidnightSnack->find('all',array('conditions'=>array('MidnightSnack.status' => 1)));

		$this->set('meals',array(
			'Breakfast' => array('breakfasts' , $breakfasts),
			'Lunch' => array('lunches', $lunches),
			'Snack' => array('snacks',$snacks),
			'Dinner' => array('dinners',$dinners),
			'MidnightSnack' => array('midnightSnacks',$midnightSnacks),
		));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
		$this->set('menu', $this->Menu->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Menu->create();

            // check meal image
            $this->request->data['Menu']['image'] = $this->upMealPic($this->request->data['Menu']['image']);
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is(array('post', 'put'))) {
            // check meal image
            $old_img = $this->Menu->find('first', array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id)));
            $this->request->data['Menu']['image'] = $this->editMealPic($this->request->data['Menu']['image'], $old_img['Menu']['image']);
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
			$this->request->data = $this->Menu->find('first', $options);
            $this->set('meal_img', $this->request->data['Menu']['image']);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function remove($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Menu->delete()) {
			$this->Session->setFlash(__('The menu has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The menu could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function delete($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Menu->id = $id;
		

		if ($this->Menu->saveField('status',0)) {
			$this->Session->setFlash(__('The menu has been deleted.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The menu could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}

	}	
}
