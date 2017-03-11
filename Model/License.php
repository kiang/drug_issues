<?php

App::uses('AppModel', 'Model');

class License extends AppModel {

    var $name = 'License';
    var $actsAs = array(
    );

    function afterSave($created, $options = array()) {
        
    }

}
