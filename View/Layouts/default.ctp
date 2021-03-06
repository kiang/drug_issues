<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            藥物外觀異動通報::
            <?php echo $title_for_layout; ?>
        </title><?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('jquery-ui');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('default');
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('olc');
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <div class="container">
            <div id="header">
                <h1><?php echo $this->Html->link('藥物外觀異動通報', '/'); ?></h1>
            </div>
            <div id="content">
                <div class="btn-group">
                    <?php
                    $loginMember = Configure::read('loginMember');
                    if (isset($loginMember['group_id'])) {
                        switch ($loginMember['group_id']) {
                            case 1:
                                echo $this->Html->link('通報資料', '/admin/issues', array('class' => 'btn btn-default'));
                                echo $this->Html->link('建立通報', '/admin/issues/add', array('class' => 'btn btn-default'));
                                echo $this->Html->link('帳號', '/admin/members', array('class' => 'btn btn-default'));
                                echo $this->Html->link('群組', '/admin/groups', array('class' => 'btn btn-default'));
                                break;
                            case 2:
                                echo $this->Html->link('通報資料', '/admin/issues', array('class' => 'btn btn-default'));
                                echo $this->Html->link('建立通報', '/admin/issues/add', array('class' => 'btn btn-default'));
                                break;
                        }
                    }
                    if (!empty($loginMember['group_id'])) {
                        echo $this->Html->link('編輯帳號', '/members/edit', array('class' => 'btn btn-default'));
                        echo $this->Html->link('登出', '/members/logout', array('class' => 'btn btn-default'));
                    } else {
                        echo $this->Html->link('登入', '/members/login', array('class' => 'btn btn-default'));
                    }
                    if (!empty($actions_for_layout)) {
                        foreach ($actions_for_layout as $title => $url) {
                            echo $this->Html->link($title, $url, array('class' => 'btn'));
                        }
                    }
                    ?>
                </div>

                <?php echo $this->Session->flash(); ?>
                <div id="viewContent"><?php echo $content_for_layout; ?></div>
            </div>
            <div id="footer">
                ---<br />
                本網站係為<?php echo $this->Html->link('藥要看', 'http://drugs.olc.tw/', array('target' => '_blank')); ?>
                及<?php echo $this->Html->link('台灣年輕藥師協會', 'http://typg.org.tw/', array('target' => '_blank')); ?>共同協作之平台，
                僅供藥師作為外觀疑義之交流與參考，並非原藥品許可證持有者及食品藥物管理署之公開資料。<br />
                本網站資料僅供交流參考，一切資訊以食品藥物管理署或各藥品許可證持有者公告為準；本網站恕不負資訊正確之一切法律責任。
            </div>
        </div>
        <?php
        if($loginMember['group_id'] == 1) {
            echo $this->element('sql_dump');
        }
        ?>
    </body>
</html>
