<?php
class EventsController extends EventsAppController {

	var $name = 'Events';
	var $helpers = array('Html', 'Form');
  
	function index() {
		// get all the events from the database.
    $events = $this->Event->find('all', array('conditions' => array('status' => '1')));
    $rows = array();
    //print_r($events);
    
    foreach($events as $event){
      $rows[] = '{"id":'.$event['Event']['id'].', "title":"'.$event['Event']['title'].'", "start":"'.$event['Event']['startdate'].'", "end":"'.$event['Event']['enddate'].'","url": "'.Router::url(array('action' => 'view', $event['Event']['id'])).'", "allDay": false}';
    }
    // convert the array to a string.
    if ($rows){
      $convertojson = implode(",", $rows);
    }
    
    // pass the string to the json variable. this will then be passed  and printed to the javascript code.
    $this->set('json',"[".$convertojson."]"); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Event.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The Event has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
		$users = $this->Event->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		$this->Event->id = $this->params['named']['id'];
     // By the way I made use of the params to get the values.
    $this->Event->saveField('startdate',$this->params['named']['startdate']);
    $this->Event->saveField('enddate',$this->params['named']['enddate']);
  }

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->del($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Event.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The Event has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
		$users = $this->Event->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Event', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The Event has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$users = $this->Event->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->del($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>