<?php

echo $this->Form->create('Member', array('url' => 'login'));
echo $this->Form->input('username', array('label' => '帳號：'));
echo $this->Form->input('password', array('label' => '密碼：'));
echo '<div class="btn-group">';
echo $this->Form->submit('登入', array('class' => 'btn btn-default', 'div' => false));
echo $this->Html->link('Facebook 登入', array('action' => 'fb'), array('class' => 'btn btn-default'));
echo '</div>';
echo $this->Form->end();
