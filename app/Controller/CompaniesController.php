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
		$this->loadModel('Users');
		$this->set('users',$this->Users->find('all'));
	}
}
 