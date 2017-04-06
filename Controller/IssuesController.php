<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class IssuesController extends AppController {

    public $name = 'Issues';
    public $paginate = array();
    public $helpers = array();

    function index() {
        $this->paginate['Issue'] = array(
            'limit' => 20,
        );
        $this->set('items', $this->paginate($this->Issue));
    }

    function view($id = null) {
        if (!$id || !$this->data = $this->Issue->read(null, $id)) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_index($name = null) {
        $scope = $keywords = array();
        if (!empty($name)) {
            $name = Sanitize::clean($name);
            $keywords = explode(' ', $name);
            $keywordCount = 0;
            foreach ($keywords AS $k => $keyword) {
                if (++$keywordCount < 5) {
                    $scope[]['OR'] = array(
                        'Issue.license LIKE' => "%{$keyword}%",
                        'Issue.name_english LIKE' => "%{$keyword}%",
                        'Issue.name_chinese LIKE' => "%{$keyword}%",
                    );
                } else {
                    unset($keywords[$k]);
                }
            }
        }
        $this->paginate['Issue'] = array(
            'limit' => 24,
            'order' => array('Issue.modified' => 'DESC'),
        );
        $this->set('items', $this->paginate($this->Issue, $scope));
        $this->set('keywords', implode(' ', $keywords));
    }

    function admin_view($id = null) {
        if (!empty($this->data)) {
            $theData = $this->data;
            if (Configure::read('loginMember.group_id') != 1) {
                $theData['IssueLog']['status'] = $this->Issue->field('status', array(
                    'Issue.id' => $id,
                ));
            }
            $theData['IssueLog']['issue_id'] = $id;
            $theData['IssueLog']['created_by'] = Configure::read('loginMember.id');
            $this->Issue->IssueLog->create();
            if ($this->Issue->IssueLog->save($theData)) {
                $this->Issue->id = $id;
                $this->Issue->save(array('Issue' => array(
                        'status' => $theData['IssueLog']['status'],
                        'modified_by' => $theData['IssueLog']['created_by'],
                )));
                $this->Session->setFlash(__('The data has been saved', true));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        if (!$id || !$this->data = $this->Issue->find('first', array(
            'conditions' => array('Issue.id' => $id),
            'contain' => array(
                'IssueLog' => array(
                    'order' => array('IssueLog.created' => 'DESC'),
                    'Member'
                ), 'Member'),
                ))) {
            $this->Session->setFlash(__('Please do following links in the page', true));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_add() {
        if (!empty($this->data)) {
            $toSave = $this->data;
            if ($this->Session->read('Auth.User.group_id') != 1) {
                $toSave['Issue']['status'] = '變更(未確認)';
                $toSave['Issue']['info_source'] = $this->Session->read('Auth.User.role');
            }
            $this->Issue->create();
            if ($this->Issue->save($toSave)) {
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
            if ($this->Issue->save($this->data)) {
                $this->Session->setFlash(__('The data has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Something was wrong during saving, please try again', true));
            }
        }
        $this->set('id', $id);
        $this->data = $this->Issue->read(null, $id);
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Please do following links in the page', true));
        } else if ($this->Issue->delete($id)) {
            $this->Session->setFlash(__('The data has been deleted', true));
        }
        $this->redirect(array('action' => 'index'));
    }

}
