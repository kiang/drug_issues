<div id="IssuesAdminAdd">
    <?php echo $this->Form->create('Issue', array('type' => 'file')); ?>
    <div class="Issues form">
        <fieldset>
            <legend><?php
                echo __('Add 回報表單', true);
                ?></legend>
            <?php
            echo $this->Form->input('Issue.license_id', array(
                'label' => '許可證',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.license_uuid', array(
                'label' => '外部許可證',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.info_source', array(
                'label' => '編輯者',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.status', array(
                'label' => '分類',
                'div' => 'form-group',
                'class' => 'form-control',
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
            echo $this->Form->input('Issue.license', array(
                'label' => '許可證字號',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.dosage_form', array(
                'label' => '劑型',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.dosage', array(
                'label' => '含量（規格/劑量）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.batch_no', array(
                'label' => '批號（新變更的批號）',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.pic_old', array(
                'label' => '舊外觀(上傳資料)',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.pic_new', array(
                'label' => '新外觀(上傳資料)',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.label_old', array(
                'label' => '舊仿單(KEY IN)',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.label_old_file', array(
                'label' => '舊仿單(上傳資料)',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.label_new', array(
                'label' => '新仿單(KEY IN)',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.label_new_file', array(
                'label' => '新仿單(上傳資料)',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.evidence', array(
                'label' => '異動證明(公文/廠商說明書等)',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.modified', array(
                'label' => '更新時間',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.modified_by', array(
                'label' => '更新者',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </fieldset>
    </div>
    <?php
    echo $this->Form->end(__('Submit', true));
    ?>
</div>