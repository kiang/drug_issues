<?php

App::uses('AppModel', 'Model');

class IssueLog extends AppModel {

    public $name = 'IssueLog';
    public $belongsTo = array(
        'Issue' => array(
            'foreignKey' => 'issue_id',
            'dependent' => true,
            'className' => 'Issue',
        ),
        'Member' => array(
            'foreignKey' => 'created_by',
            'dependent' => false,
            'className' => 'Member',
        ),
    );

}
