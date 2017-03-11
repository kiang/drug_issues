<?php

App::uses('AppController', 'Controller');

class IssueLogsController extends AppController {

    public $name = 'IssueLogs';
    public $paginate = array();
    public $helpers = array();

    function index() {
        $this->paginate['IssueLog'] = array(
            'limit' => 20,
        );
        $this->set('items', $this->paginate($this->IssueLog));
    }

    function view($id = null) {
        if (!$id || !$this->data = $this->IssueLog->read(null, $id)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_index() {
        $this->paginate['IssueLog'] = array(
            'limit' => 20,
        );
        $this->set('items', $this->paginate($this->IssueLog));
    }

    function admin_view($id = null) {
        if (!$id || !$this->data = $this->IssueLog->read(null, $id)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_add() {
        if (!empty($this->data)) {
            $this->IssueLog->create();
            if ($this->IssueLog->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->IssueLog->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('id', $id);
        $this->data = $this->IssueLog->read(null, $id);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Please do following links in the page', true));
        } else if ($this->IssueLog->delete($id)) {
            $this->Session->setFlash(__('The data has been deleted', true));
        }
        $this->redirect(array('action' => 'index'));
    }

}
