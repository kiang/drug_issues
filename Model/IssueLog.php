<?php

App::uses('AppModel', 'Model');

class IssueLog extends AppModel {

    var $name = 'IssueLog';
    var $actsAs = array(
    );

    function afterSave($created, $options = array()) {
        
    }

}
