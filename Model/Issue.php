<?php

App::uses('AppModel', 'Model');

class Issue extends AppModel {

    var $name = 'Issue';
    var $actsAs = array(
    );

    function afterSave($created, $options = array()) {
        
    }

}
