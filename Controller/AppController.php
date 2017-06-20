<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Js', 'Session', 'Olc');
    public $components = array('Acl', 'Auth', 'RequestHandler', 'Session');
    public $fb;

    public function beforeFilter() {
        if (isset($this->Auth)) {
            $this->Auth->authenticate = array(
                'Form' => array(
                    'userModel' => 'Member',
                    'scope' => array('Member.user_status' => 'Y'),
                )
            );
            $this->Auth->loginAction = '/members/login';
            $this->Auth->loginRedirect = '/';
            $this->Auth->authorize = array(
                'Actions' => array(
                    'userModel' => 'Member',
                )
            );
        }
        $this->loginMember = $this->Session->read('Auth.User');
        if (empty($this->loginMember)) {
            $this->loginMember = array(
                'id' => 0,
                'group_id' => 0,
                'username' => '',
            );
        } elseif (isset($this->loginMember['group_id']) && $this->loginMember['group_id'] == '1') {
            Configure::write('debug', 2);
        }
        Configure::write('loginMember', $this->loginMember);
        $token = $this->Session->read('fbToken');

        $this->fb = new \Facebook\Facebook([
            'app_id' => '118871668629982',
            'app_secret' => '15214b1fdc4735a0116a9d6b91af94a0',
            'default_graph_version' => 'v2.9',
            'default_access_token' => $token, // optional
        ]);
        $this->set('fbHelper', $this->fb->getRedirectLoginHelper());

    }

}
