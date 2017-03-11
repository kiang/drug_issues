<div id="IssuesAdminAdd">
    <h3>建立通報</h3>
    <?php echo $this->Form->create('Issue', array('type' => 'file')); ?>
    <div class="Issues form">
        <?php
        echo $this->Form->hidden('Issue.license_id');
        echo $this->Form->hidden('Issue.license_uuid');
        echo $this->Form->input('Issue.license', array(
            'type' => 'text',
            'label' => '許可證字號',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.info_source', array(
            'type' => 'radio',
            'options' => array(
                '醫院藥師' => '醫院藥師',
                '社區藥局藥師' => '社區藥局藥師',
                '診所藥師' => '診所藥師',
                '藥商' => '藥商',
                '公學協會' => '公學協會',
                '其他' => '其他',
            ),
            'legend' => '編輯者',
            'div' => 'form-group',
        ));
        echo $this->Form->input('Issue.status', array(
            'type' => 'radio',
            'options' => array(
                '變更(未確認)' => '變更(未確認)',
                '變更(已確認)' => '變更(已確認)',
                '疑義' => '疑義',
            ),
            'legend' => '分類',
            'div' => 'form-group',
        ));
        echo $this->Form->input('Issue.name_english', array(
            'label' => '藥品英文名',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.name_chinese', array(
            'label' => '藥品中文名',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.dosage_form', array(
            'label' => '劑型',
            'div' => 'form-group col-md-6',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.dosage', array(
            'label' => '含量（規格/劑量）',
            'div' => 'form-group col-md-6',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.batch_no', array(
            'label' => '批號（新變更的批號）',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.pic_old', array(
            'type' => 'file',
            'label' => '舊外觀(上傳資料)',
            'div' => 'form-group col-md-6',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.pic_new', array(
            'type' => 'file',
            'label' => '新外觀(上傳資料)',
            'div' => 'form-group col-md-6',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.label_old', array(
            'type' => 'textarea',
            'rows' => 3,
            'label' => '舊仿單(KEY IN)',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.label_old_file', array(
            'type' => 'file',
            'label' => '舊仿單(上傳資料)',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.label_new', array(
            'type' => 'textarea',
            'rows' => 3,
            'label' => '新仿單(KEY IN)',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.label_new_file', array(
            'type' => 'file',
            'label' => '新仿單(上傳資料)',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.evidence', array(
            'type' => 'file',
            'label' => '異動證明(公文/廠商說明書等)',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('IssueLog.comment', array(
            'type' => 'textarea',
            'rows' => 5,
            'label' => '備註/說明',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        ?>
    </div>
    <?php
    /*
     * @var Form FormHelper
     */
    echo $this->Form->submit('送出', array(
        'class' => 'btn btn-primary',
    ));
    echo $this->Form->end();
    ?>
</div>