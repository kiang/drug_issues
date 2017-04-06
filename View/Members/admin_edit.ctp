<div class="members form">
    <?php echo $this->Form->create('Member'); ?>
    <fieldset>
        <legend><?php echo __('Edit Member', true); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('Member.username', array(
            'type' => 'text',
            'label' => '帳號',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.group_id', array(
            'type' => 'select',
            'label' => '群組',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.password', array(
            'type' => 'password',
            'label' => '密碼',
            'value' => '',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.nick', array(
            'type' => 'text',
            'label' => '暱稱',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.email', array(
            'type' => 'text',
            'label' => '信箱',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.role', array(
            'type' => 'radio',
            'options' => array(
                '醫院藥師' => '醫院藥師',
                '社區藥局藥師' => '社區藥局藥師',
                '診所藥師' => '診所藥師',
                '藥商' => '藥商',
                '公學協會' => '公學協會',
                '其他' => '其他',
            ),
            'legend' => '身份',
            'div' => 'form-group',
        ));
        echo $this->Form->input('Member.user_status', array(
            'type' => 'radio',
            'legend' => '狀態',
            'options' => array('Y' => 'Y', 'N' => 'N'),
            'div' => 'form-group',
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end('送出'); ?>
</div>
