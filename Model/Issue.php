<?php

App::uses('AppModel', 'Model');

class Issue extends AppModel {

    public $name = 'Issue';
    public $uploadFields = array(
        'pic_old', 'pic_new', 'label_old_file', 'label_new_file', 'evidence'
    );
    public $belongsTo = array(
        'Member' => array(
            'foreignKey' => 'modified_by',
            'dependent' => false,
            'className' => 'Member',
        ),
    );
    public $hasMany = array(
        'IssueLog' => array(
            'foreignKey' => 'issue_id',
            'dependent' => true,
            'className' => 'IssueLog',
        ),
    );
    public $loginMember;

    public function beforeSave($options = array()) {
        $this->loginMember = Configure::read('loginMember');
        $basePath = WWW_ROOT . '/img/';
        foreach ($this->uploadFields AS $field) {
            if (isset($this->data['Issue'][$field])) {
                if (is_array($this->data['Issue'][$field])) {
                    if (empty($this->data['Issue'][$field]['size'])) {
                        unset($this->data['Issue'][$field]);
                    } else {
                        if (!file_exists($basePath . $field)) {
                            mkdir($basePath . $field, 0755, true);
                        }
                        $targetId = CakeText::uuid();
                        $path_parts = pathinfo($this->data['Issue'][$field]['name']);
                        $targetFile = $targetId . '.' . strtolower($path_parts['extension']);
                        if (move_uploaded_file($this->data['Issue'][$field]['tmp_name'], $basePath . $field . '/' . $targetFile)) {
                            $this->data['Issue'][$field] = $targetFile;
                        } else {
                            unset($this->data['Issue'][$field]);
                        }
                    }
                }
            }
        }
        $this->data['Issue']['modified_by'] = Configure::read('loginMember.id');
        return parent::beforeSave($options);
    }

    public function afterSave($created, $options = array()) {
        if (isset($this->data['IssueLog'])) {
            $this->data['IssueLog']['issue_id'] = $this->id;
            $this->data['IssueLog']['status'] = $this->data['Issue']['status'];
            $this->data['IssueLog']['created_by'] = Configure::read('loginMember.id');
            $this->IssueLog->create();
            $this->IssueLog->save($this->data);
        }
        parent::afterSave($created, $options);
    }

}
