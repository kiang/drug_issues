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
        $keywords = array();
        $scope = array('Issue.is_active' => 1);
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
            'conditions' => array(
                'Issue.id' => $id,
                'Issue.is_active' => 1,
            ),
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
            $toSave['Issue']['is_active'] = 1;
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
        $id = intval($id);
        if ($id > 0) {
            if ($this->loginMember['group_id'] != 1) {
                $issue = $this->Issue->read(array('created_by', 'modified_by'), $id);
                /*
                 * the user is not admin
                 * check if the user is created_by and the issue didn't have different modified_by
                 */
                if ($issue['Issue']['created_by'] != $this->loginMember['id'] || $issue['Issue']['created_by'] != $issue['Issue']['modified_by']) {
                    $id = 0;
                    $this->Session->setFlash(__('Please do following links in the page', true));
                }
            }
            if ($id > 0) {
                $this->Issue->id = $id;
                if ($this->Issue->saveField('is_active', 0)) {
                    $this->Session->setFlash(__('The data has been deleted', true));
                } else {
                    $this->Session->setFlash(__('Please do following links in the page', true));
                }
            }
        } else {
            $this->Session->setFlash(__('Please do following links in the page', true));
        }
        $this->redirect(array('action' => 'index'));
    }

}
