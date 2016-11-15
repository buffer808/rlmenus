<?php
App::uses('AppController', 'Controller');

/**
 * AddOns Controller
 *
 * @property AddOn $AddOn
 * @property PaginatorComponent $Paginator
 */
class AddOnsController extends AppController
{

    /**
     * Components
     * some test
     * @var array
     */
    public $components = array();

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
//		$this->AddOn->recursive = 0;
        $this->set('addons', $this->AddOn->find('all', array('conditions' => array('AddOn.status' => 1))));
    }

    public function deleteAllAddOns()
    {
        foreach (array("Breakfast", "Lunch", "Snack", "Dinner", "MidnightSnack") as $model) {
            $this->loadModel($model);
            $this->$model->deleteAll(array('1 = 1'));
        }
        $this->Session->setFlash("Deleted all menus");
        $this->redirect(array('action' => 'today'));

    }

    public function today()
    {
        $this->loadModel('Breakfast');
        $breakfasts = $this->Breakfast->find('all', array('conditions' => array('Breakfast.status' => 1)));

        $this->loadModel('Lunch');
        $lunches = $this->Lunch->find('all', array('conditions' => array('Lunch.status' => 1)));

        $this->loadModel('Snack');
        $snacks = $this->Snack->find('all', array('conditions' => array('Snack.status' => 1)));

        $this->loadModel('Dinner');
        $dinners = $this->Dinner->find('all', array('conditions' => array('Dinner.status' => 1)));

        $this->loadModel('MidnightSnack');
        $midnightSnacks = $this->MidnightSnack->find('all', array('conditions' => array('MidnightSnack.status' => 1)));


        $this->set('meals', array(
            'Breakfast' => array('breakfasts', $breakfasts),
            'Lunch' => array('lunches', $lunches),
            'Snack' => array('snacks', $snacks),
            'Dinner' => array('dinners', $dinners),
            'MidnightSnack' => array('midnightSnacks', $midnightSnacks)
        ));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($api = null, $id = null) {
        if($api == 'api'){
            $meal = $id;

            $this->loadModel($meal);

            $qry = $this->$meal->find('all', array(
                'conditions' => array($meal.'.status' => 1, $meal.'.add_on' => 1)
            ));
//            $qry0 = $this->$meal->find('all', array(
//                'conditions' => array($meal.'.status' => 1, $meal.'.add_on' => 1)
//            ));

//            echo "<pre>".print_r($qry0, true)."</pre>";
            echo json_encode($qry);
            exit;
        }else{
            $id = $api;
            if (!$this->AddOn->exists($id)) {
                throw new NotFoundException(__('Invalid menu'));
            }
            $options = array('conditions' => array('AddOn.' . $this->AddOn->primaryKey => $id));
            $this->set('addon', $this->AddOn->find('first', $options));
        }
    }

    private function _add($_model, $data){
        if ($_model->save($data)) {
            $this->Session->setFlash(__('The add-on has been saved.'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('controller'=>'menus','action' => 'today'));
        } else {
            $this->Session->setFlash(__('The add-on could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($meal = '')
    {

        if ($this->request->is('post')) {
            switch ($meal) {
                case "Breakfast":
                    $this->loadModel('Breakfast');
                    $this->Breakfast->create();
                    $this->request->data["Breakfast"] = $this->request->data["AddOn"];
                    $this->_add($this->Breakfast, $this->request->data["Breakfast"]);
                    break;

                case "Lunch":
                    $this->loadModel('Lunch');
                    $this->Lunch->create();
                    $this->request->data["Lunch"] = $this->request->data["AddOn"];
                    $this->_add($this->Lunch, $this->request->data["Lunch"]);
                    break;

                case "Snack":
                    $this->loadModel('Snack');
                    $this->Snack->create();
                    $this->request->data["Snack"] = $this->request->data["AddOn"];
                    $this->_add($this->Snack, $this->request->data["Snack"]);
                    break;

                case "Dinner":
                    $this->loadModel('Dinner');
                    $this->Dinner->create();
                    $this->request->data["Dinner"] = $this->request->data["AddOn"];
                    $this->_add($this->Dinner, $this->request->data["Dinner"]);
                    break;

                case "MidnightSnack":
                    $this->loadModel('MidnightSnack');
                    $this->MidnightSnack->create();
                    $this->request->data["MidnightSnack"] = $this->request->data["AddOn"];
                    $this->_add($this->MidnightSnack, $this->request->data["MidnightSnack"]);
                    break;

                default:
                    $this->AddOn->create();
                    $this->request->data['AddOn']['image'] = $this->upMealPic($this->request->data['AddOn']['image']);
                    $this->_add($this->AddOn, $this->request->data);
                    break;
            }

        }

        $addons = $this->AddOn->find('list',array('conditions'=>array('AddOn.status'=>1)));
        $this->set(compact('addons'));

        $this->set('meal', $meal);
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
        if (!$this->AddOn->exists($id)) {
            throw new NotFoundException(__('Invalid menu'));
        }
        if ($this->request->is(array('post', 'put'))) {
            // check meal image
            $old_img = $this->AddOn->find('first', array('conditions' => array('AddOn.' . $this->AddOn->primaryKey => $id)));
            $this->request->data['AddOn']['image'] = $this->editMealPic($this->request->data['AddOn']['image'], $old_img['AddOn']['image']);
            if ($this->AddOn->save($this->request->data)) {
                $this->Session->setFlash(__('The menu has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The menu could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('AddOn.' . $this->AddOn->primaryKey => $id));
            $this->request->data = $this->AddOn->find('first', $options);
            $this->set('meal_img', $this->request->data['AddOn']['image']);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function remove($id = null)
    {
        $this->AddOn->id = $id;
        if (!$this->AddOn->exists()) {
            throw new NotFoundException(__('Invalid menu'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->AddOn->delete()) {
            $this->Session->setFlash(__('The add-on has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The add-on could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function delete($id = null)
    {
        if (!$this->AddOn->exists($id)) {
            throw new NotFoundException(__('Invalid menu'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->AddOn->id = $id;


        if ($this->AddOn->saveField('status', 0)) {
            $this->Session->setFlash(__('The add-on has been deleted.'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The add-on could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }

    }
}
