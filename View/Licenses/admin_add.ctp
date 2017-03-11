<div id="LicensesAdminAdd">
    <?php echo $this->Form->create('License', array('type' => 'file')); ?>
    <div class="Licenses form">
        <fieldset>
            <legend><?php
                echo __('Add 許可證', true);
                ?></legend>
            <?php
            echo $this->Form->input('License.name_english', array(
                'label' => '藥品英文名',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('License.name_chinese', array(
                'label' => '藥品中文名',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('License.license', array(
                'label' => '許可證字號',
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